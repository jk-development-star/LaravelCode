<?php include "includes/header.php";

$rowsPerPage=4;
$limit=limitation($rowsPerPage);

$selval = isSet($selval) ? $db->escapstr($selval) : '';
$search = "";
if(isset($catid)){
	$catid = $db->escapstr($catid);
	$catid = base64_decode($catid);
	$search .="and category='$catid'";
}
if(isset($cid)){
	$cid = $db->escapstr($cid);
	$cid = base64_decode($cid);
	$search .="and city='$cid'";
}
if(isset($main_search)){
	if($city!=""){
        $city = $db->escapstr($city);
		$search .="and city='$city'";
	}
	if($division!=""){
        $division = $db->escapstr($division);
		$search .="and category='$division'";
	}
}

	$ch1 = isSet($ch1) ? $ch1 : '';
	$ch2 = isSet($ch2) ? $ch2 : '';
	$ch3 = isSet($ch3) ? $ch3 : '';
	$ch4 = isSet($ch4) ? $ch4 : '';
	$ch5 = isSet($ch5) ? $ch5 : '';
	$ch6 = isSet($ch6) ? $ch6 : '';
	$ch7 = isSet($ch7) ? $ch7 : '';
	$ch8 = isSet($ch8) ? $ch8 : '';
	$ch9 = isSet($ch9) ? $ch9 : '';
	$ch10 = isSet($ch10) ? $ch10 : '';
	$loct0 = isSet($loct0) ? $loct0 : '';
	$loct1 = isSet($loct1) ? $loct1 : '';
	$loct2 = isSet($loct2) ? $loct2 : '';
	$loct3 = isSet($loct3) ? $loct3 : '';
	$loct4 = isSet($loct4) ? $loct4 : '';
	$filter = "";
	$price_flt = "";
	if(isset($filter)) {
		$ch1 = $db->escapstr($ch1);
		$ch2 = $db->escapstr($ch2);
		$ch3 = $db->escapstr($ch3);
		$ch4 = $db->escapstr($ch4);
		$ch5 = $db->escapstr($ch5);
		$ch6 = $db->escapstr($ch6);
		$ch7 = $db->escapstr($ch7);
		$ch8 = $db->escapstr($ch8);
		$ch9 = $db->escapstr($ch9);
		$ch10 = $db->escapstr($ch10);
		$loct0 = $db->escapstr($loct0);
		$loct1 = $db->escapstr($loct1);
		$loct2 = $db->escapstr($loct2);
		$loct3 = $db->escapstr($loct3);
		$loct4 = $db->escapstr($loct4);
		
		if(isset($ch1) && ($ch1==5)) {
			$search.="and overall_rate=5 ";
			$filter = "or ";
		}
		if(isset($ch2) && ($ch2==4)) {
			if($filter!="") {
				$search.= $filter." overall_rate=4 ";
			}
			else {
				$search.="and overall_rate=4 ";
				$filter = "or ";
			}
		}
		if(isset($ch3) && ($ch3==3)) {
			if($filter!="") {
				$search.= $filter." overall_rate=3 ";
			}
			else {
				$search.="and overall_rate=3 ";
				$filter = "or ";
			}
		}
		if(isset($ch4) && ($ch4==2)) {
			if($filter!="") {
				$search.= $filter." overall_rate=2 ";
			}
			else {
				$search.="and overall_rate=2 ";
				$filter = "or ";
			}
		}
		if(isset($ch5) && ($ch5==1)) {
			if($filter!="") {
				$search.= $filter." overall_rate=1 ";
			}
			else {
				$search.="and overall_rate=1";
				$filter = "or ";
			}
		}
		if(isset($ch6) && ($ch6==1)) {
			$price_flt = "or ";
			if($filter!="") {
				$search.= $filter." SUBSTRING_INDEX(investment,'-',1) <= $ch6 and SUBSTRING_INDEX(investment,'-',-1) <=$ch6 ";
			}
			else {
				$search.="and SUBSTRING_INDEX(investment,'-',1) <= $ch6 and SUBSTRING_INDEX(investment,'-',-1) <=$ch6 ";
			}
		}
		if(isset($ch7) && !empty($ch7)) {
			$inves = explode('-',$ch7);
			$inves_fr = $inves[0];
			$inves_to = $inves[1];
			if($price_flt!="") {
				$search.= $price_flt." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
			}
			else {
				if($filter!="") {
					$search.= $filter." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				else {
					$search.="and (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				$price_flt = "or ";
			}
		}
		if(isset($ch8) && !empty($ch8)) {
			$inves = explode('-',$ch8);
			$inves_fr = $inves[0];
			$inves_to = $inves[1];
			if($price_flt!="") {
				$search.= $price_flt." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
			}
			else {
				if($filter!="") {
					$search.= $filter." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				else {
					$search.="and (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				$price_flt = "or ";
			}
		}
		if(isset($ch9) && !empty($ch9)) {
			$inves = explode('-',$ch9);
			$inves_fr = $inves[0];
			$inves_to = $inves[1];
			if($price_flt!="") {
				$search.= $price_flt." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
			}
			else {
				if($filter!="") {
					$search.= $filter." (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				else {
					$search.="and (SUBSTRING_INDEX(investment,'-',1) >= $inves_fr and SUBSTRING_INDEX(investment,'-',-1) <= $inves_to) ";
				}
				$price_flt = "or ";
			}
		}
		if(isset($ch10) && ($ch10==50)) {
			if($price_flt!="") {
				$search.= $price_flt." (SUBSTRING_INDEX(investment,'-',1) >= $ch10) ";
			}
			else {
				if($filter!="") {
					$search.= $filter." (SUBSTRING_INDEX(investment,'-',1) >= $ch10) ";
				}
				else {
					$search.="and (SUBSTRING_INDEX(investment,'-',1) >= $ch10) ";
				}
				$price_flt = "or ";
			}
		}
		if(isset($loc0) && !empty($loc0)) {
			if($filter!="") {
				$search.= $filter." headquater='$loc0'";
			}
			else {
				$search.="and headquater='$loc0'";
			}
		}
		if(isset($loct1) && !empty($loct1)) {
			if($filter!="") {
				$search.= $filter." headquater='$loct1'";
			}
			else {
				$search.="and headquater='$loct1'";
			}
		}
		if(isset($loct2) && !empty($loct2)) {
			if($filter!="") {
				$search.= $filter." headquater='$loct2'";
			}
			else {
				$search.="and headquater='$loct2'";
			}
		}
		if(isset($loct3) && !empty($loct3)) {
			if($filter!="") {
				$search.= $filter." headquater='$loct3'";
			}
			else {
				$search.="and headquater='$loct3'";
			}
		}
		if(isset($loct4) && !empty($loct4)) {
			if($filter!="") {
				$search.= $filter." headquater='$loct4'";
			}
			else {
				$search.="and headquater='$loct4'";
			}
		}
	}
	
	$order_by = "";
	if(isset($yr)) {			
		$selval = $db->escapstr($yr);
		
		if($selval=="lower") {
			$order_by = "order by launched_yr asc";
		}
		if($selval=="higher") {
			$order_by = "order by launched_yr desc";
		}
	
	} 
	else if(isset($top)) {
		$order_by = "order by overall_rate desc";
	}
	else {
		$order_by = "order by id desc";
	}
?>
            <?php include "includes/innersearch.php"; ?>
            <!-- End hero -->
            <div  class="container margin_60">
               <div class="row">
                  <aside class="col-lg-3 col-md-3">
                     <div class="box_style_cat">
                        <ul id="cat_nav">
                           <li><a href="#" id="active"> All Category <span>(<?=$db->numrows("select * from register where user_role='1' and active_status='1'");?>)</span></a></li>
						   <? $sel_cat=$db->get_all_assoc("select * from category where active_status='1' order by category_name asc");
                           foreach($sel_cat as $fetchcat){
							   $prf_count=$db->numrows("select * from register where user_role='1' and active_status='1' and category='".$fetchcat["id"]."'")?>
                           <li><a href="<? echo $siteurl; ?>/list/category/<?=base64_encode($fetchcat['id']);?>/<? echo reurl($fetchcat['category_name']); ?>"><?=ucfirst($fetchcat['category_name']);?> <span>(<?=$prf_count;?>)</span></a></li>
                           <? } ?>                           
                        </ul>
                     </div>
                     <div id="filters_col">
                        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filters <i class="icon-plus-1 pull-right"></i></a>
                        <div class="collapse" id="collapseFilters">
                           <div class="filter_type">
                              <h6>Rating</h6>
							 <form method="get" action="<? echo $siteurl; ?>/list">
                              <ul>
                                 <li><label>
								 <input type="checkbox" name="ch1" value="5" <? if($ch1==5) echo "checked"; ?> />
								 <span class="rating">
                                    <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i>
                                    </span></label>
                                 </li>
                                 <li><label>
								 <input type="checkbox" name="ch2" value="4" <? if($ch2==4) echo "checked"; ?> />
								 <span class="rating">
                                    <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                                    </span></label>
                                 </li>
                                 <li><label>
								 <input type="checkbox" name="ch3" value="3" <? if($ch3==3) echo "checked"; ?> />
								 <span class="rating">
                                    <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><i class="icon-star"></i>
                                    </span></label>
                                 </li>
                                 <li><label>
								 <input type="checkbox" name="ch4" value="2" <? if($ch4==2) echo "checked"; ?> />
								 <span class="rating">
                                    <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
                                    </span></label>
                                 </li>
                                 <li><label>
								 <input type="checkbox" name="ch5" value="1" <? if($ch5==1) echo "checked"; ?> />
								 <span class="rating">
                                    <i class="icon-star voted"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>
                                    </span></label>
                                 </li>
                              </ul>
							  
							  <div class="filter_type">
                              <h6>Price (In <?=$site_currency; ?>)</h6>
							 
                              <ul>
                                 <li><label>
								 <input type="checkbox" name="ch6" value="1" <? if($ch6==1) echo "checked"; ?> />
								 <span class="rating font14px">
                                     
									Upto  1 lac
                                    </span></label>
                                 </li>
								  <li><label>
								 <input type="checkbox" name="ch7" value="1-10" <? if($ch7=='1-10') echo "checked"; ?> />
								 <span class="rating font14px">
                                      1 – 10 lacs
                                    </span></label>
                                 </li>
								  <li><label>
								 <input type="checkbox" name="ch8" value="10-30" <? if($ch8=='10-30') echo "checked"; ?> />
								 <span class="rating font14px">
                                     10 lacs - 30 lacs
                                    </span></label>
                                 </li>
								  <li><label>
								 <input type="checkbox" name="ch9" value="30-50" <? if($ch9=='30-50') echo "checked"; ?> />
								 <span class="rating font14px">
                                      30 lacs - 50 lacs
                                    </span></label>
                                 </li>
								  <li><label>
								 <input type="checkbox" name="ch10" value="50" <? if($ch10==50) echo "checked"; ?> />
								 <span class="rating font14px">
                                    Above 50 lacs
                                    </span></label>
                                 </li>
								 </ul>
							  </div>
							  
							  
							   <div class="filter_type">
                              <h6>Locations</h6>
							 
                              <ul>
							<? $GetLoct = $db->get_all("select distinct headquater from register where user_role='1' and active_status='1' order by headquater asc limit 5");
							  foreach($GetLoct as $i=>$GetLoc) {
								  $loc = ucfirst($GetLoc["headquater"]);
								  $loc_name = 'loc'.$i;
								  $loctname = 'loct'.$i;
							  ?>
                                 <li><label>
								 <input type="checkbox" name="<?=$loc_name;?>" value="<?=$loc; ?>" <? if($loc_name==$loctname) echo "checked"; ?> />
								 <span class="rating">
                                     <?=$loc; ?>
                                    </span></label>
                                 </li>
							  <? } ?>
								 </ul>
							  </div>
							  <input type="submit" name="filter" class="btn filbut btn-block" value="Filter" /> 
							 </form>
                           </div>
                        </div>
                        <!--End collapse -->
                     </div>
                     <!--End filters col-->
                  </aside>
                  <!--End aside -->
                  <div class="col-lg-9 col-md-9">
                     <div id="tools">
                        <div class="row">
                           <div class="col-md-3 col-sm-3 col-xs-6">
                              <div class="styled-select-filters">
                                 <select name="sort_price" id="sort_price" onchange="filter_expe(this.value);">
                                    <option value="">Sort by Franchised Date</option>
                                    <option value="lower" <? if($selval=="lower") echo "selected" ; ?>>Oldest </option>
                                    <option value="higher" <? if($selval=="higher") echo "selected" ; ?>>Latest </option>
                                 </select>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <!--/tools -->
				<? $que="select * from register where user_role='1' and active_status='1' $search $order_by";
					if($db->numrows($que)==0) { ?>
						 <div align="center">
							<h2 style="color:red;">No Record Found. Related Search Results. . .</h2>
						 </div>
						 
				<?	$que="select * from register where user_role='1' and active_status='1'";
					} 
					$select_lawyer=$db->get_all_assoc($que.$limit);
					
                     foreach($select_lawyer as $fetch_lawyer){
						$lawyerid = base64_encode($fetch_lawyer['id']);
						$fname = $fetch_lawyer['fname'];
						$title = $fetch_lawyer['title'];
						$title_name = checkLength($fetch_lawyer['title'],28);
						$cat_name = getCategory($fetch_lawyer['category']);
						$cat_name = checkLength($cat_name,22);
						$address = $fetch_lawyer['building'].','.$fetch_lawyer['street'].','.$fetch_lawyer['landmark'].','.$fetch_lawyer['area'];
						$address = $com_obj->getReptrim($address);
					 ?>
                     <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                           <div class="col-lg-4 col-md-4 col-sm-4">
                              <div class="img_list"><a href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>">
                                    <img src="<? echo $siteurl; ?>/uploads/profile/<?=$fetch_lawyer['img'];?>" alt="Image">
                                   <div class="short_info name"><?=$cat_name;?> </div>
                                 </a>
                              </div>
                           </div>
                           <div class="clearfix visible-xs-block"></div>
                           <div class="col-lg-8 col-md-8 col-sm-8">
                              <div class="tour_list_desc">
								<div class="row">
									<div class="col-sm-6">
										 <a href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>">	<h3><strong><?=$title_name;?></strong></h3>	</a>
									</div>
									<div class="col-sm-6">
										 <div class="rating" style="text-align:right;">
										 <?php echo get_Rate($fetch_lawyer['id']); ?>
										 </div>
									</div>
								</div>
                                 <p><?=substr(stripslashes($fetch_lawyer['detail']),0,165);?></p>
								 <h5><b>Investment Range</b> - <?=$fetch_lawyer['investment'].' lacs'; ?></h5>
								 <h5><b>Space Required</b> - <?=$fetch_lawyer['area_req']; ?></h5>
                                 <ul class="add_info">
                                    <li>
                                       <div class="tooltip_styled tooltip-effect-4">
                                          <span class="tooltip-item"><i class=" icon_set_1_icon-37"></i></span>
                                          <div class="tooltip-content">
                                             <h4>Expansion Locations</h4>
											 <table> 
											 <? $exp_loc = $fetch_lawyer["expan_location"]; 
												$exp_loc = explode(',',$exp_loc);
												foreach($exp_loc as $expLoc) { ?>
                                             <tr> <td> <strong><?=$expLoc; ?></strong> </td> 
											<!-- <td></td> <td> <strong>Meghalaya</strong> </td> -->
											 </tr>
											<? } ?>
											 </table>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="tooltip_styled tooltip-effect-4">
                                          <span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
                                          <div class="tooltip-content name">
                                             <h4>Address</h4>
                                             <?=$address; ?><br>
                                          </div>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="tooltip_styled tooltip-effect-4">
                                          <span class="tooltip-item"><i class="icon_set_1_icon-73"></i></span>
                                          <div class="tooltip-content">
                                             <h4>Contact No.</h4>
                                             <?=$fetch_lawyer['contact_no1']; ?>
                                          </div>
                                       </div>
                                    </li>								
                                 </ul>
								 <span class="detl-btn"><p><a href="<? echo $siteurl; ?>/detail/<?=$lawyerid;?>/<?=reurl($fname);?>/<?=reurl($title);?>" class="btn_1 outline">Read More</a></p></span>
                              </div>
							 
                           </div>
                  
                        </div>
                     </div>
                     <!--End strip -->
					 <? } ?>
			
                     <hr>
                     <div class="text-center">
						<? echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
                     </div>
                     <!-- end pagination-->
					 <!-- start Ad -->
					 <?
						$ad=$db->singlerec("select * from banner where banner_size='728X90' and ban_location='list' and ban_status='0' order by RAND()");
				        $ad1=$db->numrows("select * from banner where banner_size='728X90' and ban_location='list' and ban_status='0'");
				        if($ad1 > 0)
						{
						$size=$ad['banner_size'];
						$image=$ad['ban_image'];
						$link=$ad['ban_link'];
						$ban_id=$ad['ban_id'];
					 ?>
					 <div class="col-sm-12">
		                <a href="<?=$link;?>" target="_blank" class="ad_click" data-id="<?=$ban_id?>"><img src="<? echo $siteurl; ?>/admin/uploads/banner/original/<?=$image;?>" width="817" height="105" class="advert_image"></a>
		             </div>
						<? } ?>
			   <!-- End Ad -->
                  </div>
                  <!-- End col lg-9 -->
				   
               </div>
               <!-- End row -->
			   
            </div>
            <!-- End container -->
			
<style>
.detl-btn p {
	text-align : right;
	margin-top : -33px;
}
</style>
<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function () {  
   $('.ad_click').click(function(){
		var ban_id = $(this).data('id');
		$.ajax({
			type: "POST",
			url: "<? echo $siteurl; ?>/checkpass.php",
			data:{bId:ban_id},
			success: function(result) {
				/* if(result!="0") {
					display.innerHTML = result;			
				} */
			}
		});
	});
});

function filter_expe(id){
	var selval = id;
	location.href="<? echo $siteurl; ?>/list/experience/"+selval;
}
</script>