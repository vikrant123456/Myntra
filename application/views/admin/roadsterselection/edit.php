<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         License
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Screensaver</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Change Send SMS </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
					<?php if (isset($error)) : ?>
					  <div class="alert alert-danger"><?php echo $this->lang->line($error) ; ?></div>
					<?php endif ; ?>
					<?php echo validation_errors(); ?>
					<?php echo form_open('', 'class="form-user-edit" role="form" autocomplete="off" enctype="multipart/form-data"') ; ?>
						<div class="form-group">
							<label for="topBarImage">Top Bar Image:</label>
							<input type="file" class="form-control" id="topBarImage" name="topBarImage" value="" />
							<span><?php echo substr($roadsterSelectionList['topBarImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="BackbuttonImage">Back Button Image:</label>
							<input type="file" class="form-control" id="BackbuttonImage" name="BackbuttonImage" value="" />
							<span><?php echo substr($roadsterSelectionList['BackbuttonImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="collectionMenImage">Collection Men Image:</label>
							<input type="file" class="form-control" id="collectionMenImage" name="collectionMenImage" value="" />
							<span><?php echo substr($roadsterSelectionList['collectionMenImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="catalogueMenImage">Catalogue Men Image:</label>
							<input type="file" class="form-control" id="catalogueMenImage" name="catalogueMenImage" value="" />
							<span><?php echo substr($roadsterSelectionList['catalogueMenImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="collectionWomenImage">Collection Women Image:</label>
							<input type="file" class="form-control" id="collectionWomenImage" name="collectionWomenImage" value="" />
							<span><?php echo substr($roadsterSelectionList['collectionWomenImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="catalogueWomenImage">Catalogue Women Image:</label>
							<input type="file" class="form-control" id="catalogueWomenImage" name="catalogueWomenImage" value="" />
							<span><?php echo substr($roadsterSelectionList['catalogueWomenImage'],10);?></span>
						</div>
						<div class="form-group">
							<label for="collectionHeadingTxt">Collection Heading Text:</label>
							<input type="text" class="form-control" id="collectionHeadingTxt" name="collectionHeadingTxt" value="<?php echo $roadsterSelectionList['collectionHeadingTxt'];?>" required/>
						</div>
						<div class="form-group">
							<label for="collectionTxt">Collection Text:</label>
							<textarea class="form-control" id="collectionTxt" name="collectionTxt" value="" required/><?php echo $roadsterSelectionList['collectionTxt'];?></textarea>
						</div>
						<div class="form-group">
							<label for="collectionBtnImage">Collection Button Image:</label>
							<input type="file" class="form-control" id="collectionBtnImage" name="collectionBtnImage" value="" />
							<span><?php echo substr($roadsterSelectionList['collectionBtnImage'],10);?></span>
						</div>
						
						<div class="form-group">
							<label for="catalogueHeadingTxt">Catalogue Heading Text:</label>
							<input type="text" class="form-control" id="catalogueHeadingTxt" name="catalogueHeadingTxt" value="<?php echo $roadsterSelectionList['catalogueHeadingTxt'];?>" required/>
						</div>
						<div class="form-group">
							<label for="catalogueTxt">Catalogue Text:</label>
							<textarea class="form-control" id="catalogueTxt" name="catalogueTxt" value="" required/><?php echo $roadsterSelectionList['catalogueTxt'];?></textarea>
						</div>
						<div class="form-group">
							<label for="catalogueBtnImage">Catalogue Button Image:</label>
							<input type="file" class="form-control" id="catalogueBtnImage" name="catalogueBtnImage" value="" />
							<span><?php echo substr($roadsterSelectionList['catalogueBtnImage'],10);?></span>
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

