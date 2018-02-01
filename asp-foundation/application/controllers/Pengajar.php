<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pengajar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_pengajar');
        cek_akses_module();
    }

    function data() {
        // nama tabel
        $table = 'tbl_pengajar_mahad';
        // nama PK
        $primaryKey = 'id_pengajar';
        // list field
        $columns = array(
            array('db' => 'id_pengajar', 'dt' => 'id_pengajar'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'status', 'dt' => 'status'),
            array('db' => 'no_telp', 'dt' => 'no_telp'),
            array(
                'db' => 'id_pengajar',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('pengajar/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').' 
                        '.anchor('pengajar/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"').'
                         '.anchor('pengajar/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }

    function index() {
        $this->template->load('template', 'pengajar/list');
    }

    function add() {

        if (isset($_POST['submit'])) {
            $this->Model_pengajar->save();
            redirect('pengajar');
        } else {
            $this->template->load('template', 'pengajar/add');
        }
    }
    
    function edit(){

        if(isset($_POST['submit'])){
            $this->Model_pengajar->update();
            redirect('pengajar');
        }else{
            $id_pengajar      = $this->uri->segment(3);
            $data['pengajar'] = $this->db->get_where('tbl_pengajar_mahad',array('id_pengajar'=>$id_pengajar))->row_array();
            $this->template->load('template', 'pengajar/edit',$data);
        }
    }
    
    function delete(){

        $id_pengajar = $this->uri->segment(3);
        if(!empty($id_pengajar)){
            // proses delete data
            $this->db->where('id_pengajar',$id_pengajar);
            $this->db->delete('tbl_pengajar_mahad');
        }
        redirect('pengajar');
    }

    public function details($id_pengajar) {

        $row = $this->Model_pengajar->get_by_id($id_pengajar);
        if ($row) {
            $data = array(
        'id_pengajar'   => $row->id_pengajar,
        'nama'          => $row->nama,
        'alamat'        => $row->alamat,
        'status'        => $row->status,
        'no_telp'       => $row->no_telp
        );
            $this->template->load('template','pengajar/details', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('pengajar');
        }
    }

}