<?php
//@session_start(); //session start
require_once ('../admin/AMframe/config.php');
require_once ('libraries/Google/autoload.php');

$gen=$db->singlerec("select * from general_setting where id='1'");
				$gappid=$db->escapstr($gen['gappid']);
				$gkey=$db->escapstr($gen['gkey']);
				$greurl=$db->escapstr($gen['greurl']);

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = $gappid;
$client_secret = $gkey;
$redirect_uri = $greurl;


//incase of logout request, just unset the session var
if (isset($logout)) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

//$client->setScopes(array("https://www.googleapis.com/auth/plus.me https://www.googleapis.com/auth/moderator"));
//$client->setScopes(array("https://www.googleapis.com/auth/plus.profile.emails.read"));

//https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.email //https://www.googleapis.com/auth/plus.profile.emails.read https://www.googleapis.com/auth/userinfo.profile

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($code)) {

  $client->authenticate($code);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
//echo '<div style="margin:20px">';
if (isset($authUrl)){ 
	header("location:$authUrl");
	echo "<script>location.href='$authUrl';</script>";
	exit;
} else {
	$user = $service->userinfo->get(); //get user info 
	$g_name=$user->name;
	$g_email=$user->email;
	//echo "Name : $g_name <br>";
//	echo "Email :$g_email <br>";exit;
	$date=date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	//check if user exist in database using COUNT
	$row= $db->singlerec("select * from register where email='$g_email'");
	$email_count=$db->numrows("select * from register where email='$g_email'");
	$password=base64_encode(rand(0,9999));

	 if($email_count==0){

	 		$insert=$db->insertid("insert into register(email,fname,password,active_status,crcdt,reg_ip) values ('$g_email','$g_name','$password','1','$date','$ip')");
	 		
			$uid=$insert;	
			$_SESSION['space_userid']=$uid;
			$_SESSION['space_user_role']='0';
			
                        $GetContact = $db->singlerec("select ctc_num from cms where id='1'");
			$contact_num = $GetContact['ctc_num'];
                        $username = ucfirst($g_name);

			$to_email = $g_email;
			$fromemail = $from_email;
			$subject  = "Account activation from $sitetitle";
			$text="Click the above button to view the site and you can login with the below credential.<br>";	
			$text .= "Your Email Id: $g_email<br> Password: $password";			
			$title = "Thanks for joining with us!";
			$url = "$siteurl/login/?uid=$uid";
			
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

}


?>

