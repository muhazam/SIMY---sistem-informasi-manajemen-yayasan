<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Rule extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('ssp');
        $this->load->model('Model_users');
        cek_akses_module();
    }

    function index() {
        $this->template->load('template', 'users/rule');
    }

    function data() {
        $level_user = $_GET['level_user'];
        echo "<table id='mytable' class='table table-bordered table-hover table-striped table-responsive dataTable'>
                  <thead>
                    <tr>
                      <th class='text-center' width='1'>NO</th>
                      <th class='text-center'>NAMA MODULE / MENU</th>
                      <th class='text-center'>LINK</th>
                      <th class='text-center' width='17%'>HAK AKSES</th>
                    </tr>";
               
        $menu = $this->db->get('table_menu');
        $no = 1;
        foreach ($menu->result() as $row) {
            echo "<tr>
                    <td align='center'>$no</td>
                    <td align='center'>".strtoupper($row->nama_menu)."</td>
                    <td align='center'>$row->link</td>
                    <td align='center'><input type='checkbox'";
            $this->chek_akses($level_user, $row->id);
            echo " onclick='addRule($row->id)'></td>
                </tr> ";
            $no++;  
        }

        echo "</thead>
            </table>";
    }    

    function chek_akses($level_user, $id_menu){
        $data = array('id_level_user' => $level_user, 'id_menu' => $id_menu );
        $chek = $this->db->get_where('tbl_user_rule', $data);
        if ($chek->num_rows() > 0) {
            echo "checked";
        }
    }

    function add() {
        $level_user = $_GET['level_user'];
        $id_menu    = $_GET['id_menu'];
        $data       = array('id_level_user' => $level_user, 'id_menu' => $id_menu );
        $chek       = $this->db->get_where('tbl_user_rule',$data);
        if ($chek->num_rows() < 1) {
            $this->db->insert('tbl_user_rule',$data);
            echo "sukses memberi akses module";
        }else {
            $this->db->where('id_menu', $id_menu);
            $this->db->where('id_level_user', $level_user);
            $this->db->delete('tbl_user_rule');
            echo "berhasil delete akses module";
        }

    }

}