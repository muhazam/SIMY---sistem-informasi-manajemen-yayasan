<?php

class Model_mapel extends CI_Model {

    public $table ="tbl_mapel";
    public $id    ="id";
    
    function save() {
        $data = array(
            'id'            => $this->input->post('id', TRUE),
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'judul_kitab'   => $this->input->post('judul_kitab', TRUE),
            'target'        => $this->input->post('target', TRUE),
            'id_pengajar'   => $this->input->post('id_pengajar', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'id'            => $this->input->post('id', TRUE),
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'judul_kitab'   => $this->input->post('judul_kitab', TRUE),
            'id_pengajar'   => $this->input->post('id_pengajar', TRUE),
            'target'        => $this->input->post('target', TRUE)

        );
        $id   = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }

}