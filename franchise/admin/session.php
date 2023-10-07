<?
include "./AMframe/config.php";

if(isset($submit)
|| isset($dlogin))
{
if(isset($dlogin)){
        $username=base64_decode($username);
        $pass=base64_decode($password);
        $password=md5($pass);
        $ctadby =1;
} else {
				$username = addslashes(ltrim($username));	
				$password = addslashes(ltrim(md5($pass))); }
				$Ip_Address = $_SERVER['REMOTE_ADDR'];
				 
				if($username !=''){ 
					if($password !=''){ 
						if($ctadby == 1){
							$time = time();
							$Query = "select count( * ) as total,user_auto_id,name from gen_user_mst where username='$username' and password='$password' and ref_password='$pass' and active_status='1' and resign_status='1'" ;
							$ExitRec = $db->singlerec($Query);
							$EhkExit = $ExitRec['total']; 
							$idval = $ExitRec['user_auto_id'];
							$usrName = $ExitRec['name'];
							$Adminusrtype_id = $idval;
							$Admin = '';
							$current_status  = "login_time_stamp = '$time'";
							$current_status  .= ",sesstime_stamp = '$time'";
							$current_status  .= ",ip_address = '$Ip_Address'";
							//$current_status  .= ",login_devices = '$Devices'";
							$current_status  .= ",current_status = '1'";
							$db->insertrec("update gen_user_mst set $current_status where user_auto_id ='$idval'");
							if($username == "admin"){
								$Query = "select count( * ) as total,id,ref_password from admin where username='$username' and password='$password'";
								$ExitRec = $db->singlerec($Query);
								$EhkExit = $ExitRec['total'];
								$idval = $ExitRec['id'];
								$refpass = $ExitRec['ref_password'];
								$Admin = "Admin";
								$Adminusrtype_id = $ExitRec['id'];
								$db->insertrec("update admin set sesstime_stamp='$time' where id ='$idval'");
							}
						}
						if(($EhkExit == 1) && ($pass == $refpass)){
							setcookie("HmAcc",8768767,0,"/");
							$_SESSION['vyadmlog'] = $idval . $ctadby;
							$_SESSION['vyusrlog'] = $idval ;
							$_SESSION['Admin_name'] = $Admin ;
							$_SESSION['usrName'] = $usrName ;
							$_SESSION['Adminusrtype_id'] = $Adminusrtype_id ; 
						if($ctadby == 1){
							header("location:welcome.php");
							exit;
							}
						}
						else
							header("location:login.php?act=inval");
							exit;
					}
					else
						header("location:login.php?act=err_psw");
						exit;
				}
				else
					header("location:login.php?act=err_user");
					exit; 
			}
?>