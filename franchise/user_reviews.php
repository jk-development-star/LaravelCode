<?
	include "includes/header.php"; 
	include "includes/innersearch.php";
	
	if(empty($user_id)){
		echo "<script>location.href='$siteurl/index';</script>";
		header("Location:$siteurl/index");exit;
	}
	$user_id=$db->escapstr($user_id);
	
		
$act = isSet($act) ? $act : '' ; 
$rev_id = isSet($rev_id) ? $db->escapstr($rev_id) : '' ;

if($act == "del") {
    $db->insertrec("delete from review where review_id='$rev_id'");
	
	echo "<script>location.href='$siteurl/user_reviews/?act=delt'</script>";	
    header("location:$siteurl/user_reviews/?act=delt");
    exit ;
}
?>
            <div  class="container margin_60">
               <div class="row">
             <?php if($act=="delt"){
					echo "<div class='alert alert-success'> Review Deleted Successfully</div>";
					}
			?>
                   <?php include "includes/leftmenu.php"; ?>
				   
                  <div class="col-lg-9 col-md-9">
                     <div class="col-sm-12 profile_box">
                    <div class="row mt20 mb10">
		   <div class="col-sm-12">
		       <h4 style="color:#00bff5;">User Reviews</h4>
		   </div>
		   <div class="clearfix"></div>
<?

	$GetRecords=$db->get_all("select * from review where lawyer_id='$user_id' and active_status='1' order by review_id desc");
    $GetRecordsnum=$db->numrows("select * from review where lawyer_id='$user_id' and active_status='1' order by review_id desc");

$sno = 1;

$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['review_id'];
	$usr_id = $GetRecord['user_id'];
	$lyr_id = $GetRecord['lawyer_id'];
	$stars = $GetRecord['stars'];
	$comment=$GetRecord['comment'];
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
	$username = userInfo($usr_id,'fname');
	$lyr_fname = userInfo($lyr_id,'fname');
	$lyr_fname = reurl($lyr_fname);
	$title = userInfo($lyr_id,'title');
	$title = reurl($title);
	$lawyerid = base64_encode($lyr_id);
	$com = checkLength($comment,35);
	$com_lmt = "";
	if(strlen($comment) > 35) { 
		$com_lmt ="<a target='_blank' href='$siteurl/detail/$lawyerid/$lyr_fname/$title' style='color:#36f;'>Read more.</a>       
       </p>";
	}

	$disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$username</td>
				<td  align='left' width='30%'>     
					<p>  $com $com_lmt
				</td>							
				<td  align='left'>$crcdt</td>			
				<td width='17%'>
				 <ul class='edt_list'>
					<li><a target='_blank' href='$siteurl/detail/$lawyerid/$lyr_fname/$title' class='btn-sm btn-info'><i class='icon-eye-1'></i></a></li>					
				 </ul>
				</td>
			</tr>";
			$sno++;
}
?>
		   <div class="col-sm-12">
		       <div class="table">
			       <table id="demo-dt-basic" class="table table-striped appointments_tbl">
				       <thead>
					       <tr>
						      <th>S.No</th>							 
						      <th>Reviewer Name</th>							 
						      <th>Comments</th>
						      <th>Post Date</th>
						      <th>Action</th>
						   </tr>
					   </thead>
					   <tbody>
					  <? echo $disp; ?>							
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