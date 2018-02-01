<?php

Class Rombel_sdit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Ssp');
        $this->load->model('Model_rombel_sdit');
        cek_akses_module();

    }

    function data() {
        // nama tabel
        $table = 'tbl_rombel';
        // nama PK
        $primaryKey = 'id_rombel';
        // list field
        $columns = array(
            array('db' => 'id_rombel', 'dt' => 'id_rombel'),
            array('db' => 'nama_rombel', 'dt' => 'nama_rombel'),
            array('db' => 'kelas', 'dt' => 'kelas'),
            array(
                'db' => 'id_rombel',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('rombel_sdit/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success tooltips" data-placement="top" title="Edit"').' 
                        '.anchor('rombel_sdit/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger tooltips" data-placement="top" title="Delete"');
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

    function index() {
        $this->template->load('template', 'rombel/rombel_sdit/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_rombel_sdit->save();
            redirect('rombel_sdit');
        } else {
            $infoSekolah = "SELECT jumlah_kelas FROM tbl_jenjang_sekolah WHERE id_jenjang=3";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $this->template->load('template', 'rombel/rombel_sdit/add',$data);
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_rombel_sdit->update();
            redirect('rombel_sdit');
        }else{
            $infoSekolah = "SELECT jumlah_kelas FROM tbl_jenjang_sekolah WHERE id_jenjang=3";
            $data['info']= $this->db->query($infoSekolah)->row_array();
            $id_rombel      = $this->uri->segment(3);
            $data['rombel'] = $this->db->get_where('tbl_rombel',array('id_rombel'=>$id_rombel))->row_array();
            $this->template->load('template', 'rombel/rombel_sdit/edit',$data);
        }
    }
    
    function delete(){
        $id_rombel = $this->uri->segment(3);
        if(!empty($id_rombel)){
            // proses delete data
            $this->db->where('id_rombel',$id_rombel);
            $this->db->delete('tbl_rombel');
        }
        redirect('rombel_sdit');
    }
    
    function show_combobox_rombel_by_jurusan() {
        
        $jurusan = $_GET['jurusan'];
        echo "<select name='rombel' id='rombel2' class='form-control' onchange='loadSiswa()'>";
        $this->db->where('kd_jurusan',$jurusan);
        $rombel = $this->db->get('tbl_rombel');
        foreach ($rombel->result() as $row){
            echo "<option value='$row->id_rombel'>$row->nama_rombel</option>";
        }
        echo"</select>";
    }

}