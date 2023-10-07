<?php
class notification extends common{
	
	public function notify1($siteurl){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$GetNotify2=database::get_all("select b.name,a.cmt_date,a.content,a.id from comments as a inner join upload as b on b.id=a.product_id where a.notification='0' and b.upload_by='$userlog'");
		if(count($GetNotify2) !=0){
			for($ntfy=0;$ntfy<count($GetNotify2);$ntfy++){
				$ntyname=$GetNotify2[$ntfy]['name'];
				$likedt=$GetNotify2[$ntfy]['cmt_date'];
				$likedt=common::dtdiff($likedt);
				$cid=$GetNotify2[$ntfy]['id'];
				$content=$GetNotify2[$ntfy]['content'];
				$content=substr($content,0,60);
				$ret .="<div class='msg' onclick=window.location.href='$siteurl/exclusivescript-user-portal/notification?divid=ci$ntfy&alertid=$cid' id='ci$ntfy'> 
					   <div><strong>$ntyname</strong> <em class='pull-right'><small>$likedt</small></em></div>
					   <p>$content</p>
					</div>";
			}
		}
		return $ret;
	}
	public function notifyall($siteurl){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$sql="select * from notification where vendor_id='$userlog' and status='0' ";
		
		$ntstv=database::singlerec("select notify_settings from store where own_by='$userlog'");
		$ntsarray=explode(',',$ntstv[0]);
		if(!empty($ntsarray)){
			$sql.="and (";	
			foreach($ntsarray as $index=>$sid){
				if(($index+1) < count($ntsarray))	
					$sql.=" notify_type = '$sid' or";
				else
					$sql.=" notify_type = '$sid'";	
			}
			$sql.=")";
		}else{
		$sql.=" and notify_type = '0'";	
		}
		$ntall=database::get_all($sql);
		foreach($ntall as $index=>$nt){
			$title=$nt['title'];
			$ntdt=$nt['notify_date'];
			$ntdt=common::dtdiff($ntdt);
			$id=$nt['id'];
			$content=$nt['content'];
			$content=substr($content,0,60).'...';	
			$ret .="<div class='msg' onclick=window.location.href='$siteurl/exclusivescript-user-portal/notification?divid=i$index&alertid=$id' id='i$index'> 
					   <div><strong>$title</strong> <em class='pull-right'><small>$ntdt</small></em></div>
					   <p>$content</p>
					</div>";
		}
		return $ret;
	}
	
