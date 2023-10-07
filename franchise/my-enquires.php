<?php include "includes/header.php"; 
include "includes/innersearch.php";
$id = isSet($id) ? $id : '' ; 
$act = isSet($act) ? $act : '' ; 
if(empty($user_id)){
	echo "<script>location.href='$siteurl/index';</script>";
	header("Location:$siteurl/index");exit;
}

	$user_id=$db->escapstr($user_id);
if(isset($sub)){
	echo "<script>swal('Success','Your Enquiry has been Submitted successfully!','success');</script>";
}
?>
            <div  class="container margin_60">
               <div class="row">
                  <?php include "includes/leftmenu.php"; ?>
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
					   
		
		<div class="row mt20 mb10">
		   <div class="col-sm-12">
		       <h4 style="color:#00bff5;">My Enquires</h4>
		   </div>
		   <div class="clearfix"></div>
		   <div class="col-sm-12">
		       <div class="table">
			       <table id="demo-dt-basic" class="table" >
				       <thead>
					       <tr>
						      <th>S.No</th>						     
						      <th>Company Name</th>
							  <th>Prefered Location</th>
						      <th>Available Cash (In <?=$site_currency;?>)</th>
							  <th>Comments</th>
						      <th>Date</th>
						   </tr>
					   </thead>
					   <tbody>
						<? $GetRecords=$db->get_all("select * from enquiry where user_id='$user_id' order by id desc");
                            $sno = 1;
							foreach($GetRecords as $i=>$GetRecord) {
								$idvalue = $GetRecord['id'];
								$cmpy_id = $GetRecord['cmpy_id'];			
								$prefered_loc = $GetRecord['prefered_loc'];
								$avail_cash = $GetRecord['avail_cash'];
								$comment = $GetRecord['comment'];
								$send_dt = $GetRecord['send_dt'];
								$send_dt = date('d-M-Y',strtotime($send_dt));
								$title_name = ucwords(userInfo($cmpy_id,'title'));
								$enc_cmpy_id = base64_encode($cmpy_id);
								$fname = reurl(userInfo($cmpy_id,'fname'));
								$reurl_title = reurl($title_name);
								$title_name = "<b><a href='$siteurl/detail/$enc_cmpy_id/$fname/$reurl_title'> $title_name </a></b>";
							?>
							 <tr>
							   <td><?=$sno;?></td>
							   <td><?=$title_name;?></td>
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
		   </div>
		</div>
					 </div>
                  </div>
                  <!-- End col lg-9 -->
               </div>
               <!-- End row -->
            </div>
            <!-- End container -->
<?php include "includes/footer.php"; ?> 
  