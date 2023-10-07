<? include 'header.php';include 'leftmenu.php'; 
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$MM_id = isSet($MM_id) ? $MM_id : '' ;
$sub_menu = isSet($sub_menu) ? $sub_menu : '' ;
$disp_sub_menu=isSet($disp_sub_menu) ? $disp_sub_menu : '' ;

if($submit) {
    $crcdt = time();
	$disp_sub_menu = trim(addslashes($disp_submenu));
		$checkStatus = $db->check2column("sub_menu_mst","sub_menu",$sub_menu,"main_menu_id",$MM_id);
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			//$disp_sub_menu = str_replace(".php","",$sub_menu);
			$set  = "main_menu_id = '$MM_id'";
			$set  .= ",sub_menu = '$sub_menu'";
			$set  .= ",disp_sub_menu = '$disp_sub_menu'";
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$db->insertrec("insert into sub_menu_mst set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update sub_menu_mst set $set where sub_menu_id='$idvalue'");
				$act = "upd";
			}
			header("location:submenumst.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$Message = "<font color='#000'>$sub_menu Already Exit's to the same Main Menu</font>";
		}
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2){
	$TextChange = "Update";
$GetRecord = $db->singlerec("select * from sub_menu_mst where sub_menu_id='$id'");
@extract($GetRecord);
$sub_menu = stripslashes($sub_menu);
$MM_id=$main_menu_id;
}
$MM_List = "<option value=''>- - Select - -</option>";
$DropDownQry = "select main_menu_id,main_menu from  main_menu_mst where active_status='1' order by main_menu";
$MM_List .= $drop->get_dropdown($db,$DropDownQry,$MM_id);
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Sub Menu</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title"><? echo $TextChange;?> Sub Menu</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	                <form class="form-horizontal" method="post" action="submenumstupd.php" >
                      <input type="hidden" name="idvalue" value="<? echo $id; ?>" />
                      <input type="hidden" name="upd" value="<? echo $upd; ?>" />
					           <div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Sub Menu</label>
									<div class="col-sm-10">
										<select  class="form-control" name="MM_id" id="MM_id" ><?echo $MM_List; ?></select>
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Sub Menu</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" name="sub_menu" id="sub_menu" value="<?echo $sub_menu; ?>" placeholder="Enter Sub Menu">
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-2 control-label" for="demo-hor-inputemail">Display Name</label>
									<div class="col-sm-10">
									<input type="text" class="form-control" name="disp_submenu" value="<?echo $disp_sub_menu; ?>" placeholder="Enter Display Name">
									</div>
								</div>
					  
					  
					       <div class="form-actions center col-sm-12">
								<a href="submenumst.php"  class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel </a>
								</a>
								<button type="submit" name="submit" class="btn btn-primary" value="submit">
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
<script type="text/javascript">
function menucheck(){
	var valfrm = document.menuval;		
	if(valfrm.MM_id.value == 0){
		document.getElementById("MM_id").style.borderColor = "red";
		valfrm.MM_id.focus();
		return false;
	}
	if(valfrm.sub_menu.value == 0){
		document.getElementById("sub_menu").style.borderColor = "red";
		valfrm.sub_menu.focus();
		return false;
	}
	return true;
}
</script>