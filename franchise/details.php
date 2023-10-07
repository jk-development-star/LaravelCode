<?php include "includes/header.php"; 
$rowsPerPage=5;
$limit=limitation($rowsPerPage);
$id = $db->escapstr($id);
$id = base64_decode($id);

$getuser = $db->singlerec("select * from register where id='$id'");

$act = isSet($act) ? $act : '' ;
$user_id=$db->escapstr($user_id);


if(isset($bkn)){ ?>
	<script>
		$(document).ready(function () {
			$('#book_mdl').modal('show');
		});
		</script>
<? }
if(isset($rev)){ ?>
	<script>
		$(document).ready(function () {
			$('#myReview').modal('show');	
		});
		</script>
<? }
if(isset($usr_rev)){ ?>
	<script>
		$(document).ready(function () {
			$('#myReview').modal('show');	
		});
		</script>
<? }

if($act == "upd")
    echo"<script>swal('Successful!','Your Review updated successfully!','success');</script>";
else if($act == "add")
   echo"<script>swal('Successful!','Your Review Posted successfully!','success');</script>";
	
//review open
$review_title1=isset($review_title)?$review_title:'';
$review_stars1=isset($review_stars)?$review_stars:'';
$review_text1=isset($review_text)?$review_text:'';
$userinfo['id']=isset($userinfo['id'])?$userinfo['id']:'';
$reviewrec=$db->singlerec("select * from review where user_id='".$user_id."' and lawyer_id='".$getuser['id']."' and active_status='1'");
$reviewrecn=$db->numrows("select * from review where user_id='".$user_id."' and lawyer_id='".$getuser['id']."' and active_status='1'");
$review_title1=$reviewrec['title'];
$this_rate_count =$reviewrec['stars'];
$review_text1=$reviewrec['comment'];
if((isset($reviewsubmit)) || (isset($reviewupdate))){
	$crcdt = date("Y-m-d");
	$title=addslashes($review_title);
	$stars=addslashes($review_stars);
	$text=addslashes($review_text);
	
	if(isset($captcha) && $captcha!="" && $_SESSION["code"]==$captcha)
    { 			       
	if (isset($reviewsubmit))
	{
		$set= "stars='$stars'";
	    $set.= ",user_id='".$userinfo['id']."'";
	    $set.= ",lawyer_id='".$getuser['id']."'";
 	    $set.= ",title='$title'";
	    $set.= ",comment='$text'";
		$set.= ",active_status='1'";
		$set  .= ",crcdt = '$crcdt'";
		$db->insertrec("insert into review set $set");
		
		$fname = reurl(userInfo($id,'fname'));
		$title = reurl(userInfo($id,'title'));
		$lyrid = base64_encode($id);
				
		echo "<script>location.href='$siteurl/detail/$lyrid/$fname/$title/?act=add'</script>";
		header("location:$siteurl/detail/$lyrid/$fname/$title/?act=add");
		}
	if (isset($reviewupdate))
	{
	$set= "stars='$stars'";	
	$set .= ",user_id='".$userinfo['id']."'";
	$set.= ",lawyer_id='".$getuser['id']."'";
	$set.= ",title='$title'";
	$set.= ",comment='$text'";
		$set  .= ",chngdt = '$crcdt'";
		$db->insertrec("update review set $set where user_id='".$userinfo['id']."' and lawyer_id='".$getuser['id']."'");
		
		$fname = reurl(userInfo($id,'fname'));
		$title = reurl(userInfo($id,'title'));
		$lyrid = base64_encode($id);
		
		echo "<script>location.href='$siteurl/detail/$lyrid/$fname/$title/?act=add'</script>";
		header("location:$siteurl/detail/$lyrid/$fname/$title/?act=upd");
		}
	}
else
{
	echo"<script>swal('Oops!','Wrong Captcha','warning');</script>";
}
		
}
//review End
	
$address = $getuser['building'].','.$getuser['street'].','.$getuser['landmark'].','.$getuser['area'];
$address = $com_obj->getReptrim($address);

$country = getCountry($getuser['country']);
$state = getCountry($getuser['state']);
$city = getCountry($getuser['city']);
$csc = $country.','.$state.','.$city;
$csc = $com_obj->getReptrim($csc);

if($getuser['field_assit']==1)
	$fld_assit = "yes";
else if($getuser['field_assit']==2)
	$fld_assit = "No";
