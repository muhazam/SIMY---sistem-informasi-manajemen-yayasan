<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pegawai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_pegawai');
        cek_akses_module();
        
    }

    function data() {
        // nama tabel
        $table = 'tbl_pegawai';
        // nama PK
        $primaryKey = 'id_pegawai';
        // list field
        $columns = array(
            array('db' => 'nama_jabatan', 'dt' => 'nama_jabatan'),
            array(
                'db' => 'id_pegawai',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('Pegawai/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('Pegawai/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'pegawai/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_pegawai->save();
            redirect('pegawai');
        } else {
            $this->template->load('template', 'pegawai/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_pegawai->update();
            redirect('pegawai');
        }else{
            $id_pegawai      = $this->uri->segment(3);
            $data['pegawai'] = $this->db->get_where('tbl_pegawai',array('id_pegawai'=>$id_pegawai))->row_array();
            $this->template->load('template', 'pegawai/edit',$data);
        }
    }
    
    function delete(){
        $id_pegawai = $this->uri->segment(3);
        if(!empty($id_pegawai)){
            // proses delete data
            $this->db->where('id_pegawai',$id_pegawai);
            $this->db->delete('tbl_pegawai');
        }
        redirect('pegawai');
    }

}