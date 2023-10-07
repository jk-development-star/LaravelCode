<?php
include "includes/header.php";
if(empty($user_id)){
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
}

$user_id=$db->escapstr($user_id);

include "includes/innersearch.php";

if(isset($profilesubmit)) {
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$firstname=$db->escapstr($fname);
	$lastname=$db->escapstr($lname);
	$phone=$db->escapstr($phone);
	$building=$db->escapstr($building);
	$street=$db->escapstr($street);
	$landmark=$db->escapstr($landmark);
	$area=$db->escapstr($area);
	$country=$db->escapstr($country);	
	$state=$db->escapstr($state);
	$city=$db->escapstr($city);
	$zipcode=$db->escapstr($zipcode);

	$set ="fname='$firstname'";
	$set .=",lname='$lastname'";
	$set .=",contact_no1='$phone'";
	$set .=",building='$building'";
	$set .=",street='$street'";
	$set .=",landmark='$landmark'";
	$set .=",area='$area'";
	$set .=",country='$country'";
	$set .=",state='$state'";
	$set .=",city='$city'";
	$set .=",zip_code='$zipcode'";
	$set .=",chngdt='$date'";
	$set .=",edit_ip='$ip'";

	$sql=$db->insertrec("update register set $set WHERE id='$user_id'");
	echo "<script>location.href='$siteurl/profile/?update'</script>";
	header("location:$siteurl/profile/?update");
}

?>

            <div  class="container margin_60">
               <div class="row">
			   
                  <?php include "includes/leftmenu.php"; ?>
                 
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-8 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form name="usrfrm" method="post" action="" onsubmit="return frm_valid()">
					    <div class="form-group mt15">
						    <label class="col-sm-4">First Name<span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="fname" class="form-control" value="<?php echo $userinfo['fname'];?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Last Name<span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="lname" class="form-control" value="<?php echo $userinfo['lname']; ?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Email ID <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="email" class="form-control" value="<?php echo $userinfo['email']?>" readonly />
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Country <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
									<option value=""> Select Country </option>
									<?php echo $drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$userinfo['country']);
									?> 
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">State</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="state" id="state1" onchange="return get_city(this.value);">
								     <?php
									  echo $drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$userinfo[country]' and state_status='1' order by state_name asc",$userinfo['state']);
									?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">City</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <select class="form-control" name="city" id="city1">
								     <?php
										  echo $drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$userinfo[state]' and city_status='1' and city_state_id!='0' order by city_name asc",$userinfo['city']);
										 ?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Phone No. <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="phone" class="form-control" value="<?php echo $userinfo['contact_no1']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Building </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="building" class="form-control" value="<?php echo $userinfo['building']; ?>"/>
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Street <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="street" class="form-control" value="<?php echo $userinfo['street']; ?>"/>
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Landmark </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="landmark" class="form-control" value="<?php echo $userinfo['landmark']; ?>"/>
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Area <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							    <input type="text" name="area" class="form-control" value="<?php echo $userinfo['area']; ?>"/>
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-4">Zip Code <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="text" name="zipcode" class="form-control" value="<?php echo $userinfo['zip_code']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15 text-center">
						   <input type="submit" name="profilesubmit"   class="btn btn-success" value="Save Profile" />
						</div>
						
					</form>
                </div>
            </div>
            
            
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <img src="<? echo $siteurl; ?>/uploads/profile/<?=$userinfo['img'];?>" class="img-circle mb20" width="150" height="150">
                    <a href="<? echo $siteurl; ?>/profile-pic-chng" class="btn_1 outline">Change Picture</a>
                </div>
				<?
						$ad=$db->singlerec("select * from banner where banner_size='100X500' and ban_location='profile-edit' and ban_status='0' order by RAND()");
				        $ad1=$db->numrows("select * from banner where banner_size='100X500' and ban_location='profile-edit' and ban_status='0'");
				        if($ad1 > 0)
						{
						$size=$ad['banner_size'];
						$image=$ad['ban_image'];
						$link=$ad['ban_link'];
						$ban_id=$ad['ban_id'];
					 ?>
					 <div class="col-sm-12">
		                <a href="<?=$link;?>" target="_blank" class="ad_click" data-id="<?=$ban_id?>"><img src="<? echo $siteurl; ?>/admin/uploads/banner/original/<?=$image;?>" width="120" height="500" class="advert_image"></a>
		             </div>
						<? } ?>
            </div>
			
        </div>
		
		
					 </div>
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
			
<script>
$(document).ready(function () {  
   $('.ad_click').click(function(){
		var ban_id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<? echo $siteurl; ?>/checkpass.php",
			data:{bId:ban_id},
			success: function(result) {
				/* if(result!="0") {
					display.innerHTML = result;			
				} */
			}
		});
	});
});

function frm_valid() {
	var fname = document.usrfrm.fname.value;
	var lname = document.usrfrm.lname.value;
	var phone = document.usrfrm.phone.value;
	var country = document.usrfrm.country.value;
	var street = document.usrfrm.street.value;
	var area = document.usrfrm.area.value;
	var zipcode = document.usrfrm.zipcode.value;
	
	if(fname=="" || lname=="" || phone=="" || country=="" || zipcode=="") {
		swal('Oops!', 'Red marked fields are mandatory!', 'error'); 
		return false;
	}
	if(street==""|| area=="") {
		swal('Oops!', 'Street and Located Area must be filled out!', 'error'); 
		return false;
	}
	if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		swal('Oops!', 'Phone Number is not valid!', 'error'); 
		return false;
	}
	if(zipcode!="" && ((zipcode.length < 5) || (zipcode.length > 6))) {
		swal('Oops!', 'Zipcode is not valid!', 'error'); 
		return false;
	}
}
</script>

<script>
function get_state(val){
		 $.ajax({
			 url: "<? echo $siteurl; ?>/state_ajax.php?val="+val, 
			success: function(result){
			$("#state1").html(result);
		}
		});
	}
function get_city(val){
	 $.ajax({url: "<? echo $siteurl; ?>/city_ajax.php?val="+val, success: function(result){
        $("#city1").html(result);
    }});
}
</script>
<?php include "includes/footer.php"; ?>