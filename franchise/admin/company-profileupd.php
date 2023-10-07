<? include 'header.php';
include 'leftmenu.php';
$act = isset($act)?$act:'';
$upd = isset($upd)?$upd:'';
$msg = isset($msg)?$msg:'';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$fname = isset($fname)?$fname:'';
$lname = isset($lname)?$lname:'';
$email = isset($email)?$email:'';
$password = isset($password)?$password:'';
$contact_no1 = isset($contact_no1)?$contact_no1:'';
$building = isset($building)?$building:'';
$street = isset($street)?$street:'';
$landmark = isset($landmark)?$landmark:'';
$area = isset($area)?$area:'';
$country = isset($country)?$country:'';
$state = isset($state)?$state:'';
$city = isset($city)?$city:'';
$zip_code = isset($zip_code)?$zip_code:'';
$title = isset($title)?$title:'';
$category = isset($category)?$category:'';
$establishment_yr = isset($establishment_yr)?$establishment_yr:'';
$launched_yr = isset($launched_yr)?$launched_yr:'';
$headquater = isset($headquater)?$headquater:'';
$website = isset($website)?$website:'';
$area_req = isset($area_req)?$area_req:'';
$investment = isset($investment)?$investment:'';
$inves_from = isset($inves_from)?$inves_from:'';
$inves_to = isset($inves_to)?$inves_to:'';
$brand_fee = isset($brand_fee)?$brand_fee:'';
$commission = isset($commission)?$commission:'';
$expan_location = isset($expan_location)?$expan_location:'';
$training_loc = isset($training_loc)?$training_loc:'';
$field_assit = isset($field_assit)?$field_assit:'';
$property_type = isset($property_type)?$property_type:'';
$floor_area = isset($floor_area)?$floor_area:'';
$preferred_loc = isset($preferred_loc)?$preferred_loc:'';
$detail = isset($detail)?$detail:'';
$img = isset($img)?$img:'';

if(isset($_submit)) {
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$firstname=$db->escapstr($fname);
	$lastname=$db->escapstr($lname);
	$email=$db->escapstr($email);
	$password=$db->escapstr($password);
	$country=$db->escapstr($country);	
	$state=$db->escapstr($state);
	$city=$db->escapstr($city);
	$phone1=$db->escapstr($phone1);
	$building=$db->escapstr($building);
	$street=$db->escapstr($street);
	$landmark=$db->escapstr($landmark);
	$area=$db->escapstr($area);
	$zipcode=$db->escapstr($zipcode);
	$title=$db->escapstr($title);
	$category=$db->escapstr($frn_cat);
	$establishment_yr=$db->escapstr($establishment_yr);
	$launched_yr=$db->escapstr($launched_yr);
	$headquater=$db->escapstr($headquater);
	$website=$db->escapstr($website);
	$area_req=$db->escapstr($area_req);
	$inves_from = $db->escapstr($inves_from);
	$inves_to = $db->escapstr($inves_to);
	$brand_fee = $db->escapstr($brand_fee);
	$commission = $db->escapstr($commission);
	$expan_location = $db->escapstr($expan_location);
	$training_loc=$db->escapstr($training_loc);
	$field_assit=$db->escapstr($field_assit);
	$property_type=$db->escapstr($property_type);
	$floor_area=$db->escapstr($floor_area);
	$preferred_loc=$db->escapstr($preferred_loc);
	$detail = trim(addslashes($detail));

	$investment = $inves_from.'-'.$inves_to;
	
	$set ="fname='$firstname'";
	$set .=",lname='$lastname'";
	$set .= ",password='$password'";
	$set .=",country='$country'";
	$set .=",contact_no1='$phone1'";
	$set .=",building='$building'";
	$set .=",street='$street'";
	$set .=",landmark='$landmark'";
	$set .=",area='$area'";
	$set .=",zip_code='$zipcode'";
	$set .= ",title='$title'";
	$set .=",category='$category'";
	$set .=",establishment_yr='$establishment_yr'";
	$set .=",launched_yr='$launched_yr'";
	$set .=",headquater='$headquater'";
	$set .=",website='$website'";
	$set .=",area_req='$area_req'";
	$set .=",investment='$investment'";
	$set .=",brand_fee='$brand_fee'";
	$set .=",commission='$commission'";
	$set .=",expan_location='$expan_location'";
	$set .=",training_loc='$training_loc'";	
	$set .=",field_assit='$field_assit'";
	$set .=",property_type='$property_type'";
	$set .=",floor_area='$floor_area'";
	$set .=",preferred_loc='$preferred_loc'";
	$set .=",detail='$detail'";
	$set .= ",lawyer_status = '2'";
	
	$livepage = $_SERVER['REQUEST_URI'];
	$cur_url = basename($livepage);
	
	if(isset($_FILES["img"]["tmp_name"]) && !empty($_FILES["img"]["tmp_name"]))
	{
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='../uploads/profile';
			$img_upl=$com_obj->upload_image("img",$name2,"330","220","$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set .= ",img = '$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$cur_url&err=$err'</script>";
				header("location:$cur_url&err=$err");exit;
			}	
	}
	
	if($upd==1) {
		$set .=",email='$email'";
		$set .=",state='$state'";
		$set .=",city='$city'";
		$set .=",crcdt='$date'";
		$set .=",reg_ip='$ip'";
		$set .=",user_role='1'";
		$set .= ",active_status = '1'";
		$set .= ",email_active_status = '1'";		

		$id = $db->insertid("insert into register set $set");
		
		echo "<script>location.href='company-profile.php?act=add'</script>";
		header("location:company-profile.php?act=add");
	} 
	else if($upd==2) {
		if($state!='')
			$set .=",state='$state'";
		if($city!='')
			$set .=",city='$city'";
		
		$set .=",chngdt='$date'";
		$set .=",edit_ip='$ip'";
			
		$db->insertrec("update register set $set where id='$id'");
		
		echo "<script>location.href='company-profile.php?act=upd'</script>";
		header("location:company-profile.php?act=upd");
	}
	
}

