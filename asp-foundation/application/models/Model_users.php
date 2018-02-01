<?php

class Model_users extends CI_Model {

    public $table   = "v_tbl_user";
    public $id_user = "id_user";
    // public $order   = "DESC";
    
    function get_by_id($id_user) {
        $this->db->where($this->id_user, $id_user);
        return $this->db->get($this->table)->row();
    }

    function save($foto) {
        $data = array(
            'nama_lengkap'      => $this->input->post('nama_lengkap', TRUE),
            'username'          => $this->input->post('username', TRUE),
            'password'          => md5($this->input->post('password', TRUE)),
            'email'             => $this->input->post('email', TRUE),
            'gender'            => $this->input->post('gender', TRUE),
            'id_level_user'     => $this->input->post('id_level_user', TRUE),
            'foto'              => $foto
        );
        $this->db->insert($this->table,$data);
    }
    
    function update($foto) {
        if (empty($foto)) {
        $data = array(
            'id_user'           => $this->input->post('id_user', TRUE),
            'nama_lengkap'      => $this->input->post('nama_lengkap', TRUE),
            'username'          => $this->input->post('username', TRUE),
            'password'          => md5($this->input->post('password', TRUE)),
            'email'             => $this->input->post('email', TRUE),
            'gender'            => $this->input->post('gender', TRUE),
            'id_level_user'     => $this->input->post('id_level_user', TRUE)
        );
        }else{
        $data = array(
            'id_user'           => $this->input->post('id_user', TRUE),
            'nama_lengkap'      => $this->input->post('nama_lengkap', TRUE),
            'username'          => $this->input->post('username', TRUE),
            'password'          => md5($this->input->post('password', TRUE)),
            'email'             => $this->input->post('email', TRUE),
            'gender'            => $this->input->post('gender', TRUE),
            'id_level_user'     => $this->input->post('id_level_user', TRUE),
            'foto'              => $foto
        );
        }
        $id_user   = $this->input->post('id_user');
        $this->db->where('id_user',$id_user);
        $this->db->update($this->table,$data);
    }

}