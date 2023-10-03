<?php
class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  function sendMail($to, $subject, $content)
  {
    // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = mail_host;
    $mail->SMTPAuth = true;
    $mail->Username = mail_username;
    $mail->Password = mail_password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port     = 465;

    $mail->setFrom(mail_username, mail_username_display);
    $mail->addReplyTo(mail_username, mail_username_display);

    // Add a recipient
    $mail->addAddress($to);

    // Add cc or bcc 
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Email subject
    $mail->Subject = $subject;

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mail->Body = $content;

    // Send email
    if (!$mail->send()) {
      return array(
        "success" => false,
        "message" => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo
      );
    } else {
      return array(
        "success" => true,
        "message" => 'Email sent successfully'
      );
    }
  }

  public function checkSession()
  {
    if (!$this->session->userdata("arrive_desi_user_details")) {
      header("Location: " . base_url() . "admin/login");
      die();
    }
    $data_input = array(
      "email" => $_SESSION["arrive_desi_user_details"]["email"],
      "isAccountVerified" => "1",
      "status" => "1"
    );
    $db_input_table_name = "users";
    $result = $this->common_model->fetchData("*", $db_input_table_name, $data_input);
    if ($result === false) {
      $this->session->unset_userdata('arrive_desi_user_details');
      header("Location: " . base_url() . "admin/login");
      die();
    }
  }

  public function index()
  {
    $this->pgs();
  }

  public function login()
  {
    if ($this->session->userdata("arrive_desi_user_details")) {
      header("Location: " . base_url() . "admin");
      die();
    }
    $this->load->view("admin/login");
  }

  public function verifyLogin()
  {
    $data_input = array(
      "email" => $_REQUEST["email"],
      "status" => "1"
    );
    $db_input_table_name = "users";
    $result = $this->common_model->fetchData("*", $db_input_table_name, $data_input);
    if ($result === false) {
      print_r(json_encode(array(
        "success" => false,
        "message" => "The email is not registered on the website. Please sign up to continue."
      )));
    } else {
      $data_input = array(
        "email" => $_REQUEST["email"],
        "password" => $_REQUEST["password"],
        "status" => "1"
      );
      $db_input_table_name = "users";
      $result = $this->common_model->fetchData("*", $db_input_table_name, $data_input);
      if ($result === false) {
        print_r(json_encode(array(
          "success" => false,
          "message" => "Invalid credentials. Please try again!"
        )));
      } else {
        $data_input = array(
          "email" => $_REQUEST["email"],
          "password" => $_REQUEST["password"],
          "isAccountVerified" => "1",
          "status" => "1"
        );
        $db_input_table_name = "users";
        $result = $this->common_model->fetchData("*", $db_input_table_name, $data_input);
        if ($result === false) {
          print_r(json_encode(array(
            "success" => false,
            "message" => "Your account is under verification. Please try again later!"
          )));
        } else {
          $_SESSION["arrive_desi_user_details"] = json_decode(json_encode($result[0]), true);
          print_r(json_encode(array(
            "success" => true,
            "message" => "Logged in successfully",
            "data" => $_SESSION["arrive_desi_user_details"]
          )));
        }
      }
    }
  }

  public function setSession()
  {
    $userDetails = json_decode(json_encode($_POST['data']), true);
    $this->session->set_userdata("arrive_desi_user_details", $userDetails);
    return true;
  }

  public function logout()
  {
    $this->session->unset_userdata('arrive_desi_user_details');
    header("Location: " . base_url() . "admin/login");
    die();
  }

  public function colleges()
  {
    $this->checkSession();

    $this->load->view("admin/colleges");
  }

  public function fetchColleges()
  {
    $this->checkSession();

    $result = $this->common_model->fetchAllData("*", "colleges", array(), array(), "collegeId DESC");
    if (!$result || empty($result)) {
      $result = array();
    }

    echo json_encode(array(
      "success" => true,
      "message" => "Colleges list",
      "data" => $result
    ));
  }

  public function manageCollege($collegeId = null)
  {
    $this->checkSession();

    $data = array();

    if ($collegeId) {
      $result = $this->common_model->fetchData("*", "colleges", array(
        "collegeId" => $collegeId
      ));
      if ($result && !empty($result)) {
        $data = $result[0];
      }
    }

    $this->load->view("admin/manage-college", array(
      "data" => $data
    ));
  }

  public function createCollege()
  {
    $this->checkSession();

    if (empty($_POST)) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    if (!isset($_POST["name"])) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    $this->common_model->insertData("colleges", array(
      "name" => $_POST["name"],
      "createdBy" => $_SESSION["arrive_desi_user_details"]["id"],
      "updatedBy" => $_SESSION["arrive_desi_user_details"]["id"]
    ));

    echo json_encode(array(
      "success" => true,
      "message" => "College created successfully"
    ));
  }

  public function updateCollege()
  {
    $this->checkSession();

    if (empty($_POST)) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    if (!isset($_POST["collegeId"]) || !isset($_POST["name"])) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    $this->common_model->updateData("colleges", array(
      "name" => $_POST["name"],
      "updatedBy" => $_SESSION["arrive_desi_user_details"]["id"]
    ), array(
      "collegeId" => $_POST["collegeId"]
    ));

    echo json_encode(array(
      "success" => true,
      "message" => "College updated successfully"
    ));
  }

  public function pgs()
  {
    $this->checkSession();

    $this->load->view("admin/pgs");
  }

  public function fetchPGs()
  {
    $this->checkSession();

    $result = $this->common_model->fetchAllData("*", "pgs", array(), array(), "pgId DESC");
    if (!$result || empty($result)) {
      $result = array();
    }

    echo json_encode(array(
      "success" => true,
      "message" => "PGs list",
      "data" => $result
    ));
  }

  public function managePG($pgId = null)
  {
    $this->checkSession();

    $data = array();

    if ($pgId) {
      $result = $this->common_model->fetchData("*", "pgs", array(
        "pgId" => $pgId
      ));
      if ($result && !empty($result)) {
        $data = $result[0];
      }
    }

    $this->load->view("admin/manage-pg", array(
      "data" => $data
    ));
  }

  public function createPG()
  {
    $this->checkSession();

    if (empty($_POST)) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    if (!isset($_POST["name"])) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    $data = $_POST;
    $data["createdBy"] = $_SESSION["arrive_desi_user_details"]["id"];
    $data["updatedBy"] = $_SESSION["arrive_desi_user_details"]["id"];
    unset($data["beforeArrivalStudentGuide"]);
    unset($data["afterArrivalStudentGuide"]);
    unset($data["rulesAndRegulations"]);

    if (isset($_FILES["beforeArrivalStudentGuide"])) {
      if ($_FILES["beforeArrivalStudentGuide"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['beforeArrivalStudentGuide']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['beforeArrivalStudentGuide']['name']));
        if (move_uploaded_file($_FILES['beforeArrivalStudentGuide']['tmp_name'], $target_path)) {
          $data["beforeArrivalStudentGuide"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['beforeArrivalStudentGuide']['name']));
        }
      }
    }

    if (isset($_FILES["afterArrivalStudentGuide"])) {
      if ($_FILES["afterArrivalStudentGuide"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['afterArrivalStudentGuide']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['afterArrivalStudentGuide']['name']));
        if (move_uploaded_file($_FILES['afterArrivalStudentGuide']['tmp_name'], $target_path)) {
          $data["afterArrivalStudentGuide"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['afterArrivalStudentGuide']['name']));
        }
      }
    }

    if (isset($_FILES["rulesAndRegulations"])) {
      if ($_FILES["rulesAndRegulations"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['rulesAndRegulations']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['rulesAndRegulations']['name']));
        if (move_uploaded_file($_FILES['rulesAndRegulations']['tmp_name'], $target_path)) {
          $data["rulesAndRegulations"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['rulesAndRegulations']['name']));
        }
      }
    }

    $this->common_model->insertData("pgs", $data);

    echo json_encode(array(
      "success" => true,
      "message" => "PG created successfully"
    ));
  }

  public function updatePG()
  {
    $this->checkSession();

    if (empty($_POST)) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    if (!isset($_POST["pgId"]) || !isset($_POST["name"])) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    $data = $_POST;
    $data["updatedBy"] = $_SESSION["arrive_desi_user_details"]["id"];
    unset($data["beforeArrivalStudentGuide"]);
    unset($data["afterArrivalStudentGuide"]);
    unset($data["rulesAndRegulations"]);

    if (isset($_FILES["beforeArrivalStudentGuide"])) {
      if ($_FILES["beforeArrivalStudentGuide"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['beforeArrivalStudentGuide']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['beforeArrivalStudentGuide']['name']));
        if (move_uploaded_file($_FILES['beforeArrivalStudentGuide']['tmp_name'], $target_path)) {
          $data["beforeArrivalStudentGuide"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['beforeArrivalStudentGuide']['name']));
        }
      }
    }

    if (isset($_FILES["afterArrivalStudentGuide"])) {
      if ($_FILES["afterArrivalStudentGuide"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['afterArrivalStudentGuide']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['afterArrivalStudentGuide']['name']));
        if (move_uploaded_file($_FILES['afterArrivalStudentGuide']['tmp_name'], $target_path)) {
          $data["afterArrivalStudentGuide"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['afterArrivalStudentGuide']['name']));
        }
      }
    }

    if (isset($_FILES["rulesAndRegulations"])) {
      if ($_FILES["rulesAndRegulations"]["error"] === 0) {
        $ext = explode('.', basename($_FILES['rulesAndRegulations']['name']));
        $file_extension = end($ext);
        $target_path = uploads . strtotime(current_datetime) . "-" . str_replace(" ", "-", trim($_FILES['rulesAndRegulations']['name']));
        if (move_uploaded_file($_FILES['rulesAndRegulations']['tmp_name'], $target_path)) {
          $data["rulesAndRegulations"] = str_replace(" ", "-", trim(strtotime(current_datetime) . "-" . $_FILES['rulesAndRegulations']['name']));
        }
      }
    }

    $this->common_model->updateData("pgs", $data, array(
      "pgId" => $_POST["pgId"]
    ));

    echo json_encode(array(
      "success" => true,
      "message" => "PG updated successfully"
    ));
  }

  public function managePGColleges($pgId)
  {
    $this->checkSession();

    $result = $this->common_model->fetchData("*", "pgs", array(
      "pgId" => $pgId
    ));

    $resultColleges = $this->common_model->fetchAllData("*", "colleges", array(), array(), "collegeId DESC");

    $this->load->view("admin/manage-pg-colleges", array(
      "pg" => $result[0],
      "colleges" => $resultColleges
    ));
  }

  public function fetchPGColleges()
  {
    $this->checkSession();

    $result = $this->common_model->fetchAllData("*", "college_pg_mappings", array(), array(), "collegePGMappingId DESC");
    $resultColleges = $this->common_model->fetchAllData("*", "colleges", array(), array(), "collegeId DESC");

    if (!empty($result)) {
      for ($i = 0; $i < count($result); $i++) {
        $result[$i]["college"] = array_column($resultColleges, null, 'collegeId')[$result[$i]["collegeId"]] ?? array();
      }
    }

    if (!$result || empty($result)) {
      $result = array();
    }

    echo json_encode(array(
      "success" => true,
      "message" => "PG colleges list",
      "data" => $result
    ));
  }

  public function updatePGColleges()
  {
    $this->checkSession();

    if (empty($_POST)) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }

    if (!isset($_POST["pgId"])) {
      echo json_encode(array(
        "success" => false,
        "message" => "Bad request"
      ));
      return;
    }
    
    $this->common_model->deleteData("college_pg_mappings", array(
      "pgId" => $_POST["pgId"]
    ));

    if (!empty($_POST["collegeMappings"])) {
      for ($i = 0; $i < count($_POST["collegeMappings"]); $i++) {
        $data = array(
          "pgId" => $_POST["pgId"],
          "collegeId" => $_POST["collegeMappings"][$i]["collegeId"],
          "distance" => $_POST["collegeMappings"][$i]["distance"],
          "createdBy" =>  $_SESSION["arrive_desi_user_details"]["id"],
          "updatedBy" =>  $_SESSION["arrive_desi_user_details"]["id"],
        );

        $this->common_model->insertData("college_pg_mappings", $data);
      }
    }

    echo json_encode(array(
      "success" => true,
      "message" => "PG colleges updated successfully"
    ));
  }
}
