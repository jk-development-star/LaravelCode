<? include 'header.php';
include 'leftmenu.php'; 
$Message=isSet($Message)?$Message:'';
if(isset($inact)) {
	$id = $inact;
	$db->insertrec("update banner set ban_status='0' where ban_id='$id'");
	
	header("location:banner.php?inactsucc");
	echo "<script>window.location='banner.php?inactsucc';</script>";	
}

if(isset($act)) {
	$id = $act;
	$db->insertrec("update banner set ban_status='1' where ban_id='$id'");
	
	header("location:banner.php?actsucc");
	echo "<script>window.location='banner.php?actsucc';</script>";	
}

if(isset($delete)) {
	$did = $delete;
	$db->insertrec("delete from banner where ban_id='$did'");
	
	header("location:banner.php?delt");
	echo "<script>window.location='banner.php?delt';</script>";
	
}

if(isset($delt))
    $Message = "Deleted Successfully";
if(isset($inactsucc))
    $Message = "Ad banner Inactivated Successfully";
if(isset($actsucc))
    $Message = "Ad banner Activated Successfully";
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
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Banners</h4>
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
				    <div class="col-sm-12" style="text-align: right;">
				        <a href="bannerupd.php?update=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Banner</th>
									<th width="250">Location</th>
									<th>Pixel</th>
									<th width="300">Link</th>
									<th>View Count</th>				
					                 <th style="min-width: 200px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
							<tbody>
							      <? $ban=$db->get_all("select * from banner order by ban_id desc");
									$i=1;
									$num=$db->numrows("select * from banner");
									
									foreach($ban as $row_ban) 
									{ ?>
								<tr>
									        <td>
												<?php echo $i; ?>
											</td>
											<td><img src="uploads/banner/mid/<?php echo $row_ban['ban_image']; ?>" width="50" height="50" style="vertical-align:middle;"/></td>
											
											<td>
											<?php echo $row_ban['ban_location']; ?>
											
											</td>
											<td><?php echo $row_ban['banner_size']; ?></td>
											<td>
											<?php echo $row_ban['ban_link']; ?>
											
											</td>
											<td>
											<?php echo $row_ban['click_count']; ?>
											
											</td>
											<td >
												<div class='btn-group btn-group-xs'>
													<?php if($row_ban['ban_status']=='1') { ?>
													<a  href="banner.php?inact=<?php echo $row_ban['ban_id'];?>" title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>
													<?php } if($row_ban['ban_status']=='0') { ?>
												    <a  href="banner.php?act=<?php echo $row_ban['ban_id']; ?>"  title='Deactivate'class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>
														
													 
												  <?php } ?>
												  <a  href='bannerupd.php?update=<?php echo $row_ban['ban_id']; ?>' title='Edit'class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>
												  <a href="banner.php?delete=<?php echo $row_ban['ban_id'];?>" title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>
												   <a href="bannerview.php?view=<?php echo $row_ban['ban_id'];?>" class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
												</div>
												</td>
										</tr>

									<?php $i++; }?>
                                    </tbody>
					    </table>
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