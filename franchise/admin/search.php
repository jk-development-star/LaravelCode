<? include'header.php';
include'leftmenu.php';
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $db->escapstr($id) : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$usrstatus=isSet($usrstatus) ? $usrstatus : '' ;
$lyrstatus=isSet($lyrstatus) ? $lyrstatus : '' ;
$lawyer = isSet($lawyer) ? $lawyer : '' ;
$case = isSet($case) ? $case : '' ;
$from1 = isSet($from1) ? $from1 : '' ;
$to1 = isSet($to1) ? $to1 : '' ;
$regfrom1 = isSet($regfrom1) ? $regfrom1 : '' ;
$regto1 = isSet($regto1) ? $regto1 : '' ;
$user = isSet($user) ? $user : '' ;
$f_status = isSet($f_status) ? $f_status : '' ;
$Message=isSet($Message)?$Message:'';
$search=isSet($search)?$search:'';
$username=isSet($username)?$username:'';
$reset=isSet($reset)?$reset:'';
$daterange=isSet($daterange)?$daterange:'';
$approvest=isSet($approvest)?$approvest:'';
$highest=isSet($highest)?$highest:'';
$active_status=isSet($active_status)?$active_status:'';
$mobile=isSet($mobile)?$mobile:'';
$country=isSet($country)?$country:'';
$Title=isSet($Title)?$Title:'';
$type=isSet($type)?$type:'';
$min_date=isSet($min_date)?$min_date:'';
$max_date=isSet($max_date)?$max_date:'';
$user_access=isSet($user_access)?$user_access:'';
$DisplayStatus=isSet($DisplayStatus)?$DisplayStatus:''; 

if($act == "apntdel") {
    $db->insertrec("delete from enquiry where id='$id'");
	
	echo "<script>location.href='search.php?act=apntdelt'</script>";	
    header("location:search.php?act=apntdelt");
    exit ;
}

if($act == "apntdelt")
     $Message = "<font color='green'><b>Enquiry Deleted Successfully</b></font>" ;
if($act == "usrdelt")
    $Message = "<font color='green'><b>User Deleted Successfully</b></font>" ;
if($act == "lyrdelt")
    $Message = "<font color='green'><b>Company Deleted Successfully</b></font>" ;

if($usrstatus == "1") {
    $db->insertrec("update register set active_status='0' where id='$id'");
	
	echo "<script>location.href='search.php?act=usrsts'</script>";
    header("location:search.php?act=usrsts");
    exit ;
}
else if($usrstatus == "0") {
    
	$db->insertrec("update register set active_status='1' where id='$id'");
	
	echo "<script>location.href='search.php?act=usrsts'</script>";
	header("location:search.php?act=usrsts");
    exit ;
} 
if($act == "usrsts")
    $Message = "<font color='green'><b>User Status Changed Successfully</b></font>" ;

if($act == "lyrdel") {
	$GetImg = $db->singlerec("select img from register where id='$id'");
	$img=$GetImg["img"];
	
	if($img!="noimage.png"){
		$RemoveImage = "../uploads/profile/$img";
		unlink($RemoveImage);
	}
	
    $db->insertrec("delete from register where id='$id'");
	$db->insertrec("delete from request where user_id='$id'");
	$db->insertrec("delete from review where user_id='$id'");
	$db->insertrec("delete from review where lawyer_id='$id'");
	$db->insertrec("delete from enquiry where cmpy_id='$id'");
	$db->insertrec("delete from enquiry where user_id='$id'");
	
	echo "<script>location.href='search.php?act=lyrdelt'</script>";	
    header("location:search.php?act=lyrdelt");
    exit ;
}
if($lyrstatus == "1") {
    $db->insertrec("update register set active_status='0' where id='$id'");
	echo "<script>location.href='search.php?act=lyrsts'</script>";
    header("location:search.php?act=lyrsts");
    exit ;
}
else if($lyrstatus == "0") {
    
	$db->insertrec("update register set active_status='1' where id='$id'");
	
	echo "<script>location.href='search.php?act=lyrsts'</script>";
	header("location:search.php?act=lyrsts");
    exit ;
} 
if($act == "lyrsts")
    $Message = "<font color='green'><b>Company Status Changed Successfully</b></font>" ;
