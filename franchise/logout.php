<?php
include "admin/AMframe/config.php";
$user_id=isset($_SESSION['space_userid'])?$_SESSION['space_userid']:'';
if(!empty($user_id)){
	$ip=$_SERVER['REMOTE_ADDR'];
	$logdate=time();
	$log=$db->insertrec("UPDATE register SET logout_ip_addr='$ip',last_logout_date='$logdate' WHERE id='$user_id'");
	unset($_SESSION['space_userid']);
	unset($_SESSION['space_user_role']);
	session_destroy();
}
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
	?>