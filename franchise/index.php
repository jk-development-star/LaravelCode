<?php

include "includes/header.php";
include "includes/mainsearch.php";

$act=isSet($act)?$act:'';


if(isset($uid) && !empty($uid)) {
	$uid=$uid;
	$uid=base64_decode($uid);
	$db->insertrec("update register set email_active_status='1' where id='$uid'");
	echo "<script>swal('Success','Your Account has been activated','success');</script>";
}
if(isset($pay_suss)){
	echo "<script>swal('Success','Your Appoinment has been Confirmed!','success');</script>";
}
if(isset($cancel)){
	echo "<script>swal('Oops','Your Payment has been cancelled...','error');</script>";
}
if(isset($lg_inact))
	echo '<script>swal("Oops!","Your Account Inactive","warning");</script>';
?>
            <!-- End hero -->
			
			
			<div class="container margin_60">
               <div class="row add_bottom_60 ">
                     <div class="main_title">
                        <h2>Browse Franchise By <span> Category </span></h2>
                     </div>
					 <?php $select_cat=$db->get_all("select * from category where active_status='1' order by RAND() limit 8");
                     foreach($select_cat as $fetch_cat){ ?>
                     <div class="col-md-3 col-sm-3 text-center">
                        <div class="img_wrapper_gallery bg_none text-center">
                           <div class="img_container_gallery">
						   <a href="<? echo $siteurl; ?>/list/category/<?=base64_encode($fetch_cat['id']);?>/<? echo reurl($fetch_cat['category_name']); ?>">
                              <img src="<? echo $siteurl; ?>/uploads/category/<?php echo $fetch_cat['img'];?>" alt="Image" class="img-responsive" style=" height: 100%;"/> </a>
                              <i class="icon-resize-full-2"></i>
                           </div>
                           <h4><a href="<? echo $siteurl; ?>/list/category/<?=base64_encode($fetch_cat['id']);?>/<? echo reurl($fetch_cat['category_name']); ?>" class="name" style="color:#2f587c;font-weight:bold;"> <?php echo substr($fetch_cat['category_name'],0,18);?> </a> </h4>
                           <!--<p><?php echo substr($fetch_cat['description'],0,155);?></p>-->
                           <!--<a href="<? echo $siteurl; ?>/list/category/<?=base64_encode($fetch_cat['id']);?>/<? echo reurl($fetch_cat['category_name']); ?>" class="btn_1 outline">View Experts</a>-->
                        </div>
                     </div>
					 <?php } ?>
					 
					 
					 
                     
                  </div>
            </div>
            <!-- End container -->
			
			
            
			<div class="white_bg">
               <div class="container margin_60">
                  <div class="main_title">
                     <h2>Browse Franchise By <span> Location </span></h2>
                  </div>
				 <? $fromreg = $db->get_all_assoc("select DISTINCT city from register where active_status='1' and user_role='1' order by RAND() limit 20");
				  $loc_Ct = count($fromreg);
				  $limit_city = 20-$loc_Ct;
				  $loc_name = "";
				  for($i=0; $i <$loc_Ct; $i++) {
					  $loc = $fromreg[$i]["city"];
					  $loc_name.=$loc.',';
				  }
				  
				  if($loc_Ct < 20) {
					  $fromcity=$db->get_all_assoc("select city_id from city where city_status='1' order by RAND() limit $limit_city");
					  $city_Ct = count($fromcity);
					  $cty_name = "";
					  for($i=0; $i <$city_Ct; $i++) {
						  $cty = $fromcity[$i]["city_id"];
						  $cty_name.=$cty.',';
					  }
					  $loc_name = trim($loc_name,',');
					  $loc_arr = explode(',',$loc_name);
					  
					  $cty_name = trim($cty_name,',');
					  $cty_arr = explode(',',$cty_name);
					  $getcity = array_merge($loc_arr,$cty_arr);
				  } else {
					  $getcity = $loc_name;
				  }
				  ?>
                  <div class="row add_bottom_45">
				  <? for($i=0; $i<count($getcity); $i++){
						$cid = $getcity[$i];
					?>
                     <div class="col-md-3 other_tours">
                        <ul>
                           <li>
						   <a href="<? echo $siteurl; ?>/list/city/<?=base64_encode($cid);?>/<? echo reurl(getCity($cid)); ?>"><?=getCity($cid);?>
						   <span class="other_tours_price"><?=$db->numrows("select * from register where user_role='1' and active_status='1' and city='$cid'");?></span>
						   </a>
                           </li> 		   
                        </ul>
                     </div>
					  <? } ?>	
                     
                  </div>
                  <!-- End row -->
		<? 	$curdt = date('Y-m-d');	
			$UsersCount = $db->Extract_Single("select count(id) from register where active_status='1' and user_role='0'");
		
			$lyrsCount = $db->Extract_Single("select count(id) from register where active_status='1' and user_role='1'");
		
			$totRevct = $db->Extract_Single("select count(review_id) from review where active_status='1'");
		?>		
                  <div class="banner colored add_bottom_30">
                     <div class="col-sm-4 text-center">
                        <h4>Total Users </h4>
                        <p class="cnt tot_count"><? echo $UsersCount; ?>K+</p>
                     </div>
                     <div class="col-sm-4 text-center">
                        <h4>Total Franchisors </h4>
                        <p class="cnt tot_count"><? echo $lyrsCount; ?>+</p>
                     </div>
                     <div class="col-sm-4 text-center">
                        <h4>Total Reviews </h4>
                        <p class="cnt tot_count"><? echo $totRevct; ?> +</p>
                     </div>
                     <h4>&nbsp;</h4>
                  </div>
               </div>
               <!-- End container -->
            </div>
			
			<div class="container margin_60"> 
			   <div class="main_title">
                  <h2><span>Top</span> Franchisors</h2>
               </div>
               <div class="row">
			   <?
					$GetRecords=$db->get_all("select * from register where user_role='1' and active_status='1' order by overall_rate desc limit 9");					
					foreach($GetRecords as $i=>$GetRecord) {
						$idvalue = $GetRecord['id'];
						$fname = $GetRecord['fname'];
						$lname = $GetRecord['lname'];
						$title = $GetRecord['title'];
						$cat_name = $GetRecord['category'];
						$cat_name = getCategory($cat_name);
						$img = $GetRecord['img'];
						
						$title = checkLength($title,17);
						$name = $fname.' '.$lname;
						$lawyerid = base64_encode($idvalue);
						$reviews_ct = $db->Extract_Single("select count(lawyer_id) from  review where lawyer_id='$idvalue'");
			   ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                     <div class="tour_container">
                        <div class="img_container">
                           <a href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>">
                              <img src="<? echo $siteurl; ?>/uploads/profile/<? echo $img; ?>" width="478px" height="220px" alt="Image">
                             <div class="short_info main_list_bg">
                                 <? echo $cat_name; ?>
                              </div>
                           </a>
                        </div>
                        <div class="tour_title">
                           <h3><a href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>"><? echo $title; ?></a></h3>
                           <div class="rating">
                              <? echo get_Rate($idvalue); ?>
                           </div>
                           <!-- end rating -->
                           <div class="wishlist">
                              <a class="fnt14 btn_bk" href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>">Get Info</a>
                           </div>
                        </div>
                     </div>
                     <!-- End box tour -->
                  </div>
                  <!-- End col-md-4 -->
					<? } ?>
               </div>
               <!-- End row -->
               <p class="text-center nopadding">
			   <? 
				$lawyers_ct = $db->Extract_Single("select count(id) from register where user_role='1' and active_status='1'"); 
			   ?>
                  <a href="<? echo $siteurl; ?>/list" class="btn_1 medium"><i class="icon-eye-7"></i>View all (<? echo $lawyers_ct; ?>) </a>
               </p>
			   </div>
			  
            <!-- End white_bg -->
            <section class="promo_full" style="background: url(<? echo $siteurl; ?>/img/home_bg_2.jpg) no-repeat center center;">
               <div class="promo_full_wp magnific">
                  <div>
                     <? echo $home_footer1; ?>
                  </div>
               </div>
            </section>
            <!-- End section -->
            <div class="container margin_30">
               <div class="row">
                  <div class="col-md-8 col-sm-6 hidden-xs">
                     <img src="<? echo $siteurl; ?>/img/laptop.png" alt="Laptop" class="img-responsive laptop">
                  </div>
                  <div class="col-md-4 col-sm-6">
                    <? echo $home_footer2; ?>
                     <a href="<? echo $siteurl; ?>/list" class="btn_1">Start now</a>
                  </div>
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
			
<style>
.other_tours ul li {
	border-bottom : 1px solid #EEEAE9;
}
.tot_count {
	font-weight : bold;
}
</style>
<?php include("includes/footer.php"); ?>