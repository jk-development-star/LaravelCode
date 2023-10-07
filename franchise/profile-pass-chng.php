<?
	include "includes/header.php"; 
	include "includes/innersearch.php";
	
	if(empty($user_id)){
		echo "<script>location.href='$siteurl/index';</script>";
		header("Location:$siteurl/index");exit;
	}
	$user_id=$db->escapstr($user_id);

		$id = $db->escapstr($user_id);
		$pass_db = userInfo($id,'password');
	if(isset($submit)) {
		$new_pass=$db->escapstr($new_pass);
		
		$set = "password='$new_pass'";
		
		$sq=$db->insertrec("update register set $set WHERE id='$user_id'");
		echo "<script>location.href='$siteurl/profile-pass-chng/?updpsw'</script>";
		header("location:$siteurl/profile-pass-chng/?updpsw");
	}
?>
            <div  class="container margin_60">
               <div class="row">
                  <?php if(isset($updpsw)){
						echo"<div class='alert alert-success'> Password changed Successfully</div>";
					  }
				?>	
                   <?php include "includes/leftmenu.php"; ?>
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
                    <div class="row mt20 mb20">
            <div class="col-md-12 wow zoomIn animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn;">
                <div class="col-sm-12 profile_box">
                    <form name="passfrm" method="post" action="">
					<input type="hidden" name="usrid" value="<? echo $user_id; ?>" />
					    <div class="form-group mt15">
						    <label class="col-sm-4">Current Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
							     <input type="password" name="old_pass" class="form-control" OnChange="return checkDBPass();" />
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">New Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="password" name="new_pass" class="form-control" />
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group mt15">
						    <label class="col-sm-4">Confirm Password</label>
						    <label class="col-sm-1 hidden-xs">:</label>
							<div class="col-sm-7">
								<input type="password" name="confirm_pass" class="form-control" />
							</div>
						</div>
						<div class="clearfix"></div>
						
						
						<div class="clearfix"></div>
						<div class="form-group mt15 text-center">
						   <button onClick="return pass_valid();" type="submit" name="submit" class="btn btn-success">Save</button>
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
function pass_valid() {
	var old_pass = document.passfrm.old_pass.value;
	var new_pass = document.passfrm.new_pass.value;
	var confirm_pass = document.passfrm.confirm_pass.value;
	
	if(old_pass=="" || new_pass=="" || confirm_pass=="") {
		swal('Oops!', 'All fields are mandatory!', 'error'); 
		return false;
	}
	if(new_pass=="<?=$pass_db; ?>"){
		swal('Oops!', 'Old password and new password are same!', 'error');
	}
	if( ((new_pass.length < 6) || (new_pass.length > 15))) {
		swal('Oops!', 'Password length between 6 to 15 characters only!', 'error');
		document.passfrm.new_pass.style.borderColor='red';
	   document.passfrm.new_pass.value="";		
		return false;
	}
	if(new_pass!=confirm_pass) {
	   swal('Oops!', 'Confirm Password not matched!', 'error');
	   document.passfrm.confirm_pass.style.borderColor='red';
	   document.passfrm.confirm_pass.value="";
	   return false;
	}
}

function checkDBPass() {
	var x = document.passfrm.old_pass.value;
	var u_id = document.passfrm.usrid.value;
	$.ajax({url: "<? echo $siteurl; ?>/checkpass.php",
			type: 'POST',
			data: {pass:x, uid:u_id} ,
			success: function(result){
						 if(result==1) {
							swal('Oops!', 'Incorrect Current Password!', 'error');
							document.passfrm.old_pass.value="";
							document.passfrm.old_pass.focus();
							return false;
						 } 
						 if(result==0){
							return true;
						 } 
		
					 }
	});
}
</script>
<?php include "includes/footer.php"; ?>