<?php

	include "includes/header.php";
	include "includes/innersearch.php";		
?>
<style>
.para{
text-align:justify !important;	
}
</style>
      
			<div class="container margin_60">

	<div class="main_title">
        <h2>Some <span>good </span>reasons</h2>
    </div>
	
	<?=$services;?>    
        <hr>
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<p><?=$services_text1;?></p>
            </div>
            <div class="col-md-6 col-sm-6">
            	
                <p><?=$services_text2;?></p>
            </div>
        </div><!-- End row -->        
</div>
<?php include("includes/footer.php"); ?>