?>
<style>

</style>
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-2">
            <h3 class="content-header-title mb-0">Search</h3>
            
          </div>
          
        </div>
        <div class="content-body"><!-- Bootstrap DateTime Picker start -->
<section id="datetime">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">All Listing</h4>
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
			<div class="card-block card-dashboard table-responsive">
				
				<div class="row mb20">
						<form class="" method="post" id="filter1">
						    <div class="col-sm-3">
								<div class="form-group">
									<label class="control-label">Search Type</label>
									<select class="form-control" name="type" id='type1'>
										<option>Select</option>
										<option value='1' <? if((isset($type)) && ($type=='1') ){ echo "selected";} else {echo "selected"; }?> >User</option>
										<option value='2' <? if((isset($type))&& ($type=='2') ){ echo "selected";}?> ><?=$keyword;?></option>
										<option value='3' <? if((isset($type))&& ($type=='3') ){ echo "selected";}?> >Enquiry</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3"  id='usern'>
								<div class="form-group" >
									<label class="control-label">User Name</label>
									<input type="text" name="username" id="username" class="form-control" value="<? if(isset($username)){ echo $username; }?>" >
								</div>
							</div>
							<div class="col-sm-3" id='lawyern' style="display:none;">
								<div class="form-group">
									<label class="control-label"><?=$keyword;?> Name</label>
									<input type="text" name="lawyername" id="lawyername" class="form-control" value="<? if(isset($lawyername)){ echo $lawyername; }?>" >
								</div>
							</div>
							<div class="col-sm-3" id="case" style="display:none;">
								<div class="form-group">
									<label class="control-label" >Category</label>
									<select class="form-control" name="case" id="case1"  >
                                                    <option></option>
													<? $DropDown3 = $db->get_all("select id,category_name from category order by category_name asc");
													foreach($DropDown3 as $cat ){ ?>
													 <option value="<? echo $cat['id']; ?>" <? if ((isset($case)) && ($case ==$cat['id'])) { echo "selected";  } ?> ><? echo ucwords($cat['category_name']); ?></option>
											        <? }?>
											        </select>
								</div>
							</div>
							
						
							
							<div class="col-sm-3" id='book' style="display:none;">
								<div class="form-group">
									<label>Enquired Date</label>
									
									<div class="row">
													<div class="col-xs-5 no_pd">
														<input type="text" class="form-control" name="from1" id="fromd" value="<? if ($from1 != $min_date){echo $from1;} ?>" />
													</div>
													<div class="col-xs-2 text-center no_pd">
														<p>To</p>
													</div>
													<div class="col-xs-5 no_pd">
														<input type="text" class="form-control" name="to1" id="tod" value="<? if($to1 != $max_date){ echo $to1; } ?>" />
													</div>
												</div>
										
								
								</div>
							</div>
							<div class="col-sm-3" id='regis'>
								<div class="form-group">
									<label>Register Date</label>
									<div class='input-group'>
									<div class="row">
													<div class="col-xs-5 no_pd">
														<input type="text" class="form-control" name="regfrom1" id="regfrom1" value="<? if ($regfrom1 != $min_date){echo $regfrom1;} ?>" />
													</div>
													<div class="col-xs-2 text-center no_pd">
														<p>To</p>
													</div>
													<div class="col-xs-5 no_pd">
														<input type="text" class="form-control" name="regto1" id="regto1" value="<? if($regto1 != $max_date){ echo $regto1; } ?>" />
													</div>
									</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<label>&nbsp;</label>
								<input name="filter" id="filter"  type="submit" value="Search" class="btn btn-success btn-block" />
							</div>
						</form>
					</div>
					
<div id="usertbl">
<?
 
if($act == "usrdel") {
	$GetImg = $db->singlerec("select img from register where id='$id'");
	$img=$GetImg["img"];
	
	if($img!="noimage.png"){
		$RemoveImage = "../uploads/profile/$img";
		unlink($RemoveImage);
	}
	
	$GetlyrImg = $db->singlerec("select id from request where user_id='$id'");
	if(count($GetlyrImg)!=0) {		
		$db->insertrec("delete from request where user_id='$id'");
	}
		
    $db->insertrec("delete from register where id='$id'");
	$db->insertrec("delete from review where user_id='$id'");
	$db->insertrec("delete from enquiry where user_id='$id'");
	
	echo "<script>location.href='search.php?act=usrdelt'</script>";	
    header("location:search.php?act=usrdelt");
    exit ;
}

