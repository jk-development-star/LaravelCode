<? include'header.php';
include'leftmenu.php'; 
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$usr = isSet($usr) ? $db->escapstr($usr) : '' ;
$cpy = isSet($cpy) ? $db->escapstr($cpy) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$f_status = isSet($f_status) ? $f_status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$daterange=isSet($daterange)?$daterange:'';
$approvest=isSet($approvest)?$approvest:'';
$highest=isSet($highest)?$highest:'';
$active_status=isSet($active_status)?$active_status:'';
$mobile=isSet($mobile)?$mobile:'';
$country=isSet($country)?$country:'';
$Title=isSet($Title)?$Title:'';
$user_access=isSet($user_access)?$user_access:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:'';

$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
$contact_num = $GetContact['ctc_num'];
$url = "$siteurl";

if($act == "del") {
	$idv = $db->escapstr($idv);
	$db->insertrec("delete from enquiry where id='$idv'");	
	
	echo "<script>location.href='enquiry.php?act=delt'</script>";	
    header("location:enquiry.php?act=delt");
    exit ;
}
if(isset($send)) {
    $db->insertrec("update enquiry set send_status='1' where user_id='$usr' and cmpy_id='$cpy'");
	
	$enqInfo=$db->singlerec("select * from enquiry where user_id='$usr' and cmpy_id='$cpy'");
		
	$fname = userInfo($enqInfo["user_id"],'fname');
	$lname = userInfo($enqInfo["user_id"],'lname');
	$username = ucwords($fname.' '.$lname);
	$prefered_loc = $enqInfo['prefered_loc'];
	$avail_cash = $enqInfo['avail_cash'].' '.$site_currency;
	$comment = stripslashes($enqInfo['comment']);
	$to_email = userInfo($cpy,'email');
	$fromemail = $siteemail;
	$name = ucwords(userInfo($enqInfo["cmpy_id"],'fname'));
	
	$subject  = "Users Enquiry from $sitetitle";
	$text ="User enquired your Company profile. And the details are given below.";
	$text .="<table class='tbl_styl' cellpadding='5' cellspacing='5'>
			<tr><td width='25%'> User Name </td><td> : </td><td> $username </td></tr>
			<tr><td> Prefered Location </td><td> : </td><td> $prefered_loc</td></tr>
			<tr><td> Availble Cash </td><td> : </td><td> $avail_cash</td></tr>
			<tr><td> Comments </td><td> : </td><td> $comment</td></tr>			
			</table>";
	$text .= "<a href='$siteurl/login.php'><b>CLICK HERE</b></a> to Login for view details."; 			
	$message = $email_temp->style_blue($siteinfo,$name,'',$text,$contact_num,$url);
	$com_obj->email($fromemail,$to_email,$subject,$message);
	
	echo "<script>location.href='enquiry.php?act=sent'</script>";
    header("location:enquiry.php?act=sent");
    exit ;
}


$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);


if($act == "delt")
    $Message = "Deleted Successfully" ;
else if($act == "sent")
    $Message = "Enquiry send Successfully" ;

