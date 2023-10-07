<? include 'header.php';
include 'leftmenu.php';
$msg=isSet($Message)?$Message:'';
$title = isset($title)?$title:'';
$size = isset($size)?$size:'';
$width = isset($width)?$width:'';
$height = isset($height)?$height:'';

$GetRecord = $db->singlerec("select * from banner where ban_id='$update'");
$title=$GetRecord['ban_location'];
$ban_link=$GetRecord['ban_link'];

$size=$GetRecord['banner_size'];
$img=$GetRecord['ban_image'];
if(isset($ban_updt))
{
	$ban_id = $db->escapstr($update);
	$ban_title = $db->escapstr($ban_title);
	$ban_size = $db->escapstr($ban_size);

	$ban_link = $db->escapstr($link);
	$ban_image = $db->escapstr($_FILES['bimage']['name']);
	if($ban_title == "")
	{ 
		echo "<script>location.href='banner.php?error'</script>";
		header("Location:banner.php?error");
		exit;
	}
	
	if($ban_size == "")
	{
		echo "<script>location.href='banner.php?error'</script>";
		header("Location:banner.php?error");
		exit;
	}
	
	if($ban_image == "") 
	{
		if($imagehide == "") 
		{
			echo "<script>location.href='banner.php?not-a-image'</script>";
			header("Location:banner.php?not-a-image");
			exit;
		} 
		else 
		{
			$cate_img_small = $imagehide;
		}
		
	}
	 else
    {
		if($imagehide != "")
		 {
			unlink("uploads/banner/original/".$imagehide);
			unlink("uploads/banner/thumb/".$imagehide);
			unlink("uploads/banner/mid/".$imagehide);			
		}		
		$img_size = filesize($_FILES['bimage']['tmp_name']);		
		if($img_size > 1048576) 
		{
			echo "<script>location.href='banner.php?largeimage'</script>";
			header("Location:banner.php?largeimage");
			exit;
		}
		else
		{
			$split_name = explode(".",$ban_image);			
			if(($split_name[1] == 'jpg') || ($split_name[1] == 'jpeg') || ($split_name[1] == 'gif') || ($split_name[1] == 'png') ||($split_name[1] == 'JPG') || ($split_name[1] == 'JPEG') || ($split_name[1] == 'GIF') || ($split_name[1] == 'PNG'))
			{		
				$cate_img_small = "ban".date("dmY")."-".rand("100","999").".".$split_name[1];
				$image_path = "uploads/banner/thumb/";
				$image_path_thumb = "uploads/banner/mid/";	
				move_uploaded_file($_FILES['bimage']['tmp_name'],"uploads/banner/original/".$cate_img_small);			
				$resizeObj = new resize("uploads/banner/original/".$cate_img_small);
				$resizeObj -> resizeImage(150, 150, 'exact');
				$resizeObj -> saveImage($image_path.$cate_img_small, 100);			
				$resizeObj -> resizeImage(60, 60, 'exact');
				$resizeObj -> saveImage($image_path_thumb.$cate_img_small, 100);
		    }
			else
			{
				echo "<script>location.href='banner.php?not-a-image'</script>";
				header("Location:banner.php?not-a-image");
				exit;
			}
		
		}
		
	}	
	$update1 = $db->insertrec("UPDATE banner SET ban_location='$ban_title',banner_size='$ban_size',ban_link='$ban_link',ban_image='$cate_img_small' WHERE ban_id=$ban_id");
	
	echo "<script>location.href='banner.php?editsuccess'</script>";
	header("Location:banner.php?editsuccess");		    
}

