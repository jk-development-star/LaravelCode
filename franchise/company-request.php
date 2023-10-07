<?
	include "includes/header.php";
	
if(empty($user_id)){
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
}

$user_id = $db->escapstr($user_id);

if(isset($submit)) {
	$date = date("Y-m-d");
	$ip = $_SERVER['REMOTE_ADDR'];
	$uid=$db->escapstr($uid);
	$title=$db->escapstr($title);
	$frn_cat=$db->escapstr($frn_cat);
	$property_type=$db->escapstr($property_type);
	$establishment_yr=$db->escapstr($establishment_yr);
	$launched_yr=$db->escapstr($launched_yr);
	$detail = trim(addslashes($detail));
	$captcha=$db->escapstr($captcha);	
	
	if($_SESSION["code"]!=$captcha){
		$msg ="<font color='red' size='3em'>Enter correct captcha</font>";
	} else {
		$set ="user_id='$uid'";			
		$set .=",title='$title'";
		$set .=",category='$frn_cat'";
		$set .=",property_type='$property_type'";
		$set .=",establishment_yr='$establishment_yr'";
		$set .=",launched_yr='$launched_yr'";
		$set .=",detail='$detail'";
		$set .= ",crcdt='$date'";
		$set .= ",user_ip='$ip'";
		$db->insertrec("insert into request set $set");
		
		$set1 ="lawyer_status='1'";			
		$set1 .=",title='$title'";
		$set1 .=",category='$frn_cat'";
		$set1 .=",property_type='$property_type'";
		$set1 .=",establishment_yr='$establishment_yr'";
		$set1 .=",launched_yr='$launched_yr'";
		$set1 .=",detail='$detail'";
		
		$db->insertrec("update register set $set1 WHERE id='$user_id'");
		
		echo "<script>location.href='$siteurl/license/?req';</script>";
		header("location:$siteurl/license/?req");			
	}	
}

$message = "<h4><span style='color:#2f587c;'>Step 1: Please provide Basic details</span></h4><hr>";
if(isset($err)) {
	$message = "<span class='alert alert-danger text-center'>$err</span><hr>";
} 


?>
<style>
select[multiple], select[size] {
    height: 100px;
}
</style>
<section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
                	<div id="login">
                    		<div class="text-center"><img src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" alt="Image" data-retina="true" ></div>
                            <hr>
							
							 <?php echo $message; ?>
							
                            <form method="post" name="rgcfrm" action="" onsubmit="return valid_rgc()" enctype="multipart/form-data">
                          
							 <input type="hidden" name="uid" value="<? echo $user_id; ?>" />
								
							<div class="form-group">
								<label>Company Name</label>
								<input type="text" name="title" id="Title" class="form-control" />
							</div>
								
							<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Category </label>
									<select name="frn_cat" class="form-control">
										<option value=""> Select Category</option>
										<?=$drop->get_dropdown($db,"select id,category_name from category where active_status!='0' order by category_name asc",'');?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Property Type</label>
									<input type="text" name="property_type" id="pro_type" class="form-control" />
								</div>
							</div>
							</div>
						
							<div class="row">
							  <div class="col-sm-6">
								   <div class="form-group">
										<label>Establishment Year</label>
										<input type="text" name="establishment_yr" id="est_yr" class="form-control" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
									</div>
							  </div>
							  <div class="col-sm-6">
								   <div class="form-group">
										<label>Franchising Launch Date</label>
										<input type="text" name="launched_yr" id="launch_yr" class="form-control" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" maxlength="4" />
									</div>
							  </div>
							</div>
							
							<div class="form-group">
								<label>Business Details </label>
								<textarea rows="6" name="detail" id="detail" class="form-control tiny">	</textarea>
							</div>
							   
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Captcha</label>		
									<img src="<? echo $siteurl; ?>/captcha.php" style="height:40px;margin-top: 5px;" />
								</div>
							</div>						
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class=" form-control" placeholder="Captcha Code" name="captcha" id="captcha" onChange="return validcaptcha();" />
									<span style='color:red;padding-left:10px;'><?=isset($msg)?$msg:'';?></span>
								</div>
							</div>							 
						</div>
                           
							<div class="form-group text-center">
								<button class="btn_1" name="submit" type="submit">Submit</button>
							</div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>

<script>
function valid_rgc() {
	var title = document.rgcfrm.title.value;
	var frn_cat = document.rgcfrm.frn_cat.value;
	var establishment_yr = document.rgcfrm.establishment_yr.value;
	var launched_yr = document.rgcfrm.launched_yr.value;
	var property_type = document.rgcfrm.property_type.value;
	var detail = tinyMCE.get('detail').getContent();
	var captcha = document.rgcfrm.captcha.value;
	 
	if (title == "") {
        swal("Oops!","Title must be filled out","error");
        return false;
    }
	if (frn_cat == "") {
        swal("Oops!","Select the Category","error");
        return false;
    }
	if(property_type == "") {
		swal("Oops!","Property Type must be filled out","error");
		return false;
	}
    if (establishment_yr == "") {
        swal("Oops!","Establishment Year must be filled out","error");
        return false;
    }
	if(establishment_yr!="" && (establishment_yr.length < 4)) {
		swal('Oops!', 'Establishment year is not valid!', 'error'); 
		return false;
	}
	if(launched_yr == "") {
		swal("Oops!","Franchise Launched year must br filled out","error");
		return false;
	}
	if(launched_yr!="" && (launched_yr.length < 4)) {
		swal('Oops!', 'Franchise Launched year is not valid!', 'error'); 
		return false;
	}
	if (detail == "") {
		swal("Oops!","Business Detail must be filled out","error");
		return false;
	}	
	if(captcha==""){
		swal("Oops!","Enter captcha","error");
		return false;
	}
	if(captcha!="" && captcha.length!="4"){
		swal("Oops!","Enter the valid captcha","error");
		return false;
	}
}
function validcaptcha() {
	var captcha = document.getElementById("captcha").value;
	$.ajax({
	type: "POST",
	url: "<? echo $siteurl; ?>/validate-captcha.php",
	data:{a:captcha},
	success: function(result) {
		if(result=="0") {
			swal("Oops!","Enter the valid Captcha","error");
			document.getElementById("captcha").value="";
			return false;
		} else {
			return true;
		}
	}
	});		
}
</script>    
<?php include("includes/footer.php"); ?>