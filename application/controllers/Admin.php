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
}
