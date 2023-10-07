<?
session_save_path("/home/socialcomm/tmp");
ini_set('session.gc_probability',1);
session_start();
setcookie("HmAcc","",0,"/");
@session_destroy();
echo "<script>location.href='index.php'</script>";
?>