<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
        {
            parent::__construct();
			// jika belum login redirect ke login
            if (!$this->session->userdata('username')) {
            	redirect('auth');
            }
            $this->load->model('calendar_model_global');
            $this->load->model('calendar_model_SDIT');
            $this->load->model('calendar_model_mahad');
        }

	public function index()	{
		// $this->template->load('template','chat');
		$event_global = $this->calendar_model_global->get_where(array(
			'start >=' => date('Y-m-d')
		))->row();
 		
	    $event_SDIT = $this->calendar_model_SDIT->get_where(array(
	      	'end >=' => date('Y-m-d')
	    ))->row();

	    $event_mahad = $this->calendar_model_mahad->get_where(array(
	      	'end >=' => date('Y-m-d')
	    ))->row();
	    
	    // Data untuk page index
	    $data['event_mahad'] = $event_mahad;
	    $data['event_SDIT'] = $event_SDIT;
	    $data['event_global'] = $event_global;
	    $data['pageTitle'] = 'Dashboard';
	    $data['pageContent'] = $this->load->view('dashboard', $data, true);
	 
	    // Jalankan view template/layout 
		$this->template->load('template','dashboard', $data);
	}

}