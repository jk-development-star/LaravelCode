<? include "AMframe/config.php";

	$old_pass=md5($val);
	$pass_db=$db->singlerec("select password from admin where id='1'");
    if($pass_db["password"]!=$old_pass)
	echo "1";
	else
	echo "0";
	
?>

