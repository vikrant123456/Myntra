<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configure Gender Select
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Gender Selection </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					<?php if (isset($error)) : ?>
					  <div class="alert alert-danger"><?php echo $this->lang->line($error) ; ?></div>
					<?php endif ; ?>
					<?php echo validation_errors(); ?>
					<?php echo form_open('', 'class="form-user-edit" role="form" autocomplete="off" enctype="multipart/form-data"') ; ?>
						<div class="form-group">
							<label for="image1">Men Active:</label>
							<input type="file" class="form-control" id="image1" name="image1" value="" 	/>
							<span><?php echo substr($genderSelectList['image1'],10);?></span>
						</div>
						<div class="form-group">
							<label for="image1Disabled">Men Inactive:</label>
							<input type="file" class="form-control" id="image1Disabled" name="image1Disabled" value=""/>
							<span><?php echo substr($genderSelectList['image1Disabled'],10);?></span>
						</div>
						<div class="form-group">
							<label for="image2">Women Active:</label>
							<input type="file" class="form-control" id="image2" name="image2" value="" 	/>
							<span><?php echo substr($genderSelectList['image2'],10);?></span>
						</div>
						<div class="form-group">
							<label for="image2Disabled">Women Inactive:</label>
							<input type="file" class="form-control" id="image2Disabled" name="image2Disabled" value=""/>
							<span><?php echo substr($genderSelectList['image2Disabled'],10);?></span>
						</div>
						<div class="form-group">
							<label for="thunderImage">Thunder Image:</label>
							<input type="file" class="form-control" id="thunderImage" name="thunderImage" value="" 	/>
							<span><?php echo substr($genderSelectList['thunderImage'],10);?></span>
						</div>
						<div class="row">
							<!-- /.col -->
							<div class="col-xs-3">
						  		<button type="submit" class="btn btn-primary" type="submit">Submit</button>
							</div>
							<!-- /.col -->
						</div>
					<?php echo form_close() ; ?> 
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

