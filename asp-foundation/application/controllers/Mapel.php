<?php

Class Mapel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_mapel');
        cek_akses_module();
    }

    function data() {
        // nama tabel
        $table = 'v_tbl_mapel';
        // nama PK
        $primaryKey = 'id';
        // list field
        $columns = array(
            array('db' => 'id', 'dt' => 'id'),
            array('db' => 'nama_mapel', 'dt' => 'nama_mapel'),
            array('db' => 'judul_kitab', 'dt' => 'judul_kitab'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'target', 'dt' => 'target'),
            array(
                'db' => 'id',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    //return "<a href='edit.php?id=$d'>EDIT</a>";
                    return anchor('mapel/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').' 
                        '.anchor('mapel/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"');
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
        $this->template->load('template', 'mapel/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_mapel->save();
            redirect('mapel');
        } else {
            $this->template->load('template', 'mapel/add');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            $this->Model_mapel->update();
            redirect('mapel');
        }else{
            $id      = $this->uri->segment(3);
            $data['mapel'] = $this->db->get_where('v_tbl_mapel',array('id'=>$id))->row_array();
            $this->template->load('template', 'mapel/edit',$data);
        }
    }
    
    function delete(){
        $id = $this->uri->segment(3);
        if(!empty($id)){
            // proses delete data
            $this->db->where('id',$id);
            $this->db->delete('tbl_mapel');
        }
        redirect('mapel');
    }

    function data_mapel_excel() {
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NO');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'MATA PELAJARAN');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'JUDUL KITAB');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'PENGAJAR');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'TARGET');

        $siswa = $this->db->get('v_tbl_mapel');
        $nmr = 1;
        $no = 2;
        foreach ($siswa->result() as $row) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $nmr);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->nama_mapel);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->judul_kitab);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->nama);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$no, $row->target);
            $no++;
            $nmr++;
        }    
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("silabus ma'had.xlsx");
        $this->load->helper('download');
        force_download("silabus ma'had.xlsx", NULL);
    }

}