if((isset($filter)) && ($type == '1') )
	{ 

?>
  <script>$(document).ready(function(){
	    $("#regis").show();
		$("#case").hide();
		$("#usern").show();
		$("#lawyern").hide();
		$("#book").hide();
	    $("#usertbl").show();
		$("#lawyertbl").hide();
		$("#appointmenttbl").hide();
  });</script>
    <? 
     $sql="SELECT * FROM register where user_role='0' ";
	 
	 $regmax_date=$db->extract_single("SELECT max(crcdt) FROM register");
	  $regmin_date=$db->extract_single("SELECT min(crcdt) FROM register");
	if (($username != '')|| ($regfrom1 !="") ||($regto1 != "") )
	 {		 
		$sql.="  and";
		  
			if((isset($username)) && ($username != ''))
			{
				
			$sql.= " fname LIKE '%$username%' and";
			
			}
			if(($regfrom1 =="") )
			{ 
		    $regfrom1=$regmin_date;
			}
            if(($regto1 ==""))
			{
			$regto1=$regmax_date;	
			}				
		        
				$regfrom3=date('Y-m-d',strtotime($regfrom1));
				
				$regto3=date('Y-m-d',strtotime($regto1));
	            $sql.= " crcdt between '".$regfrom3."' and '".$regto3."'";
									
	   }
	   $sql=rtrim($sql," and");
	   $GetRecords=$db->get_all($sql);	
	}else
	{
$GetRecords=$db->get_all("select * from register where user_role='0' order by id desc");
	}
$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp1 = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	$email=$GetRecord['email'];
	$reg_ip=$GetRecord['reg_ip'];	
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='search.php?id=$idvalue&usrstatus=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='search.php?id=$idvalue&usrstatus=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}

	$name = $fname;
	$name="<a href='userview.php?id=$idvalue' target='_blank'>$GT_RightSign $name</a>";
	
	$EditLink = "<a href='user-profileupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	
    $disp1 .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'>$name</td>
				<td  align='left'>$email</td>
				<td  align='left'>$reg_ip</td>				
				<td  align='left'>$crcdt</td>				
				<td>
				<div class='btn-group btn-group-xs'>
				<a href='userview.php?id=$idvalue' title='View user Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					$DisplayStatus
					$EditLink
					<a  href='search.php?id=$idvalue&act=usrdel' title='Delete' onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>							
				</div>
				</td>
			</tr>";
			$sno++;
}
if($act == "delt")
    $Message = "Deleted Successfully" ;
else if($act == "upd")
    $Message = "Updated Successfully" ;
else if($act == "add")
    $Message = "Added Successfully" ;
else if($act == "sts")
    $Message = "Status Changed Successfully" ;
else if($act == "fsts")
    $Message = "Added to Featured List" ;
else if($act == "frsts")
    $Message = "Removed from Featured List" ;
?>
				<table   class="table table-striped table-bordered sourced-data">
					        <thead>
					            <tr>
					                <th>S.No.</th>
								    <th>User Name</th>
									<th>Email Address</th>
									<th>Register IP</th>
									<th>Join Date</th>						
									<th style="min-width: 200px;" class='cntrhid'>Action</th>
					            </tr>
					        </thead>
					        <tbody><?echo $disp1; ?></tbody>
					        
					    </table>
				</div>
				
				
				
				
