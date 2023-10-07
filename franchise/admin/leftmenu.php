<?
//After allocated the menu's user can login possible
$GetMainMenuData=$db->singlerec("select main_menu_id from gen_sub_menu_mst where emp_id='$Adminusrtype_id'");
$Main_Menu_Id = $GetMainMenuData['main_menu_id'];
if($Main_Menu_Id == 0 && $_SESSION['Adminusrtype_id'] == ''){ 
header("location:logout.php");
exit ;
}
if($_SESSION['Adminusrtype_id'] == $Adminusrtype)
	$FilterAdminQry = "where active_status='1'";
else
	$FilterAdminQry="where main_menu_id in($Main_Menu_Id)";

$livepage = $_SERVER["PHP_SELF"];
$livepage=basename($livepage);
$pageqry=$db->Extract_Single("select main_menu_id from sub_menu_mst where sub_menu='".$livepage."';");
$main_menu_List = "";	
$GetMenuRec=$db->get_all("select * from main_menu_mst $FilterAdminQry order by orderby asc");
for($mm=0;$mm<count($GetMenuRec);$mm++){
    $mm_id = $GetMenuRec[$mm]['main_menu_id'] ;
	$GetSubMenuData=$db->get_all("select sub_menu,disp_sub_menu from sub_menu_mst where active_status='1' and main_menu_id='$mm_id' order by orderby asc"); 
	$CountMaxVal = count($GetSubMenuData);
	$Count_Max_Val = $CountMaxVal;
	$mainmenunames = (stripslashes($GetMenuRec[$mm]['main_menu']));
	$icon = (stripslashes($GetMenuRec[$mm]['main_menu_icon']));
	$main_menu_names = UCwords($mainmenunames);
	$main_menu_img = $GetMenuRec[$mm]['main_menu_img'];
	if($CountMaxVal == 0)
		$main_menu_List .= "<li class='open'><a href='#'><i class='$icon'></i><span data-i18n='' class='menu-title'>$main_menu_names</span></a>";
	else	
	    if($mm_id == $pageqry )
		{
		$main_menu_List .= "<li class='open'><a href='javascript:void(0)'><i class='$icon'></i><span data-i18n='' class='menu-title'>$main_menu_names</span></i></a>";	
		}
		else
		{
		$main_menu_List .= "<li ><a href='javascript:void(0)'><i class='$icon'></i><span data-i18n='' class='menu-title'>$main_menu_names</span></i></a>";
        }
 	if($CountMaxVal != 0){
		$sbm_List = "<ul class='menu-content'>";
		for($sbm=0;$sbm<$CountMaxVal;$sbm++){
			$Sub_Menus = stripslashes($GetSubMenuData[$sbm]['sub_menu']);
			$disp_sub_menu = stripslashes($GetSubMenuData[$sbm]['disp_sub_menu']);
			$Sub_Menus1 = ucwords($disp_sub_menu);
			if($livepage== $Sub_Menus)
			{
 			$sbm_List .= "<li class='active'><a href='$SetUrl$Sub_Menus' class='menu-item'>$Sub_Menus1</a></li>"; 
			}
			else{
		   $sbm_List .= "<li ><a href='$SetUrl$Sub_Menus' class='menu-item'>$Sub_Menus1</a></li>"; 
			}
		if($sbm == (($CountMaxVal-1)))
			$sbm_List .="</ul>"; 	
		}
		$main_menu_List .= $sbm_List; 
	} 
	$main_menu_List .= "</li><li>";
 }
?> 

 <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" navigation-header"><span>General</span>
          </li>
          <li class=" nav-item active"><a href="welcome.php"><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
          </li>
		  <? echo $main_menu_List; ?>
        </ul>
      </div>
    </div>
	<div class="clearfix"></div>