else if($getuser['field_assit']==0)
	$fld_assit = "";

if($getuser['website']!="")
	$website = $getuser['website'];
else
	$website = "<span style='color:#EEEAE9;'>Not Available</span>";

?>
  <?php include "includes/innersearch.php"; ?>
<style>
.review_strip_single {
padding: 0px 0 20px 0 !important;
margin: 1px solid #ddd !important; 
 }
</style>
<div class="container margin_60" style="padding-top: 20px;">
	<div class="row">
		<div class="col-md-8" id="single_tour_desc">
            
			<div class="row mb30">
				<div class="col-sm-4 text-center">
			       <img src="<? echo $siteurl; ?>/uploads/profile/<?=$getuser['img'];?>" class=" detail_im_circle img-responsive"/>
				   <div class="rating" style="margin-right:23px;">
				       <?php echo get_Rate($getuser['id']); ?>
				   </div>
			   </div>
			   <div class="col-sm-8">
			      <h2 style="color:#2f587c" class="name"><strong><?=$getuser['title'];?></strong></h2>				 
				  <h4><b>Area Required</b> - <?=$getuser["area_req"]; ?></h4>
				  <h4><b>Investment Range</b> - <?=$getuser["investment"].' lacs'; ?></h4>
				
				  <h4 class="detail_addr name"><i class="icon_set_1_icon-41"></i><b>Headquater</b> - <?=$getuser["headquater"]; ?></h4>
				 <? if(!empty($user_id)){	 
                    if($reviewrecn > 0){?>
				     <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Edit review</a>
				 <? }else { ?>
                    <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Write a review</a>
				 <? } } else { ?> 
                    <a href="<? echo $siteurl; ?>/login/?rev_wrt=<? echo $id; ?>" class="btn_1 add_bottom_30" >Write a review</a> 
				 <? } ?>
			   </div>
			</div>
            
			<div class="row">
				<div class="col-md-12">
					<h3><b>Business Details</b></h3>
					<?=stripslashes($getuser["detail"]); ?>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="row">
					<div class="col-md-6">
						<h3>Franchise Investment  Details</h3>
					</div>
				</div>
				
				<div class="col-sm-12" style="padding:10px; border:1px solid #dadada; margin:5px auto;background: #FFF;">                    
					<div class="col-md-2">
					
					</div>
					<div class="col-md-5">
					
						<h5>Area</h5>
					</div>
					<div class="col-md-5">
					
						<h5 class="fntwe"><?=$getuser["area_req"]; ?></h5>
					</div>
				</div>
				<div class="col-sm-12" style="padding:10px; border:1px solid #dadada; margin:5px auto;background: #FFF;">                    
					<div class="col-md-2">
					
					</div>
					<div class="col-md-5">
					
						<h5>Investment</h5>
					</div>
					<div class="col-md-5">
					
						<h5 class="fntwe"><?=$site_currency.' '.$getuser["investment"].' lacs'; ?></h5>
					</div>
				</div>
				<div class="col-sm-12" style="padding:10px; border:1px solid #dadada; margin:5px auto;background: #FFF;">                    
					<div class="col-md-2">
					
					</div>
					<div class="col-md-5">
					
						<h5>Franchise/Brand Fee</h5>
					</div>
					<div class="col-md-5">
					
						<h5 class="fntwe"><?=$site_currency.' '.$getuser["brand_fee"]; ?></h5>
					</div>
				</div>
				<div class="col-sm-12" style="padding:10px; border:1px solid #dadada; margin:5px auto;background: #FFF;">                    
					<div class="col-md-2">
					
					</div>
					<div class="col-md-5">
					
						<h5>Royalty/Commission</h5>
					</div>
					<div class="col-md-5" >
					
						<h5 class="fntwe"><?=$getuser["commission"]; ?></h5>
					</div>
				</div>
			</div>
			<hr>
			
			<div class="row">
				<div class="row">
				<div class="col-md-6">
					<h3 class="matolbt">Property Details</h3>
				</div>
				</div>
			
			     <div class="tab-section">
					<div class="tab-sec-topics">
						<div class="keypoints">
							<p>Type of property required for this franchise opportunity<span class="pull-right fntwe">
								<?=ucfirst($getuser["property_type"]); ?>
							</span>
							</p>

							<p>Floor area requirement<span class="pull-right fntwe">
								<?=$getuser["floor_area"]; ?>
							</span>
							</p>

							<p>Preferred location of unit franchise outlet<span class="pull-right fntwe">
								<?=$getuser["preferred_loc"]; ?>
							</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="row">
				<div class="col-md-6">
					<h3 class="matolbt">Training Details</h3>
				</div>
				</div>
			
			     <div class="tab-section">
					<div class="tab-sec-topics">
						<div class="keypoints">
							<p>Training Location<span class="pull-right fntwe">	<?=ucfirst($getuser["training_loc"]); ?> </span> </p>
							<p>Is Field Assistance available for Franchisee <span class="pull-right fntwe"> <?=$fld_assit; ?> </span> </p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h3>Franchise Business </h3>
				</div>
				<div class="col-md-9">
					<div class=" table-responsive">
						<table class="table table-striped">
						<tbody>
						<tr> <td> <strong>Expansion Locations</strong> </td> <td> <?=$getuser["expan_location"]; ?> </td> </tr>
						 <tr> <td> <strong>Establishment year</strong> </td> <td> <?=$getuser["establishment_yr"]; ?> </td> </tr>
						 <tr> <td> <strong>Franchising Launch Date</strong> </td> <td> <?=$getuser["launched_yr"]; ?> </td> </tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<hr>
            
			<div class="row">
				<div class="col-md-3">
					<h3>Reviews </h3>
				<? if(!empty($user_id)){ 
				    if($reviewrecn > 0){ ?>
				     <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Edit review</a>
				 <? }else { ?>
                    <a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Write a review</a>
				 <? } } else { ?>
                    <a href="<? echo $siteurl; ?>/login/?rev_wrt=<? echo $id; ?>" class="btn_1 add_bottom_30" >Write a review</a> 
				 <? } ?>
				</div>
				<div class="col-md-9">
				<?php $noreviews=$db->numrows("select * from review where lawyer_id='".$getuser['id']."' and active_status='1'"); ?>
                	<div id="general_rating"><?php echo $noreviews; ?> Reviews 
                    
                    </div><!-- End general_rating -->
                    
                    <hr>
					<?php 
					 $que="select * from review where lawyer_id='".$getuser['id']."' and active_status='1'";
					$reviews=$db->get_all_assoc($que.$limit); 
                	     foreach($reviews as $rew){ ?>
					<div class="review_strip_single">
						<small> - <? echo date("d-M-Y", strtotime($rew['crcdt'])); ?> -</small>
						<? 
						$name=$db->singlerec("select * from register where id='".$rew['user_id']."'"); ?>
                	     
						<h3><? echo Ucfirst($name['fname']); ?></h3>
						<h6><? echo $rew['title']; ?></h6>
						<p>
							<? echo $rew['comment']; ?>
						</p>
						<div class="rating">
							
							<div class="list"> <? echo getStar($rew['stars']); ?></div>
						</div>
					</div>
						 <? } ?>
						 <div class="text-center">
						<? $db->insertrec(getPagingQuery1($que, $rowsPerPage, "")); ?>
								   <? echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
                       
                     </div>
					 <!-- End review strip -->
					
				</div>
			</div>
		</div>
        
		<aside class="col-md-4">
		
		<div class="box_style_1 expose">
			<h3 class="inner">- Send Request -</h3>			
            <form>
			<?php if(isset($_SESSION['space_userid'])){
				if($_SESSION['space_userid']!=$getuser['id']){ ?>	
				<a class="btn_full" href="" data-toggle="modal" data-target="#book_mdl">Enquiry now</a>
				<?php }} else {?>				
				<a class="btn_full" href="<? echo $siteurl; ?>/login/?bknw=<? echo $id; ?>">Enquiry now</a>
				<?php } ?> 
			</form>	
			
		</div><!--/box_style_1 -->
        
		<div class="box_style_4 text-left">
			<h4>Contact Info</h4>
			<ul class="dtl_cnt_info_list">
			   <li><i class="icon_set_1_icon-84"></i> <?=$getuser['email'];?></li>
			   <li><i class="icon_set_1_icon-91"></i> <?=$getuser['contact_no1'];?></li>
			   <li><b>Address</b></li>
			   <li class="name"><i class="icon_set_1_icon-41"></i> <?=$address.','.$csc;?></li>
			   <li><b>Website </b></li>
			   <li><i class="icon_set_1_icon-37"></i>
			    <a target="_blank" href="<?=$website;?>"> <?=$website;?> </a>
			   </li>
			</ul>
		</div>
		<?
		$ad=$db->singlerec("select * from banner where banner_size='150X150' and ban_location='details' and ban_status='0' order by RAND()");
		$ad_count=$db->numrows("select * from banner where banner_size='150X150' and ban_location='details' and ban_status='0'");
		if($ad_count > 0){
		$size=$ad['banner_size'];
		$image=$ad['ban_image'];
		$link=$ad['ban_link'];
		$ban_id=$ad['ban_id'];
		?>
		<div class="col-sm-12">
		    <a href="<?=$link;?>" target="_blank" class="ad_click" data-id="<?=$ban_id?>"><img src="<? echo $siteurl; ?>/admin/uploads/banner/original/<?=$image;?>" width="330" height="310" class="advert_image"></a>
		</div>
		<? } ?>
		</aside>
	</div><!--End row -->
