
<section class="content-header">
  <h1>
    Management Menu
    <small>Edit  &nbsp <?php echo anchor('menu', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
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
			      <h3 class="box-title">Edit Menu</h3>&nbsp &nbsp
			    </div>
			    <!-- /.box-header -->
			    <!-- form start -->
			    
				<?php 
					echo form_open('menu/edit', 'role="form" class="form-horizontal"');
					echo form_hidden('id', $menu['id']);
				?>
				    <div class="box-body">
			    
			        <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-field-1">
		                    NAMA MENU
		                </label>
		                <div class="col-sm-7">
		                    <input type="text" value="<?= $menu['nama_menu'] ?>" name="nama_menu" placeholder="masukan nama menu" id="form-field-1" class="form-control">
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-field-1">
		                    LINK
		                </label>
		                <div class="col-sm-5">
		                    <input type="text" value="<?= $menu['link'] ?>" name="link" placeholder="Isi Link!" id="form-field-1" class="form-control">
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-field-1">
		                  	ICON
		                </label>
		                <div class="col-sm-5">
		                    <input type="text" value="<?= $menu['icon'] ?>" name="icon" placeholder="Masukkan nama icon!" id="form-field-1" class="form-control">
		                </div>
		            </div>
		            <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-field-1">
		                    IS MAIN MENU
		                </label>
		                <div class="col-sm-2">
		                    <select name="is_main_menu" class="form-control">
		                    	<option value="0">MAIN MENU</option>
		                    	<?php 
		                    		$table_menu = $this->db->get('table_menu');
		                    		foreach ($table_menu->result() as $row) {
		                    			echo "<option value='$row->id'";
		                    			echo $row->id==$menu['is_main_menu']?'selected':'';
		                    			echo ">$row->nama_menu</option>";
		                    		}
		                    	?>
		                    </select>
		                </div>
		            </div>
				      <!-- /.box-body -->  
		                <div class="col-sm-2 control-label" for="form-field-1">
		                    
		                </div>
				        <div class="col-sm-2">
		                    <button type="submit" name="submit" class="btn btn-primary btn-flat" title="Update">Update</button>
		                </div>
				    </div>
		      	</div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>