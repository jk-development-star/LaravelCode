<? include 'header.php';
include 'leftmenu.php'; 
$upd = isset($upd)?$upd:'';
if(isset($submit2)) {
		$crcdt = date("Y-m-d H:i:s");
		$new_password = trim(addslashes($new_password));
		$confirm_password = trim(addslashes($confirm_password));
				$password=md5($new_password);
				$set  = "password = '$password'";
 				$set  .= ",chngdt = '$crcdt'";
				$set  .= ",ref_password = '$new_password'";
				$db->insertrec("update admin set $set where id='1'");
				$upd=2;

	if($upd==2)
	{
	echo "<script>
              window.alert('Password changed successfully');
              top.location='welcome.php';
              </script>";
				exit;
	}
	}
	?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Site setting</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Change Password</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form name="frm" class="form-horizontal" action="" method="post">
					             <div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="page_name">Old Password <font color="red">*</font></label>
								   <div class="col-sm-10">
										<input type="text" name="old_password" id="old_password" class="form-control" required OnChange="return chekDbPass();"/>
										
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="new_password">New Password <font color="red">*</font></label>
									<div class="col-sm-10">
										<input type="password" name="new_password" id="new_password" class="form-control"  required />
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="confirm_password">Confirm New Password <font color="red">*</font></label>
									<div class="col-sm-10">
										<input type="password" name="confirm_password" id="confirm_password" class="form-control"  
										required />
									</div>
								</div>
					  
					  
					  <div class="form-actions center col-sm-12">
								
								<button type="submit" class="btn btn-primary" name="submit2" OnClick="return valid();">
									<i class="fa fa-check-square-o"></i> Save
								</button>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<script>
function valid() {
	var new_password = document.frm.new_password.value;
	var confirm_password = document.frm.confirm_password.value;
	//var passwordMatch = "((?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]))";	
	
	/* if(new_password!="" && !new_password.match(passwordMatch)) {
		  alert("Choose Password with minimum one Uppercase, Lowercase, Number & Special character");
		  document.frm.new_password.value="";
		  document.frm.new_password.focus();
		  return false;
	  } */
	  if(new_password!="" && new_password.length < 6 ) {
		   alert("Password must be at least 6 characters long");
		   document.frm.new_password.value="";
		  document.frm.new_password.focus();
		  return false;
	  }
	  if(new_password!="" && new_password.length > 15 ) {
		   alert("Password should not exceed 15 characters");
		   document.frm.new_password.value="";
		  document.frm.new_password.focus();
		   return false;
	  }
	  if(new_password!="" && confirm_password!="" && new_password!=confirm_password) {
		   alert("Confirm Password should be same as the NewPassword");
		   document.frm.confirm_password.value="";
		   document.frm.confirm_password.focus();
		   return false;
	  }
}
</script>

       <script src="plugins/parsley/parsley.min.js"></script>
        <!--Javascript parsely plugin-->

       <script src="plugins/customjs.js"></script>
        <!--Javascript Myjs-->
<? include 'footer.php'; ?>