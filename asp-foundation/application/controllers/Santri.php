<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('Ssp');
        $this->load->model('Model_santri');
        cek_akses_module();
        
	}

	function data() {
        // $this->load->library('datatables');
		$table = 'tbl_santri';
		$primaryKey = 'nim';
		$columns = array(
            array('db' => 'foto',
                  'dt' => 'foto',
                  'formatter' => function( $d) {
                    if (empty($d)) {
                        return "<img width='20px' src='".  base_url()."/uploads/foto_santri/default-user.png'>";
                    }else{
                        return "<img width='25px' src='". base_url()."/uploads/foto_santri/".$d."'>";
                    }
                  }
            ),
			array('db' => 'nim', 'dt' => 'nim'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
            array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
            array(
                'db' => 'nim',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('santri/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').'
                         '.anchor('santri/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"').'
                         '.anchor('santri/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
                }
            )
        );

    	$sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}

    public function index() {
        $this->template->load('template', 'santri/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_santri();
            $this->Model_santri->save($uploadFoto);
            redirect('santri');
        }else {
            $this->template->load('template', 'santri/add');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_santri();
            $this->Model_santri->update($uploadFoto);
            redirect('santri');
        }else {
            $nim           = $this->uri->segment(3);
            $data['santri'] = $this->db->get_where('tbl_santri', array('nim'=>$nim))->row_array();
            $this->template->load('template', 'santri/edit', $data);
        }
    }

    function delete() {
        $nim = $this->uri->segment(3);
        if (!empty($nim)) {
            // proses delete data
            $this->db->where('nim', $nim);
            $this->db->delete('tbl_santri');
        }
        redirect('santri');
    }

    function upload_foto_santri(){
        $config['upload_path']          = './uploads/foto_santri/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 4120; // imb
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    public function details($nim) {
        $row = $this->Model_santri->get_by_id($nim);
        if ($row) {
            $data = array(
        'nim'           => $row->nim,
        'nama'          => $row->nama,
        'alamat'        => $row->alamat,
        'tanggal_lahir' => $row->tanggal_lahir,
        'tempat_lahir'  => $row->tempat_lahir,
        'foto'          => $row->foto,
        );
            $this->template->load('template','santri/details', $data);
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            redirect('santri');
        }
    }

}