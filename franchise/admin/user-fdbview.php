<? include 'header.php';
include 'leftmenu.php'; 
				
				$id = isSet($id) ? $db->escapstr($id):'';
				$GetRecord=$db->get_all("select * from user_contact_us where id='$id'");
                     

if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";

    for($i = 0 ; $i < count($GetRecord) ; $i++) {
		$idvalue = $GetRecord[$i]['id'];		
		$fname = $GetRecord[$i]['fname'];	
		$lname = $GetRecord[$i]['lname'];	
		$email=$GetRecord[$i]['email'];	
		$contact_no=$GetRecord[$i]['contact_no'];
		$msg=$GetRecord[$i]['msg'];		
		$user_ip=$GetRecord[$i]['user_ip'];
		$send_dt=$GetRecord[$i]['crcdt'];
		$name = $fname.' '.$lname;
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
			
	                <h4 class="card-title">User Feedback View</h4>
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
								<label class="col-sm-5 control-label"><b>Username</b></label>
							<div class="col-xs-7 name">
							  <?php echo $name;?>
							</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-5 control-label" ><b>Email</b></label>
							    <div class="col-sm-7">
									<label><?php echo $email;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-5 control-label"><b>Contact Number</b></label>
							    <div class="col-xs-7 name">
							    <?php echo $contact_no; ?>
							    </div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-5 control-label"><b>Send DateTime</b></label>
							   <div class="col-xs-7">
							    <?php echo $send_dt; ?>
							   </div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-5 control-label"><b>User IP</b></label>
							<div class="col-xs-7 name">
							  <?php echo $user_ip;?>
							</div>
							</div>
				
							<div class="form-group col-sm-12">
								<label class="col-sm-5 control-label"><b>Comments</b></label>
							<div class="col-xs-7 name">
							  <?php echo $msg; ?>
							</div>
							</div>
							
							<div class="form-actions col-sm-12" style="text-align: center;padding-bottom:20px;">
						      <a type="button" href="user-ctcform-details.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Back
								</a>				
							</div>
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