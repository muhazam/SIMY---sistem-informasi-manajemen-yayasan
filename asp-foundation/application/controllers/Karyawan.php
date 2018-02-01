<?php
Class karyawan extends CI_Controller {
    
	function __construct() {
		parent::__construct();
		$this->load->library('Ssp', 'datatables');
        cek_akses_module();
        
	}

	function index() {
		$this->template->load('template', 'karyawan/list');
	}

    function data(){
	    $this->load->library('datatables');
	    $this->datatables->add_column('foto', '<img src="http://www.rutlandherald.com/wp-content/uploads/2017/03/default-user.png" width=20>', 'foto');
	    $this->datatables->select('nama_lengkap,email,no_hp');
	    $this->datatables->add_column('action', anchor('karyawan/edit/.$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'id_pegawai');
	    $this->datatables->from('karyawan');
	    	return print_r($this->datatables->generate());
    }
    
}