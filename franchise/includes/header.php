<?php
include "admin/AMframe/config.php";

$user_id=isset($_SESSION['space_userid'])?$_SESSION['space_userid']:'';
if(!empty($user_id)){
	$userinfo=$db->singlerec("SELECT * FROM register WHERE id='$user_id'");
}

$getCtc=$db->singlerec("select * from cms where id='1'");
				$ctc_addr=$getCtc['ctc_addr'];
				$ctc_num=$getCtc['ctc_num'];
				$ctc_email=$getCtc['ctc_email'];
				$home_footer1=stripslashes($getCtc['home_footer1']);
				$home_footer2=stripslashes($getCtc['home_footer2']);
				$aboutus=stripslashes($getCtc['aboutus']);
				$about_text=stripslashes($getCtc['about_text']);
				$about_text1=stripslashes($getCtc['about_text1']);
				$services=stripslashes($getCtc['services']);
				$services_text1=stripslashes($getCtc['services_text1']);
				$services_text2=stripslashes($getCtc['services_text2']);
				$terms=stripslashes($getCtc['terms']);
				
				$get_cat=$db->get_all_assoc("select * from category where active_status='1' order by category_name asc");
				$con_fee=isset($_SESSION['fee'])?$_SESSION['fee']:"";

				
?>
				
