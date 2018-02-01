<?php 
class Model_santri extends CI_Model {
	
	public $table = "tbl_santri";
	public $nim   = "nim";
	// public $order = "ASC";

	// fungsi view details by P_key / id (dimana id = $nim)
	function get_by_id($nim) {
        $this->db->where($this->nim, $nim);
        return $this->db->get($this->table)->row();
    }

	function save($foto) {
		$data = array(
			'nim' 			=> $this->input->post('nim'),
			'nama' 			=> $this->input->post('nama'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
			'alamat' 		=> $this->input->post('alamat'),
			'foto'			=> $foto
		);
		$this->db->insert($this->table,$data);
	}

	function update($foto) {
		if (empty($foto)) {
		$data = array(
			'nim' 			=> $this->input->post('nim', true),
			'nama' 			=> $this->input->post('nama', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir', true),
			'alamat' 		=> $this->input->post('alamat', true),
		);
		}else{
		$data = array(
			'nim' 			=> $this->input->post('nim', true),
			'nama' 			=> $this->input->post('nama', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'tempat_lahir' 	=> $this->input->post('tempat_lahir', true),
			'alamat' 		=> $this->input->post('alamat', true),
			'foto'			=> $foto
		);
		}
		$nim	= $this->input->post('nim');
		$this->db->where('nim',$nim); 
		$this->db->update($this->table, $data);
	}

}