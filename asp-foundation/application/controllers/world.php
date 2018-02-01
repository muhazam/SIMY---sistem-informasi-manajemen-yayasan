<?php

class World extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->model('World_model');
    }
    
    function index() {
        $this->load->view('world');
        // $this->template->load('template','world');

    }

    function json() {
        header('Content-Type: application/json');
        echo $this->World_model->json();
    }
}