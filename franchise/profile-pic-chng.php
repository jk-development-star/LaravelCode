<?
	include "includes/header.php"; 
	include "includes/innersearch.php";
	
	if(empty($user_id)){
		echo "<script>location.href='$siteurl/index';</script>";
		header("Location:$siteurl/index");exit;
	}
	$user_id=$db->escapstr($user_id);
	
	if(isset($_POST)) {
		if(isset($_FILES["img"]["tmp_name"]) && !empty($_FILES["img"]["tmp_name"]))
		{
			$name2 = rand(11111,99999).uniqid();
			$err='0';
			$path='uploads/profile';
			$img_upl=$com_obj->upload_image("img",$name2,"330","220","$path","");
			if($img_upl) {
				$main_img=$com_obj->img_Name;
				$set = "img = '$main_img'";
			}
			else {
				$err= $com_obj->img_Err;
				
				echo "<script>location.href='$siteurl/profile-pic-chng/?err=$err'</script>";
				header("location:$siteurl/profile-pic-chng/?err=$err");	exit;
			}
			
			$date=date("Y-m-d");
			$ip=$_SERVER['REMOTE_ADDR'];
			
			$set .=",chngdt='$date'";
			$set .=",edit_ip='$ip'";
			
			$sql=$db->insertrec("update register set $set WHERE id='$user_id'");
			echo "<script>location.href='$siteurl/profile/?updimg'</script>";
			header("location:$siteurl/profile/?updimg");
		}
		else if(isset($del_img)) {
			$GetImg = $db->singlerec("select img from register where id='$user_id'");
			$img=$GetImg["img"];
			
			if($img!="noimage.png"){
				$RemoveImage = "uploads/profile/$img";
				unlink($RemoveImage);
				$set1 = "img = 'noimage.png'";
				$db->insertrec("update register set $set1 WHERE id='$user_id'");
				echo "<script>location.href='$siteurl/profile/?delimg'</script>";
				header("location:$siteurl/profile/?delimg");
			}
		}
	}
?>
            <div  class="container margin_60">
               <div class="row">
			   <?php if(isset($err)){
					echo"<div class='alert alert-danger'> $err</div>";
				  }
				?>	
                 <?php include "includes/leftmenu.php"; ?>
				 
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   <div class="row mt20 mb20">
							<div class="col-sm-3">
							</div>
							<div class="col-md-6 wow zoomIn animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn;">
							 <form id="jsform" method="post" action="" enctype="multipart/form-data">
								<div class="feature_home">
									<img src="<? echo $siteurl; ?>/uploads/profile/<?=$userinfo['img'];?>" class="img-circle mb20" width="250" height="250">
									
									<div class="file-upload">
										<label for="upload" class="file-upload__label">Choose Picture</label>
										<input type="file" name="img"  id="upload" class="file-upload__input" onChange="change_img();" />
									</div>
									<div class="file-upload">
										<label><button type="submit" name="del_img" class="file-upload__label" onChange="change_img();" style="border:none;" />
										Delete Picture </button></label>
									</div>
									<p style="font-size:14px;"> Only jpg, jpeg, png, gif file with dimension above 330X220 & maximum size of 1 MB is allowed. </p>
								</div>
							 </form>
							</div>
						</div>
		
		
					 </div>
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
			
<script type="text/javascript">
function change_img() {
  document.getElementById('jsform').submit();
}
</script>
<?php include "includes/footer.php"; ?>