<? include "AMframe/config.php";

		if(isset($submit2)) {
		$crcdt = date("Y-m-d H:i:s");
		$username=base64_decode($db->escapstr($usr));
		$id=base64_decode($db->escapstr($id));
		
		$record=$db->singlerec("select * from admin where id='".$id."' and username='".$username."'");
		$row=$db->numrows("select * from admin where id='".$id."' and username='".$username."'");
		if($row == '1')
		{
		if($new_password == $confirm_password )
		{
		$new_password = trim(addslashes($new_password));
		$confirm_password = trim(addslashes($confirm_password));
				$password=md5($new_password);
				$set  = "password = '$password'";
 				$set  .= ",chngdt = '$crcdt'";
				$set  .= ",ref_password = '$new_password'";
				$db->insertrec("update admin set $set where id='1'");
			    echo "<script>
                window.alert('Password changed successfully');
                window.location='login.php?act=scs';
                </script>";
				exit;
		}
		
		}
	}
	?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content=" Doctor Booking Script">
    <title>Login Page</title>
<link rel="shortcut icon" type="image/x-icon" href="<?=$siteurl;?>/img/fav.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu-modern" data-col="1-column" class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page">

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1" style="color:#FFF;"><img src="<? echo "$siteurl/admin/uploads/general_setting/$sitelogo"; ?>" alt="branding logo"> </div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Password Change</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
				<? //echo $Message; ?> 
                    <form method="post" name="passfrm" class="form-horizontal form-simple"  >
					
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="password" name="new_password" class="form-control form-control-lg input-lg" id="user-name" placeholder="Give New Password" required>
                            <div class="form-control-position">
                                <i class="ft-user"></i>
                            </div>
                        </fieldset>
                         <fieldset class="form-group position-relative has-icon-left mb-0">
                
							<input type="password" name="confirm_password" class="form-control form-control-lg input-lg" id="user-name" placeholder="Confirm Password" required>
                            <div class="form-control-position">
                                <i class="ft-user"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row" style="margin-top:20px;">
                      </fieldset>
                        <button type="submit" name="submit2"  onClick="return pass_valid();" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="assets/js/core/app.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
	<link href="../css/sweetalert.css" rel="stylesheet">
<script src="../js/sweetalert.min.js"></script>
		<script src="../js/sweetalert-dev.js"></script>
		<script src="assets/js/jquery-2.1.1.min.js"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
<script>
function pass_valid() {
 
	var new_pass = document.passfrm.new_password.value;
	var confirm_pass = document.passfrm.confirm_password.value;
	  
	if( new_pass=="" || confirm_pass=="") {
		swal('Oops!', 'All fields are mandatory!', 'error'); 
		return false;
	}
	if(((new_pass.length < 6) || (new_pass.length > 15))) {
		swal('Oops!', 'Password length between 6 to 15 characters only!', 'error');
		document.passfrm.new_password.style.borderColor='red';
	   document.passfrm.new_password.value="";		
		return false;
	}
	if( new_pass!=confirm_pass) {
	   swal('Oops!', 'Confirm Password not matched!', 'error');
	   document.passfrm.confirm_password.style.borderColor='red';
	   document.passfrm.confirm_password.value="";
	   return false;
	}
}
</script>