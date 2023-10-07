<? include 'header.php';
include 'leftmenu.php'; 
$msg="";

$id = isSet($id) ? $db->escapstr($id):'';

$GetRecord=$db->get_all("select * from register where id='$id'");
                     
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";

    for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$fname = $GetRecord[$i]['fname'];	
	$lname = $GetRecord[$i]['lname'];
	$email=$GetRecord[$i]['email'];
	$password=$GetRecord[$i]['password'];	
	$contact_no1=$GetRecord[$i]['contact_no1'];	
	$country=$GetRecord[$i]['country'];
	$state=$GetRecord[$i]['state'];
	$city=$GetRecord[$i]['city'];
	$building=$GetRecord[$i]['building'];
	$street=$GetRecord[$i]['street'];
	$landmark=$GetRecord[$i]['landmark'];
	$area=$GetRecord[$i]['area'];
	$zip_code=$GetRecord[$i]['zip_code'];
	$img=$GetRecord[$i]['img'];
	
	$address = $building.','.$street.','.$landmark.','.$area;
	$address = trim($address,',');
	
	if($state=='') {
		$state = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$state = getState($state);
	}
	if($city=='') {
		$city = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$city = getCity($city);
	}
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">User Details</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">User Profile Details</h4>
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
								<label class="col-sm-4 control-label" ><b>Name</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo ucwords($fname.' '.$lname);?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Email</b></label>
							    <div class="col-sm-8">
									<label><?php echo $email;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Password</b></label>
							    <div class="col-sm-8">
									<label><?php echo $password;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Contact Number</b></label>
							    <div class="col-sm-8">
									<label><?php echo $contact_no1; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Country</b></label>
							    <div class="col-sm-8">
									<label> <?php echo getCountry($country);?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>State</b></label>
							    <div class="col-sm-8">
									<label><?php echo $state;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>City</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $city; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Address</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $com_obj->getReptrim($address); ?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Zipcode</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $zip_code; ?></label>
								</div>
							</div>
							
						</div>
						<div class="col-sm-6">
							<h4>Profile Picture</h4>
							<div class="col-sm-12 ">
								<img src="../uploads/profile/<? echo $img; ?>" class="img-responsive" style="max-width: 250px;">
							</div>
						</div>
						
						<div class="col-sm-12">
						<h4 class="card-title" style="padding-left:20px;"> My Enquires</h4>
							<div class="card-body collapse in col-sm-12">
								<div class="card-block card-dashboard table-responsive">
								<table class="table table-striped table-bordered sourced-data">
										<thead>
											<tr>
												<th>S.No</th>			     
												<th>Company Name</th>
												<th>Prefered Location</th>
												<th>Available Cash (In <?=$site_currency;?>)</th>
												<th>Comments</th>
												<th>Date</th>
											</tr>
										</thead>		
					<?
						$GetRecords=$db->get_all("select * from enquiry where user_id='$id' order by id desc");
						$GetRecords1=$db->numrows("select * from enquiry where user_id='$id'");
						$sno = 1;
						if(($GetRecords1) > 0)
						{ 
							foreach($GetRecords as $i=>$GetRecord) {
								$idvalue = $GetRecord['id'];
								$cmpy_id = $GetRecord['cmpy_id'];
								$prefered_loc = $GetRecord['prefered_loc'];
								$avail_cash = $GetRecord['avail_cash'];
								$comment = $GetRecord['comment'];
								$send_dt = $GetRecord['send_dt'];
								$title_name = ucwords(userInfo($cmpy_id,'title'));
								$send_dt = date('d-M-Y',strtotime($send_dt));
								$title_name = "<a target='_blank' href='company-view.php?id=$cmpy_id'> $title_name </a>";
							?>
									   <tr>
									        <td align='left'><? echo $sno; ?></td>
											<td  align='left'><?=$title_name; ?></td>
					                        <td align='left'><?=ucfirst($prefered_loc); ?></td>
											<td align='left'><?=$avail_cash; ?></td>
											<td align='left'><?=stripslashes($comment); ?></td>
											<td align='left' width='12%'><?=$send_dt; ?></td>
									   </tr>
					<? $sno++; }  } ?>
									</tbody>
                                </table>
								</div>
							</div>
						</div>
							
						<div class="form-actions col-sm-12" style="text-align:center;    padding-bottom: 20px;">
							<a  href="user-profile.php" class="btn btn-warning mr-1"> <i class="ft-x"></i> Back </a>
							
							<a href="user-profileupd.php?upd=2&id=<? echo $id; ?>" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> Edit </a>
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
<style>
.table th, .table td {
    padding: 10px;
}
</style>
<? include 'footer.php'; ?>