if(isset($ban_submit))
{
	$ban_title = $db->escapstr($ban_title);
	$ban_size = $db->escapstr($ban_size); 
	$ban_link = $db->escapstr($link);
	$ban_image=$db->escapstr($_FILES['bimage']['name']);
    
	if($ban_image == "")
	{
		echo "<script>location.href='banner.php?error'</script>";
		header("Location:banner.php?error");
		exit;
	}
	else if($ban_title == "")
	{
		echo "<script>location.href='banner.php?error'</script>";
		header("Location:banner.php?error");
		exit;
	}
	else if($ban_size == "")
	{
		echo "<script>location.href='banner.php?error'</script>";
		header("Location:banner.php?error");
		exit;
	}
	else 
	{	
	$img_size = filesize($_FILES['bimage']['tmp_name']);
			if($img_size > 1048576) 
			{
				echo "<script>location.href='banner.php?largeimage'</script>";
				header("Location:banner.php?largeimage");
				exit;
			}
			else
			{
			$split_name = explode(".",$ban_image);
			if(($split_name[1] == 'jpg') || ($split_name[1] == 'jpeg') || ($split_name[1] == 'gif') || ($split_name[1] == 'png') ||($split_name[1] == 'JPG') || ($split_name[1] == 'JPEG') || ($split_name[1] == 'GIF') || ($split_name[1] == 'PNG'))
			{
			$cate_img_small = "ban".date("dmY")."-".rand("100","999").".".$split_name[1];
			$image_path = "uploads/banner/thumb/";
			$image_path_thumb = "uploads/banner/mid/";
			
			move_uploaded_file($_FILES['bimage']['tmp_name'],"uploads/banner/original/".$cate_img_small);
			//small image
			$resizeObj = new resize("uploads/banner/original/".$cate_img_small);

			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop) landscape
			$resizeObj -> resizeImage(150, 150, 'exact');

			$resizeObj -> saveImage($image_path.$cate_img_small, 100);
			
			$resizeObj -> resizeImage(60, 60, 'exact');

			$resizeObj -> saveImage($image_path_thumb.$cate_img_small, 100);
		  }
		  else
		  {
			  echo "<script>location.href='banner.php?not-a-image'</script>";
			  header("Location:banner.php?not-a-image");
			  exit;
		  }
		
		 $insert = $db->insertrec("INSERT INTO banner (ban_image,banner_size,ban_link,ban_location,ban_date) VALUES ('$cate_img_small','$ban_size','$ban_link','$ban_title',NOW())");
		 
		 echo "<script>location.href='banner.php?succ'</script>";
         header("Location:banner.php?succ");         		 
		}		
	}
}

 ?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Ad management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">
				<? if($update!=1) 
						echo "Edit";
					else
						echo "Add New";
					?>
					Banner</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               <form name="myfor" id="myfor" method="post" enctype="multipart/form-data" class="form-horizontal" >
                         
							<div class="panel-body">
								<div class="form-group col-sm-12 ">
									<label class="col-sm-3 control-label"> Banner  Location <span class="req">*</span> </label>
									<div class="col-sm-9">
										<select name="ban_title" id="title" class="form-control" onChange="banfn()">
											<option value=""> Select Location</option>
											<option value="profile-edit" <?if($title=="profile-edit") echo "selected";?>> Profile Edit Page</option>
											<option value="list" <?if($title=="list") echo "selected";?>> List Page</option>
											<option value="details" <?if($title=="details") echo "selected";?>> Detail Page</option>
										</select>
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Banner  pixels <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="ban_size" id="banSize" readonly value="<?=$size;?>" />
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Banner Image <span class="req">*</span> </label>
								
									<div class="col-sm-6">
										<input type="file" name="bimage" id="bimage" class="form-control" <? if($update==1) echo "required"; ?> />
										<input type="hidden" name="imagehide" id="imgg" value="<?=$img;?>" />
									</div>
									
									 <? If(isset($update) && ($update!=1)) {?>
									<div class="col-sm-3">
									    
										<img src="uploads/banner/original/<? echo $img; ?>"  height="70" />
									</div>
									<? } ?>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Banner Link <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="link" id="link" class="form-control" value="<?=$ban_link;?>" required />
									</div>
								</div>
					        <p style="font-size:14px;"> **Only jpg, jpeg, png, gif file with maximum size of 1 MB is allowed. </p>
							
					       <div class="form-actions center col-sm-12">
								<a type="button" href="banner.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
						   <? If(isset($update) && ($update!=1)) {?>			
								<button onClick="return ban_validate();" type="submit" class="btn btn-primary" name="ban_updt" >
									<i class="fa fa-check-square-o"></i> Update
								</button>
						   <? } else { ?>
								<button type="submit" class="btn btn-primary" name="ban_submit" onClick="return ban_validate();">
									<i class="fa fa-check-square-o"></i> Save
								</button>
						   <?  } ?>								
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<script>
function ban_validate() {
	var banLoct = document.getElementById("title").value;
	var banImg = document.getElementById("bimage").value;
	var link = document.getElementById("link").value;
	
	if(banLoct=="") {
		alert("Please Select the Banner Location");
		document.getElementById('title').focus();
		return false;
	}			
	if(link=="") {
		alert("Please Enter the Banner Link");
		document.getElementById('link').focus();
		return false;
	}
	if(banLoct=="profile-edit") {
		var width = "100";
		var height = "500";
	}
	else if(banLoct=="details") {
		var width = "150";
		var height = "150";
	}
	else if(banLoct=="list") {
		var width = "728";
		var height = "90";
	}
	if((banLoct!="") && (banImg!="")) {
		var fuData = document.getElementById("bimage");
		var FileUploadPath = fuData.value;
		var action = 'update';
		if(window.FileReader) {   
			if (FileUploadPath != '') {				
				var size = fuData.files[0].size;
				if (size > 1048576) {				
					swal('File size exceeded!!', 'Maximum allowed size is 1 MB', 'error');
					fuData.value="";
					fuData.focus();
					return false;
				} else {			
					var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();					
					if (Extension == "gif" || Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
						var imgWidth, imgHeight;
						if (fuData.files && fuData.files[0]) {
							var reader = new FileReader();
							reader.onload = function(e) {
								var w, h;
								
								var image = new Image();
								image.src = e.target.result;
								image.onload = function() {
									w = this.width;
									h = this.height;
									localStorage.setItem("width", w);
									localStorage.setItem("height", h);
									if (w < width || h < height) {
										imgWidth = w;
										imgHeight = h;
										swal("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");				
										fuData.value="";
										fuData.focus();
										return false;
									} else {									
										$image.attr("src", e.target.result).show();
									}
								}
							}
							reader.readAsDataURL(fuData.files[0]);
							if (imgWidth < width || imgHeight < height) {		
							//swal("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");				
							fuData.value="";
							fuData.focus();
							return false;
						}
						}						
					} else {
						swal("Invalid file format!","Profile picture only allows file types of GIF, PNG, JPG and JPEG. ","error");
						fuData.value="";
						fuData.focus();
						return false;
					}
				}
			}
		} else {		
		swal("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
		return true;
		}
	}
}
</script>

<script>
function banfn() {
	var banLoc = document.getElementById("title").value;
	if(banLoc=="profile-edit") {
		document.getElementById("banSize").value = "100X500";
	}
	else if(banLoc=="details") {
		document.getElementById("banSize").value = "150X150";
	}
	else if(banLoc=="list") {
		document.getElementById("banSize").value = "728X90";		
	}
}
</script>
<? include 'footer.php'; ?>