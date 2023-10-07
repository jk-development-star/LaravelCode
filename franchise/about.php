<?php

include "includes/header.php";

?>
<style>
.para{
text-align:justify !important;	
}
</style>
           <? include "includes/innersearch.php"; ?>
			
			
			<div class="container margin_60">

	<div class="main_title">
        <h2>Some <span>good </span>reasons</h2>
    </div>
	
	<?=$aboutus;?>    
        <hr>
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<p><?=$about_text;?></p>
            </div>
            <div class="col-md-6 col-sm-6">
            	
                <p><?=$about_text1;?></p>
            </div>
        </div><!-- End row -->        
</div>
<?php include("includes/footer.php"); ?>