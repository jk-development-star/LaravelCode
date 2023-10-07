		   <footer>
               <div class="container">
                  <div class="row">
                     <div class="col-md-3 col-sm-4">
                        <h3>Need help?</h3>
                        <p class="fnt14 name">
                           <?=$ctc_addr; ?>
                        </p>
                        <a href="tel://<?=$ctc_num;?>" id="phone"><?=$ctc_num;?></a>
                        <a href="mailto:<?=$ctc_email;?>" id="email_footer"><?=$ctc_email;?></a>
                     </div>
                     <div class="col-md-3 col-sm-4">
                        <h3>Most Search city</h3>
						<ul>
						 <? $city=$db->get_all("select DISTINCT city.city_id,city.city_name,register.city from city,register where register.city=city.city_id and register.user_role='1' order by city.city_name limit 8");
						   
						   foreach ($city as $cty){ 

							$city11=$db->singlerec("select  city_id,city_name from city where city_id='".$cty['city']."'");
						   ?>
                           <li><a href="<? echo $siteurl; ?>/list/city/<? echo base64_encode($city11['city_id']); ?>/<?php echo reurl($city11['city_name']); ?>"><?php echo ucwords($city11['city_name']); ?></a></li>
						   <? } ?>
                        </ul>
                     </div>
                     <div class="col-md-3 col-sm-4">
                        <h3>Most Search Category</h3>
                        <ul>
						<? $cate = $db->get_all("select * from register");
						$cat1='';
						foreach($cate as $cat)
						{
							$cat1 .= $cat['category'].',';
						}
						
						$cat2 = explode(",",$cat1);
						$cat31 = array_unique($cat2);
						$cat3 = array_slice($cat31,0,8);
						foreach ($cat3 as $cat){ ?>
                           <li><a href="<? echo $siteurl; ?>/list/category/<? echo base64_encode($cat); ?>/<? echo reurl($cat); ?>"><? echo ucwords(getCategory($cat)); ?> </a></li>
						<? }?>		   
                        </ul>
                     </div>
                     <div class="col-md-3 col-sm-4">
                        <h3>Most Search Company</h3>
                        <ul>
						   <? $lawyer=$db->get_all("select * from register where user_role='1' and active_status='1' order by RAND() limit 8");
						   
						   foreach ($lawyer as $law){ 
								$fname = reurl(userInfo($law['id'],'fname'));
								$title = reurl(userInfo($law['id'],'title'));
								$lyrid = base64_encode($law['id']);
								
								$title_name = checkLength($law['title'],22);
							?>
                           <li><a href="<? echo $siteurl; ?>/detail/<?=$lyrid;?>/<?=$fname;?>/<?=$title;?>">
						   <?php echo ucwords($title_name); ?></a></li>
						   <? } ?>
                        </ul>
                     </div>
                  </div>
                  <!-- End row -->
                  <div class="row">
                     <div id="social_footer">
                        <div class="col-md-4">
                           <p class="fnt14 text-left" style="color:#FFF;">© <? echo $sitetitle.' '.date("Y"); ?> </p>
                        </div>
                        <div class="col-md-8">
                           <ul class=" pull-right">
                              <li><a href="<?php echo $fburl; ?>" rel="nofollow" target="_blank" title="Facebook"><i class="icon-facebook"></i></a></li>
                              <li><a href="<?php echo $twurl; ?>" rel="nofollow" target="_blank" title="Twitter"><i class="icon-twitter"></i></a></li>
                              <li><a href="<?php echo $gpurl; ?>" rel="nofollow" target="_blank" title="GooglePlus"><i class="icon-google"></i></a></li>
                              <li><a href="<?php echo $lnurl; ?>" rel="nofollow" target="_blank" title="Linkedin"><i class="icon-linkedin"></i></a></li>

                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End container -->
            </footer>
            <!-- End footer -->


            <div id="toTop"></div>
            <!-- Back to top button -->
            <!-- Common scripts -->
         
            <script src="<? echo $siteurl; ?>/js/common_scripts_min.js"></script>
            <script src="<? echo $siteurl; ?>/js/functions.js"></script>
            <!-- Specific scripts -->
            <script src="<? echo $siteurl; ?>/js/icheck.js"></script>
            <script>
               $('input').iCheck({
                  checkboxClass: 'icheckbox_square-grey',
                  radioClass: 'iradio_square-grey'
                });
                
            </script>
            <script src="<? echo $siteurl; ?>/js/bootstrap-datepicker.js"></script>
            <script src="<? echo $siteurl; ?>/js/bootstrap-timepicker.js"></script>
            <script>
               /* $('input.date-pick').datepicker({
				  defaultDate: false,
				  format: 'dd/mm/yyyy',				 
			  }); */
               $('input.time-pick').timepicker({
                 minuteStep: 15,
                 showInpunts: false				
               });
            </script>
            <script src="<? echo $siteurl; ?>/js/jquery.ddslick.js"></script>
            <script>
               $("select.ddslick").each(function(){
                        $(this).ddslick({
                            showSelectedHTML: true 
                        });
                    });
                    
            </script>
<!-- Tiny text editor -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/admin/assets/js/tinymce.js" ></script>
<!--Review modal validation -->
<script src="<? echo $siteurl; ?>/assets/validate.js"></script>
<!-- Map -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="<? echo $siteurl; ?>/js/map.js"></script>
<script src="<? echo $siteurl; ?>/js/infobox.js"></script>
<!--DataTables [ OPTIONAL ]-->
        <script src="<? echo $siteurl; ?>/admin/plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<? echo $siteurl; ?>/admin/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="<? echo $siteurl; ?>/admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
		
<!--DataTables Sample [ SAMPLE ]-->
        <script src="<? echo $siteurl; ?>/admin/js/demo/tables-datatables.js"></script>
		
<!--datepicker-->
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css"/>

       <script>
$(function() {
    $( "#datepicker" ).datepicker({ minDate: 0, dateFormat : "dd/mm/yy"});
  });
  </script>

<!--end-->
<script>
function makesure(){
	return confirm("Are you sure to remove?");
}
</script>
         </body>
      </html>