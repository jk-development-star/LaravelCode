<?php

include "includes/header.php";
include "includes/innersearch.php";

$act=isSet($act)?$act:'';

if(isset($ctc_submit)) {
	$fname=$db->escapstr($fname);
	$lname=$db->escapstr($lname);
	$email=$db->escapstr($email);
	$contact_no=$db->escapstr($contact_no);
	$msg = trim(addslashes($msg));
	$captcha=$db->escapstr($captcha);
	$date=date("Y-m-d h:m:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	if($_SESSION["code"]!=$captcha){
			$msg ="<font color='red' size='3em'>Enter correct captcha</font>";
	}
	if($_SESSION["code"]==$captcha){
		$set="fname='$fname'";
		$set .= ",lname='$lname'";
		$set .= ",email='$email'";
		$set .= ",contact_no='$contact_no'";
		$set .= ",msg='$msg'";
		$set .= ",crcdt='$date'";
		$set .= ",user_ip='$ip'";
	
		$db->insertrec("insert into user_contact_us set $set");
		
		$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
		$contact_num = $GetContact['ctc_num'];
		
		$to_email = $email;
		$fromemail = $from_email;
		$subject  = "Your Feedback about $sitetitle";
		$title="Thank you for getting in touch with us!";
		$text = "Your valuable Query / Feedback has been considered for review and it is being processed. We shall get back to you shortly.";		
		$text = $text."We will contact you shortly via Email";
		$username = $fname." ".$lname;
		$url = "$siteurl";
		
		 $message = $email_temp->notice_mail($GetSite,$username,$title,$text,$contact_num);		
		$com_obj->email($fromemail,$to_email,$subject,$message);
		
		$subject1  = "User Feedback about $sitetitle";
		$title1="User Feedback details";
		$text1 = "<center><table border='0' width='100%'><tr> <td width='40%'>Your Contact no. : </td><td>". $contact_no ."</td></tr>.";
		$text1=$text1."<tr><td> Your Message : </td><td><br />". $msg ."</td></tr></table></center>.";
		
		$message1 = $email_temp->notice_mail($GetSite,'',$title1,$text1,$contact_num);	$com_obj->email($to_email,$fromemail,$subject1,$message1);
			
		echo "<script>location.href='$siteurl/contact-us.php?act=suc';</script>";
		header("location:$siteurl/contact-us.php?act=suc");
	}
}
	
if($act=="suc")
	echo "<script>swal('success','Enquiry Sent Successfully..!, Admin Contact you as soon as possible.','success');</script>";
?>
<style>
.para{
text-align:justify !important;	
}
</style>
       
			<div class="container margin_60">
	<div class="row">
		<div class="col-md-8 col-sm-8">
			<div class="form_title">
				<h3><strong><i class="icon-pencil"></i></strong>Fill the form below</h3>
			</div>
			<div class="step">
            
				<div id="message-contact"></div>
				<form name="ctc_frm" method="post" action="" onSubmit="return ctc_valid()">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" id="name_contact" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" id="lastname_contact" placeholder="Enter Last Name">
							</div>
						</div>
					</div>
					<!-- End row -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" id="email_contact" class="form-control" placeholder="Enter Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Phone</label>
								<input type="text" id="phone_contact" name="contact_no" class="form-control" placeholder="Enter Phone number" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Message</label>
								<textarea rows="5" id="ctc_msg" name="msg" class="form-control tiny" placeholder="Write your message" style="height:200px;"></textarea>
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
						  <input type="submit" name="ctc_submit" value="Submit" class="btn_1" />
				</form>
			</div>
		</div><!-- End col-md-8 -->
        
		<div class="col-md-4 col-sm-4">
			<div class="box_style_1">
				
				<h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
				<span style="text-transform:capitalize;"><? echo $ctc_addr; ?></span>
				<hr>
				<h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
				<ul id="contact-info">
					<li><? echo $ctc_num; ?></li>
					<li><? echo $ctc_email; ?></a></li>
				</ul>
			</div>
			<div class="box_style_4">
				<i class="icon_set_1_icon-57"></i>
				<h4>Need <span>Help?</span></h4>
				<a class="phone"><? echo $ctc_num; ?></a>
				<!--<small>Monday to Friday 9.00am - 7.30pm</small>-->
			</div>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
	
	
</div><!-- End container -->

<div class="" style="width:100%;">
		<!-- 4:3 aspect ratio -->
		<div class="embed-responsive embed-responsive-4by3" style="padding-bottom:40%;">
		  
		 <!--<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.321296180267!2d-118.35556698464066!3d34.13812122064663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2be4f253238cf%3A0xd3dd5027799c9a71!2sUniversal+Studios+Hollywood!5e0!3m2!1sen!2sin!4v1509773366006" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
		  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed/v1/MODE?key=AIzaSyDuWnyV6qr-mDcvSgjE-wpSofV_t1pvNa8&q=<?echo $ctc_addr;?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		  
		</div>
	</div>
	
	<div class="clearfix"></div>

<script>
function ctc_valid() {
	var fname = document.ctc_frm.fname.value;
	var lname = document.ctc_frm.lname.value;
	var email=document.ctc_frm.email.value;
	var contact_no = document.ctc_frm.contact_no.value;
	var ctc_msg = tinyMCE.get('ctc_msg').getContent();
	var captcha = document.ctc_frm.captcha.value;
	
	if(fname=="" || lname=="" || email=="" || contact_no=="" || ctc_msg=="" || captcha=="") {
		swal('Oops!', 'All the fields are mandatory!', 'error'); 
		return false;
	}
	if(contact_no!="" && ((contact_no.length < 10) || (contact_no.length > 15))) {
		swal('Oops!', 'Phone Number is not valid!', 'error'); 
		return false;
	}
	if(captcha!="" && captcha.length!="4"){
		swal("Oops...","Enter valid captcha","error");
		document.getElementById("captcha").value = "";
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
			swal("Oops!","Enter valid Captcha","error");
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