<?php include "header.php"; 
require_once "leftmenu.php";
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '';
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;

if($act ==  "del" && $nimg != "") {
    $RemoveImage = "uploads/general_setting/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update general_setting set img='noimage.jpg' where id='$id'");
	echo "<script>location.href='general_settingupd.php?upd=2&msg=nimgscs&id=$id'</script>";
    header("Location:general_settingupd.php?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}

if(isset($g_submit)){
    $crcdt = time();
	$website_title = $db->escapstr($website_title);
	$website_keyword = $db->escapstr($website_keyword);
	$website_url = $db->escapstr($website_url);
	$admin_address=isset($admin_add)?$db->escapstr($admin_add):'';
	$admin_email = $db->escapstr($admin_email);
	$paypal_email = $db->escapstr($paypal_email);
	$currency = $db->escapstr($currency);
	$fburl = isset($fb_url)?$db->escapstr($fb_url):'';
	$twurl = isset($tw_url)?$db->escapstr($tw_url):'';
	$linkedinurl = $db->escapstr($linkedinurl);
	$gplusurl = $db->escapstr($gplusurl);
	$fbappid = $db->escapstr($fbappid);
	$fbkey = $db->escapstr($fbkey);
	$fbreurl = $db->escapstr($fbreurl);
	$commonword = $db->escapstr($commonword);

	if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name'] != "null"){
		$fpath = $_FILES['Img']['tmp_name'] ;
		$fname = $_FILES['Img']['name'] ;
		$getext = substr(strrchr($fname, '.'), 1);
		$ImgExt = strtolower($getext); 
	}
	if($ImgExt=="jpg" || $ImgExt == "jpeg" || $ImgExt == "gif" || $ImgExt == "png" || $ImgExt == ''){	
		$set  = "website_title = '$website_title'";
		$set .= ",website_keyword = '$website_keyword'";
		$set .= ",website_url = '$website_url'";
		$set .= ",admin_address = '$admin_address'";
		$set .= ",admin_email = '$admin_email'";
		$set .= ",paypal_email = '$paypal_email'";
		$set .= ",currency = '$currency'";
		$set .= ",fburl = '$fburl'";
		$set .= ",twurl = '$twurl'";
		$set .= ",linkedinurl = '$linkedinurl'";
		$set .= ",fbappid = '$fbappid'";
		$set .= ",fbkey = '$fbkey'";
		$set .= ",fbreurl = '$fbreurl'";
		$set .= ",gappid = '$gappid'";
		$set .= ",gkey = '$gkey'";
		$set .= ",greurl = '$greurl'";
		$set .= ",gplusurl = '$gplusurl'";
		$set .= ",ipaddr = '$ipaddress'";		
		$set .= ",chngdt = '$crcdt'";  
        $set .= ",commonword = '$commonword'";		
		$set .= ",userchng = '$usrcre_name'";
		$db->insertid("update general_setting set $set where id='1'");
		if($_FILES['Img']['tmp_name'] != "" && $_FILES['Img']['tmp_name']!="null"){
			$fpath = $_FILES['Img']['tmp_name'];
			$fname = $_FILES['Img']['name'];
			$getext = substr(strrchr($fname,'.'),1);
			$ext = strtolower($getext);
			$NgImg= "logo".".".$ext;
			$set_img = "img = '$NgImg'";
			$des = "uploads/general_setting/$NgImg";
			move_uploaded_file($fpath,$des);
			chmod($des,0777);
			$db->insertrec("update general_setting set $set_img where id='1'");
		}		
		if($_FILES['banner_img']['tmp_name'] != "" && $_FILES['banner_img']['tmp_name']!="null"){
			$fpath = $_FILES['banner_img']['tmp_name'];
			$fname = $_FILES['banner_img']['name'];
			$getext = substr(strrchr($fname,'.'),1);
			$ext = strtolower($getext);
			$NgImg= "banner_img".".".$ext;
			$set_img = "home_img = '$NgImg'";
			$des = "../img/$NgImg";
			move_uploaded_file($fpath,$des);
			chmod($des,0777);
			$db->insertrec("update general_setting set $set_img where id='1'");
		}
		echo "<script>location.href='general_settingupd.php?act=upd'</script>";
		header("location:general_settingupd.php?act=upd");
		exit;
	}	
	else{
		$Message = "<font color='red'>kindly upload jpg,gif,png image format only</font>";
	}
}
	
$GetRecord = $db->singlerec("select * from general_setting where id='1'");
@extract($GetRecord);
$website_title = stripslashes($website_title);
$website_keyword = stripslashes($website_keyword);
$website_url = stripslashes($website_url);
$admin_email = stripslashes($admin_email);
$paypal_email = stripslashes($paypal_email);
//code for images 
if($img == "noimage.jpg") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '';
    }
else if($img != "") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '<a href="general_settingupd.php?act=del&nimg='.$img.'&id='.$id.'" class="del_link">Delete</a>';
}

if($home_img == "noimage.jpg") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '';
    }
