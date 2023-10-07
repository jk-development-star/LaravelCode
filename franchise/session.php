<?
include "admin/AMframe/config.php";

$lyrid=isSet($lyrid)?$lyrid:'';
$bknw_lyrid=isSet($bknw_lyrid)?$bknw_lyrid:'';

if(isset($loginsubmit)|| isset($dlogin)){

if(isset($dlogin)){
        $email=base64_decode($username);
        $password=base64_decode($password);
} else {
	
	$email = addslashes(trim($email));
	$password=addslashes(trim($password));}
	$lyrid = $db->escapstr($lyrid);
	
	$crcdt =date("Y-m-d");
	$ip=$_SERVER['REMOTE_ADDR'];
	$result=$db->singlerec("select * from register where email='$email'");
	$id = $result['id'];
	$user_role = $result['user_role'];
	$activestatus = $result['active_status'];
	$db_pass = $result['password'];
	if(empty($id)){
		echo "<script>location.href='$siteurl/login/?act=inval';</script>";
		header("location:$siteurl/login/?act=inval");
		exit;
	}
	else {
		if($activestatus == 0){
			echo "<script>location.href='$siteurl/login/?act=inact';</script>";
			header("location:$siteurl/login/?act=inact");
			exit;
		}
		else if(($activestatus != 0) && ($password!=$db_pass)){
			echo "<script>location.href='$siteurl/login/?act=inc_pass';</script>";
			header("location:$siteurl/login/?act=inc_pass");
			exit;
		}
		else {
			$_SESSION['space_userid']=$id;
			$_SESSION['space_user_role']=$user_role;

			$set = "last_login_date='$crcdt'";
			$set .= ",login_ip_addr='$ip'";
			
			$db->insertrec("update register set $set where id ='$id'");
			
			if($lyrid!="" && $_SESSION['space_userid']!=$lyrid) {
				$fname = reurl(userInfo($lyrid,'fname'));
				$title = reurl(userInfo($lyrid,'title'));
				$lyrid = base64_encode($lyrid);
				
				echo "<script>location.href='$siteurl/detail/$lyrid/$fname/$title/?bkn';</script>";
				header("Location:$siteurl/detail/$lyrid/$fname/$title/?bkn");
				exit;
			}
			else {
				echo "<script>location.href='$siteurl/profile';</script>";
				header("Location:$siteurl/profile");
				exit;
			}			
		}
	}
}	
?>