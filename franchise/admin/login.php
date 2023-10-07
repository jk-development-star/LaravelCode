<?
include "AMframe/config.php";
ob_start();


$act=isSet($act)?$act:'';
$Message=isSet($Message)?$Message:'';
$_SESSION['vyusrlog'] = isset($_SESSION['vyusrlog'])?$_SESSION['vyusrlog']:'0'; 

error_reporting(E_ALL ^ E_NOTICE); // Avoid COOKIE Error
$Cookie = $_COOKIE['HmAcc']; 
if($Cookie == 0){
	@session_destroy();
}
if(($Cookie != 0 || $_SESSION['vyusrlog'] != 0)){
	header("location:welcome.php");
	exit;
}

if($act=="inval")
{
	 //echo "<script>swal('Oops!', 'Invalid Credentials!', 'error');</script>";
    $Message = "<center><font color='red'>Invalid Credentials</font></center>";
}
else if($act=="scs")
{
	// echo "<script>swal('Success', 'Password Updated Successfully!', 'success');</script>";
	$Message = "<center><font color='green'><b>Password Updated Successfully</b></font></center>";
}
else if($act=="fgp")
{
	// echo "<script>swal('Success', 'Password change link sent to your mail', 'success');</script>";
	$Message = "<center><font color='green'><b>Password change link sent to your mail</b></font></center>";
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
    <meta name="author" content="">
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
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form action="session.php" class="form-horizontal form-simple"  novalidate>
                       <input type="hidden" name="ctadby" value="1">
					   <label><?=$Message;?></label>
					   <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" name="username" id="user-name" placeholder="Your Username" required>
                            <div class="form-control-position">
                                <i class="ft-user"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="pass" id="user-password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="fa fa-key"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                               
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="forget-pass.php" class="card-link">Forgot Password?</a></div>
                        </fieldset>

                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
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
    <!-- END PAGE LEVEL JS-->
  </body>
</html>