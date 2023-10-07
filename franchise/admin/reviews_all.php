<? include 'header.php';
include 'leftmenu.php';
$id = isSet($id) ? $db->escapstr($id) : '' ;
$act = isSet($act) ? $act : '' ; 
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$f_status = isSet($f_status) ? $f_status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$daterange=isSet($daterange)?$daterange:'';
$approvest=isSet($approvest)?$approvest:'';
$highest=isSet($highest)?$highest:'';
$active_status=isSet($active_status)?$active_status:'';
$mobile=isSet($mobile)?$mobile:'';
$country=isSet($country)?$country:'';
$Title=isSet($Title)?$Title:'';
$user_access=isSet($user_access)?$user_access:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';



if($act == "del") {	
    $db->insertrec("delete from review where review_id='$id'");
	
	echo "<script>location.href='reviews_all.php?act=delt'</script>";	
    header("location:reviews_all.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update review set active_status='0' where review_id='$id'");
	
	echo "<script>location.href='reviews_all.php?act=sts'</script>";
    header("location:reviews_all.php?act=sts");
    exit ;
}
else if($status == "0") {
    
		
		$db->insertrec("update review set active_status='1' where review_id='$id'");
	
			
	echo "<script>location.href='reviews_all.php?act=sts'</script>";
	header("location:reviews_all.php?act=sts");
    exit ;
}

$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
//print_r($numbers);

$filter=""; 
$orderby="order by id desc";


$GetRecords=$db->get_all("select * from review order by review_id desc");

$sno = 1;
if(count($GetRecords)==0)
    $Message="No Reviews Found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
	$user_id = $GetRecord['user_id'];
	$lawyer_id = $GetRecord['lawyer_id'];
	$idvalue = $GetRecord['review_id'];
	$title = $GetRecord['title'];
	$comment = $GetRecord['comment'];
	$rate = $GetRecord['stars'];
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
	$u_fname = userInfo($user_id,'fname');
	$u_lname = userInfo($user_id,'lname');
	$user_name = $u_fname.' '.$u_lname;
	
	$title = userInfo($lawyer_id,'title');
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='reviews_all.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='reviews_all.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}	
	
	$com = checkLength($comment,35);
	$com_lmt = "";
	if(strlen($comment) > 35) { 
		$com_lmt ="<a target='_blank' href='review-view.php?id=$idvalue' style='color:#36f;'>Read more.</a>       
       </p>";
	}
	
	$user_name="<a target='_blank' href='review_userwise.php?id=$user_id'>$GT_RightSign $user_name</a>";
	$title="<a target='_blank' href='review.php?id=$lawyer_id'>$GT_RightSign $title</a>";
	
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left'>$user_name</td>
				<td  align='left' class='name'>$title</td>
		        <td  align='left' width='30%'>     
					<p>  $com $com_lmt
				</td>
				<td  align='left'>$rate</td>
                <td  align='left'>$crcdt</td>
				<td width='17%'>
				<div class='btn-group btn-group-xs'>
				<a href='review-view.php?id=$idvalue' title='View Review Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					$DisplayStatus
					<a  href='reviews_all.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				</div>
				</td>
			</tr>";
			$sno++;
}
if($act == "delt")
    $Message = "Deleted Successfully" ;
else if($act == "upd")
    $Message = "Updated Successfully" ;
else if($act == "add")
    $Message = "Added Successfully" ;
else if($act == "sts")
    $Message = "Status Changed Successfully" ;
else if($act == "fsts")
    $Message = "Added to Featured List" ;
else if($act == "frsts")
    $Message = "Removed from Featured List" ;
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Reviews</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Reviews</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				  
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>Reviewer Name</th>
									<th><?=$keyword;?> Name</th>
									<th>Message</th>
									<th>Ratings</th>
									<th>Created Date</th>
                                    <th style="min-width: 150px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
							<tbody><?echo $disp; ?></tbody>
					    </table>
					</div>
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

<? include 'footer.php'; ?>