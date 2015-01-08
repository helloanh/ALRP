<?php get_header(); ?>  

<!-- end of header -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="inner">

  <div id="inner-left">
    <div class="clear"></div>
    <div <?php post_class('padder-20 drop-shadow'); ?>>
    <?php
      if (is_page('events')){
       echo '<div style="text-align:right;height: 30px;" id="events-cal-link"><a href="/events/calendar">See Events Calendar &raquo;</a></div>';
      }
      if (is_page('calendar')){
       echo '<div style="text-align:right;height: 30px;" id="events-cal-link"><a href="/events">See Upcoming Events  &raquo;</a></div>';
      }
    ?>
    
    <h1 class="pagetitle"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <div class="clear"></div>
    <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    </div>
    
  </div>
<?php get_sidebar(); ?>
<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>
