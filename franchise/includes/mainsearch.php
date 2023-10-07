<?php $get_city=$db->get_all_assoc("select DISTINCT city.city_id,city.city_name,register.city from city,register where register.city=city.city_id order by city.city_name");
$get_cat=$db->get_all_assoc("select * from category where parent_id!='0' and active_status='1' order by category_name asc");?>
            <section id="search_container" style="background: #4d536d url(<? echo $siteurl; ?>/img/<? echo $sitebanner; ?>) no-repeat center top;height: 670px;background-size: cover;">
               <div class="container">
			   <div id="search" class="col-md-8 col-sm-6 col-lg-8">
			   </div>
			   <div id="search" class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                  <div class="tab-content">
                     <div class="tab-pane active" id="tours">
                        <h3 class="text-center">Find Your Flexible Franchise. Fast. </h3>
                        <div class="row">
						<form action="list" method="get">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <select class="ddslick" name="city">
								    <option value="">Select City</option>
								 <?php foreach($get_city as $city){?>
                                    <option value="<?=$city['city_id'];?>"><?=$city['city_name'];?></option>
								 <?php } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <!--<input type="text" class="form-control" placeholder="Type your option" name="division">-->
								 <select class="ddslick" name="division">
								    <option value="">Select Your Category</option>
								 <?php foreach($get_cat as $cat){?>
                                    <option value="<?=$cat['id'];?>"><?=Ucfirst($cat['category_name']);?></option>
								 <?php } ?>
                                 </select>
                              </div>
                           </div>
						   <!--<div class="col-md-12">
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
                           <div class="col-md-4">
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
			   </div>
            </section>
			
			<style>
			ul.dd-options.dd-click-off-close{
				    max-height: 350px;
    overflow: scroll;
    overflow-x: hidden;
			}
			</style>