<?php
require 'PHPMailerAutoload.php';

class common extends database {
	public $img_Name;
	
	function drop_down($array,$getval,$getname){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<input type='radio' id='$getname' name='$getname' value='$astrn' checked>$array[$astrn] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			else	
				$list .= " <input type='radio' id='$getname' name='$getname' value='$astrn'>$array[$astrn]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		return $list;
	}
	//========================================================================	
	function dropdown($array,$getval,$getname){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	//========================================================================	
	function dropdownval($array,$getval){
		$list = "";
		for($astrn=0; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	//========================================================================	
	function dropdown_support($array,$getval){
		$list = "<option value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn==1){$astr=1;}else if($astrn==2){$astr=7;}else if($astrn==3){$astr=10;}
			if($astr == $getval)
				$list .= "<option value='$astr' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astr'>$array[$astrn]</option>";
		}
		return $list;
	}
	function dropdown_array_view($array,$getval){
		$ret = $array[$getval];
		return $ret;
	}
	//========================================================================	
	function drop_down_view($array,$getval){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= $array[$astrn];
		}
		return $list;
	}
	
	function email($from,$to,$subject,$msg){
		$from="no-reply@smsemailmarketing.in";
		$mail = new PHPMailer;	
		$mail->IsSMTP();                           
		$mail->SMTPDebug = false;
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'trailblazer.websitewelcome.com';  
		$mail->Port = 465;  
		$mail->IsHTML(true);     
		$mail->Username = $from;         
		$mail->Password = 'dD}O-RnM#7]K';                         
		$mail->setFrom($from, 'Franchise - Location Search');      
		$mail->Subject = $subject;
		$mail->Body    = $msg;
		$mail->addAddress($to, 'User');   
		
		if(!$mail->send()) {
			$ret = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$ret = "scs";
		}
		return $ret;
	}
	
	function encrypt($text,$key){
	
	}
	
	function singup_mail($from,$to,$url){
		$subject = "Confirm your account for V6Asia";
		$message ="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@v6asia.com </td> </tr> </table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'><tr><td align='center' valign='top' class='textContent'> <a href='http://www.v6asia.com/' target='_blank'> <img src='http://www.v6asia.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'><tr><td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>To activate, click below link. If you believe this is an error, ignore this message and we'll never bother you again.</td></tr> <tr><td align='center' valign='top' class='textContent' style='padding-top: 30px;' ><a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px; background: #F79118; border-radius: 30px;' href='$url' target='_blank'>Click here</a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999;'> <table width='200' border='0' cellspacing='2' cellpadding='0'> <tr> <td><a href='www.facebook.com' target='_blank'><img src='http://www.v6asia.com/images/social/facebook.png' width='32'></a></td> <td><a href='https://twitter.com' target='_blank'><img src='http://www.v6asia.com/images/social/twitter.png' width='32'></a></td> <td><a href='https://plus.google.com/' target='_blank'><img src='http://www.v6asia.com/images/social/google-plus.png' width='32'></a></td> <td><a href='https://www.linkedin.com/' target='_blank'><img src='http://www.v6asia.com/images/social/linkedin.png' width='32'></a></td> </tr> </table> </td> </tr> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.v6asia.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td></tr><!-- // MODULE ROW --> </table> </center> </body>";
		$headers .='Reply-To: '. $to . "\r\n" ;
		$headers .='X-Mailer: PHP/' . phpversion();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		
		@mail($to, $subject, $message, $headers);
	}
	
	function randuniq($id){
		$str='';
		$str.=substr(str_shuffle("01234123456789123489abcdeefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$str.=$id;
		$str.=substr(rand(0,time()),-4);
		return $str;
	}
	
	function dtdiff($d1){
		$d1 = strtotime($d1);
		$d2 = time();
		$mindiff = round(($d2-$d1)/60);
		$hourdiff = round(($d2-$d1)/(60*60));
		$daydiff = round(($d2-$d1)/(60*60*24));
		
		//singular
		 if($mindiff==1){
			return 	'1 minute ago';
		}else if($hourdiff==1){
			return 	'1 hour ago';
		}else if($daydiff==1){
			return 	'1 day ago';	
		}else if(round($daydiff/7)==1){
			return 	'1 week ago';	
		}else if(round($daydiff/30)==1){
			return 	'1 month ago';	
		}else if(round($daydiff/365)==1){
			return 	'1 year ago';	
		}
		//flural
		if($mindiff == 0){
			return 	'just now';	
		}else if($mindiff<60){
			return 	$mindiff.' minutes ago';
		}else if($hourdiff<24){
			return 	$hourdiff.' hours ago';	
		}else if($daydiff<7){
			return 	$daydiff.' days ago';	
		}else if($daydiff<31){
			return 	round($daydiff/7).' weeks ago';	
		}else if($daydiff<365){
			return 	round($daydiff/30).' months ago';	
		}else if($daydiff>365){
			return 	round($daydiff/365).' years ago';	
		}
	}
	
	function upload_image($name1,$name2,$width,$height,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_files($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'pdf' ) {
				$this->img_Err="Mismatch file format,Please select PDF file format only";
				return false;
			}
			else if($size>2000000) {
				$this->img_Err="File size exceeded";
				return false;
			}
			/* else if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Image must be greater than or equal to $width x $height pixels";
				return false;
			} */
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				/* if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    } */
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_video($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'mp4' && $ext != 'avi' && $ext != 'flv' && $ext != 'wmv' && $ext != 'm4v' && $ext != 'amv' && $ext != 'mng') {
				$this->img_Err="Mismatch video file format";
				return false;
			}
			//25 MB
			else if($size>26246026 ) {
				$this->img_Err="Video file size exceeded";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	
	function upload_logo($name1,$name2,$width,$height,$r1,$r2,$path){
				
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($size>1048576){
				$this->img_Err="File size exceeded";
				return false;
			}
			if($image_width<$width || $image_height<$height){ 
				$this->img_Err="Too small";
				return false;
			}
			if(($image_width*$r2)!=($image_height*$r1)){ 
				$this->img_Err="Miss match aspect ratio";
				return false;
			}
			
			if($ext == 'png')
			{
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				if($image_width!=$width && $image_height!=$height){
					$resizeObj = new resize($img_size);
					$resizeObj -> resizeImage($width, $height, 'exact');
					$resizeObj -> saveImage($img_size, 72);
			    }
				
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
			else{
				$this->img_Err="Missmatch file format";
				return false;
			}
		}else{
				$this->img_Err="Image missing";
				return false;
		}
	}
	
	function profileid($id){
		$strv=str_shuffle("01234123456789123489");
		$stlen=strlen($id);
		if($stlen==1)
			$ret=substr($strv, 0, 5);
		else if($stlen==2)
			$ret=substr($strv, 0, 4);
		else if($stlen==3)
			$ret=substr($strv, 0, 3);
		else if($stlen==4)
			$ret=substr($strv, 0, 2);
		else if($stlen==5)
			$ret=substr($strv, 0, 1);
		else
			$ret=$id;
		
		$str="V6".$id.$ret;
		return $str;
	}
	
	function review_count($crs_id) {
		$getcount=database::singlerec("select count(*) as tot from review where course_id='$crs_id'");
		$count=$getcount['tot'];
		return (int)$count;
	}
	
	function following($user_id){
		$getFollowcount=database::singlerec("select count(*) as total from follows where from_id='$user_id'");
		$followcount=$getFollowcount['total'];
		return (int)$followcount;
	}
	
	function followers($user_id){
		$getcount=database::singlerec("select count(*) as total from follows where to_id='$user_id'");
		$followcount=$getcount['total'];
		return (int)$followcount;
	}
	
	function buy_count($buy_id){
		$buycount=database::singlerec("select count(*) as total from checkout where course_id='$buy_id' and pay_status='1'");
		$count=$buycount['total'];
		return (int)$count;
	}
	
	function rating_count($rate_id){
		$ratecount=database::singlerec("select sum(rating)as tot, count(*) as ratetot from review where course_id='$rate_id'");
		$sum=(int)$ratecount['tot'];
		$count=(int)$ratecount['ratetot'];
		if($count==0){
			echo "0 average based on $count rating";
		}
		else{
			$avg=$sum/$count;
			echo " $avg average based on $count ratings";
		}
		
	}
	
	function percentage($per){
		$percents=database::singlerec("select sum(rating)as tot, count(*) as ratetot from review where course_id='$per'");
		$sum=(int)$percents['tot'];
		$count=(int)$percents['ratetot'];
		if($count==0){
			$star=(($count/5)*100);
			echo "$star";
		}
		else{
			$avg=$sum/$count;
			$star=(($avg/5)*100);
			echo " $star";
		}
	}
	
	
	function star_percentage($course_id,$rating){
		$starper=database::singlerec("select sum(rating)as rate,count(*) as count from review where course_id='$course_id' and rating=$rating");
		$totstar=database::singlerec("select count(*) as count from review where course_id='$course_id'");
		$sum=(int)$starper['rate'];
		$count=(int)$starper['count'];
		$tot=$totstar['count']*5;
		$percent=($sum/$tot)*100;
		return $percent;
		
	}
	function star_count($course_id,$rating){
		$starcount=database::singlerec("select count(*) as counts from review where course_id='$course_id' and rating='$rating'");
		$count=$starcount['counts'];
		return (int)$count;
		
	}
	function course($cid){
		$courses=database::singlerec("select count(*)as total from course where user_id='$cid'");
		$count=$courses['total'];
		return (int)$count;
	}
	
	function review_rating($pid){
		$crsid=database::get_all("select * from course where user_id='$pid'");
		$cn=0;
		foreach($crsid as $crs){
			$crid=$crs['id']; 
			$reviews=database::singlerec("select count(*)as tat from review where course_id='$crid'");
			$count=$reviews['tat'];
			$cn=$cn + $count;
		}
		return (int)$cn;
	}
	
	function review_star($sid){
		$starid=database::get_all("select id from course where user_id='$sid'");
		$suminit=0;
		$cinit=0;
		$starinit=0;
		foreach($starid as $str){
			$stid=$str['id'];
			$restar=database::singlerec("select sum(rating)as rate,count(*)as tar from review where course_id='$stid'");
			$sums=(int)$restar['rate'];
			$countt=(int)$restar['tar'];
			$suminit=$suminit+$sums;
			$cinit=$cinit+$countt;
			if(!empty($suminit) && !empty($cinit)) {
				$avg=$suminit/$cinit;
				$star=(($avg/5)*100);
				$starinit=$starinit+$star;
			}
		}
		$percent=$starinit/count($starid);
		return (int)$percent;
	}
	
	function buy_student($user_id){
		$pstd=database::get_all("select id from course where user_id ='$user_id'");
		$bn=0;
		foreach($pstd as $std){
			$stdid=$std['id'];
			$paystud=database::singlerec("select count(*) as stud from checkout where course_id='$stdid' and pay_status='1'");
			$scount=$paystud['stud'];
			$bn=$bn + $scount;
		}
		return (int)$bn;
	}
	
	function total_revenue($user_id){
		$revenue=database::singlerec("select sum(a.price)as sum from course as a inner join checkout as b on a.id=b.course_id where a.user_id='$user_id' and pay_status='1'");
		$count=$revenue['sum'];
		return (int)$count;
	}
	function limit_text($str, $limit) {
		if(strlen($str)>$limit) $str=substr($str,0,$limit).'...';
		return $str;
	}
	/*created on 27/10/2017 */
	function getExpdiv($divIds){
		$divIds = explode(",",$divIds);
		$div = "";
		foreach ($divIds as $divId){
			$div_name = database::singlerec("select category_name from category where id='$divId'");
			$div_name=$div_name['category_name'];
			$div.=ucfirst($div_name).', ';
		}	
		return trim($div,', ');
	}
	/*created on 30/10/2017 */
	function upload_id_proof($name1,$name2,$path,$acn){		
		$acn = isset($acn)?$acn:'new';
		$fpath = $_FILES[$name1]['tmp_name'];
		if(!empty($fpath)){
			$fpath = $_FILES[$name1]['tmp_name'] ;
			$fname = $_FILES[$name1]['name'];
			$image_info = getimagesize($_FILES[$name1]["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];
			
			$size=filesize($_FILES[$name1]['tmp_name']);
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			
			if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif' && $ext != 'bmp' && $ext != 'pdf') {
				$this->img_Err="Mismatch file format";
				return false;
			}
			else if($size>1048576) {
				$this->img_Err="File size exceeded";
				return false;
			}
			else {
				$NgImg = "$name2.$ext";
				$img_size = "$path/$NgImg";
				
				move_uploaded_file($fpath,$img_size);
			
				$this->img_Name="$NgImg";
				$this->img_Err="ok";
				
				return true;
			}
		}
		else{
			$this->img_Err="Image missing";
			return false;
		}
	}
	/*created on 01/11/2017 */
	function getReptrim($string) {
		$string = str_replace(',,', ',', $string);
		$string = trim($string,',');
		return ucfirst($string);
	}

}
?>