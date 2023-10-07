<? include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$cid = isSet($cid) ? $cid : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$sid = isSet($sid) ? $sid : '' ;

if($act == "del") {
	$db->insertrec("delete from state where state_id='$sid'");
    header("location:state.php?cid=$cid&sid=$sid&act='del'");
    exit ;
}
if($status == "1") {
	$crcdt = time();
    $db->insertrec("update state set state_status='0' where state_id='$sid'");
	    header("location:state.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update state set state_status='1' where state_id='$sid'");
    header("location:state.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from state where state_country_id='$cid' order by state_name asc ");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++){
    $idvalue = $GetRecord[$i]['state_country_id'] ;
	$sid = $GetRecord[$i]['state_id'];
	$state_name=$GetRecord[$i]['state_name'];
	$active_status = $GetRecord[$i]['state_status'] ;
	
	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = "<a href='state.php?&cid=$idvalue&status=$active_status&sid=$sid' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='state.php?&cid=$idvalue&status=$active_status&sid=$sid' title='Inactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='stateupd.php?upd=2&cid=$idvalue&sid=$sid' data-toggle='tooltip' title='Edit'class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";

    $disp .="<tr>
				<td>$slno</td>
				<td align='left'><a href='city.php?&cid=$idvalue&sid=$sid'>$GT_RightSign $state_name</a></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					$DisplayStatus
					$EditLink
					<a href='state.php?cid=$idvalue&sid=$sid&act=del' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
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
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Location</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				<h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">State</h4>
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
				    <a href="country.php" class="btn btn-info">Back</a>
					<a href="stateupd.php?upd=1&cid=<? echo $cid; ?>" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>SNo</th>
					                <th style="min-width: 150px;">Name</th>
					                <th style="min-width: 150px;">Action</th>
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


  <? include'footer.php'; ?>