<?
	if($userinfo["user_role"]==0) {
		$menu_head = "My Reviews";
	} else if($userinfo["user_role"]==1) {
		$menu_head = "User Reviews";
	}
	
	$livepage = $_SERVER["PHP_SELF"];
	$livepage=basename($livepage);
	
	if($livepage=="dashboard.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu1 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="profile.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="license.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu3 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="profile-edit.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu4 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="profile-pic-chng.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu5 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="profile-pass-chng.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu6 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="my_reviews.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu7 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="user_reviews.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu8 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="user-enquires.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu9 > a').addClass('active');	
		});
		</script>
<?	}
	if($livepage=="my-enquires.php") { ?>
		<script>
		$(document).ready(function () {
			$('ul > li.menu2 > a').removeClass('active');
			$('ul > li.menu10 > a').addClass('active');	
		});
		</script>
<?	}
?>
<aside class="col-lg-3 col-md-3">
                     <div class="box_style_cat">
                        <ul id="cat_nav" class="profile_menu">
                           <li class="menu1"><a href="<? echo $siteurl; ?>/dashboard" ><i class=" icon_set_1_icon-94"></i> Dashboard</a></li>
						   
                           <li class="menu2"><a href="<? echo $siteurl; ?>/profile" class="active"><i class=" icon_set_1_icon-29"></i> My Profile</a></li>
						   
						   <? if(($userinfo["lawyer_status"]==1) || ($userinfo["lawyer_status"]==2)) { ?>
						   <li class="menu3"><a href="<? echo $siteurl; ?>/license"><i class=" icon_set_1_icon-94"></i> Manage License</a></li>
						   <? } ?>						   
                           
						   <li class="menu4"><a href="<? echo $siteurl; ?>/profile-edit"><i class=" icon_set_1_icon-17"></i> Edit Profile</a></li>
												
						   <li class="menu5"><a href="<? echo $siteurl; ?>/profile-pic-chng"><i class=" icon_set_1_icon-34"></i> Change Profile Picture</a></li>
                          
						   <li class="menu6"><a href="<? echo $siteurl; ?>/profile-pass-chng"><i class=" icon_set_1_icon-46"></i> Change Password</a></li>
                           
						   <li class="menu7"><a href="<? echo $siteurl; ?>/my_reviews"><i class="icon_set_1_icon-85"></i> My Reviews </a></li>
                           
						   <? if($userinfo["user_role"]==1) { ?>
						   
						   <li class="menu8"><a href="<? echo $siteurl; ?>/user_reviews"><i class="icon_set_1_icon-85"></i> User Reviews </a></li>
						   <li class="menu9"><a href="<? echo $siteurl; ?>/user-enquires"><i class=" icon_set_1_icon-53"></i> User Enquires</a></li>
						    
							<? } ?>	
							
							<li class="menu10"><a href="<? echo $siteurl; ?>/my-enquires"><i class=" icon_set_1_icon-53"></i> My Enquires</a></li>
							
                        </ul>
                     </div>
                     
                     <!--End filters col-->
                  </aside>
                  <!--End aside -->