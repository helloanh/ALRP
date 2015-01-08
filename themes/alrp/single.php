<?php get_header(); ?>  

<!-- end of header -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="inner">
  <div id="inner-left">
    <div class="clear"></div>
    <div class="padder-20 drop-shadow">
      <h1 class="pagetitle"><?php the_title(); ?></h1>
      <br />
      <?php the_content(); ?>
      <div class="clear"></div>
    <div class="single-tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
    	<?php comments_template(); ?>
      <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
<?php if (!in_category( '10' ) ){ ?>
  		<div class="navigation">
				<div class="alignleft"><?php previous_post_link('&laquo; %link','%title',TRUE) ?></div>
				<div class="alignright"><?php next_post_link('%link &raquo;','%title',TRUE) ?></div>
				<div class="clear"><br /></div>
			</div>
<?php } else {
  echo 'See More ';
  the_category(', ');
  echo ' &raquo;';
}
?>
 
    </div>
  </div>
<?php get_sidebar(); ?>
<div class="clear"></div>


</div>
</div>
<?php get_footer(); ?>
