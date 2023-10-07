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
	
	echo "<script>location.href='$siteurl/my_reviews/?act=delt'</script>";	
    header("location:$siteurl/my_reviews/?act=delt");
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
		       <h4 style="color:#00bff5;">My Reviews</h4>
		   </div>
		   <div class="clearfix"></div>
<?

	$GetRecords=$db->get_all("select * from review where user_id='$user_id' and active_status='1' order by review_id desc");
    $GetRecordsnum=$db->numrows("select * from review where user_id='$user_id' and active_status='1' order by review_id desc");

$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['review_id'];
	$usr_id = $GetRecord['user_id'];
	$cpy_id = $GetRecord['lawyer_id'];
	$stars = $GetRecord['stars'];
	$comment=$GetRecord['comment'];
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
	$title_name = userInfo($cpy_id,'title');
	$title = reurl($title_name);
	$name = userInfo($cpy_id,'fname');
	$name = reurl($name);
	$cmpy_id = base64_encode($cpy_id);
	$com = checkLength($comment,35);
	$com_lmt = "";
	if(strlen($comment) > 35) { 
		$com_lmt ="<a target='_blank' href='$siteurl/detail/$cmpy_id/$name/$title' style='color:#36f;'>Read more.</a>       
       </p>";
	}
	
	$del_row = "<li><a onclick='return makesure();' href='$siteurl/my_reviews/?rev_id=$idvalue&act=del' class='btn-sm btn-danger'><i class='icon-trash'></i></a></li>";

	$disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$title_name</td>
				<td  align='left' width='30%'> <p>  $com $com_lmt </td>							
				<td  align='left'>$crcdt</td>			
				<td width='17%'>
				 <ul class='edt_list'>
					<li><a target='_blank' href='$siteurl/detail/$cmpy_id/$name/$title' class='btn-sm btn-info'><i class='icon-eye-1'></i></a></li>
					$del_row
				 </ul>
				</td>
			</tr>";
			$sno++;
}
?>
		   <div class="col-sm-12">
		       <div  class="table">
			       <table id="demo-dt-basic" class="table table-striped table-bordered appointments_tbl">
				       <thead>
					       <tr>
						      <th>S.No</th>							 
						      <th>Company Name</th>							 
						      <th>Comments</th>
						      <th>Post Date</th>
						      <th>Action</th>
						   </tr>
					   </thead>
					   <tbody>
					        <? echo $disp;  ?>
					 						
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