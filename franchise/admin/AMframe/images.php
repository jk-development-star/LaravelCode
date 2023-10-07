<?php
class images extends database{
	
	public function image_verify($Img_Ext){
		if($_FILES['photo_1']['tmp_name'] != "" && $_FILES['photo_1']['tmp_name'] != "null") {
			$fpath = $_FILES['photo_1']['tmp_name'] ;
			$fname = $_FILES['photo_1']['name'] ;
			$getext = substr(strrchr($fname, '.'), 1);
			$Img_Ext = strtolower($getext); 
		}
		if($Img_Ext == "jpg" || $Img_Ext == "jpeg" || $Img_Ext == "gif" || $Img_Ext == "png" || $Img_Ext == ''){
			$ret = 1;
		}
		else{
			$ret = 0;
		}
		return $ret;
	}
	public function image_upload($photo,$field,$desi,$qry,$auto_id){ 
		if($_FILES[$field]['tmp_name'] != "" || $_FILES[$field]['tmp_name'] != "null") {
			$fpath = $_FILES[$field]['tmp_name'] ;
			$fname = $_FILES[$field]['name'] ;
			$getext = substr(strrchr($fname, '.'), 1);
			$ext = strtolower($getext);
			$NgImg= $photo.$auto_id.".".$ext;
			$set_img = " $field = '$NgImg'" ;
			$des = "$desi/$NgImg";
			$qry = $qry.$set_img." where id='$auto_id'";
			if($ext !=""){
				move_uploaded_file($fpath,$des) ;
				chmod($des,0777);
				database::insertrec("$qry");
			}
		}
	}
	public function image_remove($imgval,$desi){
		
		if($imgval !="noimage.jpg"){
			$RemoveImage = "$desi/$imgval";
			@unlink($RemoveImage);
		}
		return;
	}
}	
?>