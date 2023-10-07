<? include 'header.php';
include 'leftmenu.php'; 
$msg="";

$id = isSet($id) ? $db->escapstr($id):'';
	
$GetRecord=$db->get_all("select * from request where id='$id'");
                     
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";

for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$user_id = $GetRecord[$i]['user_id'];	
	$req_sts = $GetRecord[$i]['request_status'];
	$title = $GetRecord[$i]['title'];
	$category = $GetRecord[$i]['category'];	
	$property_type = $GetRecord[$i]['property_type'];	
	$establishment_yr = $GetRecord[$i]['establishment_yr'];
	$launched_yr = $GetRecord[$i]['launched_yr'];
	$detail = $GetRecord[$i]['detail'];
	$crcdt = $GetRecord[$i]['crcdt'];
	$user_ip = $GetRecord[$i]['user_ip'];
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
	$fname = userInfo($user_id,'fname');
	$lname = userInfo($user_id,'lname');
	$name = $fname.' '.$lname;	
	$category = getCategory($category);
	
	if($req_sts==0)
		$req_sts = "<span style='color:orange;font-weight:bold;'> Pending </span>";
	if($req_sts==1)
		$req_sts = "<span style='color:green;font-weight:bold;'> Accepted </span>";
	if($req_sts==2)
		$req_sts = "<span style='color:red;font-weight:bold;'> Rejected </span>";
}
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><?=$keyword;?> Request</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title"><?=$keyword;?> Request Details</h4>
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
				    <div class="row">
						<div class="col-sm-6">
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>UserName</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $name;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b><?=$keyword;?> Name</b></label>
							    <div class="col-sm-8">
									<label><?php echo $title;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Request Status</b></label>
							    <div class="col-sm-8">
									<label><?php echo $req_sts;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Category</b></label>
							    <div class="col-sm-8">
									<label><?php echo $category;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b> Property Type</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $property_type; ?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Establishment Year</b></label>
							    <div class="col-sm-8">
									<label><?php echo $establishment_yr;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Franchising Launch Date</b></label>
							    <div class="col-sm-8">
									<label><?php echo $launched_yr;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Request Date</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $crcdt;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>User IP</b></label>
							    <div class="col-sm-8">
									<label>  <?php echo $user_ip; ?></label>
								</div>
							</div>
							
						</div>
						
						<div class="col-sm-12">
						  <div class="form-group">
							<label class="col-xs-3 control-label fieldtitle" style='margin-left: 15px;'>Business Details</label>
							<div class="col-xs-9" style ="margin-left: -99px;">
							   <?php echo stripslashes($detail);?> 
							</div>
						  </div>
					   </div>
						
						<div class="form-actions col-sm-12" style="text-align: center;padding-bottom:20px;">
							<a type="button" href="company-request.php" class="btn btn-warning mr-1"> Back </a>
					    </div>
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