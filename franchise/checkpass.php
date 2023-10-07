<? include "admin/AMframe/config.php";
	
	if(isset($pass) && isset($uid)) {
		$old_pass = $pass;
		$id = $db->escapstr($uid);
		$pass_db = userInfo($id,'password');
		if($pass_db!=$old_pass)
		echo "1";
		else
		echo "0";
	}
	
	if(isset($bId) && !empty($bId)) {
		$bId = $db->escapstr($bId);
		
		$count = $db->singlerec("select click_count from banner where ban_id='$bId'");
		echo $click_ct = $count["click_count"]+1;
		$set = "click_count='$click_ct'";
		$db->insertrec("update banner set $set where ban_id='$bId'");
	}
?>