else if($home_img != "") {
    $ShowOldImg = "";
	$DisplayDeleteImgLink = '<a href="general_settingupd.php?act=del&nimg='.$home_img.'&id='.$id.'" class="del_link">Delete</a>';
}

if($act=="upd") {
	$Message = "<font color='green'><b>Updated Successfully</b></font>" ;
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Site Settings</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				   <h3 class="panel-title"><?echo $Message;?></h3>
	                <h4 class="card-title">General settings</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
				
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               
					 
					<form method="post" action="general_settingupd.php" enctype="multipart/form-data" class="form-horizontal">
					
						
						  <div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Website Title <font color="red">*</font></label>
						<div class="col-sm-12">
						<input type="text" class="form-control" name="website_title" value="<? echo $website_title; ?>" placeholder="Enter Title" required>
					   </div>
					   </div>
					
					  <div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Website Keywords <font color="red">*</font></label>
						<div class="col-sm-12"><textarea name="website_keyword" class="form-control tiny" rows="4" cols="45"><? echo $website_keyword; ?></textarea></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label" >Website Url <font color="red">*</font></label>
						<div class="col-sm-12"><input type="text" class="form-control" name="website_url" value="<? echo $website_url; ?>" placeholder="Enter Url" required></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Search keyword</label>
						<div class="col-sm-12"><input name="commonword" class="form-control" value="<?echo $commonword;?>" placeholder="Search Keyword"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Admin Address<font color="red">*</font></label>
						<div class="col-sm-12"><textarea class="form-control tiny" name="admin_add"> <?=$admin_address;?></textarea></td>
					</div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Admin Email<font color="red">*</font></label>
						<div class="col-sm-12"><input type="email" class="form-control" name="admin_email" value="<?=$admin_email; ?>" placeholder="Enter Email" required></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Paypal Email<font color="red">*</font></label>
						<div class="col-sm-12"><input type="email" class="form-control" name="paypal_email" value="<? echo $paypal_email; ?>" placeholder="Enter Title" required></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Currency Symbol<font color="red">*</font></label>
						<div class="col-sm-12"><input type="text" class="form-control" name="currency" value="<? echo $currency; ?>" placeholder="Enter Title" required></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Facebook</label>
						<div class="col-sm-12"><input name="fb_url" class="form-control" value="<?echo $fburl;?>" placeholder="Facebook Link"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Twitter</label>
						<div class="col-sm-12"><input name="tw_url" class="form-control" value="<?echo $twurl;?>" placeholder="Twitter Link"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Linked In</label>
						<div class="col-sm-12"><input name="linkedinurl" class="form-control" value="<?echo $linkedinurl;?>" placeholder="Linked In Link"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Google Plus</label>
						<div class="col-sm-12"><input name="gplusurl" class="form-control" value="<?echo $gplusurl;?>" placeholder="Facebook Link"></div>
					</div>
					
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Website Logo</label>
						<div class="col-sm-12"><img src="uploads/general_setting/<? echo $img; ?>" alt="lawyersearch" width="268px" height="50px"><br>
						<? echo $DisplayDeleteImgLink; ?>
						<input name="Img" type="file" class="form-control">
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">Banner Image</label>
						<div class="col-sm-12"><img src="../img/<? echo $home_img; ?>" alt="lawyersearch" width="268px" height="50px"><br>
						<? echo $DisplayDeleteImgLink; ?>
						<input name="banner_img" type="file" class="form-control">
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">FB login App id</label>
						<div class="col-sm-12"><input name="fbappid" class="form-control" value="<?echo $fbappid;?>" placeholder="Facebook Login App Id"></div>
						
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">FB login secret Key</label>
						<div class="col-sm-12"><input name="fbkey" class="form-control" value="<?echo $fbkey;?>" placeholder="Facebook Login Secret Key"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">FB login redirect URL</label>
						<div class="col-sm-12"><input name="fbreurl" class="form-control" value="<?echo $fbreurl;?>" placeholder="Facebook Login Redirect URL"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">GooglePlus login App id</label>
						<div class="col-sm-12"><input name="gappid" class="form-control" value="<?echo $gappid;?>" placeholder="GooglePlus Login App Id"></div>
						
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">GooglePlus login secret Key</label>
						<div class="col-sm-12"><input name="gkey" class="form-control" value="<?echo $gkey;?>" placeholder="GooglePlus Login Secret Key"></div>
					</div>
					<div class="form-group col-sm-12">
						<label class="col-sm-12 control-label">GooglePlus login redirect URL</label>
						<div class="col-sm-12"><input name="greurl" class="form-control" value="<?echo $greurl;?>" placeholder="GooglePlus Login Redirect URL"></div>
					</div>
					 <div class="form-actions center col-sm-12">
								<button type="reset" name="reset" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Reset
								</button>
								<button type="submit" name="g_submit" class="btn btn-primary" enable>
									<i class="fa fa-check-square-o"></i> Save
								</button>
							</div>
					  
					  
					</form>
	               
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
<script>
$(document).ready(function () {
	$('.del_link').removeAttr("href");
});
</script>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<? require_once 'footer.php'; ?>