<?php
include "includes/header.php";

$act=isSet($act)?$act:'';
$Message=isSet($Message)?$Message:'';

if(isset($submit))
{
	$fname=$db->escapstr($fname);
	$lname=$db->escapstr($lname);
	$email=$db->escapstr($email);
	$phone=$db->escapstr($phone);
	$password=$db->escapstr($password);
	$confirm_password=$db->escapstr($confirm_password);
	$captcha=$db->escapstr($captcha);
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$result=$db->singlerec("select id from register where email='$email'");
	if(empty($result['id'])){
		if($_SESSION["code"]!=$captcha){
			$msg ="<font color='red' size='3em'>Enter correct captcha</font>";
		}if($_SESSION["code"]==$captcha){
		$set="fname='$fname'";
		$set .= ",lname='$lname'";
		$set .= ",email='$email'";
		$set .=",contact_no1='$phone'";
		$set .= ",password='$password'";
		$set .= ",crcdt='$date'";
		$set .= ",reg_ip='$ip'";
		$set .= ",user_role='0'";
		//$set .= ",active_status='1'";
	
			$uid=$db->insertid("insert into register set $set");
			$userid=base64_encode($uid);
			$username = $fname.' ' .$lname;
			$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
		
			$to_email = $email;
			$fromemail = $from_email;
			$subject  = "Account activation from $sitetitle";
			$text="Click the above button to activate your account.";			
			$title = "Thanks for joining with us!";
			$url = "$siteurl/login/?uid=$userid";
			
			$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);//echo "<br /><br /><br /><br /><br /><br />";
			//echo $message; exit;
			$com_obj->email($fromemail,$to_email,$subject,$message);
			
			echo "<script>location.href='$siteurl/login/?act=suc';</script>";
			header("location:$siteurl/login/?act=suc");
		
		}
	}
	else{
		echo "<script>swal('Failure','Email already exist','error');</script>";
	}
}

if($act=="reg")
	$Message = "<center><font color='red'>New User? Register Now</font></center>";
if(isset($reg_war))
	echo '<script>swal("Oops!","New User?Please SignUp","warning");</script>';
if($act=="fb")
	echo "<script>swal('Notification','Facebook Login is currently disable for demo purpose','success');</script>";
?>


<section id="hero" class="login">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
                	<div id="login">
                    <div class="text-center"><img src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" alt="Image" data-retina="true" ></div>					
                            <hr>
							  <? echo $Message; ?>  
                     <form method="post" name="sform" action="" onsubmit="return validateform()" autocomplete="off">
                       <div class="row">
							<div class="col-md-6 col-sm-6 login_social">
								<!--<a href="<?="$siteurl/fblog_new";?>" class="btn btn-primary btn-block"><i class="icon-facebook"></i>Sign Up with Facebook</a>-->
								<a href="<?="$siteurl/register.php?act=fb";?>" class="btn btn-primary btn-block"><i class="icon-facebook"></i>Log In with Facebook</a>
							</div>
							<div class="col-md-6 col-sm-6 login_social">
								<a href="<?="$siteurl/google_plus";?>" class="btn btn-danger btn-block "><i class=" icon-google"></i> Sign Up with Google+</a>
							</div>
						</div> <!-- end row -->
					
						<div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
  						
							   <div class="row">
							      <div class="col-sm-6">
								       <div class="form-group">
											<label>First Name</label>
											<input type="text" class=" form-control" name="fname" id="fname" placeholder="First Name">
										</div>
										<div>
						<span id="nameinfo"></span>
					 </div>
								  </div>
								  <div class="col-sm-6">
								       <div class="form-group">
											<label>Last Name</label>
											<input type="text" class=" form-control" name="lname" id="lname" placeholder="Last Name">
										</div>
								  </div>
							   </div>
							   
							   
                               <div class="row">
							      <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" class=" form-control " placeholder="Email (eg. example@gmail.com)" name="email" id="email" onChange="return checkmail()" />
                                    </div>
								  </div>
								<div class="col-sm-6">
                                   <div class="form-group">
                                      <label>Phone No</label>
                                       <input type="text" class=" form-control " placeholder="Phone No" name="phone" id="phone" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
                                    </div>
								</div>
								</div>
								
								<div class="row">
							      <div class="col-sm-6">
								       <div class="form-group">
											<label>Password</label>
											<input type="password" class=" form-control " placeholder="Password" name="password" id="password">
										</div>
								  </div>
								  <div class="col-sm-6">
								       <div class="form-group">
											<label>Confirm Password</label>
											<input type="password" class=" form-control " placeholder="Confirm Password" name="confirm_password" id="cpassword">
										</div>
								  </div>
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
							   					
                               <input type="checkbox" name="terms" /> <label> I agree to the <a target="_blank" href="<? echo $siteurl; ?>/terms_condn.php">Terms & Conditions </a> </label>
                                
								<div class="form-group text-center">
								    
									<button class="btn_1" name="submit" type="submit">Sign Up</button>
                                </div>
								<p class="small">                                  
									<a href="<? echo $siteurl; ?>/login" class="pull-right">Already user?</a>
                                </p>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
    
