<? include 'header.php';
include 'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$sid = isSet($sid) ? $sid : '' ;
$cid = isSet($cid) ? $cid : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$city_name = isSet($city_name) ? $city_name : '' ;

if($act == "del") {
	$db->insertrec("delete from city where city_id='$id'");
    header("location:city.php?act='del'&cid=$cid&sid=$sid&page=$page");
    exit ;
}
if($status == "1") {
    $aa = $db->insertrec("update city set city_status='0' where city_id='$id'");
    header("location:city.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update city set city_status='1' where city_id='$id'");
    header("location:city.php?upd=2&cid=$cid&sid=$sid&act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from city where city_state_id='$sid' order by city_name asc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $idvalue = $GetRecord[$i]['city_id'] ;
	$city_name=$GetRecord[$i]['city_name'];
	$active_status = $GetRecord[$i]['city_status'] ;
	
	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = "<a href='city.php?id=$idvalue&sid=$sid&cid=$cid&status=$active_status' title='Inactivate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='city.php?id=$idvalue&sid=$sid&cid=$cid&status=$active_status' title='Inactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='cityupd.php?upd=2&id=$idvalue&sid=$sid&cid=$cid'data-toggle='tooltip' title='Edit' class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
    $disp .="<tr>
				<td>$slno</td>
				<td align='left'>$city_name</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					$DisplayStatus
					$EditLink
					<a href='city.php?act=del&id=$idvalue&sid=$sid&cid=$cid' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' onclick='return makesure()' title='Delete'><i class='fa fa-trash-o'></i></a>
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
	                <h4 class="card-title">City</h4>
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
				    <a href="state.php?cid=<?=$cid;?>" class="btn btn-info nrdr_r_zero">Back</a>
					<a href="cityupd.php?upd=1&cid=<? echo $cid; ?>&sid=<? echo $sid;?>" class="btn btn-info nrdr_r_zero">Add New</a>
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