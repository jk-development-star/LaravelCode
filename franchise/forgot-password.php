<?
	include "includes/header.php"; 
	
	$Message=isSet($Message)?$Message:'';
	
	if(isset($f_pass)) {
		$email=$db->escapstr($email);
		$captcha=$db->escapstr($captcha);
		
		$result=$db->singlerec("select * from register where email='$email'");
		$id=$result['id'];
		$activestatus=$result['active_status'];
		//$email_status=$result['email_active_status'];
		$fname=$result['fname'];
		$lname=$result['lname'];
		if(empty($id)){
			$Message ="<font color='red' size='3em'>Invalid Credentials</font>";
		}
		if($activestatus == 0){
			$Message ="<font color='red' size='3em'>Your Account Has Been Inactive</font>";
		}
		
		if($_SESSION["code"]!=$captcha){
			$msg ="<font color='red' size='3em'>Enter correct captcha</font>";
		}
		else {
			$password = userInfo($id,'password');
			$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
			$to_email = $email;
			$fromemail = $from_email;
			$subject  = "$sitetitle Forgot password request";
			$title = "<center> Your New password : ". $password ."</center>";
			$text="Click the above button to Login with your New Password.";			
			$username = $fname." ".$lname;
			$url = "$siteurl/login";
			
			$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
				
			$com_obj->email($fromemail,$to_email,$subject,$message);
			
			echo "<script>location.href='$siteurl/login/?act=fgp';</script>";
			header("location:$siteurl/login/?act=fgp");
		}
		
	}
?>

<section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                	<div id="login">
                    		<div class="text-center"><img src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" alt="Image" data-retina="true" ></div>
                            <hr>
                            <form method="post" name="frg_pass" action="" onSubmit="return forgot_pass()">
                           <? echo $Message; ?>
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?=isset($email)?$email:'';?>" />
                                </div>
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<label>Captcha</label> 	
											<img src="<? echo $siteurl; ?>/captcha.php" style="height:40px;margin-top: 5px;"  />											
										</div>
									</div>																	
									<div class="col-sm-7"> 
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Captcha Code" name="captcha" id="captcha" onChange="return validcaptcha();" />									
											<span style='color:red;padding-left:10px;'><?=isset($msg)?$msg:'';?></span>
										</div> 
									</div> 
								</div>
                                
                                
								<div class="form-group text-center">
								    <input type="submit" name="f_pass" value="Submit" class="btn_1" />
                                </div>
                            </form>
							<p class="small">
                                    <a href="<? echo $siteurl; ?>/login">Have Password?</a>
									<a href="<? echo $siteurl; ?>/register" class="pull-right">Don't have account?</a>
                                </p>
                        </div>
                </div>
            </div>
        </div>
    </section>

<script>
function forgot_pass() {
	var emailval=document.frg_pass.email.value;
	var captcha = document.frg_pass.captcha.value;
	
	if(emailval == "") {
		swal("Oops!","Please enter your Email address","error");
		document.getElementById("email").style.borderColor='red';
		document.getElementById("email").focus();
		return false;
	}
	if(captcha==""){
		swal("Oops!","Enter the Captcha","error");
		document.getElementById("captcha").style.borderColor='red';
		return false;
	}
	if(captcha!="" && captcha.length!="4"){
		swal("Oops!","Enter the valid Captcha","error");
		document.getElementById("captcha").style.borderColor='red';
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
			document.getElementById("captcha").focus();
			return false;
		} else {
			return true;
		}
	}
	});		
}
</script>    
<?php include "includes/footer.php"; ?>