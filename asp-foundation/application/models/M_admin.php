<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function update($data, $id_user) {
		$this->db->where("id_user", $id_user);
		$this->db->update('v_tbl_user', $data);

		return $this->db->affected_rows();
	}
	

	public function select($id_user = '') {
		if ($id_user != '') {
			$this->db->where('id_user', $id_user);
		}

		$data = $this->db->get('v_tbl_user');

		return $data->row();
	}

	public function save() {
		$pass = md5($this->input->post('new'));
		$data = array (
			'password' => $pass
		);
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->update('tbl_user', $data);
	}
	// fungsi untuk mengecek password lama :
	public function cek_old() {
		$old = md5($this->input->post('old'));    
		$this->db->where('password',$old);
		$query = $this->db->get('tbl_user');
		return $query->result();
	}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */