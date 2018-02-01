<section class="content-header">
  <h1>
    Edit Rombel Kelas Sdit
    <small>Add &nbsp </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Rombel Kelas Sdit</li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Rombel Kelas Sdit</h3>&nbsp &nbsp 
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <?php
            echo form_open('rombel_sdit/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('id_rombel', $rombel['id_rombel']);
            ?>
          <div class="box-body">
        
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    NAMA ROMBEL
                </label>
                <div class="col-sm-9">
                    <input type="text" value="<?php echo $rombel['nama_rombel']?>" name="nama_rombel" placeholder="MASUKAN NAMA ROMBEL" id="form-field-1" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    KELAS
                </label>
                <div class="col-sm-9">
                    <select name="kelas" class="form-control">

                        <?php
                        for ($i = 1; $i <= $info['jumlah_kelas']; $i++) {
                            echo "<option value='$i' ";
                            echo $rombel['kelas']==$i?'selected':'';
                            echo ">Kelas $i</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">

                </label>
                <div class="col-sm-1">
                    <button type="submit" name="submit" class="btn btn-danger btn-sm">UPDATE</button>
                </div>
                <div class="col-sm-1">
                    <?php echo anchor('rombel_sdit', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                </div>
            </div>
          </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>