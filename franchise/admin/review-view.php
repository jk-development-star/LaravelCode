<? include 'header.php';
include 'leftmenu.php'; 
$msg="";

$id = isSet($id) ? $db->escapstr($id):'';

$GetRecord=$db->singlerec("select * from review where review_id='$id'");
$title = $GetRecord['title'];
$comment = $GetRecord['comment'];
$stars = $GetRecord['stars'];

$usr=$db->singlerec("select fname,lname from register where id= '".$GetRecord['user_id']."' ");
$user=$usr['fname'].' '.$usr['lname'];
$titleName = userInfo($GetRecord['lawyer_id'],'title');
	
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Review Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title">Review details</h4>
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
								<label class="col-sm-4 control-label" ><b>Company name</b></label>
							    <div class="col-sm-8">
									<label>   <?php echo Ucwords($titleName);?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>User Name</b></label>
							    <div class="col-sm-8">
									<label> <?php echo Ucwords($user);?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Title</b></label>
							    <div class="col-sm-8">
									<label> <?php echo $title;?></label>
								</div>
							</div>
							
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Comment</b></label>
							    <div class="col-sm-8">
									<label><?php echo $comment;?></label>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label class="col-sm-4 control-label" ><b>Ratings</b></label>
							    <div class="col-sm-8">
									<label><?php echo get_Rate($GetRecord['lawyer_id']);?></label>
								</div>
							</div>
							  <div class="form-actions col-sm-12" style="text-align: center;padding-bottom:20px;">

						      <a type="button" href="reviews_all.php" class="btn btn-warning mr-1">
									 Back
								</a>
								
						 							
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