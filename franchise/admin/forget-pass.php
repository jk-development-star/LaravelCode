<? include "AMframe/config.php";
				$Message=isSet($Message)?$Message:'';
	
	if(isset($submit)) {
		$email=$db->escapstr($email);
		
		$result=$db->singlerec("select * from general_setting where admin_email='$email'");
		$id=$result['id'];
	    $username=$db->Extract_Single("select username from admin where id='1'");
		if(empty($id)){
			
			$Message ="<font color='red' size='3em'>Invalid Credentials</font>";
		}
		else {
			$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
			$to_email = $email;
			$fromemail = $from_email;
			$subject  = "$sitetitle Forgot password request";
			$title = "Welcome to $keyword Search";
			$text="Click the above button to change your Password.";			
			$usrnam = base64_encode($username);
			$pid= base64_encode($result['id']);
			$url = "$siteurl/admin/pass-change.php?usr=$usrnam&id=$pid";
			$message = $email_temp->style_blue($siteinfo,base64_decode($usrnam),$title,$text,$contact_num,$url);	
			$com_obj->email($fromemail,$to_email,$subject,$message);
			 echo "<script>
                window.alert('Password change link sent to admin mail');
				location.href='$siteurl/admin/login.php?act=fgp';</script>";
			header("location:$siteurl/admin/login.php?act=fgp");
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
    <meta name="author" content=" Co work Space Script">
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
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Get Password</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
				<? echo $Message; ?> 
                    <form class="form-horizontal form-simple"  method="post">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="email" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Enter Registered Email ID" required>
                            <div class="form-control-position">
                                <i class="ft-user"></i>
                            </div>
                        </fieldset>

                        <fieldset class="form-group row" style="margin-top:20px;">
                             <div class="col-md-12 col-xs-12 text-xs-center text-md-right"><a href="login.php" class="card-link">Have Password?</a></div>
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Get Password</button>
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