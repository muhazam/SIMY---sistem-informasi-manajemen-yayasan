<?php 
class Model_siswa extends CI_Model {
	
	public $table = "tbl_siswa";
	public $nim   = "nim";
	// public $order = "ASC";

	function get_by_id($nim) {
        $this->db->where($this->nim, $nim);
        return $this->db->get($this->table)->row();
    }

	function save($foto) {
		$data = array(
			'nim' 			=> $this->input->post('nim', true),
			'nama' 			=> $this->input->post('nama', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir', true),
			'alamat' 		=> $this->input->post('alamat', true),
			'gender' 		=> $this->input->post('gender', true),
			'foto'			=> $foto,
			'id_rombel'		=> $this->input->post('rombel',TRUE)
		);
		$this->db->insert($this->table,$data);

		$tahun_akademik = $this->db->get_where('tbl_tahun_akademik',array('is_aktif'=>'y'))->row_array();
        
        $history =  array(
            'nim'                 =>  $this->input->post('nim', TRUE),
            'id_tahun_akademik'   =>  $tahun_akademik['id_tahun_akademik'],
            'id_rombel'           =>  $this->input->post('rombel', TRUE)
            );
        $this->db->insert('tbl_history_kelas',$history);
	}

	function update($foto) {
		if (empty($foto)) {
		$data = array(
			'nim' 			=> $this->input->post('nim', true),
			'nama' 			=> $this->input->post('nama', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir', true),
			'alamat' 		=> $this->input->post('alamat', true),
			'gender' 		=> $this->input->post('gender', true),
			'id_rombel'		=> $this->input->post('rombel',TRUE)
			
		);
		}else{
		$data = array(
			'nim' 			=> $this->input->post('nim', true),
			'nama' 			=> $this->input->post('nama', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir', true),
			'alamat' 		=> $this->input->post('alamat', true),
			'gender' 		=> $this->input->post('gender', true),
			'foto'			=> $foto,
			'id_rombel'		=> $this->input->post('rombel',TRUE)

		);
		}
		$nim	= $this->input->post('nim');
		$this->db->where('nim',$nim); 
		$this->db->update($this->table, $data);
	}

}