?>

      <div class="app-content content container-fluid">
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-xs-12 mb-2">
                  <h3 class="content-header-title mb-0">Enquires List</h3>
               </div>
            </div>
            <div class="content-body">
               <!-- HTML (DOM) sourced data -->
               <section id="html">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="card">
                           <div class="card-header">
							<h4 class='succ_msg'><?echo $Message;?></h4>
                              <h4 class="card-title">Enquires List</h4>
                              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                              <div class="heading-elements">
                                 <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                 </ul>
                              </div>
                           </div>
                           <div class="card-body collapse in">
                              <div class="card-block card-dashboard table-responsive">
                                 <table class="table table-striped table-bordered tbl_appment sourced-data">
                                    <thead>
                                       <tr>
                                          <th>Enquires </th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<? 
									$GetRecords=$db->get_all("select * from enquiry order by id desc");
                                    $sno = 1;
                                    if(count($GetRecords)==0)
                                    $Message="No Record found";
                                    $disp = "";
									foreach($GetRecords as $i=>$GetRecord) {
										$idvalue = $GetRecord['id'];
										$user_id = $GetRecord['user_id'];
										$cmpy_id = $GetRecord['cmpy_id'];
										$prefered_loc = $GetRecord['prefered_loc'];
								        $avail_cash = $GetRecord['avail_cash'];
										$send_status = $GetRecord['send_status'];
										$phone=$GetRecord['phone'];
										$send_dt = $GetRecord['send_dt'];
										
										$send_dt = date('d-M-Y',strtotime($send_dt));
										$send_time = date('h:m',strtotime($send_dt));
										$usr_fname = userInfo($user_id,'fname');
										$usr_lname = userInfo($user_id,'lname');
										$username = ucwords($usr_fname.' '.$usr_lname);
										$usermail = userInfo($user_id,'email');
										$title_name = ucwords(userInfo($cmpy_id,'title'));
										$cmpy_email = userInfo($cmpy_id,'email');
										$img = userInfo($cmpy_id,'img');
										$get_cat = ucfirst(userInfo($cmpy_id,'category'));
										$category = getCategory($get_cat);
									   ?>
                                       <tr>
                                          <td>
                                             <div class="card-block">
                                                <div class="card card-color-new">
                                                   <div class="row card-hdr">
                                                      <div class="col-xs-2 card-left text-left">
                                                         <span class="text-center"><?=$sno;?></span>
                                                      </div>
                                                      <div class="col-xs-8 pull-right text-right card-right">
                                                         <em>Prefered Location :</em> <span><?=ucfirst($prefered_loc);?></span>&nbsp;&nbsp;&nbsp;
														 <em>Available Cash:</em> <span><?=$avail_cash;?></span>
                                                      </div>
                                                   </div>
                                                   <div class="row card-bdy">
                                                      <div class="col-xs-4 text-left">
                                                         <div class="card-img">
                                                            <img class="img-thumbnail" src="../uploads/profile/<?=$img;?>" alt="">
                                                         </div>
                                                         <div class="card-info">
                                                            <a href="company-view.php?id=<?=$cmpy_id;?>" class="card-name" target="_blank"><?=ucwords($title_name);?></a>
                                                            <div class="card-text"><?=$category;?></div>
                                                            <div class="card-text"><?=$cmpy_email;?></div>
                                                         </div>
                                                      </div>
                                                      <div class="col-xs-3 appointment-time text-center">
                                                         <div class="appointment-date"><i class="fa fa-calendar"></i><span><?=$send_dt;?></span></div>
                                                         <div><i class="fa fa-hourglass-o"></i><span>At <? echo $send_time;?></span></div>
                                                      </div>
                                                      <div class="col-xs-4 text-left patient-info">
                                                         <a href="userview.php?id=<?=$user_id;?>" class="patient-name" target="_blank"> <i class="fa fa-user-o"></i> <?=$username;?> </a>
                                                         <p class="patient-other"> <i class="fa fa-envelope-o"></i> <?=$usermail;?> </p>
                                                         <p class="patient-other"> <i class="fa fa-phone"></i> <?=$phone;?> </p>
                                                      </div>
                                                      <div class="card-action col-sm-12">
                                                         <div class="btn-group btn-sm pull-right" role="group" aria-label="Basic example">
														 <? if($send_status==0) { ?>
															<a href="enquiry.php?usr=<?=$user_id;?>&cpy=<?=$cmpy_id;?>&send" title="Send Enquiry" class='btn btn-sm btn-icon btn-secondary btn-warning'>
																<i class="fa fa-check-square-o"></i> Send
															</a>
														 <? } else { ?>
															<button class='btn btn-sm btn-icon btn-secondary btn-success' disabled>
																<i class="fa fa-check-square-o"></i> Sent
															</button>
														 <? } ?>
                                                            <a onclick='return makesure();' href='enquiry.php?idv=<?=$idvalue;?>&act=del' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				
                                                         </div>
                                                      </div>
                                                      <!--<div class="row card-ftr"></div>-->
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
									   
									   <? $sno++;
                                       } ?>
									   
									
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
    
<? include'footer.php'; ?>