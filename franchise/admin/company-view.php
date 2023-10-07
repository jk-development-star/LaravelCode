<? include 'header.php';
include 'leftmenu.php'; 
$msg="";
$act = isSet($act) ? $act : '' ;
$sts = isSet($sts) ? $sts : '' ; 
if(isset($addsuc)){
	$msg = "<center><span style='color:green'>Profile successfully updated!</span></center>";
}

	$GetContact = $db->singlerec("select ctc_num from cms where id='1'");
	$contact_num = $GetContact['ctc_num'];
	$url = "$siteurl";


	$id = isSet($id) ? $db->escapstr($id):'';
	
	$GetRecord=$db->get_all("select * from register where id='$id'");
                     
if(count($GetRecord)==0)
    $Message="No Record found";
    $disp = "";
    for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$fname = $GetRecord[$i]['fname'];	
	$lname = $GetRecord[$i]['lname'];
	$email=$GetRecord[$i]['email'];
	$password=$GetRecord[$i]['password'];	
	$contact_no1=$GetRecord[$i]['contact_no1'];
	$country=$GetRecord[$i]['country'];
	$state=$GetRecord[$i]['state'];
	$city=$GetRecord[$i]['city'];
	$zip_code=$GetRecord[$i]['zip_code'];
	$building=$GetRecord[$i]['building'];
	$street=$GetRecord[$i]['street'];
	$landmark=$GetRecord[$i]['landmark'];
	$area=$GetRecord[$i]['area'];
	$title = $GetRecord[$i]['title'];
	$category=$GetRecord[$i]['category'];
	$establishment_yr=$GetRecord[$i]['establishment_yr'];
	$launched_yr=$GetRecord[$i]['launched_yr'];
	$headquater=$GetRecord[$i]['headquater'];
	$website=$GetRecord[$i]['website'];
	$area_req=$GetRecord[$i]['area_req'];
	$investment=$GetRecord[$i]['investment'];
	$brand_fee=$GetRecord[$i]['brand_fee'];
	$commission=$GetRecord[$i]['commission'];
	$expan_location=$GetRecord[$i]['expan_location'];	
	$training_loc=$GetRecord[$i]['training_loc'];
	$field_assit=$GetRecord[$i]['field_assit'];
	$property_type=$GetRecord[$i]['property_type'];
	$floor_area=$GetRecord[$i]['floor_area'];
	$preferred_loc=$GetRecord[$i]['preferred_loc'];
	$detail=$GetRecord[$i]['detail'];
	$img=$GetRecord[$i]['img'];
	
	$address = $building.','.$street.','.$landmark.','.$area;
	$address = $com_obj->getReptrim($address);
	
	if($state=='') {
		$state = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$state = getState($state);
	}
	if($city=='') {
		$city = "<span style='color:#70829A;'>Not Given</span>";
	} else {
		$city = getCity($city);
	}	
	if($field_assit==1)
		$fld_assit = "yes";
	else if($field_assit==2)
		$fld_assit = "No";
}

?>
   <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0"><?=$keyword;?> Management</h3>
          </div>
        </div>
        <div class="content-body"><!-- HTML (DOM) sourced data -->
