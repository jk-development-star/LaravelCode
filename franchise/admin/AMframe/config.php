<?php
date_default_timezone_set("Asia/Calcutta");
include "framedb.php";
include "global.php";
include "routing.php";
include "dropdownelement.php";
include "images.php";
include "common.php"; 
include "emailtemplate.php"; 
include "resize-class.php";
include "pagination.php";

$db=new database();

$GLOBALS['db']=$db;
$com_obj= new common();
$drop = new dropdown;
$imgobj = new images;
$email_temp = new emailtemplate();


$GetSite = $db->singlerec("select * from general_setting where active_status='1'");

$sitelogo = $GetSite['img'];
$sitetitle = ucwords($GetSite['website_title']);
$sitetitle_main = $sitetitle;
$siteurl = $GetSite['website_url'];
$keyword = $GetSite['commonword'];
$siteemail = $GetSite['admin_email'];
$admin_fee = $GetSite['onepoint'];
$from_email = $siteemail;
$fburl = $GetSite['fburl'];
$twurl = $GetSite['twurl'];
$gpurl = $GetSite['gplusurl'];
$lnurl = $GetSite['linkedinurl'];
$sitelogo = $GetSite['img'];
$sitebanner = $GetSite['home_img'];
$sitepaypalemil = $GetSite['paypal_email'];
$site_currency = $GetSite['currency'];

$siteinfo = array("siteemail"=>$siteemail,"siteurl"=>$siteurl,
					"sitetitle"=>$sitetitle,
					"sitelogo"=>$sitelogo,
					"fburl"=>$fburl,
					"twurl"=>$twurl,
					"gpurl"=>$gpurl,
					"lnurl"=>$lnurl);
					
$date = date("d-m-Y H:i:s");					

function textwatermark($src, $watermark, $save=NULL) { 
	$getext = substr(strrchr($src, '.'), 1);
	$ext = strtolower($getext);
	list($width, $height) = getimagesize($src);
	$image_p = imagecreatetruecolor($width, $height);
	if($ext == "png")
		$image = imagecreatefrompng($src);
	else if($ext == "jpeg" || $ext == "jpg")
		$image = imagecreatefromjpeg($src);
	else if($ext == "gif")
		$image = imagecreatefromgif($src);
	
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
	$txtcolor = imagecolorallocate($image_p, 255, 255, 255);
	$font = 'monofont.ttf';
	$font_size = 14;
	imagettftext($image_p, $font_size, 0, 50, 150, $txtcolor, $font, $watermark);
	if ($save<>'') {
		imagejpeg ($image_p, $save, 100); 
	}
	else {
		header('Content-Type: image/jpeg');
		imagejpeg($image_p, null, 100);
	}
	imagedestroy($image); 
	imagedestroy($image_p); 
}

function currency($from_Currency, $to_Currency, $amount) {
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt ($ch, CURLOPT_USERAGENT,
                 "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
	
    $data = explode('bld>', $rawdata);
    $data = explode($to_Currency, $data[1]);
    return round($data[0], 2);
}

function getCountry($id){
	GLOBAL $db;
	$country = $db->singlerec("select country_name from country where country_id='$id'");
	return $country[0];
}

function getState($id){
	GLOBAL $db;
	$state = $db->singlerec("select state_name from state where state_id='$id'");
	return $state[0];
}

function getCategory($id){
	GLOBAL $db;
	$category = $db->singlerec("select category_name from category where id='$id'");
	return $category[0];
}
function getCity($id){
	GLOBAL $db;
	$city = $db->singlerec("select city_name from city where city_id='$id'");
	return $city[0];
}

function checkLength($str,$len){
	$strs = (strlen($str)>$len)?substr($str,0,$len).'...':$str;
	return $strs;
}

function isApproved($user_id){
	GLOBAL $db;
	$approve_status = $db->singlerec("select approve_status from register where id='$user_id'");
	return (int)$approve_status[0];
}

function userInfo($id,$col){
	GLOBAL $db;
	$user = $db->singlerec("select $col from register where id='$id'");
	return $user[0];
}

function ctcEmail($id,$col){
	GLOBAL $db;
	$user = $db->singlerec("select $col from user_contact_us where id='$id'");
	return $user[0];
}

function getStar($n){
 $str="";
 if($n!==0){
  for($i=1;$i<=5;$i++){
   if($i <= $n)
   {
    $str.= "<i class='icon-star voted'></i>"; 
   }
   else
   {
   $str.= "<i class='icon-star'></i></i>";}
  }
  $str.=" &nbsp;<b>($n.0)</b>";
 }else{
  $str = "Not rated yet"; 
 }
 return $str;
}

function get_Rate($id){
 GLOBAL $db;
 $ratesum = $db->Extract_Single("select sum(stars) from review where lawyer_id='$id' and active_status='1'");  
 $ratecount = $db->Extract_Single("select count(stars) from review where lawyer_id='$id' and active_status='1'");  
 if($ratecount!=0){
  $actual_rate = ($ratesum/$ratecount); 
 }else{
  $actual_rate = 0;
 } 
 $actual_rate = number_format($actual_rate, 1, '.', '');
 
 $str="";
 $n=(int)$actual_rate;
 if($n!==0){
  for($i=1;$i<=5;$i++){
   if($i<=$n)
    $str.= "<i class='fa fa-star voted'></i>&nbsp;"; 
   else
    $str.= "<i class='fa fa-star'></i>&nbsp;";
  } 
  $str.=" &nbsp;<b>($actual_rate)</b>";
 }
 else{
  /* $str = "<i class='icon-star'></i>
  <i class='icon-star'></i>
  <i class='icon-star'></i>
  <i class='icon-star'></i>
  <i class='icon-star'></i>";  */
  $str = "<span style='color:#4285f4';>Not Rated Yet</span>"; 
 }
 
 return $str;
}

function overall_Rate($id){
 GLOBAL $db;
 
 $ratesum = $db->Extract_Single("select sum(stars) from review where lawyer_id='$id' and active_status='1'");  
 $ratecount = $db->Extract_Single("select count(stars) from review where lawyer_id='$id' and active_status='1'");   
 if($ratecount!=0){
  $actual_rate = ($ratesum/$ratecount); 
 }else{
  $actual_rate = 0;
 } 
 $actual_rate = number_format($actual_rate, 1, '.', '');
 
 $str="";
 $n=(int)$actual_rate;
 $str = $n;
 
 return $str;
}
function reurl($lawyer) {
	$result = strtolower($lawyer);
	$res = str_replace(' ','-',$result);
	return $res;
}

function ss_start(){
	$checkUrl = substr($_SERVER['HTTP_HOST'],0,9);
	if($checkUrl!='192.168.1' && $checkUrl!='localhost'){
	//session_save_path("/home/socialcomm/tmp");
	//ini_set('session.gc_probability',1);
	}
	@session_start();
}
ss_start();
ob_start();

$DCrncy="$";

?>