</div><!--End container -->
<!-- Modal Review -->
<div id="toTop"></div><!-- Back to top button -->
<!--<div id="overlay"></div>--><!-- Mask on input focus -->

<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<? if($reviewrecn > 0 ) {?>
				<h4 class="modal-title" id="myReviewLabel">Edit your review</h4>
				<? } else { ?>
				<h4 class="modal-title" id="myReviewLabel">Write your review</h4>
				<? } ?>
			</div>
			<div class="modal-body">
				<div id="message-review">
				</div>
				<form method="post"  name="review" id="review">
           	
					<div class="form-group">
					
					    <label >Rating :</label>
						<input type=hidden name="review_stars" id="rate_val" class="form-control"  placeholder="Stars" />
						<div class="rating reiw" id="user-rating" onmouseout="rsrate();">
												<i onmouseover="chkrate(1);" class="fa fa-star-o" id="rate1"></i>
												<i onmouseover="chkrate(2);" class="fa fa-star-o" id="rate2"></i>
												<i onmouseover="chkrate(3);" class="fa fa-star-o" id="rate3"></i>
												<i onmouseover="chkrate(4);" class="fa fa-star-o" id="rate4"></i>
												<i onmouseover="chkrate(5);" class="fa fa-star-o" id="rate5"></i>
											</div>
						
					</div>
				    <div class="form-group">
						<input type="text" name="review_title" id="review_title" class="form-control"  placeholder="Title" value="<?=$review_title1;?>" />
					</div>
					<div class="form-group">
						<textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="Write your review"><?=$review_text1;?></textarea>
					</div>
					</div>
						<div class="form-group">
			            
		                  <div class="col-md-9">
		                   <input name="captcha" class="form-control" type="text" placeholder="captcha Code">
                           </div>
						   <div class="col-md-3">
						   <img src="<? echo $siteurl; ?>/capcha1.php" height="30" width="70" class="form-control" />
		                   </div>
		            </div>
					<div class="text-center">
					<hr><br />
					<? if($reviewrecn > 0 ) {?>
					
					<input type="submit" value="Update" name="reviewupdate" class="btn_1 text-center" onclick="return reviewvalid();" id="submit-review" style="margin-bottom:15px;" />
						
					 <? } else { ?>
					<input type="submit" value="Submit" name="reviewsubmit" class="btn_1 text-center" onclick="return reviewvalid();" id="submit-review" style="margin-bottom:15px;" />
					 <? } ?>
					 <button type="button" class=" btn_1 btn_full_outline" data-dismiss="modal" aria-label="Close">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div><!-- End modal review -->  

