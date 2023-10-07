<?
	include "includes/header.php";
	
if(empty($user_id)){
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
}

$user_id=$db->escapstr($user_id);

include "includes/innersearch.php";

$act=isSet($act)?$act:'';

if($userinfo['contact_no1']!="") {
	$contact_no1 = $userinfo['contact_no1'];
} else {
	$contact_no1 = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['country']!="") {
	$country = getCountry($userinfo['country']);
} else {
	$country = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['state']!="") {
	$state = getState($userinfo['state']);
} else {
	$state = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['city']!="") {
	$city = getCity($userinfo['city']);
} else {
	$city = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['street']!="") {
	$address = $userinfo['building'].','.$userinfo['street'].','.$userinfo['landmark'].','.$userinfo['area'];
	$address = $com_obj->getReptrim($address);
} else {
	$address = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['zip_code']!="") {
	$zip_code = $userinfo['zip_code'];
} else {
	$zip_code = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['website']!="") {
	$website = $userinfo['website'];
} else {
	$website = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['expan_location']!="") {
	$expan_location = $userinfo['expan_location'];
} else {
	$expan_location = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['training_loc']!="") {
	$training_loc = $userinfo['training_loc'];
} else {
	$training_loc = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['floor_area']!="") {
	$floor_area = $userinfo['floor_area'];
} else {
	$floor_area = "<span style='color:#EEEAE9;'>Data Not Available</span>";
}
if($userinfo['field_assit']==1)
	$fld_assit = "Avilable";
else if($userinfo['field_assit']==2)
	$fld_assit = "Not Avilable";
else if($userinfo['field_assit']==0)
	$fld_assit = "<span style='color:#EEEAE9;'>Data Not Available</span>";

if($act=="req")
	echo "<script>swal('Success','After Admin approved Your Company profile on Live. Check your Email to know Company Request Status','success');</script>";
?>
            <div  class="container margin_60">
               <div class="row">
			<?php if(isset($update)){
					echo"<div class='alert alert-success'> Profile Updated Successfully</div>";
				} else if(isset($updimg)){
					echo"<div class='alert alert-success'> Profile Image Updated Successfully</div>";
				} else if(isset($upd)){
					echo"<div class='alert alert-success'> Profile Updated Successfully</div>";
				} else if(isset($delimg)){
					echo"<div class='alert alert-success'> Profile Picture Deleted Successfully</div>";
				}
			?>
                   <?php include "includes/leftmenu.php"; ?>
				   
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-8 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form class="">
					    <div class="form-group">
						    <label class="col-sm-5">First Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucwords($userinfo['fname']);?></p>
							</div>
						</div>
						<? if($userinfo['lname']!="") { ?>
						<div class="form-group">
						    <label class="col-sm-5">Last Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucwords($userinfo['lname']);?></p>
							</div>
						</div>
						<? } ?>
						<div class="form-group">
						    <label class="col-sm-5">Email ID</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$userinfo['email'];?></p>
							</div>
						</div>
						<? if($userinfo['user_role']==1) { ?>
						<div class="form-group">
						    <label class="col-sm-5">Company Name</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucwords($userinfo['title']);?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Category</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=getCategory($userinfo['category']);?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Establishment Year</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$userinfo['establishment_yr'];?></p>
							</div>
						</div>
					
						<div class="form-group">
						    <label class="col-sm-5">Launched Date</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$userinfo['launched_yr'];?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Required Area</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$userinfo['area_req'];?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Investment Range </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$site_currency.' '.$userinfo['investment'].' Lacs';?></p>
							</div>
						</div>
					
						<div class="form-group">
						    <label class="col-sm-5">Franchise/Brand Fee</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$site_currency.' '.$userinfo['brand_fee'];?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Royalty/Commission</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$site_currency.' '.$userinfo['commission'];?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Expansion Location</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucfirst($expan_location);?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Training Location</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucfirst($training_loc);?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Field Assistance </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$fld_assit;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Property Type</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucfirst($userinfo['property_type']);?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Floor Area Req.</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$floor_area;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Preferred Location</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=ucfirst($userinfo['preferred_loc']);?></p>
							</div>
						</div>
						
						<? } ?>
						<div class="form-group">
						    <label class="col-sm-5">Country</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$country;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">State</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$state;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">City</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$city;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Phone Number</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$contact_no1;?></p>
							</div>
						</div>
					
						<div class="form-group">
						    <label class="col-sm-5">Address</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$address;?> </p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Zip Code</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$zip_code;?> </p>
							</div>
						</div>
						<? if($userinfo['user_role']==1) { ?>
						<div class="form-group">
						    <label class="col-sm-5">Headquater</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$userinfo['headquater'];?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Website</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-6">
							    <p class="dtl"><?=$website;?></p>
							</div>
						</div>
						
						<div class="form-group">
						    <label class="col-sm-5">Business Details</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-12">
							    <p class="dtl"><?=$userinfo['detail'];?> </p>
							</div>
						</div>
						<? } ?>
					</form>
                </div>
            </div>
            
            
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <img src="<? echo $siteurl; ?>/uploads/profile/<?=$userinfo['img'];?>" class="img-circle mb20" width="150" height="150">
                    <a href="<? echo $siteurl; ?>/profile-pic-chng" class="btn_1 outline">Change Picture</a>
                </div>
            </div>
        </div>
		
					 </div>
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
<?php include "includes/footer.php"; ?>