<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8">
   <![endif]-->
   <!--[if IE 9]>
   <html class="ie ie9">
      <![endif]-->
      <html>
         <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
            <meta name="author" content="Ansonika">
            <title><? echo $sitetitle; ?></title>
            <!-- Favicons-->
            <link rel="shortcut icon" href="<?=$siteurl;?>/img/fav.png" type="image/x-icon">
            <!-- CSS -->
            <link href="<? echo $siteurl; ?>/css/base.css" rel="stylesheet">
            <!-- SPECIFIC CSS -->
            <link href="<? echo $siteurl; ?>/css/skins/square/grey.css" rel="stylesheet">
            <link href="<? echo $siteurl; ?>/css/date_time_picker.css" rel="stylesheet">
            <!-- Google web fonts -->
            <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
            <!--[if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
			<!--sweet alert-->
			<script src="<? echo $siteurl; ?>/js/sweetalert.min.js"></script>
			<link rel="stylesheet" href="<? echo $siteurl; ?>/css/sweetalert.css">
			<!--sweet alert ends-->
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
			  <script src="<? echo $siteurl; ?>/js/jquery-1.11.2.min.js"></script>
			<style>
			.req {
			  margin: 2px;
			  font-size: 18px;
			  color: red;
			}
			.name {
				text-transform : capitalize;
			}
			</style>
			<script>
function checkmail1() {
var x = document.getElementById("Email").value;
  $.ajax({url: "checkmail.php",
        type: 'POST',
        data: {reg_email:x} ,
		success: function(result){
		 if(result==0)
		{
			swal("Oops!","Invalid Credentials","error");
			location.href='<? echo $siteurl; ?>/index/?actt=inval';
			//document.getElementById("Email").value="";
			return false;
		} if(result==1){
			return true;
		} 		
    }});
}

function lgfrm1() { 
	var email = document.getElementById("Email").value;
	var passwd = document.getElementById("Password").value;
	
	if(email == "" || passwd == "") {
		swal("Oops!","Fillout the Empty field","error");		
		return false;
	}
	
  $.ajax({url: "checkmail.php",
        type: 'POST',
        data: {email:email,password:passwd} ,
		success: function(result){
		 if(result==0)
		{
			swal("Oops!","Incorrect Password","error");
			location.href='<? echo $siteurl; ?>/index/?actt=pwd';
			//document.getElementById("Password").focus();
			return false;
		} 		
		if(result==1){
			return true;
		}
		if(result==2)
		{
			location.href='<? echo $siteurl; ?>/index/?actt=inact';
			return false;
		}
    }});
}
</script> 
         </head>
         <body>
<?
$actt=isSet($actt)?$actt:'';
$msg=isSet($msg)?$msg:'';
if($actt=="inval") {
	$msg = "<center><font color='red'>Invalid Credentials</font></center>"; ?>
	<script>
	$(document).ready(function () {
		$('ul > li.sg_in > div.dropdown-access').addClass('open');	
	});
	</script>
<? }
if($actt=="inact") {
	$msg = "<center><font color='red'>Your Account Has Been Inactive </font> </center>"; ?>
<script>
	$(document).ready(function () {
		$('ul > li.sg_in > div.dropdown-access').addClass('open');	
	});
	</script>
<? }
if($actt=="inc_pass") {
	$msg = "<center><font color='red'>Incorrect Password</font></center>"; ?>
	<script>
	$(document).ready(function () {
		$('ul > li.sg_in > div.dropdown-access').addClass('open');	
	});
	</script>
<? }
if($actt=="pwd") {
	//$mail=isset($mail)?$db->escapstr($mail):"";
	$msg = "<center><font color='red'>Password Incorrect</font></center>"; ?>
	<script>
	$(document).ready(function () {
		$('ul > li.sg_in > div.dropdown-access').addClass('open');
		//$(#Email).html('<?=$mail;?>');
	});
	</script>
<? }
$usrid = $db->escapstr($user_id);
$usrRevct = $db->Extract_Single("select count(lawyer_id) from review where lawyer_id='$usrid' and active_status='1'");
?>
            <div class="layer"></div>
            <!-- Mobile menu overlay mask -->
            <!-- Header================================================== -->
            <header>
               <div id="top_line">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 fnt12" style="color:#FFF;"><i class="icon-phone"></i><?=$ctc_num; ?></div>
						<?php
						if(empty($user_id)){
						?>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <ul id="top_links">
                              <li class="sg_in">
                                 <div class="dropdown dropdown-access">
                                    <a href="<? echo $siteurl; ?>/register" class="mr20 fnt12 regi_ster" style="color:#FFF;">Sign Up</a>
									
                                    <a href="<? echo $siteurl; ?>/login" class="dropdown-toggle fnt12" id="access_link" style="color:#FFF;">Sign In</a>									
                                 </div>
                                 <!-- End Dropdown access -->
                              </li>
                           </ul>
                        </div>
						<?php }else if(!empty($user_id)){?>
				
						     <div class="col-md-6 col-sm-6 col-xs-6">
                           <ul id="top_links">
                              <li>
                                 <div class="dropdown dropdown-access">
                                    
                                    <a href="#" style="color:#FFF;" class="dropdown-toggle fnt12 name" data-toggle="dropdown" id="access_link">Hai <?=$userinfo['fname'].' '.$userinfo['lname'];?></a>
                                    <div class="dropdown-menu">
                                       <div class="row">
									       <ul class="aftr_lgn_list">
										  
										      <li><a href="<? echo $siteurl; ?>/profile">My Profile</a></li>
										      <li><a href="<? echo $siteurl; ?>/dashboard">My Dashboard</a></li>
											  
											  
										     
											  <? if($userinfo['user_role']==1) { ?>
											   <li><a href="<? echo $siteurl; ?>/user_reviews">User Reviews (<? echo $usrRevct; ?>)</a></li>
										      <li><a href="<? echo $siteurl; ?>/user-enquires">User Enquires</a></li>
											  <li>
												 <a href="<? echo $siteurl; ?>/logout">Logout</a>
											  </li>
										   <? } ?>
										   <? if($userinfo['user_role']==0) { ?>
										      <li><a href="<? echo $siteurl; ?>/my-enquires">My Enquiry</a></li>
										   <? } ?>
										   
										   </ul>
									   </div>
                                    </div>
                                 </div>
                                 <!-- End Dropdown access -->
                              </li>
                           </ul>
                        </div>
						<?php } ?>						
                     </div>
                     <!-- End row -->
                  </div>
                  <!-- End container-->
               </div>
               <!-- End top line-->
               <div class="container">
                  <div class="row">
                     <div class="col-md-2 col-sm-2 col-xs-2">
                        <div id="logo_home">
                           <h1><a href="<? echo $siteurl; ?>" title="Service" style="    background-image: url(<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>);"><img src=""></a></h1>
                        </div>
                     </div>
                     <nav class="col-md-10 col-sm-10 col-xs-10">
                        <a style="background: #dadada;" class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span><i class="fa fa-bars" aria-hidden="true"></i></a>
                        <div class="main-menu">
                           <div id="header_menu">
                              <img src="<?="$siteurl/admin/uploads/general_setting/$sitelogo";?>" width="180" height="46" alt="City tours" data-retina="true">
                           </div>
                           <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                           <ul>
                              <li class="submenu hidden-lg hidden-md hidden-sm">
                                 <a href="<? echo $siteurl; ?>/login" class="show-submenu">Login </a>
                              </li>
							  
							  <li class="submenu hidden-lg hidden-md hidden-sm">
                                 <a href="<? echo $siteurl; ?>/register" class="show-submenu">Register </a>
                              </li>
							  <li class="submenu hidden-lg hidden-md hidden-sm">
							  <? if(empty($user_id)) { ?>
                                 <a href="<? echo $siteurl; ?>/login" class="show-submenu">Register a Franchisors </a>
							  <? } if(!empty($user_id) && $userinfo["user_role"]==0) { ?>
										<a href="<? echo $siteurl; ?>/company-request" class="show-submenu">Register a Franchisors </a>
							  <? } ?>
                              </li>
							  
							  
							  <li class="submenu">
                                 <a href="<? echo $siteurl; ?>/index" class="show-submenu">Home </a>
                              </li>
                              <li class="submenu">
                                 <a href="<? echo $siteurl; ?>/about" class="show-submenu">About us </a>
                              </li>
                              <li class="submenu">
                                 <a href="<? echo $siteurl; ?>/our_service" class="show-submenu">Our Services </a>
                              </li>
                              <li class="submenu">
                                 <a href="<? echo $siteurl; ?>/list/top" class="show-submenu">Top Franchisors</a>
                              </li>
                              <li class="submenu">
                                 <a href="javascript:void(0);" class="show-submenu"> Franchisors Directory<i class="icon-down-open-mini"></i></a>
                                 
								    <ul style="max-height:300px;overflow:scroll;overflow-x:hidden;">
                                       <?php 
									   $category=$db->get_all("select * from category where active_status='1'");
									   foreach ($category as $cat){
									   ?>
                                       
                                          <li class="name"><a href="<? echo $siteurl; ?>/list/category/<? echo base64_encode($cat['id']); ?>/<? echo reurl($cat['category_name']); ?>"><? echo $cat['category_name']; ?> </a></li>
									   <?php } ?>
                                         
                                       </ul>
                                    
                                 <!-- End menu-wrapper -->
                              </li>
							  <li class="submenu">
                                 <a href="<? echo $siteurl; ?>/contact-us" class="show-submenu">Contact Us</a>
                              </li>
							  
                           </ul>
                        </div>
						
						
						<ul class="lgn_nn pull-right" id="top_tools">
						  <?php
						   if(empty($user_id)){
						   ?>
                              <li class="">
                                 <a href="<? echo $siteurl; ?>/login" class="btn_lgn">Login</a>
                              </li>
                              <li class=" ">
                                 <a href="<? echo $siteurl; ?>/login" class="btn_bcm_lawyer">Register a Company</a>
                              </li>
						   
                           </ul>
                       
                           <ul class="lgn_nn pull-right" id="top_tools">
						   <?php } else{ ?>
						   <? if($userinfo["user_role"]==0) { ?>
                              <li class="">
                                 <a href="<? echo $siteurl; ?>/logout" class="btn_lgn">Logout</a>
                              </li>
							  
							  <li class=" ">
                                 <a href="<? echo $siteurl; ?>/company-request" class="btn_bcm_lawyer">Register a Company</a>
                              </li>							 
                           </ul>
                        
						 <? } ?>
						   <?php } ?>
						
						
                        <!-- End main-menu -->
                     </nav>
                     <nav class="col-md-3 col-sm-3 hidden-xs">
					  
                        
                           
                     </nav>
                  </div>
               </div>
               <!-- container -->
            </header>
            <!-- End Header -->
			
			
			<!-- Modal -->

