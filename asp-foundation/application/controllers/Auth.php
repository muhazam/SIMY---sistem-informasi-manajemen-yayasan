<?php 

class Auth extends CI_controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('Model_login');
	}

	function index() {
        // jika sudah login
        if ($this->session->userdata('username')) {
            redirect('welcome');
        } 
			$this->load->view('auth/login');		
	}

	function cek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini
        	$username	= $this->input->post('username');
        	$password	= $this->input->post('password');
        	$result		= $this->Model_login->cekLogin($username,$password);
        	if (!empty($result)) {
        		$this->session->set_userdata($result);
        		redirect('welcome');
        	}else{
        		redirect('auth');
        	}
        	print_r($result);
        } else {
            redirect('auth');
        }
    }

    function logout() {
        unset($_SESSION);
    	$this->session->sess_destroy();
    	redirect('auth');
    }
}