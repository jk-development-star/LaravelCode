<?php 
$city_name = isSet($city) ? $db->escapstr($city) : '' ;
$division_name = isSet($division) ? $db->escapstr($division) : '' ;
$get_city=$db->get_all_assoc("select DISTINCT city.city_id,city.city_name,register.city from city,register where register.city=city.city_id order by city.city_name");
$get_cat=$db->get_all_assoc("select * from category where active_status='1' order by category_name asc");
?>
<? if(isset($city))  ?>
 <section id="search_container" class="page_new_cntinr">
               <div id="search" class="page_new_search">
                  <div class="tab-content">
                     <div class="tab-pane active" id="tours">
                        <div class="row">
						<form action="<? echo $siteurl; ?>/list" method="get">
                           <div class="col-md-4 col-sm-4">
                              <div class="form-group">
                                 <select class="ddslick" name="city">
								   <option value="">Select City</option>
								 <?php foreach($get_city as $city1){?>
                                    <option value="<?=$city1['city_id'];?>" <? if($city_name==$city1['city_id']) echo "selected"; ?>><?=$city1['city_name'];?></option>
								 <?php } ?>
								 
								 <!-- <?=$drop->get_dropdown($db,"SELECT DISTINCT city.city_name, register.city FROM city, register WHERE register.city = city.city_id ORDER BY city.city_name",$city);?>-->
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-4">
                              <div class="form-group">
                                 <select class="ddslick" name="division">
								    <option value="">Select Your Option</option>
								 <?php foreach($get_cat as $cat){?>
                                    <option value="<?=$cat['id'];?>" <? if($division_name == $cat['id']){ echo "selected";} ?>><?=Ucfirst($cat['category_name']);?></option>
								 <?php } ?>
                                 </select>
                              </div>
                           </div>
						   <!--<div class="col-md-3">
                              <div class="form-group">
								 <select class="ddslick" name="gender">
								    <option value="">Select Your Option</option>
									<option>Family</option>
									<option>Male</option>
									<option>Female</option>
									<option>Kids</option>
                                 </select>
                              </div>
                           </div>-->
                           <div class="col-md-4 col-sm-4">
                              <div class="form-group">
                                 <button class="btn_1  btn-block green" style="padding: 10px;" name="main_search"><i class="icon-search"></i>Search now</button>
                              </div>
                           </div>
						   </form>
                        </div>
                        <!-- End row -->
                     </div>
                     <!-- End rab -->
                  </div>
               </div>
            </section>
			
			<style>
			ul.dd-options.dd-click-off-close{
				    max-height: 350px;
    overflow: scroll;
    overflow-x: hidden;
			}
			.page_new_search {
    padding: 0 5% !important;
    padding-top: 140px !important;
}
			</style>