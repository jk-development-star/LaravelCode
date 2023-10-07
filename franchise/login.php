<?php
include "includes/header.php";
ob_start();

if(isset($uid) && !empty($uid)){
	$uid=base64_decode($uid);
	$db->insertrec("update register set active_status='1' where id='$uid'");
	echo "<script>swal('Success','Your Account has been activated','success');</script>";
}

$act=isSet($act)?$act:'';
$Message=isSet($Message)?$Message:'';


if($act=="inval")
	$Message = "<center><font color='red'>Invalid Credentials</font></center>";
if($act=="inact")
	$Message = "<center><font color='red'>Your Account Has Been Inactive</font></center>";
if($act=="inc_pass")
	$Message = "<center><font color='red'>Incorrect Password</font></center>";
if(isset($bknw))
	$Message = "<center><h4><font color='red'>Please Login to Send Request</font></h4></center>";
if(isset($rev_wrt))
	$Message = "<center><h4><font color='red'>Please Login to Post Reviews</font></h4></center>";

if($act=="suc")
	echo "<script>swal('Success','Please check your Email to activate your account','success');</script>";
if($act=="fgp")
	echo "<script>swal('Success','Please check email to get your Password','success');</script>";
if($act=="fb")
	echo "<script>swal('Notification','Facebook Login is currently disable for demo purpose','success');</script>";
?>

   
<section id="hero" class="login">
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
			<div id="login">
				<div class="text-center"><img src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" alt="Image" data-retina="true" ></div>
				<hr>
				<form method="post" action="<? echo $siteurl; ?>/session.php" onSubmit="return lgfrm()">
					<input type="hidden" name="lyrid" value="<? if(isset($bknw)) echo$bknw; ?>" />
					<input type="hidden" name="lyrid1" value="<? if(isset($rev_wrt)) echo$rev_wrt; ?>" />
				
				<?echo $Message;?>
				<div class="row">
                            <div class="col-md-6 col-sm-6 login_social">
                                <!--<a href="<?="$siteurl/fblog_new";?>" class="btn btn-primary btn-block"><i class="icon-facebook"></i>Log In with Facebook</a>-->
                                <a href="<?="$siteurl/login.php?act=fb";?>" class="btn btn-primary btn-block"><i class="icon-facebook"></i>Log In with Facebook</a>
                            </div>
                            <div class="col-md-6 col-sm-6 login_social">
                                <a href="<?="$siteurl/google_plus";?>" class="btn btn-danger btn-block "><i class=" icon-google"></i>Log In with Google+</a>
                            </div>
                            </div> <!-- end row -->
                            <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" id="email" class=" form-control " placeholder="Email" name="email" required onChange="return checkmail()" />
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="pass" class=" form-control" placeholder="Password" name="password" required onChange="return lgfrm()" />
					</div>					

					<div class="form-group text-center">
					
						<input type="submit" name="loginsubmit" class="btn_1" value="Sign in" />
						
					</div>
				</form>
				<p class="small">
						<a href="<? echo $siteurl; ?>/forgot-password">Forgot Password?</a>
						
						<a href="<? echo $siteurl; ?>/register" class="pull-right">Register Now</a>
				</p>


			</div>
		</div>
	</div>
</div>
</section>
 
<script>
function checkmail() {
var x = document.getElementById("email").value;
  $.ajax({url: "<? echo $siteurl; ?>/checkmail.php",
        type: 'POST',
        data: {reg_email:x} ,
		success: function(result){
		 if(result==0)
		{
			swal("Oops!","Invalid Credentials","error");
			document.getElementById("email").value="";
			return false;
		} if(result==1){
			return true;
		} 		
    }});
}

function lgfrm() { 
	var email = document.getElementById("email").value;
	var passwd = document.getElementById("pass").value;
	
	if(email == "" || passwd == "") {
		swal("Oops!","Fillout the Empty field","error");		
		return false;
	}
	
  $.ajax({url: "<? echo $siteurl; ?>/checkmail.php",
        type: 'POST',
        data: {email:email,password:passwd} ,
		success: function(result){
		 if(result==0)
		{
			swal("Oops!","Incorrect Password","error");
			document.getElementById("pass").value="";
			return false;
		} 		
		if(result==1){
			return true;
		}
		if(result==2)
		{
			location.href='<? echo $siteurl; ?>/index/?lg_inact';
			return false;
		}
    }});
}
</script> 
<?php include "includes/footer.php"; ?>