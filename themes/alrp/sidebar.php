<div id="inner-bar">
	<div class="widgets">
	<?php 	if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : endif; ?>
	
	<a href="our-services/client-voices"><div class="widget quotescollection_widget drop-shadow" id="quotescollection">
    <h2 class="widgettitle">ALRP voices</h2>
    <?php quotescollection_quote('ajax_refresh=0&show_source=0'); ?>
  </div></a>
	

	</div>
</div>
