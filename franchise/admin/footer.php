 <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; <? echo date("Y"); ?> <a href="welcome.php" target="_blank" class="text-bold-800 grey darken-2"><?=$sitetitle;?> </a>, All Rights Reserved. </span></p>
    </footer>
     <script src="assets/js/scripts/tables/datatables/tables-datatables.js"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="assets/vendors/js/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="assets/js/core/app.js" type="text/javascript"></script>
	 <script src="assets/js/myjs.js" type="text/javascript"></script>
	
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="assets/js/scripts/tables/datatables-extensions/datatables-sources.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  <!--datepicker-->
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css"/>
<!--end-->
		<script src="../js/bootstrap-timepicker.js"></script>
		<script>
		   /* $('input.date-pick').datepicker({
			  defaultDate: false,
			  format: 'dd/mm/yyyy'
		  }); */
		   $('input.time-pick').timepicker({
			 minuteStep: 15,
			 showInpunts: false
		   })
		</script>		
<script>
function makesure(){
	return confirm("Are you sure to remove?");
}
</script>
  </body>
</html>