<div class="modal fade book_pp_model" id="book_mdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Request Information</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form class="cln_frm form-horizontal" action="" method="post">
                            <div id="datetime"></div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="<?=$userinfo['fname']." ".$userinfo['lname'];?>" required placeholder="Full Name" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" value="<?=$userinfo['contact_no1'];?>" required onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40) || (event.keyCode==46) )"
                                            placeholder="Mobile Number" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" value="<?=$userinfo['email'];?>" readonly placeholder="Email" />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prf_loc" placeholder="Prefered Location" required />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="avail_cash" placeholder="Available Cash" required />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" name="comment" placeholder="Comments" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center" style="margin-top:10px;">
                                    <input type="submit" name="enq_sub" class=" btn_1 btn_full_outline" value="Submit Request" />
                                    <button type="button" class=" btn_1 btn_full_outline" data-dismiss="modal" aria-label="Close">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function () {  
   $('.ad_click').click(function(){
		var ban_id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<? echo $siteurl; ?>/checkpass.php",
			data:{bId:ban_id},
			success: function(result) {
				/* if(result!="0") {
					display.innerHTML = result;			
				} */
			}
		});
	});
});
	
function reviewvalid(){
	 var star = document.forms["review"]["review_stars"].value;
	 var title = document.forms["review"]["review_title"].value;
	 var text = document.forms["review"]["review_text"].value;
     var captcha = document.forms["review"]["captcha"].value;
	if (star == "") {
      swal('Oops!', 'Stars mandatory', 'warning');
        return false;
    }
	if (title == "") {
      swal('Oops!', 'Title mandatory', 'warning');
        return false;
    }
	if (text == "") {
      swal('Oops!', 'Your Review text mandatory', 'warning');
        return false;
    }
	
if ((captcha == "")){
	
      swal('Oops!', 'Please Enter Captcha', 'warning');
	  return false; 	
}
	
}
</script>
<style>
#lic{display: inline-block;color: #565a5c;text-shadow: 0 0 1px #666666;font-size:30px;}
#lic.highlight, #lic.selected {color:#00bff5;text-shadow: 0 0 1px #F48F0A;}
.list li{display: inline-block;}

