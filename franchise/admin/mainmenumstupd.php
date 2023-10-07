<?php include'header.php';include'leftmenu.php';
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$main_menu = isSet($main_menu) ? $main_menu : '' ;

if(isset($submit1)){
		$crcdt = time();
		$checkStatus = $db->check1column("main_menu_mst","main_menu",$main_menu);
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "main_menu = '$main_menu'";
			$set  .= ",orderby = '$orderby'";
			$set  .= ",main_menu_icon = '$main_menu_icon'";
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$db->insertrec("insert into main_menu_mst set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update main_menu_mst set $set where main_menu_id='$idvalue'");
				$act = "upd";
			}
			header("location:mainmenumst.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$Message = "<font color='#000'>$main_menu Already Exit's</font>";
		}
	}
if($upd == 1){
	$TextChange = "Add";
	$GetRec = $db->singlerec("select orderby from main_menu_mst order by orderby desc");
	$GetRec1 = $db->singlerec("select main_menu_icon from main_menu_mst order by orderby desc");
	@extract($GetRec);
	@extract($GetRec1);
	$orderby = $orderby + 1;
	$main_menu_icon=$GetRec1['main_menu_icon'];
}
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from main_menu_mst where main_menu_id='$id'");
@extract($GetRecord);

$main_menu = stripslashes($main_menu);
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
	                <h4 class="card-title"><? echo $TextChange;?> Main Menu</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                 <form class="form-horizontal" method="post" action="mainmenumstupd.php" >
					 <input type="hidden" name="idvalue" value="<?echo $id;?>" />
					  <input type="hidden" name="upd" value="<?echo $upd;?>" />
					 <div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
						  <input class="form-control" name="main_menu" value="<?echo $main_menu;?>" type="text" placeholder="">
						</div>
					  </div>
					   <div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Order</label>
						<div class="col-sm-10">
						  <input class="form-control" type="text" name="orderby" value="<?echo $orderby;?>" placeholder="">
						</div>
					  </div>
					  <div class="form-group col-sm-12">
						<label class="col-sm-2 control-label">Icon</label>
						<div class="col-sm-10">
						  <input class="form-control" type="text" name="main_menu_icon" value="<?echo $main_menu_icon;?>">
						</div>
					  </div>
					  
					 <div class="form-actions center col-sm-12">
								<a href="mainmenumst.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" name="submit1" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Save
								</button>
							</div>
					</form>
	               
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
   