<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('Ssp');
        $this->load->model('Model_siswa');
        cek_akses_module();
        
	}

	function data() {
        // $this->load->library('datatables');
		$table = 'tbl_siswa';
		$primaryKey = 'nim';
		$columns = array(
            array('db' => 'foto',
                  'dt' => 'foto',
                  'formatter' => function( $d) {
                    if (empty($d)) {
                        return "<img width='20px' src='".  base_url()."/uploads/foto_user/default-user.png'>";
                    }else{
                        return "<img width='25px' src='". base_url()."/uploads/".$d."'>";
                    }
                  }
            ),
			array('db' => 'nim', 'dt' => 'nim'),
            array('db' => 'nama', 'dt' => 'nama'),
            array('db' => 'gender', 'dt' => 'gender'),
            array('db' => 'alamat', 'dt' => 'alamat'),
            array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
            array('db' => 'tanggal_lahir', 'dt' => 'tanggal_lahir'),
            array('db' => 'id_rombel', 'dt' => 'id_rombel'),
            array(
                'db' => 'nim',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('siswa/edit/'.$d,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"').'
                         '.anchor('siswa/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" onclick="deleted" title="Delete"').'
                         '.anchor('siswa/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
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
        $this->template->load('template', 'siswa/list');
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_siswa();
            $this->Model_siswa->save($uploadFoto);
            redirect('siswa');
        }else {
            $this->template->load('template', 'siswa/add');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $uploadFoto = $this->upload_foto_siswa();
            $this->Model_siswa->update($uploadFoto);
            redirect('siswa');
        }else {
            $nim           = $this->uri->segment(3);
            $data['siswa'] = $this->db->get_where('tbl_siswa', array('nim'=>$nim))->row_array();
            $this->template->load('template', 'siswa/edit', $data);
        }
    }

    function delete() {
        $nim = $this->uri->segment(3);
        if (!empty($nim)) {
            // proses delete data
            $this->db->where('nim', $nim);
            $this->db->delete('tbl_siswa');
        }
        redirect('siswa');
    }

    function upload_foto_siswa(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 4120; 
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    public function details($nim) {
        $row = $this->Model_siswa->get_by_id($nim);
        if ($row) {
            $data = array(
        'nim' => $row->nim,
        'nama' => $row->nama,
        'gender' => $row->gender,
        'alamat' => $row->alamat,
        'tanggal_lahir' => $row->tanggal_lahir,
        'tempat_lahir' => $row->tempat_lahir,
        'foto'     => $row->foto,
        );
            $this->template->load('template','siswa/details', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('siswa');
        }
    }

    function data_siswa_excel() {
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NO');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'NAMA');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'TEMPAT LAHIR');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'TANGGAL LAHIR');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'ALAMAT');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'JENIS KELAMIN');

        $siswa = $this->db->get('tbl_siswa');
        $nmr = 1;
        $no = 2;
        foreach ($siswa->result() as $row) {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $nmr);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->nim);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->nama);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->tempat_lahir);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$no, $row->tanggal_lahir);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$no, $row->alamat);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$no, $row->gender);
            $no++;
            $nmr++;
        }    
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data peserta didik.xlsx");
        $this->load->helper('download');
        force_download('data peserta didik.xlsx', NULL);
    }

    function siswa_aktif(){
        $this->template->load('template', 'siswa/siswa_aktif');
    }
    
    function load_data_siswa_by_rombel(){
        $rombel = $_GET['rombel'];
        $no = 1;
        echo "<table class='table table-bordered'>
            <tr><th width='2' style='text-center'>NO</th><th width='90'>NIM</th><th>NAMA</th></tr>";
        $this->db->where('id_rombel',$rombel);
        $siswa = $this->db->get('tbl_siswa');
        foreach ($siswa->result() as $row){
            echo "<tr><td>$no</td><td>$row->nim</td><td>$row->nama</td></tr>";
            $no++;
        }
        echo"</table>";
    }
    
    function data_by_rombel_excel(){
        $this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NO');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'SISWA');
        
        $rombel = $_POST['rombel'];
        $this->db->where('id_rombel',$rombel);
        $siswa = $this->db->get('tbl_siswa');
        $nmr=1;
        $no=2;
        foreach ($siswa->result() as $row){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $nmr);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->nim);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->nama);
            $no++;
            $nmr++;
        }
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data siswa by rombel.xlsx");
        $this->load->helper('download');
        force_download('data siswa by rombel.xlsx', NULL);
    }

} 