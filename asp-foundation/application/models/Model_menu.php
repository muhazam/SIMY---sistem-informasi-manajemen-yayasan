<?php

class Model_menu extends CI_Model {

    public $table   = "table_menu";
    public $id = "id";
    // public $order   = "DESC";
    

    function save() {
        $data = array(
            'nama_menu'         => $this->input->post('nama_menu', TRUE),
            'link'              => $this->input->post('link', TRUE),
            'icon'              => $this->input->post('icon', TRUE),
            'is_main_menu'      => $this->input->post('is_main_menu', TRUE),
        );
        $this->db->insert($this->table,$data);
    }
    
    function update() {
        $data = array(
            'nama_menu'         => $this->input->post('nama_menu', TRUE),
            'link'              => $this->input->post('link', TRUE),
            'icon'              => $this->input->post('icon', TRUE),
            'is_main_menu'      => $this->input->post('is_main_menu', TRUE),
        );
        
        $id   = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }

}