<?php

class Model_pengajar extends CI_Model {

    public $table   = "tbl_pengajar_mahad";
    public $id_pengajar = "id_pengajar";
    // public $order   = "DESC";
    
    function get_by_id($id_pengajar) {
        $this->db->where($this->id_pengajar, $id_pengajar);
        return $this->db->get($this->table)->row();
    }

    function save() {
        $data = array(
            'id_pengajar'    => $this->input->post('id_pengajar', TRUE),
            'nama'           => $this->input->post('nama', TRUE),
            'alamat'         => $this->input->post('alamat', TRUE),
            'status'         => $this->input->post('status', TRUE),
            'no_telp'        => $this->input->post('no_telp', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'id_pengajar'    => $this->input->post('id_pengajar', TRUE),
            'nama'           => $this->input->post('nama', TRUE),
            'alamat'         => $this->input->post('alamat', TRUE),
            'status'         => $this->input->post('status', TRUE),
            'no_telp'        => $this->input->post('no_telp', TRUE) 
            );

        $id_pengajar   = $this->input->post('id_pengajar');
        $this->db->where('id_pengajar',$id_pengajar);
        $this->db->update($this->table,$data);
    }

}