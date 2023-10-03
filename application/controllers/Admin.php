<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("welcome_message");
    }

    public function colleges() {
      $this->load->view("admin/colleges");
    }

    public function fetchColleges() {
      $result = $this->common_model->fetchAllData("*", "colleges", array(), array(), "collegeId DESC");

      echo json_encode(array(
        "success" => true,
        "message" => "Colleges list",
        "data" => $result
      ));
    }

    public function manageCollege($collegeId = null) {
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

    public function createCollege() {
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
        "name" => $_POST["name"]
      ));

      echo json_encode(array(
        "success" => true,
        "message" => "College created successfully"
      ));
    }

    public function updateCollege() {
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
        "name" => $_POST["name"]
      ), array(
        "collegeId" => $_POST["collegeId"]
      ));

      echo json_encode(array(
        "success" => true,
        "message" => "College updated successfully"
      ));
    }
}
