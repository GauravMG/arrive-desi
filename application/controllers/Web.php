<?php
class Web extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view("index");
    }

    public function contact() {
        $this->load->view("contact");
    }

    public function accommodations() {
        $this->load->view("accommodations");
    }

    public function host() {
        $this->load->view("host");
    }

    public function news() {
        $this->load->view("news");
    }
}
