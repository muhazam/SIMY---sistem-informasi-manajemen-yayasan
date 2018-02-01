<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_users');
        cek_akses_module();
    }

    function data() {
        // nama tabel
        $table = 'v_tbl_user';
        // nama PK
        $primaryKey = 'id_user';
        // list field
        $columns = array(
            array('db' => 'foto', 
                  'dt' => 'foto',
                  'formatter' => function($d) {
                    if (empty($d)) {
                        return "<img width='20px' src='".  base_url()."/uploads/foto_user/default-user.png'>";
                    }else{
                        return "<img width='25px' src='". base_url()."/uploads/foto_user/".$d."'>";
                    }
                  }
            ),
            array('db' => 'id_user', 'dt' => 'id_user'),
            array('db' => 'nama_lengkap', 'dt' => 'nama_lengkap'),
            array('db' => 'email', 'dt' => 'email'),
            array('db' => 'nama_level', 'dt' => 'nama_level'),
            array(
                'db' => 'id_user',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('users/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').' 
                        '.anchor('users/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"').'
                         '.anchor('users/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
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
        $this->template->load('template', 'users/list');
    }

    function add() {

        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_user();
            $this->Model_users->save($uploadFoto);
            redirect('users');
        } else {
            $this->template->load('template', 'users/add');
        }
    }
    
    function edit(){

        if(isset($_POST['submit'])){
            $uploadFoto     = $this->upload_foto_user();
            $this->Model_users->update($uploadFoto);
            redirect('users');
        }else{
            $id_user      = $this->uri->segment(3);
            $data['user'] = $this->db->get_where('tbl_user',array('id_user'=>$id_user))->row_array();
            $this->template->load('template', 'users/edit',$data);
        }
    }
    
    function delete(){

        $id_user = $this->uri->segment(3);
        if(!empty($id_user)){
            // proses delete data
            $this->db->where('id_user',$id_user);
            $this->db->delete('tbl_user');
        }
        redirect('users');
    }

    public function details($id_user) {

        $row = $this->Model_users->get_by_id($id_user);
        if ($row) {
            $data = array(
        'id_user'       => $row->id_user,
        'nama_lengkap'  => $row->nama_lengkap,
        'username'      => $row->username,
        'email'         => $row->email,
        'gender'        => $row->gender,
        'nama_level'    => $row->nama_level,
        'foto'          => $row->foto,
        );
            $this->template->load('template','users/details', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('users');
        }
    }

    function upload_foto_user(){

        $config['upload_path']          = './uploads/foto_user/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 3096;
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

}