<?
	include "includes/header.php"; 
	include "includes/innersearch.php";
	
	if(empty($user_id)){
		echo "<script>location.href='$siteurl/index';</script>";
		header("Location:$siteurl/index");exit;
	}
	
	$user_id=$db->escapstr($user_id);
	
	$user_role = userInfo($user_id,'user_role');
	if($user_role==0) {
		$rev_ct = $db->Extract_Single("select count(user_id) from review where user_id='$user_id' and active_status='1'");  
	} else if($user_role==1) {
		$rev_ct = $db->Extract_Single("select count(lawyer_id) from review where lawyer_id='$user_id' and active_status='1'");  
	}
	
		$my_enq_ct = $db->Extract_Single("select count(user_id) from enquiry where user_id='$user_id'");  
	
		$usr_enq_ct = $db->Extract_Single("select count(cmpy_id) from enquiry where cmpy_id='$user_id'");
	
		$my_rev_ct = $db->Extract_Single("select count(user_id) from review where user_id='$user_id' and active_status='1'");  
	
		$usr_rev_ct = $db->Extract_Single("select count(lawyer_id) from review where lawyer_id='$user_id' and active_status='1'");  
	
?>
            <div  class="container margin_60">
               <div class="row">
			   
                  <?php include "includes/leftmenu.php"; ?>
				  
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
		<div class="row mt20 mb20">
			<div class="col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-85"></i>
                    <h3><span><? echo $my_rev_ct; ?></span> My Reviews</h3>
                    <a href="<? echo $siteurl; ?>/my_reviews" class="btn_1 outline">View All</a>
                </div>
            </div>
			<? if($user_role==1) { ?>
			
				<div class="col-md-6 wow zoomIn" data-wow-delay="0.2s">
					<div class="feature_home">
						<i class=" icon_set_1_icon-53"></i>
						<h3><span><? echo $usr_rev_ct; ?></span> User Reviews</h3>
						<a href="<? echo $siteurl; ?>/user_reviews" class="btn_1 outline">View All</a>
					</div>
				</div>
			
			<? } ?>
			
            
        </div>
		<div class="row mt20 mb20">
		
            <div class="col-md-6 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-53"></i>
                    <h3><span><? echo $my_enq_ct; ?></span> My Enquires</h3>
                    <a href="<? echo $siteurl; ?>/my-enquires" class="btn_1 outline">View All</a>
                </div>
            </div>
            
		<? if($user_role==1) { ?>
		
		<div class="col-md-6 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class=" icon_set_1_icon-53"></i>
                    <h3><span><? echo $usr_enq_ct; ?></span> User Enquires</h3>
                    <a href="<? echo $siteurl; ?>/user-enquires" class="btn_1 outline">View All</a>
                </div>
        </div>
		
		<? } ?>
		</div>
		<? if($user_role==1) { ?>
		<div class="col-sm-12">
		       <h4 style="color:#00bff5;">User's Recent Enquires</h4>
		   </div>
		       <div class="table">
			       <table id="demo-dt-basic" class="table table-striped appointments_tbl">
				       <thead>
					       <tr>
						      <th>S.No</th>						     
						      <th>User Name</th>
							  <th>Phone No.</th>
							  <th>Prefered Location</th>
						      <th>Available Cash (In <?=$site_currency;?>)</th>
							  <th>Comments</th>
						      <th>Date</th>
						   </tr>
					   </thead>
					   <tbody>
					   <? $GetRecords=$db->get_all("select * from enquiry where cmpy_id='$user_id' and send_status='1' order by id desc limit 5");
                            $sno = 1;
							foreach($GetRecords as $i=>$GetRecord) {
								$idvalue = $GetRecord['id'];
								$user_id = $GetRecord['user_id'];
								$phone = $GetRecord['phone'];
								$prefered_loc = $GetRecord['prefered_loc'];
								$avail_cash = $GetRecord['avail_cash'];
								$comment = $GetRecord['comment'];
								$send_dt = $GetRecord['send_dt'];
								$send_dt = date('d-M-Y',strtotime($send_dt));
								$username = ucwords(userInfo($user_id,'fname'));
							?>
					        <tr>
							   <td><?=$sno;?></td>
							   <td><?=$username;?></td>
							   <td><?=$phone;?></td>
							   <td><?=ucfirst($prefered_loc);?></td>
							   <td><?=$avail_cash;?></td>
							   <td width="42%"><?=stripslashes($comment);?></td>
							   <td width="12%"><?=$send_dt;?></td>
							</tr>
							<? $sno++; } 
							?>
						</tbody>
				   </table>
			   </div>
			   <? } ?>
					 </div>
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
<?php include "includes/footer.php"; ?>