<? include "admin/AMframe/config.php";
	
	if(isset($reg_email)) {
		$old_reg_email=$reg_email;
		
		$reg_emailct=$db->check1column('register','email',$old_reg_email);
		if($reg_emailct==0)
			echo "0";
		else
			echo "1";
	}
	
	if(isset($email) && isset($password)) {
		$reg_email = $email;
		$reg_password = $password;
			
		$lgin_det=$db->singlerec("select password,active_status from register where email='$reg_email'");
		if($lgin_det!=0 && $lgin_det["active_status"]==1) {
			if($reg_password!=$lgin_det["password"])
				echo "0";
			else
				echo "1";
		}	
		else if($lgin_det!=0 && $lgin_det["active_status"]==0)
			echo "2";
	}
?>

