<?php
include("../admin/AMframe/config.php");

$gen=$db->singlerec("select * from general_setting where id='1'");
				$fbappid=$db->escapstr($gen['fbappid']);
				$fbkey=$db->escapstr($gen['fbkey']);
				$fbreurl=$db->escapstr($gen['fbreurl']);
				
define('APP_ID',$fbappid);
define('APP_SECRET',$fbkey);
define('REDIRECT_URL',$fbreurl);

require_once('lib/Facebook/FacebookSession.php');
require_once('lib/Facebook/FacebookRequest.php');
require_once('lib/Facebook/FacebookResponse.php');
require_once('lib/Facebook/FacebookSDKException.php');
require_once('lib/Facebook/FacebookRequestException.php');
require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
require_once('lib/Facebook/FacebookAuthorizationException.php');
require_once('lib/Facebook/FacebookAuthorizationException.php');
require_once('lib/Facebook/GraphObject.php');
require_once('lib/Facebook/GraphUser.php');
require_once('lib/Facebook/GraphSessionInfo.php');
require_once('lib/Facebook/Entities/AccessToken.php');
require_once('lib/Facebook/HttpClients/FacebookCurl.php');
require_once('lib/Facebook/HttpClients/FacebookHttpable.php');
require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

//USING NAMESPACES
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl;

FacebookSession::setDefaultApplication(APP_ID,APP_SECRET);
$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);
$sess = $helper->getSessionFromRedirect();

if(isset($error)) {
	header("location:$siteurl/login");
	echo "<script>location.href='$siteurl/login';</script>";
	exit;
}
if(isset($sess)){
	$request  = new FacebookRequest($sess, 'GET', '/me?fields=first_name,last_name,email');
	//fields=name,first_name,last_name,email,link,gender,locale,picture
	$response = $request->execute();
	$graph = $response->getGraphObject(GraphUser::className());
	$fb_fname = $graph->getFirstName();
	$fb_lname = $graph->getLastName();
	$fb_email= $graph->getEmail();
	//echo $fb_fname;exit;
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$row= $db->singlerec("select * from register where email='$fb_email'");
	$email_count=$db->numrows("select * from register where email='$fb_email'");
	$password=base64_encode(rand(0,9999));

	 if($email_count==0){

		$insert=$db->insertid("insert into register(email,fname,lname,password,active_status,crcdt,reg_ip) values ('$fb_email','$fb_fname','$fb_lname','$password','1','$date','$ip')");
	
			$uid=$insert;	
                        $_SESSION['space_userid']=$uid;
			$_SESSION['space_user_role']='0';		
			
                        $GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
                        $username = ucfirst($fb_fname);

			$to_email = $fb_email;
			$fromemail = $from_email;
			$subject  = "Account activation from $sitetitle";
			$text="Click the above button to view the site and you can login with the below credential.<br>";	
			$text .= "Your Email Id: $fb_email<br> Password: $password";			
			$title = "Thanks for joining with us!";
			$url = "$siteurl/login.php?uid=$uid";
			
			$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
			$com_obj->email($fromemail,$to_email,$subject,$message);
			echo "<script>window.location='$siteurl/profile';</script>"; exit;
		
	}else if($email_count>0){

		$uid=$row['id'];
		$user_role = $row['user_role'];
		$_SESSION['space_userid']=$uid;
		$_SESSION['space_user_role']=$user_role;
		echo "<script>window.location='$siteurl/profile';</script>"; exit;
	}
}else{ 
	$url = $helper->getLoginUrl(array('scope' => 'email'));
	header("location:$url");
	echo "<script>location.href='$url';</script>";
	exit;
}