if(isset($err)) {
	$msg = "<font color='red'><b>$err</b></font>" ;
}
$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);

if(!empty($investment)) {
	$inves = explode('-',$investment);
	$inves_from = $inves[0];
	$inves_to = $inves[1];
}
	
 ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><? if($upd==1) { echo "Add New"; } else { echo "Edit"; } ?>  <?=$keyword;?></h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">User Info</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form name="lyrfrm" id="User" class="form-horizontal" action="" method="post" onsubmit="return frm_valid()" enctype="multipart/form-data">
                         <input type="hidden" name="upd" value="<? echo $upd; ?>" />
						 <input type="hidden" name="service_ct" id="ser_count" />
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> User First Name <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="fname" class="form-control" value="<? echo $fname; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> User Last Name <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="lname" class="form-control" value="<? echo $lname; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Email ID <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="email" name="email" id="emailid" class="form-control" onChange="return checkmail()" value="<? echo $email; ?>" <? if($upd==2) echo "readonly"; ?> />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Password <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="password" name="password" id="password" class="form-control" value="<? echo $password; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Country <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select class="form-control" name="country" id="country" onchange="return get_state(this.value);">
										<option value=""> Select Country </option>
										<?=$drop->get_dropdown($db,"select country_id,country_name from country where country_status='1' order by country_name asc",$country);?> 
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> State </label>
									<div class="col-sm-9">
										<select class="form-control" name="state" id="state1" onchange="return get_city(this.value);">
											<?=$drop->get_dropdown($db,"SELECT state_id,state_name FROM state WHERE state_country_id='$country' and state_status='1' order by state_name asc",$state);?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> City </label>
									<div class="col-sm-9">
										<select class="form-control" name="city" id="city1">
											<?=$drop->get_dropdown($db,"SELECT city_id,city_name from city WHERE city_state_id='$state' and city_status='1' and city_state_id!='0' order by city_name asc",$city);?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Contact Number <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="phone1" class="form-control" value="<? echo $contact_no1; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Address <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="building" class="form-control" placeholder="Building" value="<? echo $building; ?>" /> <br />
										<input type="text" name="street" class="form-control" placeholder="Street" value="<? echo $street; ?>" /><br />
										<input type="text" name="landmark" class="form-control" placeholder="Landmark" value="<? echo $landmark; ?>" /><br />
										<input type="text" name="area" class="form-control" placeholder="Area" value="<? echo $area; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Zip Code <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="zipcode" class="form-control" value="<? echo $zip_code; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
								<hr />
								<h4 class="card-title"> Franchise Business Details</h4>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Title <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="title" class="form-control" value="<? echo $title; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Category <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select name="frn_cat" class="form-control">
										<option value=""> Select Category</option>
										<?=$drop->get_dropdown($db,"select id,category_name from category where active_status!='0' order by category_name asc",$category);?>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">  Establishment Year <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="establishment_yr" class="form-control" value="<? echo $establishment_yr; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">  Franchising Launch Date <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="launched_yr" class="form-control" value="<? echo $launched_yr; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Headquater <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="headquater" class="form-control" value="<? echo $headquater; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Website </label>
									<div class="col-sm-9">
										<input type="url" name="website" class="form-control" value="<? echo $website; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
								<hr />
								<h4 class="card-title"> Franchise Investment Details</h4>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Required Area <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="area_req" class="form-control" value="<? echo $area_req; ?>" />
									</div>
								</div>
							
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Investment Range (In Lacs) <span class="req">*</span> </label>
									<div class="col-sm-9">
									<div class="row">
										<div class="col-sm-6">
											<input type="text" name="inves_from" class="form-control" placeholder="Minimum Amount" value="<? echo $inves_from; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
										</div>
										<div class="col-sm-6">
											<input type="text" name="inves_to" class="form-control" placeholder="Maximum Amount" value="<? echo $inves_to; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" /> 
										</div>
									</div>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Franchise/Brand Fee <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="brand_fee" class="form-control" value="<? echo $brand_fee; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Royalty/Commission (In Amount)<span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="commission" class="form-control" value="<? echo $commission; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Expansion Location </label>
									<div class="col-sm-9">
										<input type="text" name="expan_location" class="form-control" value="<? echo $expan_location; ?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
								<hr />
								<h4 class="card-title"> Training Details</h4>
								</div>
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Training Location</label>
									<div class="col-sm-9">
										<input type="text" name="training_loc" class="form-control" value="<? echo $training_loc; ?>" />
									</div>
								</div>
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Is Field Assistance available for Franchisee?</label>
									<div class="col-sm-9">
										<div class="row">
										<div class="col-sm-3">
											Yes <input type="radio" name="field_assit" class="form-control" value="1" <?if($field_assit=="1") echo "checked"; ?> /> 
										</div>
										<div class="col-sm-3">
											No <input type="radio" name="field_assit" class="form-control" value="2"<?if($field_assit=="2") echo "checked"; ?> /> 
										</div>
										</div>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
								<hr />
								<h4 class="card-title"> Property Details</h4>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Property Type <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="property_type" class="form-control" value="<? echo $property_type; ?>" />
									</div>
								</div>
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Floor Area Requirement </label>
									<div class="col-sm-9">
										<input type="text" name="floor_area" class="form-control" value="<? echo $floor_area; ?>" />
									</div>
								</div>
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Preferred location of unit franchise outlet  <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="preferred_loc" class="form-control" value="<? echo $preferred_loc; ?>" />
									</div>
								</div>
								
								<div class="form-group  col-sm-12">
									<label class="col-sm-3 control-label"> Business Details <span class="req">*</span> </label>
									<div class="col-sm-9">
										<textarea rows="6" name="detail" id="detail" class="form-control tiny"> <? echo $detail; ?> 
										</textarea>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Property Image </label>
									<div class="col-sm-6">
										<input type="file" name="img" id="img_id" class="form-control" accept="image/*" onchange="img_validate('img_id',330,220)" />
										<br /><p style="font-size:14px;"> Only jpg, jpeg, png, gif file with dimension above 330X220 & maximum size of 1 MB is allowed. </p>
									</div>
								<? if($upd==2) { ?>
									<div class="col-sm-3">
									<img src="../uploads/profile/<? echo $img; ?>" width="50" height="50" />
									</div>
								<? } ?>
							<div class="form-actions center col-sm-12">
								<a href="company-profile.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="_submit" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Save 
								</button>
							</div>
							</div>
					  
					</form>
	               
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
input[type="radio"] {
	margin-top : -22px;
	height : 1.2em;
}
</style>
	
