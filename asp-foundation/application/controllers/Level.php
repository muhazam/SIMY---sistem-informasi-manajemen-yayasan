<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Level extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_level');
        cek_akses_module();
        
    }

    function data() {
        // nama tabel
        $table = 'tbl_level_user';
        // nama PK
        $primaryKey = 'id_level_user';
        // list field
        $columns = array(
            array('db' => 'nama_level', 'dt' => 'nama_level'),
            array(
                'db' => 'id_level_user',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('level/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success tooltips" data-placement="top" data-original-title="Edit"').' 
                        '.anchor('level/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" data-original-title="Delete"');
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
        $this->template->load('template', 'level/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_level->save();
            redirect('level');
        } else {
            $this->template->load('template', 'level/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_level->update();
            redirect('level');
        }else{
            $id_level_user      = $this->uri->segment(3);
            $data['level'] = $this->db->get_where('tbl_level_user',array('id_level_user'=>$id_level_user))->row_array();
            $this->template->load('template', 'level/edit',$data);
        }
    }
    
    function delete(){
        $id_level_user = $this->uri->segment(3);
        if(!empty($id_level_user)){
            // proses delete data
            $this->db->where('id_level_user',$id_level_user);
            $this->db->delete('tbl_level_user');
        }
        redirect('level');
    }

}