<? 
	include "admin/AMframe/config.php";
	
	if((isset($a)) && ($a!="") && ($_SESSION["code"]!=$a))
	{
		echo 0;	
	} else {
		echo 1;
	}	
?>