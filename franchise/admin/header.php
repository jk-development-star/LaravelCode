<?
include "AMframe/config.php";
ob_start(); 

$submit = isset($submit)?$submit:'';

$timestamp = time();
date_default_timezone_set("Asia/Kolkata");
$SysDate = date("d-m-Y");
$Time = date("h:i:s");
$Loginid = $_SESSION['vyadmlog'];
$AdminId = $_SESSION['vyusrlog'] ;
$Admin_name = $_SESSION['Admin_name']?$_SESSION['Admin_name']:'' ;
$Adminusrtype_id = $_SESSION['Adminusrtype_id']?$_SESSION['Adminusrtype_id']:'' ;
$Cookie = $_COOKIE['HmAcc'];
if($Cookie == 0 || ($Loginid == 0 && $AdminId == 0)){
	header("location:index.php");
	exit;
}
if($Admin_name == "Admin"){ // code for Admin profile
	$GetProfile = $db->singlerec("select userimages,username,email_id, id from admin where id='$AdminId'");
	$Pro_Picture = $GetProfile['userimages'];
	$usrcre_name = $GetProfile['username'];
	$user_images = $GetProfile['userimages'];
	$usrcre_email = $GetProfile['email_id'];
	$usrcre_id = $GetProfile['id'];
	$LoginName = $Admin_name;
	$style_permission="";
	$style_permission_staff="";
	$QryForAllocation = '';
	$fltrApprov="";
}
else{
	$fltrApprov="";
	$GetProfile = $db->singlerec("select userimages,username,dept_id,email_id from gen_user_mst where user_auto_id='$AdminId'");
	$Pro_Picture = $GetProfile['userimages'];
	$usrcre_name = $GetProfile['username'];
	$user_images = $GetProfile['userimages'];
	$login_dept_id = $GetProfile['dept_id'];
	$LoginName = @ucfirst($_SESSION['usrName']);
	$usrcre_email = $GetProfile['email_id'];
	$style_permission="style='display:none;'";
	$style_permission_staff="style='display:none;'";
	$QryForAllocation = "and emp_id='$Adminusrtype_id'";
	if($login_dept_id==1){
		$fltrApprov = "and b.approve_st='1'";
	}
	else if($login_dept_id==2){
		$fltrApprov = "and b.approve_st1='1' and b.approval_by1 !=''";
	}	
}
if($livepage=="welcome.php")
	$style_permission_hd="";
else
	$style_permission_hd="style='display:none;'";

?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content="<?echo $sitetitle;?>">
    <title><?echo $sitetitle;?></title>
    <script src="assets/js/myjs.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?=$siteurl;?>/img/fav.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/pace.css">
	<link href="../css/date_time_picker.css" rel="stylesheet">
  <link href="../css/fontello/css/fontello.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/charts/morris.css">

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
    <link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/timeline.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
     <!--<link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="assets/js/tinymce.js" ></script>
<link href="<?=$siteurl;?>/css/sweetalert.css" rel="stylesheet">
<script src="<?=$siteurl;?>/js/sweetalert.min.js"></script>
		<!-- <script src="<?=$siteurl;?>/js/sweetalert-dev.js"></script> -->
		<script src="assets/js/jquery-2.1.1.min.js"></script>
		<link href="assets/css/jquery-steps.min.css" rel="stylesheet">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar">
    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a href="welcome.php" class="navbar-brand"><img alt="stack admin logo" src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" class="brand-logo" style="max-width:100%;">
                </a></li>
            <!--<li class="nav-item hidden-sm-down float-xs-right"><a data-toggle="collapse" class="nav-link modern-nav-toggle"><i data-ticon="ft-toggle-right" class="toggle-icon ft-toggle-right font-medium-3 white"></i></a></li>-->
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
            <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="user-name">Admin</span></a>
            <div class="dropdown-menu dropdown-menu-right">
			<a href="general_settingupd.php" class="dropdown-item"><i class="fa fa-cog"></i> Setting</a> 
			<a href="user-profile.php" class="dropdown-item"><i class="fa fa-user-circle"></i> User List</a>
			<a href="company-profile.php" class="dropdown-item"><i class="fa fa-list"></i> <?=$keyword;?> List</a>
			<a href="reviews_all.php" class="dropdown-item"><i class="fa fa-commenting"></i> Reviews</a>
                  <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
