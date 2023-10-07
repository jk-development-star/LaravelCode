<? include 'header.php';
include 'leftmenu.php'; 
$country_id = isSet($country_id) ? $country_id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$act = isSet($act) ? $act : '' ;

if($act == "del") {
	$db->insertrec("delete from country where country_id='$country_id'");
    header("location:country.php?act='del'&page=$page");
    exit ;
}
if($status == "1") {
	$crcdt = time();
    $db->insertrec("update country set country_status='0' where country_id='$country_id'");
    header("location:country.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update country set country_status='1' where country_id='$country_id'");
    header("location:country.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from country order by country_name");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $country_id = $GetRecord[$i]['country_id'] ;
	$country_name=$GetRecord[$i]['country_name'];
	$active_status = $GetRecord[$i]['country_status'] ;
	
	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = "<a href='country.php?country_id=$country_id&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='country.php?country_id=$country_id&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}
	$EditLink = "<a href='countryupd.php?upd=2&id=$country_id' data-toggle='tooltip' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'><a href='state.php?cid=$country_id'>$GT_RightSign $country_name</a></td>
				<td >
				<div class='btn-group btn-sm' role='group' aria-label='Basic example'>
					$DisplayStatus
				    $EditLink
					<a href='country.php?country_id=$country_id&act=del'   title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<h4 class='succ_msg'>Deleted Successfully</h4>" ;
else if($act == "upd")
    $Message = "<h4 class='succ_msg'>Updated Successfully</h4>" ;
else if($act == "add")
    $Message = "<h4 class='succ_msg'>Added Successfully</h4>" ;
else if($act == "sts")
    $Message = "<h4 class='succ_msg'>Status Changed Successfully</h4>" ;
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
	                <h4 class="card-title">Country</h4>
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
				        <a href="countryupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
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
					       <!-- <tbody>
					            <tr>
					                <td>1</td>
					                <td>Tiger Nixon</td>
					                <td>Neurologist</td>
					                <td>Tiger@gmail.com</td>
					                <td>4.8</td>
					                <td>Edinburgh</td>
					                <td>192.168.1.26</td>
					                <td>2017/04/25</td>
					                <td><div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                        <a href="#" type="button" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-search"></i></a>
										<a href="#" type="button" class="btn btn-sm btn-icon btn-secondary btn-success"><i class="fa fa-check"></i></a>
										<a href="#" type="button" class="btn btn-sm btn-icon btn-secondary btn-warning"><i class="fa fa-pencil-square-o"></i></a>
										<a href="#" type="button" class="btn btn-sm btn-icon btn-secondary btn-danger"><i class="fa fa-times"></i></a>
                                    </div></td>
					            </tr>
					           
					           
					        </tbody> -->
					        
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