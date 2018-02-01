<?php 
function cmb_dinamis($name, $table, $field, $pk, $selected=null, $extra=null) {
	$ci   = & get_instance(); 
	$cmb  = "<select name='$name' class='form-control' $extra> ";
	$data = $ci->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .="<option value='".$row->$pk."'";
		$cmb .= $selected==$row->$pk?'selected':'';
		$cmb .=">" .$row->$field . "</option>";
	}
	$cmb .= "</select>";
	return $cmb;
}


function cek_akses_module() {
	$ci = & get_instance();

	$controller = $ci->uri->segment(1);
	$method	= $ci->uri->segment(2);

	// cek url
	if (empty($method)) {
		$url = $controller;
	}else{
		$url = $controller . '/' . $method;
	}

	// cek id menu nya
    $menu = $ci->db->get_where('table_menu', array('link' => $url))->row_array();
    $level_user = $ci->session->userdata('id_level_user');

    if (!empty($level_user)) {

        // cek apakah level ini diberikan hak akses atau tidak
        $chek = $ci->db->get_where('tbl_user_rule', array('id_level_user' => $level_user, 'id_menu' => $menu['id']));
        if ($chek->num_rows() < 1 and $method != 'data' and $method != 'details' and $method != 'add' and $method != 'edit' and $method != 'delete' and $method != 'chek_akses' and $method != 'data_siswa_excel' and $method != 'data_mapel_excel' and $method != 'get_events' and $method != 'add_event' and $method != 'edit_event' and $method != 'siswa_aktif' and $method != 'load_data_siswa_by_rombel' and $method != 'data_by_rombel_excel') {

            echo "<script>alert('ANDA TIDAK BOLEH MENGAKSES MODUL INI')</script>";
			redirect('welcome','refresh');
			die;
        }
    } else {
        redirect('auth');
    }

    // MSG
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-success">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-error">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	// MODAL
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						      
						      <div class="col-md-6">
						        <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}

}