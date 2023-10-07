<?
	include "includes/header.php";
if(empty($user_id)){
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
}
	$user_id = $db->escapstr($user_id);
	
include "includes/innersearch.php";

$act=isSet($act)?$act:'';
$inves_from=isSet($inves_from)?$inves_from:'';
$inves_to=isSet($inves_to)?$inves_to:'';

if(isset($submit)) {
	$date = date("Y-m-d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$category=$db->escapstr($frn_cat);
	$establishment_yr=$db->escapstr($establishment_yr);
	$launched_yr=$db->escapstr($launched_yr);
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
	$headquater=$db->escapstr($headquater);
	$website=$db->escapstr($website);
	$detail = trim(addslashes($detail));
	
	$investment = $inves_from.'-'.$inves_to;
	
	$set ="category='$category'";
	$set .=",establishment_yr='$establishment_yr'";
	$set .=",launched_yr='$launched_yr'";
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
	$set .=",headquater='$headquater'";
	$set .=",website='$website'";
	$set .=",detail='$detail'";
	$set .=",chngdt='$date'";
	$set .=",edit_ip='$ip'";
	
	$sql=$db->insertrec("update register set $set WHERE id='$user_id'");
	
	$GetRecords=$db->singlerec("select * from  register where user_role='0' and lawyer_status='1' and id='$user_id'");
	if(count($GetRecords)!=0) {
		$lyrid = $GetRecords["id"];
		$db->insertrec("update register set lawyer_status='2' WHERE id='$lyrid'");
		
		echo "<script>location.href='$siteurl/profile/?act=req'</script>";
		header("location:$siteurl/profile/?act=req");
	}
	else {	
		echo "<script>location.href='$siteurl/profile/?upd'</script>";
		header("location:$siteurl/profile/?upd");
	}
}

$inves = explode('-',$userinfo['investment']);
$inves_from = $inves[0];
$inves_to = $inves[1];

if($act=="req")
	echo "<script>swal('Success','After Admin approved Your Company profile on Live. Check your Email to know Company Request Status','success');</script>";	

?>
            <div  class="container margin_60">
               <div class="row">
			  <?php  if(isset($req)){
					echo"<div class='alert alert-success'> Step 2: Please fillout these details below to Register a Company</div>";
				} ?>
                   <?php include "includes/leftmenu.php"; ?>
				   
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
            <div class="col-md-12 wow zoomIn" data-wow-delay="0.2s">
                <div class="col-sm-12 profile_box">
                    <form name="cfrm" method="post" action="" onsubmit="return frm_valid()">
					<input type="hidden" name="service_ct" id="ser_count" />
					    <div class="form-group mt15">
						    <label class="col-sm-3"> Category <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <select name="frn_cat" class="form-control">
									<option value=""> Select Category</option>
									<?=$drop->get_dropdown($db,"select id,category_name from category where active_status!='0' order by category_name asc",$userinfo['category']);?>
								</select>
							</div>							
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3">Establishment <br />Year <span class="req">*</span> </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="establishment_yr" class="form-control" value="<? echo $userinfo['establishment_yr']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
							</div>
						</div>
						<div class="clearfix"></div>
				
						<div class="form-group mt15">
						    <label class="col-sm-3">Franchising Launch Date <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
								<input type="text" name="launched_yr" class="form-control" value="<? echo $userinfo['launched_yr']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Required Area <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							     <input type="text" name="area_req" class="form-control" value="<? echo $userinfo['area_req']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Investment Range (In Lacs) <span class="req">*</span> </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
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
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Franchise/Brand Fee <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							     <input type="text" name="brand_fee" class="form-control" value="<? echo $userinfo['brand_fee']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Royalty/Commission (In Amount) <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							     <input type="text" name="commission" class="form-control" value="<? echo $userinfo['commission']; ?>" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Expansion Location </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							     <input type="text" name="expan_location" class="form-control" value="<? echo $userinfo['expan_location']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Training Location </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="training_loc" class="form-control" value="<? echo $userinfo['training_loc']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Is Field Assistance available for Franchisee? </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <div class="row">
								<div class="col-sm-4">
									Yes <input type="radio" name="field_assit" class="form-control" value="1" <?if($userinfo['field_assit']=="1") echo "checked"; ?> /> 
								</div>
								<div class="col-sm-4">
									No <input type="radio" name="field_assit" class="form-control" value="2"<?if($userinfo['field_assit']=="2") echo "checked"; ?> /> 
								</div>
								</div>
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Property Type <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="property_type" class="form-control" value="<? echo $userinfo['property_type']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Floor Area Requirement </label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="floor_area" class="form-control" value="<? echo $userinfo['floor_area']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3">Preferred location of unit franchise <br />	outlet <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="preferred_loc" class="form-control" value="<? echo $userinfo['preferred_loc']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Headquater <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="headquater" class="form-control" value="<? echo $userinfo['headquater']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
						
						<div class="form-group mt15">
						    <label class="col-sm-3"> Website</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <input type="text" name="website" class="form-control" value="<? echo $userinfo['website']; ?>" />
							</div>
						</div>						
						<div class="clearfix"></div>
				
						<div class="form-group mt15">
						    <label class="col-sm-3">Business Details <span class="req">*</span></label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-8">
							    <textarea rows="6" name="detail" id="detail" class="form-control tiny"> <? echo stripslashes($userinfo['detail']); ?> 
								</textarea>
							</div>
						</div>
						<div class="clearfix"></div>
						
						<div class="form-group mt15 text-center">
						   <input type="submit" name="submit" class="btn btn-info" <? if($userinfo['lawyer_status']==1) {
							   echo 'value="Submit"';
						   } else {  echo 'value="Edit"'; } ?> />
						</div>
					
					</form>
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

<script>
function frm_valid() {
	var category = document.cfrm.frn_cat.value;
	var establishment_yr = document.cfrm.establishment_yr.value;
	var launched_yr = document.cfrm.launched_yr.value;
	var area_req = document.cfrm.area_req.value;
	var inves_from = document.cfrm.inves_from.value;
	var inves_to = document.cfrm.inves_to.value;
	var brand_fee = document.cfrm.brand_fee.value;
	var commission = document.cfrm.commission.value;
	var property_type = document.cfrm.property_type.value;
	var preferred_loc = document.cfrm.preferred_loc.value;
	var headquater = document.cfrm.headquater.value;
	var detail = tinyMCE.get('detail').getContent();
	
	if(category=="" || establishment_yr=="" || launched_yr=="" || area_req=="" || inves_from=="" || inves_to=="" || brand_fee=="" || commission=="" || property_type=="" || preferred_loc=="" || headquater=="" || detail=="") {
		swal('Oops!', 'Red marked fields are mandatory!', 'error'); 
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
</script>			
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<?php include "includes/footer.php"; ?>