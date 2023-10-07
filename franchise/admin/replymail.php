<? include 'header.php';
include 'leftmenu.php';
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$idv  = isSet($idv) ? $db->escapstr($idv) : '' ;
$sub = isset($sub)?$sub:'';
$msg = isset($msg)?$msg:'';
$multi = isset($multi)?$multi:'';

if(isset($send)) {	
	$to_mail = $db->escapstr($tomail);
	$sub = $db->escapstr($sub);
	$message = $msg;
	
	$from = stripslashes($siteemail);
	
	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact = $GetContact['ctc_num'];
	$title="Thank you for getting in touch with us!";
	$username = ctcEmail($idv,'fname');
		
	if(isset($multi) && ($multi=="multi_cont")) {
		$to_all = explode(",",$tomail);
		
		foreach($to_all as $to) {
			
				$msg = $email_temp->notice_mail($GetSite,'',$title,$message,$contact);	
		echo 
				$com_obj->email($from,$to,$sub,$msg);
		}
		
		echo "<script>location.href='user-ctcform-details.php?act=sent_all'</script>";
		header("location:user-ctcform-details.php?act=sent_all");
	}		
	else {
		$msg = $email_temp->notice_mail($GetSite,$username,$title,$message,$contact);
		$com_obj->email($from,$to_mail,$sub,$msg);
	   
		echo "<script>location.href='user-ctcform-details.php?act=sent'</script>";
		header("location:user-ctcform-details.php?act=sent");		
	}
		
}

$to = ctcEmail($idv,'email');

if(isset($sel_id)) {
	$ids = $sel_id;
	$arr = explode(",",$ids);				
	$str = "";
	$arr_ct = count($arr);
	for($i=0; $i < $arr_ct; $i++) {
		$str.= ctcEmail($arr[$i],'email').",";
	}	
	
	$str = rtrim($str,',');
}

?>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Contact Us</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Reply mail</h4>
					<? echo $msg; ?>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			
	            </div>
	            <div class="card-body collapse in">
	                <div class="card-block card-dashboard table-responsive">
	               
					<form name="rply" class="form-horizontal" method="post" action=""  autocomplete="off">							
							<? if(isset($sel_id)) { ?>
								<input type="hidden" name="multi" value="multi_cont" />
							<? } ?>
							<div class="panel-body">
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> To <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="tomail" class="form-control" value="<?   if(isset($sel_id)) { echo $str; } else { echo $to; } ?>" readonly />
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Subject <span class="req">*</span> </label>
									<div class="col-sm-9">
										<input type="text" name="sub" class="form-control" />
									</div>
								</div>
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label"> Content <span class="req">*</span> </label>
									<div class="col-sm-9">
                                      <textarea name="msg" id="msg" class="form-control tiny" style="php:100px" placeholder="Leave your Message here">
									 </textarea>									
									</div>
								</div>
								
								<div class="form-group col-sm-12">
									<label class="col-sm-3 control-label">  </label>
									<div class="col-sm-9">
										<span id="DispResign"></span>
									</div>
								</div>
								
								
					  <div class="form-actions center col-sm-12">
								<a href="user-ctcform-details.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Cancel
								</a>
								<button  onClick="return rply_valid();" type="submit" name="send" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Send
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

        <!--Javascript Myjs-->
<? include 'footer.php'; ?>