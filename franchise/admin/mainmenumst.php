<? include'header.php';include'leftmenu.php'?>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '1' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
    $db->insertrec("delete from main_menu_mst where main_menu_id='$id'");
    header("location:mainmenumst.php?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update main_menu_mst set active_status='0' where main_menu_id='$id'");
    header("location:mainmenumst.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update main_menu_mst set active_status='1' where main_menu_id='$id'");
    header("location:mainmenumst.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from main_menu_mst where active_status !='2' and callup='0' order by active_status desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $idvalue = $GetRecord[$i]['main_menu_id'] ;
	$main_menu = stripslashes($GetRecord[$i]['main_menu']);
    $active_status = $GetRecord[$i]['active_status'] ;
	$orderby = $GetRecord[$i]['orderby'] ;
	$slno = $i + 1 ;
    if($active_status == '0'){
        $DisplayStatus = "<a href='mainmenumst.php?id=$idvalue&status=$active_status'  type='button' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a href='mainmenumstupd.php?upd=2&id=$idvalue' type='button' class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='mainmenumst.php?id=$idvalue&status=$active_status'  type='button' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='mainmenumstupd.php?upd=2&id=$idvalue' type='button' class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td style='width:10px;'>$orderby</td>
				<td>$main_menu</td>
				<td>$status_active</td>
				<td
				<div class='btn-group btn-sm' role='group' aria-label='Basic example'>
				 
                                    
				$DisplayStatus
				$EditLink
				<a href='mainmenumst.php?id=$idvalue&act=del' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>
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
            <h3 class="content-header-title mb-0">Main Menu</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->

<section id="html">
	<div class="row">
	    <div class="col-xs-12">
		
	        <div class="card">
		
	            <div class="card-header">

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
					<h4 class='succ_msg'><?echo $Message;?></h4>
	            <div class="card-body collapse in">
	                <div class="col-sm-12" style="text-align: right;">
					<a href="mainmenumstupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
					<div class="card-block card-dashboard table-responsive">
	                
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>S.No</th>
									<th >Order</th>
									<th>Menu Name</th>
									<th>Status</th>
									<th style="min-width: 150px;">Action</th>
					            </tr>
					        </thead>
					        <tbody>
					           <?echo $disp; ?>
					        </tbody>
					        
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