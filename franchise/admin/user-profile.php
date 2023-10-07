<? include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$active_status=isSet($active_status)?$active_status:'';
$Title=isSet($Title)?$Title:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';

if($act == "del") {
	$GetImg = $db->singlerec("select img from register where id='$id'");
	$img=$GetImg["img"];
	
	if($img!="noimage.png"){
		$RemoveImage = "../uploads/profile/$img";
		unlink($RemoveImage);
	}
		
	$db->insertrec("delete from register where id='$id'");
	$db->insertrec("delete from request where user_id='$id'");
	$db->insertrec("delete from review where user_id='$id'");
	$db->insertrec("delete from enquiry where user_id='$id'");

	echo "<script>location.href='user-profile.php?act=delt'</script>";	
    header("location:user-profile.php?act=delt");
    exit ;
}
if($status == "1") {
    $db->insertrec("update register set active_status='0' where id='$id'");
	
	echo "<script>location.href='user-profile.php?act=sts'</script>";
    header("location:user-profile.php?act=sts");
    exit ;
}
else if($status == "0") {   
    $db->insertrec("update register set active_status='1' where id='$id'");
	echo "<script>location.href='user-profile.php?act=sts'</script>";
	header("location:user-profile.php?act=sts");
    exit ;
}
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);

$GetRecords=$db->get_all("select * from register where user_role='0' order by id desc");
$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	$email=$GetRecord['email'];
	$reg_ip=$GetRecord['reg_ip'];	
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='user-profile.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='user-profile.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
    $name = $fname.' '.$lname;
	$name="<a href='userview.php?id=$idvalue' target='_blank'>$GT_RightSign $name</a>";
	$EditLink = "<a href='user-profileupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$name</td>
				<td  align='left'>$email</td>
				<td  align='left'>$reg_ip</td>				
				<td  align='left'>$crcdt</td>				
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='userview.php?id=$idvalue' title='View Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
				    $DisplayStatus
				    $EditLink
					<a href='user-profile.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
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
            <h3 class="content-header-title mb-0">All Users</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Registerd Users</h4>
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
				    <div class="col-sm-12" style="text-align: right;">
				        <a href="user-profileupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					               <th>S.No.</th>
									<th>User Name</th>
									<th>Email Address</th>
									<th>Register IP</th>
									<th>Join Date</th>	
					                <th style="min-width: 200px;" class='cntrhid'>Action</th>
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