<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Guru extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_guru');
        // cek_akses_module();
    }

    function data() {
        // nama tabel
        $table = 'v_tbl_guru';
        // nama PK
        $primaryKey = 'id_guru';
        // list field
        $columns = array(
            array('db' => 'foto', 
                  'dt' => 'foto',
                  'formatter' => function($d) {
                    if (empty($d)) {
                        return "<img width='20px' src='".  base_url()."/uploads/foto_user/default-user.png'>";
                    }else{
                        return "<img width='25px' src='". base_url()."/uploads/foto_guru/".$d."'>";
                    }
                  }
            ),
            array('db' => 'id_guru', 'dt' => 'id_guru'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array('db' => 'gender', 'dt' => 'gender'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'status', 'dt' => 'status'),
            array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
            array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
            array('db' => 'riwayat_karir', 'dt' => 'riwayat_karir'),
            array('db' => 'riwayat_pend', 'dt' => 'riwayat_pend'),
            array('db' => 'no_telp', 'dt' => 'no_telp'),
            array('db' => 'nama_jabatan', 'dt' => 'nama_jabatan'),
            array(
                'db' => 'id_guru',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('guru/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').' 
                        '.anchor('guru/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"').'
                         '.anchor('guru/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
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
        $this->template->load('template', 'guru/list');
    }

    function add() {

        if (isset($_POST['submit'])) {
            $uploadFoto     = $this->upload_foto_user();
            $this->Model_guru->save($uploadFoto);
            redirect('guru');
        } else {
            $this->template->load('template', 'guru/add');
        }
    }
    
    function edit(){

        if(isset($_POST['submit'])){
            $uploadFoto     = $this->upload_foto_user();
            $this->Model_guru->update($uploadFoto);
            redirect('guru');
        }else{
            $id_guru      = $this->uri->segment(3);
            $data['guru'] = $this->db->get_where('tbl_guru',array('id_guru'=>$id_guru))->row_array();
            $this->template->load('template', 'guru/edit',$data);
        }
    }
    
    function delete(){

        $id_guru = $this->uri->segment(3);
        if(!empty($id_guru)){
            // proses delete data
            $this->db->where('id_guru',$id_guru);
            $this->db->delete('tbl_guru');
        }
        redirect('guru');
    }

    public function details($id_guru) {

        $row = $this->Model_guru->get_by_id($id_guru);
        if ($row) {
            $data = array(
        'id_guru'       => $row->id_guru,
        'nama_guru'     => $row->nama_guru,
        'gender'        => $row->gender,
        'alamat'        => $row->alamat,
        'gender'        => $row->gender,
        'status'        => $row->status,
        'tempat_lahir'  => $row->tempat_lahir,
        'tanggal_lahir' => $row->tanggal_lahir,
        'riwayat_karir' => $row->riwayat_karir,
        'riwayat_pend'  => $row->riwayat_pend,
        'no_telp'       => $row->no_telp,
        'nama_jabatan'       => $row->nama_jabatan,
        'foto'          => $row->foto,
        );
            $this->template->load('template','guru/details', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('guru');
        }
    }

    function upload_foto_user(){

        $config['upload_path']          = './uploads/foto_guru/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 3096;
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

}