<section class="content-header">
  <h1>
    Management Modul Menu
    <small>Add &nbsp <?php echo anchor('menu', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Menu</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add Menu</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php echo form_open('menu/add', 'role="form" class="form-horizontal"');  ?>
		      <div class="box-body">

		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA MENU
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="nama_menu" placeholder="Masukan nama menu!" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    LINK
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="link" placeholder="Masukan Link!" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    ICON
	                </label>
	                <div class="col-sm-4">
	                    <input type="text" name="icon" placeholder="Masukan nama icon!" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    IS MAIN MENU
	                </label>
	                <div class="col-sm-4">
	                	<select name="is_main_menu" class="form-control">
	                		<option value="0">MAIN MENU</option>
	                		<?php 
	                			$menu = $this->db->get('table_menu');
	                			foreach ($menu->result() as $row) {
	                				echo "<option value='$row->id'>$row->nama_menu</option>";
	                			}
	                		?>
	                	</select>
	                    <?php //echo cmb_dinamis('is_main_menu', 'table_menu', 'nama_menu', 'id')?>
	                </div>
	            </div>
	            
		      </div>
		      <!-- /.box-body -->

		      <div class="box-footer">
		        <div class="col-xs-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat" title="submit">Simpan</button>
                </div>
                <div>

                </div>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>