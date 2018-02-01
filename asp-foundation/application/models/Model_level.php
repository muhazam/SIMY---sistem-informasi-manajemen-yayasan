<?php

class Model_level extends CI_Model {

    public $table   = "tbl_level_user";
    public $id      = "id_level_user";
    // public $order   = "DESC";
    

    function save() {
        $data = array(
            'nama_level'         => $this->input->post('nama_level', TRUE)
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nama_level'         => $this->input->post('nama_level', TRUE)
        );
        
        $id_level_user   = $this->input->post('id_level_user');
        $this->db->where('id_level_user',$id_level_user);
        $this->db->update($this->table,$data);
    }

}