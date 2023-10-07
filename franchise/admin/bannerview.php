<? include 'header.php';
include 'leftmenu.php'; 
$msg="";

	$ban=$db->escapstr($view);
	$GetRecord=$db->singlerec("select * from banner where ban_id='$ban'");
    $location = $GetRecord['ban_location'];
	$banner_size = $GetRecord['banner_size'];
	$link = $GetRecord['ban_link'];
	$img=$GetRecord['ban_image'];
	$click_count=$GetRecord['click_count'];
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Ad Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">Ad details</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <!--<li><a data-action="close"><i class="ft-x"></i></a></li>-->
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				    <div class="row">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Banner Location</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $location;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Banner Link</b></label>
							    <div class="col-sm-8">
									<label><?php echo $link;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Banner size</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $banner_size;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Banner View Count</b></label>
							    <div class="col-sm-8">
									<label><?php echo $click_count;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Banner Image</b></label>
							    <div class="col-sm-8">
									<img src="uploads/banner/original/<?php echo $img; ?>"  height="70" style="vertical-align:middle;"/>
								</div>
							</div>
							<div class="form-actions col-sm-12" style="text-align: center;padding-bottom:20px;">
                                <a type="button" href="banner.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<a href="bannerupd.php?update=<? echo $ban; ?>" type="submit"  class="btn btn-primary" name="submit" onClick="return ban_validate()">
									<i class="fa fa-check-square-o"></i> Edit
								</a>
					    </div>
							 
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<? include 'footer.php'; ?>