<script>
function frm_valid() {
	var fname = document.lyrfrm.fname.value;
	var lname = document.lyrfrm.lname.value;
	var email = document.lyrfrm.email.value;
	var password = document.lyrfrm.password.value;
	var country = document.lyrfrm.country.value;
	var phone = document.lyrfrm.phone1.value;
	var street = document.lyrfrm.street.value;
	var area = document.lyrfrm.area.value;
	var zipcode = document.lyrfrm.zipcode.value;
	var title = document.lyrfrm.title.value;
	var category = document.lyrfrm.frn_cat.value;
	var establishment_yr = document.lyrfrm.establishment_yr.value;
	var launched_yr = document.lyrfrm.launched_yr.value;
	var headquater = document.lyrfrm.headquater.value;
	var area_req = document.lyrfrm.area_req.value;
	var inves_from = document.lyrfrm.inves_from.value;
	var inves_to = document.lyrfrm.inves_to.value;
	var brand_fee = document.lyrfrm.brand_fee.value;
	var commission = document.lyrfrm.commission.value;
	var property_type = document.lyrfrm.property_type.value;
	var preferred_loc = document.lyrfrm.preferred_loc.value;
	var detail = tinyMCE.get('detail').getContent();
	
	if(fname=="" || lname=="" || email=="" || password=="" || country=="" || phone=="" || zipcode=="" || title=="" || category=="" || establishment_yr=="" || launched_yr=="" || headquater=="" || area_req=="" || inves_from=="" || inves_to=="" || brand_fee=="" || commission=="" || property_type=="" || preferred_loc=="" || detail=="") {
		swal('Oops!', 'Star marked fields are mandatory!', 'error'); 
		return false;
	}
	if(password!="" && ((password.length < 6) || (password.length > 15))) {
		swal('Oops!', 'Password length between 6 to 15 characters!', 'error');
		return false;
	}
	if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		swal('Oops!', 'Phone Number is not valid!', 'error'); 
		return false;
	}
	if(street==""|| area=="") {
		swal('Oops!', 'Street and Located Area must be filled out!', 'error'); 
		return false;
	}
	if(zipcode!="" && ((zipcode.length < 5) || (zipcode.length > 6))) {
		swal('Oops!', 'Zipcode is not valid!', 'error'); 
		return false;
	}
	if(establishment_yr!="" && (establishment_yr.length < 4)) {
		swal('Oops!', 'Establishment year is not valid!', 'error'); 
		return false;
	}
	if(launched_yr!="" && (launched_yr.length < 4)) {
		swal('Oops!', 'Franchise Launched year is not valid!', 'error'); 
		return false;
	}
}