<?php include("includes/footer.php"); ?>




<script>
function validateform()  
{ 
	var fname = document.sform.fname.value;
	var lname = document.sform.lname.value;
	var emailval=document.sform.email.value;
	var mailformat =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
	var phone = document.sform.phone.value;
	var password = document.sform.password.value;
	var confirmpassword = document.sform.confirm_password.value;
	var captcha = document.sform.captcha.value;
	var terms = document.sform.terms;
	
    if (fname == "") {
        swal("Oops!","Firstname must be filled out","error" );
		document.getElementById("fname").style.borderColor='red';
	
        return false;
    }
    if (lname == "") {
        swal("Oops!","Lastname must be filled out","error");
		document.getElementById("lname").style.borderColor='red';
		document.getElementById("lname").focus();
        return false;
    }
	if(emailval == "") {
		swal("Oops!","Please enter your email address","error");
		document.getElementById("email").style.borderColor='red';
		document.getElementById("email").focus();
		return false;
	}
		
	if(!emailval.match(mailformat))  {  
		
		swal("Oops!","You have entered an invalid email address!","error");  
		document.getElementById("email").style.borderColor='red';
		document.sform.email.focus();  
		return false;  
	}  
	if(phone == "") {
		swal("Oops!","Please enter your Phone number","error");
		document.getElementById("phone").style.borderColor='red';
		document.getElementById("phone").focus();
		return false;
	}
	if(phone!="" && ((phone.length < 10) || (phone.length > 15))) {
		swal('Oops!', 'Phone Number is not valid!', 'error');
		document.getElementById("phone").style.borderColor='red';
		return false;
	}
	if (password == "") {
		swal("Oops!","Password must be filled out","error");
		document.getElementById("password").style.borderColor='red';
		return false;
	}
	if(password!="" && ((password.length < 6) || (password.length > 15))){
		swal("Oops!","Password length between 6 to 15 characters only","error");
		document.getElementById("password").style.borderColor='red';
		return false;
	}
	if (confirmpassword == "") {
		swal("Oops...","Confirm password must be filled out","error");
		document.getElementById("cpassword").style.borderColor='red';
		return false;
	}
	if(password!=confirmpassword){
		swal("Oops!","Confirm password does not match","error");
		document.getElementById("cpassword").style.borderColor='red';
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
	if(!terms.checked){
		swal("Oops!","Before SignUp Agree the Terms & Conditions","error");		
		return false;
	}	
	
	return true;	
}
function checkmail() {
var x = document.getElementById("email").value;
  $.ajax({url: "<? echo $siteurl; ?>/checkmail.php",
        type: 'POST',
        data: {reg_email:x} ,
		success: function(result){
		 if(result==1)
		{
			swal("Oops!","Email Id already Exists ","error");
			document.getElementById("email").value="";
			document.getElementById("email").focus();
			return false;
		} if(result==0){
			return true;
		} 		
    }});
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
