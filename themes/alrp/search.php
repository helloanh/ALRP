<?php get_header(); ?>  

<!-- end of header -->

<div id="inner">
    <div class="padder-20" style="width:900px;padding:20px;">
<h1>Search Results</h1>
<?php get_search_form(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="post">
      <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="read-more">Read More &raquo;</a>
  </div>    
<?php endwhile; else: ?>
	<p>No Posts found.</p>
<?php endif; ?>
 <?php get_template_part( 'pagination' ) ?> 
    </div>

</div></div>
<?php get_footer(); ?>
