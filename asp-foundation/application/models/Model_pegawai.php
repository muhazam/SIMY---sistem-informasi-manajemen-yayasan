<?php

class Model_pegawai extends CI_Model {

    public $table   = "tbl_pegawai";
    public $id      = "id_pegawai";
    // public $order   = "DESC";
    

    function save() {
        $data = array(
            'nama_jabatan'         => $this->input->post('nama_jabatan', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nama_jabatan'         => $this->input->post('nama_jabatan', TRUE)
        );
        
        $id_pegawai   = $this->input->post('id_pegawai');
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->update($this->table,$data);
    }

}