<div id="lawyertbl" style="display:none;">
<?
if((isset($filter)) && ($type == '2') )

	{ 
	
?>

  <script>
        $(document).ready(function(){
	    $("#regis").show();
		$("#case").show();
		$("#usern").hide();
		$("#lawyern").show();
		$("#usertbl").hide();
		$("#lawyertbl").show();
		$("#appointmenttbl").hide();
		$("#book").hide();
  });</script>
    <? 
     $sql="SELECT * FROM register where user_role='1' ";
	 $regmax_date=$db->extract_single("SELECT max(crcdt) FROM register");
	  $regmin_date=$db->extract_single("SELECT min(crcdt) FROM register");
	if (($lawyername != '')|| ($regfrom1 !="") ||($regto1 != "") || ($case != ""))
	 {		 
		$sql.="  and";
		    if((isset($lawyername)) && ($lawyername != '') )
			{
			$sql.= " title LIKE '%$lawyername%' and";
			}
			if(($case != '') && (isset($case)))
			{
			$casetype=$db->get_all("select * from register ");
			
			$sql1="";
				foreach ($casetype as $case1)
				{
				$lawid= $case1['id'];
				
				$divIds = explode(",",$case1['category']);
				
				if(in_array($case,$divIds))
				{
					$sql1 .= " id = $lawid OR";
				}
				
				}
				
			$sql2=rtrim($sql1," OR");
		   if ($sql2 != '' )
		   {
			$sql.= " ( $sql2 ) and";
		   }
		   else{
			   $sql.= " id = 'a' and";
		   
		   }
			
			}
			if(($regfrom1 =="") )
			{ 
		    $regfrom1=$regmin_date;
			}
            if(($regto1 ==""))
			{
			$regto1=$regmax_date;	
			}				
		        
				$regfrom3=date('Y-m-d',strtotime($regfrom1));
				
				$regto3=date('Y-m-d',strtotime($regto1));
	            $sql.= " crcdt between '".$regfrom3."' and '".$regto3."'";
									
	   }
	   $sql=rtrim($sql," and");
	
	   $GetRecords=$db->get_all($sql);	
	}else
	{
$GetRecords=$db->get_all("select * from register where user_role='1' order by id desc");
	}
$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp2 = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$fname = $GetRecord['fname'];
	$lname = $GetRecord['lname'];
	$title=$GetRecord['title'];
	$reg_ip=$GetRecord['reg_ip'];	
	$active_status = $GetRecord['active_status'] ;
	$crcdt=$GetRecord['crcdt'];		
	$crcdt=date('d-M-Y',strtotime($crcdt));
	
    if($active_status == '0'){
        $DisplayStatus = "<a href='search.php?id=$idvalue&lyrstatus=$active_status' title='Activate' class='btn btn-sm btn-icon btn-secondary btn-info'><i class='fa fa-times'></i></a>";
		$Title = "Active";
		$status_active = "Deactive";
	}	
    else if($active_status == '1'){
        $DisplayStatus = "<a href='search.php?id=$idvalue&lyrstatus=$active_status' title='Deactivate' class='btn btn-sm btn-icon btn-secondary btn-success'><i class='fa fa-check'></i></a>";
		$Title = "Deactive";
		$status_active = "Active";
	}	
	
	$name = $fname.' '.$lname;
	$title="<a href='company-view.php?id=$idvalue' target='_blank'>$GT_RightSign $title</a>";
	$reviews = $db->Extract_Single("select count(lawyer_id) from  review where lawyer_id='$idvalue'"); 
	$reviews="<a target='_blank' href='review.php?id=$idvalue'>$GT_RightSign $reviews</a>";
	$rating = overall_Rate($idvalue);	
	$db->insertrec("update register set overall_rate='$rating' where id='$idvalue' and user_role='1'");
	$EditLink = "<a href='company-profileupd.php?upd=2&id=$idvalue' title='Edit'  class='btn btn-sm btn-icon btn-secondary btn-warning' ><i class='fa fa-pencil-square-o'></i></a>";
	
    $disp2 .="<tr>
				<td  align='left'>$sno</td>				
				
				<td  align='left' class='name'>$title </td>
				<td  align='left'>$reviews</td>
				<td  align='left'>$rating</td>
				<td  align='left'>$reg_ip</td>				
				<td  align='left'>$crcdt</td>			
				<td width='17%'>
				<div class='btn-group btn-group-xs'>
				 <a href='company-view.php?id=$idvalue' title='View company Details' class='btn btn-sm btn-icon btn-secondary' data-toggle='tooltip'><i class='fa fa-search'></i></a>
					$DisplayStatus
					$EditLink
					<a href='search.php?id=$idvalue&act=lyrdel'onclick='return makesure()' type='button' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				</div>
				</td> 
			</tr>";
			$sno++;
}
if($act == "delt")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
else if($act == "fsts")
    $Message = "<font color='green'><b>Added to Featured List</b></font>" ;