function checkmail() {
var x = document.getElementById("emailid").value;
  $.ajax({url: "../checkmail.php",
        type: 'POST',
        data: {reg_email:x} ,
  success: function(result){
		 if(result==1)
		{
			swal('Oops!', 'Email Id already Exists!', 'error');
			document.getElementById("emailid").value="";
			document.getElementById("emailid").focus(); 		
			return false;
		} if(result==0){
			return true;
		} 		
    }});
}

function valid_imgid() {
	var image = document.lyrfrm.lic_proof_img.value;
	var img = document.lyrfrm.lic_proof_img;
	var checkimg = image.toLowerCase();
	
	if(image == "") {
		swal("Oops!","Upload your License ID Photo","error");
		document.getElementById("idProof").value="";
		return false;
	}
	
	if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.gif|\.GIF|\.pdf|\.PDF)$/) && image!="") { 
		// validation of file extension using regular expression before file upload
		swal("Oops!","Invalid Image Format","error");
		document.getElementById("idProof").value="";
		return false;
	}
	
	if(image!="" && (img.files[0].size > 1048576)) {
		swal("Oops!","Image size should not exceed 1 MB","error");
		document.getElementById("idProof").value="";
		return false;
	}
}

function img_validate(id,width,height){
	var fuData = document.getElementById(id);
	var FileUploadPath = fuData.value;
	var action = 'update';
	if(window.FileReader) {   
		if (FileUploadPath != '') {				
			var size = fuData.files[0].size;
			if (size > 1048576) {				
				swal('File size exceeded!!', 'Maximum allowed size is 1 MB', 'error');
				fuData.value="";
				fuData.focus();
				return false;
			} else {			
				var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
				
				if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
					if (fuData.files && fuData.files[0]) {
						var reader = new FileReader();
						//$image = $("#"+showDiv+"");
						reader.onload = function(e) {
							var w, h;
							
							var image = new Image();
							image.src = e.target.result;
							image.onload = function() {
								w = this.width;
								h = this.height;
								localStorage.setItem("width", w);
								localStorage.setItem("height", h);
								if (w < width || h < height) {
									
									swal("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");
									fuData.value="";
									fuData.focus();
									return false;
									
								} else {
								
									$image.attr("src", e.target.result).show();
								}
							}
						}
						reader.readAsDataURL(fuData.files[0]);
					}
				} else {
					swal("Invalid file format!","Profile picture only allows file types of GIF, PNG, JPG and JPEG. ","error");
					fuData.value="";
					fuData.focus();
					return false;
				}
			}
		}
	} else {
	
	swal("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
	return true;
	}
}
</script>

<script>
function get_state(val){
	 $.ajax({
		 url: "../state_ajax.php?val="+val, 
		success: function(result){
		$("#state1").html(result);
	}
	});
}
function get_city(val){
	 $.ajax({url: "../city_ajax.php?val="+val, success: function(result){
		$("#city1").html(result);
	}});
}
</script>


<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<? include 'footer.php'; ?>