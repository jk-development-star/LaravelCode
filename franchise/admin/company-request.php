<? include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$uid = isSet($uid) ? $db->escapstr($uid) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$req_sts = isSet($req_sts) ? $db->escapstr($req_sts) : '' ;
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
    $db->insertrec("delete from request where id='$id'");
	
	echo "<script>location.href='company-request.php?act=delt'</script>";	
    header("location:company-request.php?act=delt");
    exit ;
}
if($req_sts == "acc") {
	$fname = userInfo($uid,'fname');
	$lname = userInfo($uid,'lname');
	$to_email = userInfo($uid,'email');
	$fromemail = $from_email;
	$subject  = "Company Request Status from $sitetitle";
	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact_num = $GetContact['ctc_num'];
	$title = "<center> Welcome to $sitetitle</center>";
	$text = "<span style='padding:0;'> Your Company Request Status was Accepted</center>";
	$text .= "<br />Click the above button to check your status on live.</span>";		
	$url = "$siteurl";			
	$username = ucwords($fname." ".$lname);
	
	$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
	
	$com_obj->email($fromemail,$to_email,$subject,$message);
	
	$db->insertrec("update request set request_status='1' where id='$id'");
	$db->insertrec("update register set user_role='1' where id='$uid'");
		
	echo "<script>location.href='company-request.php?act=sts'</script>";
    header("location:company-request.php?act=sts");
    exit ;
}
else if($req_sts == "rejt") {
	$fname = userInfo($uid,'fname');
	$lname = userInfo($uid,'lname');
	$to_email = userInfo($uid,'email');
	$fromemail = $from_email;
	$subject  = "Company Request Status from $sitetitle";	
	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact_num = $GetContact['ctc_num'];
	$title = "<center> Welcome to $sitetitle</center>";
	$text = "<span style='padding:0;'> Your Company Request Status was Rejected. Try again.";
	$text .= "<br />Click the above button to check your status on live.</span>";		
	$url = "$siteurl";			
	$username = ucwords($fname." ".$lname);
	
	$message = $email_temp->style_blue($siteinfo,$username,$title,$text,$contact_num,$url);
	
	$com_obj->email($fromemail,$to_email,$subject,$message);
		
	$db->insertrec("update register set lawyer_status='5' where id='$uid'");	
	$db->insertrec("update request set request_status='2' where id='$id'");
		
	echo "<script>location.href='company-request.php?act=sts'</script>";
    header("location:company-request.php?act=sts");
    exit ;
}

$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);

if(isset($wait)) {
	$sq = "select * from  request where request_status='0' order by id desc";
} else {
	$sq = "select b.* from  request b inner join register r on r.id=b.user_id and (r.lawyer_status='2' or r.lawyer_status='5') order by b.id desc";
}


$GetRecords=$db->get_all($sq);

$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$user_id = $GetRecord['user_id'];
	$category =$GetRecord['category'];
	$title_name=$GetRecord['title'];	
	$user_ip=$GetRecord['user_ip'];
	$req_sts = $GetRecord['request_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
	}	
	
	$title_name = ucwords(checkLength(stripslashes($title_name),15));
	$category = ucwords(getCategory($category));
	
	if($req_sts==0) {
		$accept = "<a href='company-request.php?req_sts=acc&id=$idvalue&uid=$user_id'> <button class='btn-sm btn-info'>Accept <i class=' icon-ok-circled-1'></i></button> </a>";
		$reject = "<a href='company-request.php?req_sts=rejt&id=$idvalue&uid=$user_id'> <button class='btn-sm btn-warning'>Reject <i class='icon-cancel-circled'></i></button> </a>";
		$req_sts = $accept.' '.$reject;
	}
	if($req_sts==1)
		$req_sts = "<button class='btn-sm btn-success' style='cursor:default;'>Accepted <i class=' icon-ok-circled-1'></i></button>";
	if($req_sts==2)
		$req_sts = "<button class='btn-sm btn-danger' style='cursor:default;'>Rejected <i class='icon-cancel-circled'></i></button>";
	
    $disp .="<tr>
				<td align='left'>$sno</td>
				<td align='left'>$title_name</td>
				<td align='left'>$category</td>
				<td align='left'>$user_ip</td>					
				<td align='left'>$crcdt</td>
				<td align='center'>$req_sts </td>				
				<td>
				<div class='btn-group btn-group-xs'>
					<a href='company-req-view.php?id=$idvalue' title='View Company Request Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					<a  href='company-request.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>	
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
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">All <?=$keyword;?> Requests</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <!--<li><a data-action="close"><i class="ft-x"></i></a></li>-->
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				    
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
								   <th><?=$keyword;?> Name</th>
									<th>Category</th>
									<th>User IP</th>
									<th>Request Date</th>
									<th><?=$keyword;?> Status</th>		
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
</section>
<!--/ HTML (DOM) sourced data -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<? include 'footer.php'; ?>