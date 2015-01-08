<?php get_header(); ?>  
<meta name="google-site-verification" content="d6PrrlNeFTUr7YMKVhZti6041seqdPH5_uuyjLhNGH8" />
<!-- end of header -->
<!-- <img src="<?php bloginfo('template_url'); ?>/images/radslide.gif"> -->
<div class="clear"></div>  
<div id="slide-wrapper">
    <div id="radslide-nav"></div>

<?php radslide(1); ?>
</div>    
  <div class="bottom-padder">
    <div class="bottom-box"><div class="bottom-box-padder drop-shadow">
      <h1 class="bottom-box-header">happenings</h1>
      <div class="bottom-box-content">
        <?php list_latest_news(1,2); ?>
        <?php $events = em_get_events( array('limit'=>2) ); print_r($events); ?>
      </div>
      <a href="/category/news" class="home-more-link" style="display:inline;">&raquo; More News</a> <a href="/events" class="home-more-link" style="left: 150px;">&raquo; More Events</a>
<!--       <a href="/category/events" class="home-more-link">&raquo; Upcoming Events</a> -->
    </div></div>
    <div class="bottom-box"><div class="bottom-box-padder drop-shadow">
      <a href="/category/spotlight"><h1 class="bottom-box-header">spotlight</h1></a>
      <div class="bottom-box-content"><?php get_spotlight(1); ?></div>
      <a href="/category/spotlight" class="home-more-link">&raquo; More Spotlights</a>
    </div></div>
    <div class="clear"></div>
    <div class="bottom-box"><div class="bottom-box-padder drop-shadow">
      <a href="/category/gallery"><h1 class="bottom-box-header">photo gallery</h1></a>
      <div class="bottom-box-content"><?php get_latest_gallery(1); ?></div>
      <a href="/category/gallery" class="home-more-link">&raquo; More Galleries</a>
    </div></div>
    <div class="bottom-box"><div class="bottom-box-padder drop-shadow">
      <a href="/category/other-ways-to-help"><h1 class="bottom-box-header">other ways to help</h1></a>
      <div class="bottom-box-content"><?php list_latest_news(6,3); ?></div>
      <a href="/category/other-ways-to-help" class="home-more-link">&raquo; More Ways</a>
    </div></div>
<div class="clear"></div>
  </div>
</div>

<?php get_footer(); ?>
