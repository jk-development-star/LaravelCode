function img_validate(name,width,height,r1,r2,showDiv){
	if(showDiv=='' || showDiv==null){
		showDiv = "img_div";
	}
	var fuData = document.getElementById(name);
	var FileUploadPath = fuData.value;
	var action = 'update';
	if(window.FileReader) {   
		if (FileUploadPath == '') {
			if (action == 'update') {
				return true;
			} else {
				swal("Please upload an image");
				return false;
			}
		} else {
			$("#"+showDiv).hide();
			var size = fuData.files[0].size;
			if (size > 1048576) {
				sweetAlert("File size exceeded!","Maximum allowed size is 1 mb","error");
				return false;
			} else {
				var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
				if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
					if (fuData.files && fuData.files[0]) {
						var reader = new FileReader();
						$image = $("#"+showDiv+"");
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
									sweetAlert("Too short!","Your image size (" + w + 'x' + h + "). size should grater than ("+width+"x"+height+").","error");
									$image.hide();
								} else if ((w*r2) != (h*r1)) {
									/* sweetAlert("Invalid aspect ratio!","image ratio should be "+r1+":"+r2+" and image size should be grater than "+width+"x"+height+".","error");
									$image.hide(); */
								} else {
									$image.attr("src", e.target.result).show();
								}
							}
						}
						reader.readAsDataURL(fuData.files[0]);

						var w = localStorage.getItem("width");
						var h = localStorage.getItem("height");

						if (w < width || h < height) {
							return false;
						} else if ((w*r2) != (h*r1)) {
							return false;
						} else {
							localStorage.setItem("width", 0);
							localStorage.setItem("height", 0);
							return true;
						}
					}
				} else {
					$("#"+showDiv+"").css('display','block');
					sweetAlert("Invalid file format!","Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ","error");
					return false;
				}
			}
		}
	} else {
	//$("#imgname").css("display","block");	
	//$("#imgname").text(FileUploadPath);	
	sweetAlert("Incompatible browser","Your browser does not support Advance javascript functions so kindly update your browser to latest version..","warning");
	return true;
	}
}

function setTap(request){
	
	if(request=='profile' || request=='change-pass' || request=='edit-profile' || request=='change-profile-img'){
		$("#collapseOne").addClass('in');
		$("#"+request+"").addClass('active');
	}
	else if(request=='add-product' || request=='manage-product' || request=='edit-product'){
		$("#collapseTwo").addClass('in');
		$("#"+request+"").addClass('active');
	}
	else if(request=='manage-company'){
		$("#collapseTwo-1").addClass('in');
		$("#"+request+"").addClass('active');
	}
	else if(request=='add-buying-offer' || request=='manage-buying-leads'){
		$("#collapseThree").addClass('in');
		$("#"+request+"").addClass('active');
	}
	else if(request=='add-selling-offer' || request=='manage-selling-leads'){
		$("#collapseFour").addClass('in');
		$("#"+request+"").addClass('active');
	}
	
}

function setToemail(toEmail,toName){
$("#enq_to").val(toEmail);
$("#enq_name2").val(toName);
}

function langfn(getval){
	location.href="change_lang.php?lngid="+getval;
}

/* function chekDbPass(){
var x = document.getElementById("old_password").value;
  $.ajax({url: "password_ajax.php",
        type: 'POST',
        data: {val:x} ,
  success: function(result){
		if(result==1)
		{
		alert("Enter the correct password");
			return false;
		}else if(result==0){
			return true;
		}
		
    }});
} */
/* Admin change password fn. edited on 24/10/2017 */  
function chekDbPass(){
var x = document.getElementById("old_password").value;
  $.ajax({url: "password_ajax.php",
        type: 'POST',
        data: {val:x} ,
  success: function(result){
	  //alert(result);
		 if(result==1)
		{
		alert("Enter the correct old Password");
		document.getElementById("old_password").value="";
			document.getElementById("old_password").focus();
			return false;
		} if(result==0){
			return true;
		} 
		
    }});
}
/* end fn */

function checkpassword(){	
var x = document.getElementById("old_password").value;
  $.ajax({url: "password_ajax.php",
        type: 'POST',
        data: {val:x} ,
  success: function(result){
		if(result==1)
		{
		alert("Enter the correct password");
			return false;
		}else if(result==0){
			
var x1=document.getElementById("new_password").value;
var x2=document.getElementById("confirm_password").value;
if(x1!=x2)
{
alert("password does not match. Re-type your new password");
return false;
}else
{
  return true;
}
}
}});
}