<section id="html">
	<div class="row">
	    <div class="col-xs-12">
	        <div class="card">
	            <div class="card-header">
				 <h4 class='succ_msg'><?echo $msg;?></h4>
	                <h4 class="card-title"><?=$keyword;?> Details</h4>
	                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                       <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                    </ul>
	                </div>
	            </div>
	            <div class="card-body collapse in">
				<div class="row">
						<div class="col-sm-6">
				           <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">User Name</label>
							<div class="col-xs-7 name">
							  <?php echo ucwords($fname.' '.$lname);?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"><?=$keyword;?> Title</label>
							<div class="col-xs-7 name">
							  <?php echo ucfirst($title);?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Email</label>
							<div class="col-xs-7">
							  <?php echo $email;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Password</label>
							<div class="col-xs-7">
							  <?php echo $password;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Country</label>
							<div class="col-xs-7">
							  <?php echo getCountry($country);?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">State</label>
							<div class="col-xs-7">
							  <?php echo $state;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">City</label>
							<div class="col-xs-7">
							  <?php echo $city; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Contact Number</label>
							<div class="col-xs-7">
							  <?php echo $contact_no1;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Address </label>
							<div class="col-xs-7 name">
							  <?php echo $address; ?>
							</div>
						  </div>
						  
						   <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Zipcode</label>
							<div class="col-xs-7 name">
							  <?php echo $zip_code; ?>
							</div>
						  </div>
						
						   <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Category </label>
							<div class="col-xs-7">
							  <?php echo getCategory($category);?>
							</div>
						   </div>
						  
						   <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Establishment Year </label>
							<div class="col-xs-7">
							  <?php echo $establishment_yr;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Franchising Launch Date</label>
							<div class="col-xs-7">
							  <?php echo $launched_yr;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Headquater</label>
							<div class="col-xs-7">
							  <?php echo $headquater;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Website</label>
							<div class="col-xs-7">
							  <?php echo $website;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Required Area</label>
							<div class="col-xs-7">
							  <?php echo $area_req;?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle">Investment Range </label>
							<div class="col-xs-7">
							  <?php echo $site_currency.' '.$investment.' Lacs'; ?>
							</div>
						  </div>

						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Franchise/Brand Fee </label>
							<div class="col-xs-7 name">
							  <?php echo $site_currency.' '.$brand_fee; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Royalty/Commission</label>
							<div class="col-xs-7">
							  <?php echo $site_currency.' '.$commission; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Expansion Location</label>
							<div class="col-xs-7">
							  <?php echo ucfirst($expan_location); ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Training Location</label>
							<div class="col-xs-7">
							  <?php echo ucfirst($training_loc); ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Field Assistance available for Franchisee</label>
							<div class="col-xs-7">
							  <?php echo $fld_assit; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Property Type</label>
							<div class="col-xs-7">
							  <?php echo $property_type; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Floor Area Requirement</label>
							<div class="col-xs-7">
							  <?php echo $floor_area; ?>
							</div>
						  </div>
						  
						  <div class="form-group col-sm-12">
							<label class="col-xs-5 control-label fieldtitle"> Preferred location of Unit Franchise Outlet</label>
							<div class="col-xs-7">
							  <?php echo ucfirst($preferred_loc); ?>
							</div>
						  </div>
						  
						</div>
						
					   <div class="col-md-6 col-sm-12">
					   <? if($img!="" && file_exists('../uploads/profile/'.$img)) { ?>
					    <h4 style="padding:10px 0; font-weight:bold;">Property Image</h4>
						 <div class="form-group row">
							<div class="col-xs-7">						
								<img src='../uploads/profile/<? echo $img; ?>' width='250px' height='200px' />
							</div>
						</div>
					   <? } ?>
					   </div>
					   
					   
					   <div class="col-sm-12">
						  <div class="form-group">
							<label class="col-xs-3 control-label fieldtitle" style='margin-left: 5px;'>Business Details</label>
							<div class="col-xs-9" style ="margin-left: -45px;">
							   <?php echo stripslashes($detail);?> 
							</div>
						  </div>
					   </div>
					  
					  
					  <div class="col-sm-12">
					      <h4 class="card-title" style="padding-left:20px;">User Enquires </h4>
								<div class="table-responsive col-sm-12">
								<div class="card-block card-dashboard table-responsive">
								<table id="demo-dt-basic" class="table table-striped table-bordered sourced-data">
                                    <thead>
                                        <tr>
											<th>S.No</th>		     
											<th>User Name</th>
											<th>Prefered Location</th>
											<th>Available Cash (In <?=$site_currency;?>)</th>
											<th>Comments</th>
											<th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?
						$GetRecords=$db->get_all("select * from enquiry where cmpy_id='$id' order by id desc");
						$GetRecords1=$db->numrows("select * from enquiry where cmpy_id='$id'");
						
					    $sno = 1;
						if(($GetRecords1) > 0)
						{ 
							foreach($GetRecords as $i=>$GetRecord) {
								$idvalue = $GetRecord['id'];
								$usr_id = $GetRecord['user_id'];
								$prefered_loc = $GetRecord['prefered_loc'];
								$avail_cash = $GetRecord['avail_cash'];
								$comment = $GetRecord['comment'];
								$send_dt = $GetRecord['send_dt'];
								$usrname = ucfirst(userInfo($usr_id,'fname'));
								$usrname = "<a target='_blank' href='userview.php?id=$usr_id'> $usrname </a>";
								$send_dt = date('d-M-Y',strtotime($send_dt));	
							?>
									   <tr>
											<td style="width:30px;" align='left'><? echo $sno; ?></td>
											<td align='left'><?=$usrname; ?></td>
											<td align='left'><?=ucfirst($prefered_loc); ?></td>
											<td align='left'><?=$avail_cash; ?></td>
											<td align='left'><?=stripslashes($comment); ?></td>
											<td align='left' width='10%'><?=$send_dt; ?></td>
									   </tr>
									<? $sno++; }
									} 
									
							        ?>
									</tbody>
                                </table>
								</div>
							</div>
						</div>
					   
					   <div class="form-actions col-sm-12" style="text-align:center;    padding-bottom: 20px;">
								<a href="company-profile.php" class="btn btn-warning mr-1">
									<i class="ft-x"></i> Back
								</a>
								<a href="company-profileupd.php?upd=2&id=<? echo $id; ?>" class="btn btn-primary">
									<i class="fa fa-check-square-o"></i> Edit
								</a>
							</div>
					   </div>
					  </div>
					</div>
                  </div>
                <!--End view-->
					   </div>
				    </div>
            </div>
</div>
<style>
.table th, .table td {
    padding: 10px;
}

.label-danger {
  background-color: #d9534f;
}

.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}
</style>
			<? include"footer.php";?>