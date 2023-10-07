<? include'header.php'; 
include'leftmenu.php';
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$Message=isSet($Message)?$Message:'';

if($act == "del") {
	$db->insertrec("delete from user_contact_us where id='$id'"); 
	
	echo "<script>location.href='user-ctcform-details.php?act=delt'</script>";	
	header("location:user-ctcform-details.php?act=delt");
    exit ;
}

$GetRecords=$db->get_all("select * from user_contact_us order by id desc");
$slno=1;

if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$ip = $GetRecord['user_ip'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	$email=$GetRecord['email'];	
	$msg=$GetRecord['msg'];	
	$crcdt=$GetRecord['crcdt'];	
	$send_dt=date('d-M-Y',strtotime($crcdt));    	
	
	$name = $fname.' '.$lname;
	$message = checkLength($msg,25);
	
    $disp .="<tr>
				<td align='center' width='9%'>
					<input type='checkbox' id='checkcount' name='checkbox[]' class='case' value='$idvalue' />
				</td>
				<td  align='left'>$slno</td>				
				<td  align='left' class='name'>$name</td>
				<td  align='left'>$email</td>				
				<td  align='left' class='name'>
					<a href='user-fdbview.php?id=$idvalue' target='_blank'> $message <a/>
				</td>
				<td  align='left'>$send_dt</td>
				<td  align='left'>$ip</td>
				<td  align='left'><a href='replymail.php?idv=$idvalue' title='Reply' class='btn btn-default' data-toggle='tooltip'><img src='assets/images/mail.png'></a></td>
				<td width='10%'>
				<div class='btn-group btn-group-xs'>
				<a href='user-fdbview.php?id=$idvalue' title='View User feedback' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>				
				
					<a onclick='return makesure();' href='user-ctcform-details.php?id=$idvalue&act=del' title='Delete'  type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>		
				</div>
				</td>
			</tr>";
			$slno++;
}
if($act == "delt")
    $Message = "Deleted Successfully" ;
if($act == "sent")
    $Message = "Send Successfully" ;
if($act == "sent_all")
    $Message = "Send Successfully" ;
?>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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
	                <h4 class="card-title">User Contast Us</h4>
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
					                <th></th>
									<th>S.No.</th>											
									<th>Username</th>
									<th>Email Address</th>
									<th>Message</th>
									<th>Sent Date</th>
									<th>User IP</th>
									<th>Reply</th>
					                <th style="min-width: 150px;">Action</th>
					            </tr>
					        </thead>
							  <tbody><?echo $disp; ?></tbody>
					          <tfoot>
                               <tr>
                                   <th colspan="2" style="text-align:left">
								   <div class="pull-left">
								   <input type="checkbox" name="checkall" id="selectall" style="width: inherit;" />Check All 
					                <button class='btn btn-default' data-toggle='tooltip' id="replylogg" title='Reply To Selected User'><img src='assets/images/mail.png'></button>	
									</div>
				                   </th>
				                   <th colspan="7">
								   </th>
                                </tr>
                               </tfoot>
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
<script language="javascript">
$('#selectall').click(function() {
    if ($(this).is(':checked')) {
        $('input:checkbox').prop('checked', true);
    } else {
        $('input:checkbox').prop('checked', false);
    }
});

$("input[type='checkbox'].case").change(function(){
    var a = $("input[type='checkbox'].case");
    if(a.length == a.filter(":checked").length){
        $('#selectall').prop('checked', true);
    }
    else {
        $('#selectall').prop('checked', false);
    }
});
</script>
<script>
$("#replylogg").on('click', function () {
    var ids = [];
    $(".case").each(function () {
        if ($(this).is(":checked")) {
            ids.push($(this).val());
        }
    });
    if (ids.length) {
		var count= $("input#checkcount:checked").length;
		var check=confirm('Please confirm to reply '+count+' users');
		if(check==true){
			window.location.href='replymail.php?sel_id='+ids;        
		}
    } else {
        alert("Please select Users");
    }
});
</script>
<? include'footer.php'; ?>