.form-horizontal .form-group{    margin-right: 0 !important;
    margin-left: 0 !important;}
</style>


<script>
function chkrate(getval){
		if(getval==1){
			$("#user-rating").html("<i onmouseover='chkrate(1);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(2);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(3);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(4);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(5);' class='fa fa-star-o' id='rate1'></i>");
			$("#rate_count").text('1.0');
			$("#rate_val").val('1');
		}
		else if(getval==2){
			$("#user-rating").html("<i onmouseover='chkrate(1);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(2);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(3);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(4);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(5);' class='fa fa-star-o' id='rate1'></i>");
			$("#rate_count").text('2.0');
			$("#rate_val").val('2');
		}
		else if(getval==3){
			$("#user-rating").html("<i onmouseover='chkrate(1);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(2);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(3);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(4);' class='fa fa-star-o' id='rate1'></i> <i onmouseover='chkrate(5);' class='fa fa-star-o' id='rate1'></i>");
			$("#rate_count").text('3.0');
			$("#rate_val").val('3');
		}
		else if(getval==4){
			$("#user-rating").html("<i onmouseover='chkrate(1);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(2);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(3);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(4);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(5);' class='fa fa-star-o' id='rate1'></i>");
			$("#rate_count").text('4.0');
			$("#rate_val").val('4');
		}
		else if(getval==5){
			$("#user-rating").html("<i onmouseover='chkrate(1);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(2);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(3);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(4);' class='fa fa-star' id='rate1'></i> <i onmouseover='chkrate(5);' class='fa fa-star' id='rate1'></i>");
			$("#rate_count").text('5.0');
			$("#rate_val").val('5');
		}
	}
	
	chkrate(<?php echo isset($this_rate_count)?(int)$this_rate_count:1; ?>);
</script>

<?php 
if(isset($enq_sub)) {
	$name=isset($name)?$name:"";
	$phone=isset($phone)?$phone:"";
	$prf_loc=isset($prf_loc)?$prf_loc:"";
	$avail_cash=isset($avail_cash)?$avail_cash:"";
	$comment=isset($comment)?$comment:"";
	$ip=$_SERVER['REMOTE_ADDR'];
	$date=date("Y-m-d h:m:s");
	$cmpy_id = $getuser["id"];

	$set = "user_id='$user_id'";
	$set .= ",cmpy_id='$cmpy_id'";
	$set .= ",username='$name'";
	$set .= ",phone='$phone'";
	$set .= ",prefered_loc='$prf_loc'";
	$set .= ",avail_cash='$avail_cash'";
	$set .= ",comment='$comment'";
	$set .= ",send_ip='$ip'";
	$set .= ",send_dt='$date'";
	
	$db->insertrec("insert into enquiry set $set");
	
	echo "<script>location.href='$siteurl/my-enquires/?sub';</script>";
	header("Location:$siteurl/my-enquires/?sub");exit;
}
?>