else if($act == "frsts")
    $Message = "<font color='green'><b>Removed from Featured List</b></font>" ;
?>
 <table id="demo-dt-basic1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No.</th>
											<th><?=$keyword;?> Name</th>
											
											<th>Reviews</th>
											<th>Avg. Ratings</th>
											<th>Register IP</th>
											<th>Join Date</th>
                                  							
										   <th style="min-width: 200px;" class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp2; ?></tbody>
                                </table>
</div>
<div id="appointmenttbl" style="display:none;" >
<?
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
$filter=""; 
$orderby="order by id desc";


if((isset($filter)) && ($type == '3') )
	{
	
?>
  <script>$(document).ready(function(){
	  		$("#regis").hide();
			$("#case").hide();
			$("#usern").show();
			$("#lawyern").show();
			$("#book").show();
            $("#usertbl").hide();
			$("#lawyertbl").hide();
			$("#appointmenttbl").show();
  });</script>
    <?	 
     $sql="SELECT * FROM enquiry ";
	 $max_date=$db->extract_single("SELECT max(send_dt) FROM enquiry");
	  $min_date=$db->extract_single("SELECT min(send_dt) FROM enquiry");
	if (($lawyername != '')|| ($username != '')|| ($from1 !="") ||($to1 != ""))
	 {		 
		$sql.=" where";
		 
			if((isset($lawyername)) && ($lawyername != ''))
			{
			$lawyer=$db->get_all("select * from register where user_role='1' and title like '%$lawyername%' ");
			$sql1="";
			foreach ($lawyer as $lwyr)
			{
				
			$sql1.= " lawyer_id='".$lwyr['id']."' OR";
			}
			$sql2=rtrim($sql1," OR");
			 if ($sql2 != '' )
		   {
			$sql.= " ( $sql2 ) and";
		   }
		   else{
			   $sql.= " id = 'a' and";
		   
		   }
		
			}
			if((isset($username)) && ($username != ''))
			{
			$user=$db->get_all("select * from register where user_role='0' and fname like '%$username%' ");
			$sql1="";
				foreach ($user as $usr)
				{
					$sql1.= " user_id='".$usr['id']."' OR";
				}
			$sql2=rtrim($sql1," OR");
			 if ($sql2 != '' )
		   {
			$sql.= " ( $sql2 ) and";
		   }
		   else{
			   $sql.= " id = 'a' and";
		   
		   }
			}
			if(($from1 =="") )
			{ 
		    $from1=$min_date;
			}
            if(($to1 ==""))
			{
			$to1=$max_date;	
			}				
		        
				$from3=date('Y-m-d',strtotime($from1));
				
				$to3=date('Y-m-d',strtotime($to1));
	            $sql.= " send_dt between '".$from3."' and '".$to3."'";
									
	   }
	   $sql=rtrim($sql," and");
	   $GetRecords=$db->get_all($sql);	
	   $GetRecordsnum=$db->numrows($sql);	
	}
else{
	$GetRecords=$db->get_all("select * from enquiry order by id desc");
	}
$sno = 1;
if(count($GetRecords)==0)
    $Message="No Record found";
