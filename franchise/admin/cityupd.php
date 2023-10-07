<? include 'header.php';
include 'leftmenu.php';
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$sid = isSet($sid) ? $sid : '' ;
$cid = isSet($cid) ? $cid : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message  = isSet($Message) ? $Message : '' ;
$city_name = isSet($city_name) ? $city_name : '' ;

if(isset($submit)) {
    $crcdt = time();
    $city_name  = trim(addslashes($city_name));
	$checkStatus = $db->check1column("city","city_name",$city_name);
	if($city_name != ''){
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "city_name = '$city_name'";
			if($upd == 1){
				$set  .= ",city_status = '1'";
				$set  .= ",city_state_id = '$sid'";
				$set  .= ",city_country_id = '$cid'";
				$db->insertrec("insert into city set $set");
				$act = "add";
			}
			else if($upd == 2){
				$db->insertrec("update city set $set where city_id='$idvalue'");
				$act = "upd";
			}
			header("location:city.php?&cid=$cid&sid=$sid");
			exit;
			}
			else{
			$upd = $upd ;
			$Message = "<font color='red'>$city_name Already Exit</font>";
		}
    } 
	else{
		$upd = $upd ;
		$Message = "<font color='red'>Input Fields Marked With * are compulsory</font>";
	}
}
if($upd==1){
	$TextChange = "Add";
}
else if($upd==2){
	$TextChange = "Update";
	$Getmaincat=$db->singlerec("select * from city where city_id='$id'");
    $city_name = stripslashes($Getmaincat['city_name']);
}

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
	                <h4 class="card-title"><? echo $TextChange;?> City</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               	<form class="form-horizontal" method="post" action="">
							<input type="hidden" name="idvalue" value="<?echo $cid;?>" />
							<input type="hidden" name="sidval" value="<?echo $sid;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
					        <div class="form-group col-sm-12">
								<label class="col-sm-2 control-label">Name <font color="red">*</font></label>
								<div class="col-sm-10"><input type="text" name="city_name" id="city_name" value="<? echo $city_name; ?>" class="form-control">
								</div>
							</div>
					
					  
					  
					  <div class="form-actions center col-sm-12">
								<a href="city.php?cid=<? echo $cid; ?>&sid=<? echo $sid;?>" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button type="submit" class="btn btn-primary" name="submit" >
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

<? include 'footer.php'; ?>