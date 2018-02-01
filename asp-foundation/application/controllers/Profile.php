<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    //set password
    public function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('M_admin');

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

    }

    public function index() {
        $this->template->load('template', 'profile' );
    }

    function edit(){

        if(isset($_POST['submit'])) {
            $uploadFoto     = $this->upload_foto_user();
            $this->M_admin->update($uploadFoto);
            redirect('profile');
        }else{
            $id_user      = $this->uri->segment(3);
            // $id_user = $this->session->id_user;
            // $data        = $this->input->post();
            $data['user'] = $this->db->get_where('tbl_user',array('id_user'=>$id_user))->row_array();
            $this->template->load('template', 'profile',$data);
        }
    }

    function upload_foto_user(){

        $config['upload_path']          = './uploads/foto_user/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 3096;
        $this->load->library('upload', $config);
            // proses upload
        $this->upload->do_upload('userfile');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    public function save_password() { 
        $this->form_validation->set_rules('new','New','required|alpha_numeric');
        $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'profile');
        }else {
            $cek_old = $this->M_admin->cek_old();
            if ($cek_old == False) {
                $this->session->set_flashdata('error','Old password not match!' );
                $this->template->load('template', 'profile' );
                
            }else {
                $this->M_admin->save();
                unset($_SESSION);
                $this->session->sess_destroy();
                $this->session->set_flashdata('error','Your password success to change, please relogin !' );
                $this->template->load('template', 'auth/login');
            }//end if valid_user
        }
    }


    // set profile
    public function update_profile() {
        if ($this->input->post('submit')) {
            if (!empty($_FILES['foto'][''])) {
                $config['upload_path'] = './uploads/foto_user/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['file_name'] = $this->session->userdata('username').'_'.date('YmdHis');
         
                // Load library upload
                $this->load->library('upload', $config);
                
                // Jika terdapat error pada proses upload maka exit
                if (!$this->upload->do_upload('foto')) {
                    exit($this->upload->display_errors());
                }
         
                $data['foto'] = $this->upload->data()['file_name'];
            }

            $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');

            $this->form_validation->set_message('required', '%s tidak boleh kosong');

            if ($this->form_validation->run() === TRUE) {
         
                $data['nama_lengkap'] = $this->input->post('nama_lengkap');
                $data['username'] = $this->input->post('username');
                $data['email'] = $this->input->post('email');
                $data['gender'] = $this->input->post('gender');
         
                // Ambil user ID dari session
                $userId = $this->session->userdata('id_user');
         
                // Jalankan function update pada model_users
                $query = $this->model_users->update($userId, $data);
         
                // cek jika query berhasil
                if ($query) {
         
                  // Set success message
                  $message = array('status' => true, 'message' => 'Berhasil memperbarui profile');
                  
                  // Update session baru
                  $this->session->set_userdata($data);
         
                } else {
         
                  // Set error message
                  $message = array('status' => false, 'message' => 'Gagal memperbarui profile');
                }
                $this->session->set_flashdata('message_profile', $message);
                redirect('profile','refresh');
            }
        }
    }

}