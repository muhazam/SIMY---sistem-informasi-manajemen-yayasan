<?php

class Model_guru extends CI_Model {

    public $table   = "v_tbl_guru";
    public $id_guru = "id_guru";
    // public $order   = "DESC";
    
    function get_by_id($id_guru) {
        $this->db->where($this->id_guru, $id_guru);
        return $this->db->get($this->table)->row();
    }

    function save($foto) {
        $data = array(
            'id_guru'        => $this->input->post('id_guru', TRUE),
            'nama_guru'      => $this->input->post('nama_guru', TRUE),
            'gender'         => $this->input->post('gender', TRUE),
            'alamat'         => $this->input->post('alamat', TRUE),
            'status'         => $this->input->post('status', TRUE),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'riwayat_karir'  => $this->input->post('riwayat_karir', TRUE),
            'riwayat_pend'   => $this->input->post('riwayat_pend', TRUE),
            'id_pegawai'     => $this->input->post('id_pegawai', TRUE),
            'no_telp'        => $this->input->post('no_telp', TRUE),
            'foto'           => $foto
        );
        $this->db->insert($this->table,$data);
    }
    
    function update($foto) {
        if (empty($foto)) {
        $data = array(
            'id_guru'        => $this->input->post('id_guru', TRUE),
            'nama_guru'      => $this->input->post('nama_guru', TRUE),
            'gender'         => $this->input->post('gender', TRUE),
            'alamat'         => $this->input->post('alamat', TRUE),
            'status'         => $this->input->post('status', TRUE),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'riwayat_karir'  => $this->input->post('riwayat_karir', TRUE),
            'riwayat_pend'   => $this->input->post('riwayat_pend', TRUE),
            'id_pegawai'   => $this->input->post('id_pegawai', TRUE),
            'no_telp'        => $this->input->post('no_telp', TRUE)
        );
        }else {
        $data = array(
            'id_guru'        => $this->input->post('id_guru', TRUE),
            'nama_guru'      => $this->input->post('nama_guru', TRUE),
            'gender'         => $this->input->post('gender', TRUE),
            'alamat'         => $this->input->post('alamat', TRUE),
            'status'         => $this->input->post('status', TRUE),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'riwayat_karir'  => $this->input->post('riwayat_karir', TRUE),
            'riwayat_pend'   => $this->input->post('riwayat_pend', TRUE),
            'id_pegawai'   => $this->input->post('id_pegawai', TRUE),
            'no_telp'        => $this->input->post('no_telp', TRUE),
            'foto'           => $foto
        );
        }
        $id_guru   = $this->input->post('id_guru');
        $this->db->where('id_guru',$id_guru);
        $this->db->update($this->table,$data);
    }

}