	/*public function notifyall_user($siteurl){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$sql="select * from notification where user_id='$userlog' and status2='0'";
		$ntall=database::get_all($sql);
		
		$PS_NotifyAct=array("","Like","Comment","Follow","Cart","Sale");        
		
		
		
		foreach($ntall as $index=>$nt){
			$title=$nt['title'];
			$ntdt=$nt['notify_date'];
			$ntdt=common::dtdiff($ntdt);
			$id=$nt['id'];
			$content=$nt['content'];
			$content=substr($content,0,60).'...';	
			
			$nt_type=$nt['notify_type'];
			if($nt_type==1){
			$title=$nt['title'];
			$content=$nt['content'];	
			}
			
			
			$ret .="<div class='msg' onclick=window.location.href='$siteurl/exclusivescript-user-portal/notification?divid=i$index&alertid=$id' id='i$index'> 
					   <div><strong>$title</strong> <em class='pull-right'><small>$ntdt</small></em></div>
					   <p>$content</p>
					</div>";
		}
		return $ret;
	}*/
	
	
	public function notifyall_detail(){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$ntall=database::get_all("select * from notification where vendor_id='$userlog' order by id desc");
		
		foreach($ntall as $index=>$nt){
			$title=$nt['title'];
			$ntdt=$nt['notify_date'];
			$nttm=date('h:i:s A',strtotime($ntdt));
			$ntedt=date('d/m/Y',strtotime($ntdt));
			$id=$nt['id'];
			$content=$nt['content'];
			$ret .="<div class='form-group row wow fadeIn nopage' id='li$index'>
							<div class='col-sm-8 col-xs-12'>
							<h4>$title</h4>
								<ul>
									<li>$content</li>
								</ul>
							</div>
							<div class='col-sm-4 col-xs-12 text-right'>
								<ul>
									<li>Date : $ntedt </li>
									<li>Time : $nttm </li>
								</ul>
							</div>
						</div>";
		}
		return $ret;
	}
	
	
	public function notify2($siteurl){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$GetNotify1=database::get_all("select b.name,a.like_dt,a.user_id,a.id from likes as a inner join upload as b on b.id=a.product_id where a.notification='0' and b.upload_by='$userlog'");
		if(count($GetNotify1) !=0){
			for($ntfy=0;$ntfy<count($GetNotify1);$ntfy++){
				$ntyname=$GetNotify1[$ntfy]['name'];
				$likedt=$GetNotify1[$ntfy]['like_dt'];
				$likedt=common::dtdiff($likedt);
				$lid=$GetNotify1[$ntfy]['id'];
				$user_id=$GetNotify1[$ntfy]['user_id'];
				$GetUsr=database::singlerec("select name from register where id='$user_id'");
				$name=ucwords($GetUsr['name']);
				$ret .="<div class='msg' onclick=window.location.href='$siteurl/exclusivescript-user-portal/notification?divid=li$ntfy&alertid=$lid' id='li$ntfy'>
					   <div><strong>$ntyname</strong> <em class='pull-right'><small>$likedt</small></em></div>
					   <p>$name like your product</p>
					</div>";
			}
		}
		return $ret;
	}
	public function notify3(){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$GetNotify1=database::get_all("select b.name,a.like_dt,a.user_id from likes as a inner join upload as b on b.id=a.product_id where b.upload_by='$userlog'");
		if(count($GetNotify1) !=0){
			for($ntfy=0;$ntfy<count($GetNotify1);$ntfy++){
				$ntyname=$GetNotify1[$ntfy]['name'];
				$likedt=$GetNotify1[$ntfy]['like_dt'];
				$liktm=date('h:i:s A',strtotime($likedt));
				$likedt=date('d/m/Y',strtotime($likedt));
				
				$user_id=$GetNotify1[$ntfy]['user_id'];
				$GetUsr=database::singlerec("select name from register where id='$user_id'");
				$name=ucwords($GetUsr['name']);
				$ret .="<div class='form-group row wow fadeIn' id='li$ntfy'>
							<div class='col-sm-8 col-xs-12'>
							<h4>$ntyname</h4>
								<ul>
									<li>$name like your product</li>
								</ul>
							</div>
							<div class='col-sm-4 col-xs-12 text-right'>
								<ul>
									<li>Date : $likedt </li>
									<li>Time : $liktm </li>
								</ul>
							</div>
						</div>";
			}
		}
		return $ret;
	}
	public function notify4(){
		$userlog=@($_SESSION['vyuserlog']?$_SESSION['vyuserlog']:'');
		$ret="";
		$GetNotify2=database::get_all("select b.name,a.cmt_date,a.content from comments as a inner join upload as b on b.id=a.product_id where b.upload_by='$userlog'");
		if(count($GetNotify2) !=0){
			for($ntfy=0;$ntfy<count($GetNotify2);$ntfy++){
				$ntyname=$GetNotify2[$ntfy]['name'];
				$likedt=$GetNotify2[$ntfy]['cmt_date'];
				$liktm=date('h:i:s A',strtotime($likedt));
				$likedt=date('d/m/Y',strtotime($likedt));
				$content=$GetNotify2[$ntfy]['content'];
				$content=substr($content,0,60);
				$ret .="<div class='form-group row wow fadeIn' id='ci$ntfy'>
							<div class='col-sm-8 col-xs-12'>
							<h4>$ntyname</h4>
								<ul>
									<li>$content</li>
								</ul>
							</div>
							<div class='col-sm-4 col-xs-12 text-right'>
								<ul>
									<li>Date : $likedt </li>
									<li>Time : $liktm </li>
								</ul>
							</div>
						</div>";
			}
		}
		return $ret;
	}
	public function insert_view_count($ipaddress,$product_id){
		$arrayprodId=array();
		$viewsession=isset($_SESSION['viewsession'])?$_SESSION['viewsession']:'';
		$arraysess=isset($_SESSION['arraysess'])?$_SESSION['arraysess']:'';
		$arrayprodId[]=$product_id;
		if($arraysess){
			$arrayprodId=array_merge($arrayprodId,$arraysess);
			$arrayprodId=array_unique($arrayprodId);
		}
		if($viewsession !="" && (@in_array($product_id, $arraysess))){
			$ret="";
		}
		else if($viewsession =="" && (@in_array($product_id, $arraysess))){
			$ret="";
		}
		else{
			$getview=database::singleasso("select view_count from upload where id='$product_id'");
			$countview=$getview['view_count'] + 1;
			database::insertrec("update upload set view_count='$countview' where id='$product_id'");
			$_SESSION['viewsession']=$ipaddress;
			$_SESSION['arraysess']=$arrayprodId;
			$ret="";
		}
		return $ret;
	}
	public function ShowViewCount($product_id){
		$gettot=database::singleasso("select view_count from upload where id='$product_id'");
		$ret=$gettot['view_count'] + 1000;
		return $ret;
	}
	public function ShowLikeCount($product_id){
		$lcount=database::singlerec("SELECT count(id) from likes where product_id='$product_id'");
		return $lcount[0];
	}
	public function ShowSoldCount($product_id){
		$scount=database::singlerec("SELECT count(id) from orders where product_id='$product_id'");
		return $scount[0];
	}
	public function ShowCommentCount($product_id){
		$ccount=database::singlerec("SELECT count(id) from comments where product_id='$product_id'");
		return $ccount[0];
	}
	public function admin_notify(){
		$ret="";
		$GetNotify2=database::get_all("select a.name,b.user_id from upload as a inner join downloads as b on a.id=b.product_id where b.status='0' order by b.id desc limit 0,10");
		if(count($GetNotify2) !=0){
			for($ntfy=0;$ntfy<count($GetNotify2);$ntfy++){
				$user_id=$GetNotify2[$ntfy]['user_id'];
				$prodName=$GetNotify2[$ntfy]['name'];
				$getusr=database::singlerec("select img,name from register where id='$user_id'");
				$usrimg=$getusr['img'];
				$usrname=$getusr['name'];
				$ret .="<li><a href='notification.php' class='media'>
								<div class='media-left'> <span class='icon-wrap icon-circle bg-info'><img src='../uploads/profile_img/300x300/$usrimg' width='25px' height='25px'></span> </div>
								<div class='media-body'>
									<div class='text-nowrap'>$usrname</div>
									<small class='text-muted'>$prodName</small> 
								</div>
							</a>
						</li>";
			}
		}
		return $ret;
	}
	public function admin_notify_count(){
		$ret="";
		$GetNotify2=database::singlerec("select count(*) as tot from downloads where status='0'");
		$ret=$GetNotify2['tot'];
		return $ret;
	}
	public function header_notify(){
		$ret="";
		$GetNotify2=database::singlerec("select name from header_notify where active_status='1'");
		$ret=$GetNotify2['name'];
		return $ret;
	}
	public function purchasecount($userid){
		$GetCount=database::singlerec("select purchase_count from register where id='$userid'");
		$pcount=$GetCount['purchase_count'] + 1;
		database::insertrec("update register set purchase_count='$pcount' where id='$userid'");
		return;
	}
	public function title_change(){
		$actual_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$actual_link = 'http://'.$actual_url;
		preg_match("/[^\/]+$/", $actual_link, $matches);
		$ret = @$matches[0];
		if(count(@$matches)==0)
			$ret="Exclusivescript";

		return $ret;
	}
	public function deleteacoount($userid){
		$GetCount=database::singlerec("select purchase_count from register where id='$userid'");
		$pcount=$GetCount['purchase_count'] + 1;
		database::insertrec("update register set purchase_count='$pcount' where id='$userid'");
		return;
	}
	public function footercount(){
		$Fprod = database::singlerec("SELECT count(*) as prod from upload"); //$prodtot=$Fprod['tot'];
		$Fmem = database::singlerec("SELECT count(*) as reg from register"); //$memtot=$Fmem['tot'];
		$Fsale = database::singlerec("SELECT count(*) as sale from orders"); //$saletot=$Fsale['tot'];
		$ret = array_merge($Fprod,$Fmem,$Fsale);
		return $ret;
	}
	public function countrycode($cntry,$mobile){
		$cntry=strtoupper($cntry);
		$getcntry=database::singlerec("select phonecode from countries where name='$cntry'");
		$cntrycode=$getcntry['phonecode'];
		$checkstatus=database::check1column("register","mobile",$mobile);
		if($checkstatus==0)
			$ret=$cntrycode.$mobile;
		else{
			$cntrylen=strlen($cntrycode);
			$mbl=substr($mobile,$cntrylen);
			$ret=$cntrycode.$mbl;
		}
		return $ret;
	}
}	
?>