<? include'header.php'; 
include'leftmenu.php';
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
	$Remimage=$db->singlerec("select img from category where id='$id'");
	$Removeimage="../uploads/category/" .$Remimage['img'];
	@unlink($Removeimage);
    $db->insertrec("delete from category where id='$id'");
    header("location:category.php?act=delt");
    exit;
}
if($status == "1") {
    $db->insertrec("update category set active_status='0' where id='$id'");
    header("location:category.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update category set active_status='1' where id='$id'");
    header("location:category.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from category order by category_name asc");


if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = stripslashes($GetRecord[$i]['id']);
	$category_name=$GetRecord[$i]['category_name'];
	$category_name=ucwords($category_name);
	$img=$GetRecord[$i]['img'];
	$active_status = $GetRecord[$i]['active_status'];
	$slno = $i + 1 ;
	
	if($active_status == '0'){
        $DisplayStatus = "<a href='category.php?id=$idvalue&status=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a href='categoryupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='category.php?id=$idvalue&status=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='categoryupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	}
	
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$category_name</td>
				<td  align='left'> <img src='../uploads/category/".$img."' width='100px' class='img-circle'/></td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
					$DisplayStatus
					$EditLink
					<a href='category.php?id=$idvalue&act=del' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				</div>
				</td>
			</tr>";
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
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Category</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
                        <h4 class='succ_msg'><?echo $Message;?></h4>
	                <h4 class="card-title">All Category</h4>
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
				        <a href="categoryupd.php?upd=1" class="btn btn-info nrdr_r_zero">Add New</a>
					</div>
	                <div class="card-block card-dashboard table-responsive">
	                
	                <table class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>SN</th>
					                <th style="min-width: 150px;">Category Name</th>
					                <th style="min-width: 150px;">Image</th>
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