$disp = "";
foreach($GetRecords as $i=>$GetRecord) {
    $idvalue = $GetRecord['id'];
	$user_id = $GetRecord['user_id'];
	$cmpy_id = $GetRecord['cmpy_id'];
	$send_status = $GetRecord['send_status'];
	$username = ucwords(userInfo($user_id,'fname'));
	$title_name = ucfirst(userInfo($cmpy_id,'title'));
	$send_dt = $GetRecord['send_dt'];
	$send_dt = date('d-M-Y',strtotime($send_dt));
	
	if ($send_status== 0) { 
		$sts = "<button style='cursor:default;' class='btn btn-sm btn-icon btn-secondary btn-warning'> <i class='fa fa-check-square-o'></i> In progress </button>";
	}
	else if ($send_status == 1){ 
		$sts = "<button style='cursor:default;' class='btn btn-sm btn-icon btn-secondary btn-success'> <i class='fa fa-check-square-o'> </i> Sent </button>";
	}
	
    $disp .="<tr>
				<td  align='left'>$sno</td>
				<td  align='left' class='name'><a href='userview.php?id=$user_id' target='_blank'> $username</a> </td>
				<td  align='left'><a href='company-view.php?id=$cmpy_id' target='_blank'>$title_name </a> </td>				
				<td  align='left'>$send_dt </td>		
				<td width='17%'>
				<div class='btn-group btn-group-xs'>				
					$sts
					<a onclick='return makesure();' href='search.php?id=$idvalue&act=apntdel' class='btn btn-sm btn-icon btn-secondary btn-danger' title='Delete'><i class='fa fa-trash-o'></i></a>				
				</div>
				</td> 
			</tr>";
			$sno++;
}
if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
else if($act == "fsts")
    $Message = "<font color='green'><b>Added to Featured List</b></font>" ;
else if($act == "frsts")
    $Message = "<font color='green'><b>Removed from Featured List</b></font>" ;
?>								
                                <table id="demo-dt-basic2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No.</th>
											<th>User Name</th>
											<th><?=$keyword;?> Name</th>
											<th>Send Date</th>										
											<th class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
								</div>
			</div>
		</div>
	</div>
</section>
<div class="" style="display:none;">
	<input id="picker_from" type="date">
	<input id="picker_to" type="date">
</div>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<script> 
$(function() {   
			    $( "#fromd" ).datepicker({   //alert("hi");
				defaultDate: "+1w",  
			    changeMonth: true,   
			    numberOfMonths: 1,  
				onClose: function( selectedDate ) 
				{  
				$( "#tod" ).datepicker( "option", "minDate", selectedDate );  
				}  
				});  
				$( "#tod" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				onClose: function( selectedDate ) {
				$( "#fromd" ).datepicker( "option", "maxDate", selectedDate );
			    }
				});  
				}); 			 
</script>
<script> 
  $(function() {   
			    $( "#regfrom1" ).datepicker({   //alert("hi");
				defaultDate: "+1w",  
			    changeMonth: true,   
			    numberOfMonths: 1,  
				onClose: function( selectedDate ) 
				{  
				$( "#regto1" ).datepicker( "option", "minDate", selectedDate );  
				}  
				});  
				$( "#regto1" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				onClose: function( selectedDate ) {
				$( "#regfrom1" ).datepicker( "option", "maxDate", selectedDate );
			    }
				});  
				}); 				
</script>
  <script>
  
                                       $(document).ready(function(){
										   
                                          $('#type1').on('change', function() {
                                         if ( this.value == '1')
                                            {
												
											$("#username").val("");
			                                $("#regfrom1").val("");
			                                $("#regto1").val("");
											$('#filter').click();
                                            $("#regis").show();
											$("#case").hide();
											$("#usern").show();
											$("#lawyern").hide();
											$("#book").hide();
										    $("#usertbl").show();
											 $("#lawyertbl").hide();
											$("#appointmenttbl").hide();
											
                                            }
                                         else if(this.value == '2')
                                            {
											$("#username").val("");
											$("#case1").val("");
											$("#lawyername").val("");	
											$("#regfrom1").val("");
			                                $("#regto1").val("");
											$('#filter').click();
											$("#regis").show();
											$("#case").show();
											$("#usern").hide();
											$("#lawyern").show();
											$("#usertbl").hide();
											$("#lawyertbl").show();
											$("#appointmenttbl").hide();
											$("#book").hide();
										
                                             }
											 else if(this.value == '3')
											 {
											$("#case1").val("");
											$("#lawyername").val("");
											$("#fromd").val("");
											$("#tod").val("");
											$('#filter').click();
											 $("#regis").hide();
											$("#case").hide();
											$("#usern").show();
											$("#lawyern").show();
											$("#book").show();
                                            $("#usertbl").hide();
											$("#lawyertbl").hide();
											$("#appointmenttbl").show();											
											 }
											 
                                            });
                                          });
                                        </script>
<? include 'footer.php'; ?>
