<?php include'header.php'; 
include'leftmenu.php';

$usrCount = $db->Extract_Single("select count(id) from register where user_role='0' and active_status='1'");

$cpyCount = $db->Extract_Single("select count(id) from register where user_role='1' and active_status='1'");

$enqCount = $db->Extract_Single("select count(id) from enquiry");

$revCount = $db->Extract_Single("select count(review_id) from review");

?> 
   
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="fa fa-users font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Users</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-plus"></i>--> <?php echo $usrCount; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                        <i class="fa fa-building-o font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5><?=$keyword;?></h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-up"></i>--><?php echo $cpyCount; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="fa fa-calendar font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>Enquires</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-down"></i>--><?php echo $enqCount; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                        <i class="fa fa-comments-o font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Reviews</h5>
                        <h5 class="text-bold-400"><!--<i class="ft-arrow-up"></i>--><?php echo $revCount; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Stats -->
<!--Product sale & buyers -->
<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_green">
                <h4 class="card-title" style="color:#000;">Recent Enquires</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_green">
               <? $GetRecords=$db->get_all("select * from enquiry order by id desc limit 5"); ?>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>S.No.</th>
									<th>User Name</th>
									<th><?=$keyword;?> Name</th>
									<th>Prefered Location</th>
									<th>Available Cash (In <?=$site_currency; ?>)</th>
									<th>Enquired Date</th>
                                   
                                    
                            </tr>
                        </thead>
                        <tbody>
						<?
						$sno=1;
						foreach($GetRecords as $i=>$GetRecord) {
                        $idvalue = $GetRecord['id'];
	                    $user_id = $GetRecord['user_id'];
						$cmpy_id = $GetRecord['cmpy_id'];
						$prefered_loc = $GetRecord['prefered_loc'];
						$avail_cash = $GetRecord['avail_cash'];
						$send_dt = $GetRecord['send_dt'];
						
						$username = ucwords(userInfo($user_id,'fname'));
						$title_name = ucfirst(userInfo($cmpy_id,'title'));
						$send_dt = $GetRecord['send_dt'];
						$send_dt = date('d-M-Y',strtotime($send_dt)); 
						?>
                            <tr>
                                <td  align='left'><?=$sno;?></td>
				                <td  align='left'><? echo $username; ?></a></td>
				                <td  align='left'><? echo $title_name; ?></a></td>
				                <td  align='left'><? echo ucfirst($prefered_loc);?></td>
				                <td  align='left'><? echo $avail_cash;?></td>				
				                <td  align='left'><? echo $send_dt;?></td>
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


<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_orng">
                <h4 class="card-title">Recent <?=$keyword;?>s</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_orng">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th><?=$keyword;?></th>
                                <th>Email</th>
                                <th>IP</th>
                                <th>Date of Join</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $recentuser=$db->get_all("select fname,email,lname,id,crcdt,title,reg_ip,login_ip_addr,crcdt from register where active_status='1' and user_role='1' order by id desc limit 5 " );?>
        
						   <?php 
						   $sno=1;
						   foreach($recentuser as $user){
							 $idvalue1=$user['id'];
							 $fname = $user['fname'];
	                         $lname = $user['lname'];
							 $name= $fname.' '.$lname;
                             $title_name = Ucwords($user['title']);
							 $title_name = checkLength($title_name,20);
                             $crcdt=date('d-M-Y',strtotime($user['crcdt']));	
                             $rating = overall_Rate($idvalue);								 ?>
						   <tr>
                                <td class="text-truncate"><?=$sno;?></td>
                                <td class="text-truncate"><?=$title_name;?></td>
								<td class="text-truncate"><?=$user['email'];?></td>
								<td class="text-truncate"><?=$user['reg_ip'];?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="company-view.php?id=<?=$idvalue1;?>">View</a></td>
                            </tr>
						   <? $sno++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header card_bg_red">
                <h4 class="card-title">Recent User</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_red">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
						
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>IP</th>
                                <th>Date of Join</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $penduser=$db->get_all("select id,email,reg_ip,fname,login_ip_addr,crcdt from register where active_status='1' and user_role='0' order by id desc limit 5 " );?>
                          <?php 
						        $sno=1;
						        foreach($penduser as $pend){
							    $idvalue= $pend['id'];
								$username = $pend['fname'];
								$username = checkLength($username,15);
								 $crcdt=date('d-M-Y',strtotime($pend['crcdt']));	
							?>
						<tr>
                                <td class="text-truncate"><?=$sno;?></td>
                                <td class="text-truncate"><?=$username;?></td>
								<td class="text-truncate"><?=$pend['email'];?></td>
								<td class="text-truncate"><?=$pend['reg_ip'];?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="userview.php?id=<?=$idvalue;?>">View</a></td>
                            </tr>
								<? $sno++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row match-height">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header card_bg_yellow">
                <h4 class="card-title">Company Waiting for Approve</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_yellow">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Date of Join</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php 
						$sno=1;
						$penduser=$db->get_all("select user_id,exp_division,title,user_ip,crcdt from request where request_status='0' order by id desc limit 5 " );
						foreach($penduser as $user){
													
							$idvalue1=$user['user_id'];
							 $username = $user['title'];
							$username = checkLength($username,15);
							
                             $title_name = Ucwords($user['title']);
							 $title_name = checkLength($title_name,20);
                             $crcdt=date('d-M-Y',strtotime($user['crcdt']));
												?>
                            <tr>
                                <td class="text-truncate"><?=$sno++;?></td>
                                <td class="text-truncate"><?=$username;?></td>
								<td class="text-truncate"><?=$com_obj->getExpdiv($user['exp_division']);?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="company-request.php?id=<?=$idvalue1;?>">View</a></td>
                            </tr>
							<?php $sno++; } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	
	
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header card_bg_green">
                <h4 class="card-title">Recent Reviews</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <!--<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body brdr_green">
                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th><?=$keyword;?></th>
                                <th>Reviewer Name</th>
                                <th>Date of Review</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $penduser=$db->get_all("select review_id,user_id,crcdt,lawyer_id,crcdt from review where active_status='1'  order by review_id desc limit 5 " );
							$sno=1;
							foreach($penduser as $pend){ 
												$idvalue=$pend['review_id'];
												$title = userInfo($pend['lawyer_id'],'title');
												$user_name = userInfo($pend['user_id'],'fname');
												$title_name = checkLength($title,20);
												$username = checkLength($user_name,15);
												 $crcdt=date('d-M-Y',strtotime($pend['crcdt']));
												?>
                            <tr>
                                <td class="text-truncate"><?=$sno;?></td>
                                <td class="text-truncate"><?=$title_name;?></td>
								<td class="text-truncate"><?=$username;?></td>
								<td class="text-truncate"><?=$crcdt;?></td>
								<td class="text-truncate"><a href="review-view.php?id=<?=$idvalue;?>">View</a></td>
                            </tr>
							<? $sno++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
      </div>
    </div>
    


   <? include 'footer.php';?>