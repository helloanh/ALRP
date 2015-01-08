<?php get_header(); ?>  

<!-- end of header -->
<div id="inner">
  <div id="inner-left">
    <div <?php post_class('padder-20 drop-shadow'); ?>>
<?php if ( have_posts() ) : ?>
		<h1 class="pagetitle cat-title"><?php single_cat_title(); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>
<div class="single-post">
<?php		if (has_post_thumbnail()){
      echo '<div id="spotlight-img">
					 '.get_the_post_thumbnail($post->ID, array(150,150) ).'
					 </div>';
		}
?>
    <a href="<?php the_permalink(); ?>"><h2 class="post-list-title"><?php the_title(); ?></h2></a>
    <?php 
    if ( has_excerpt() ){ 
      the_excerpt();
      echo '<a href="'. get_permalink() .'" class="more-link">Read More &raquo;</a>';
    } else {
        the_content('Read More &raquo;'); 
    }?>
    <div class="clear"><br /></div>

    <div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
</div>    <!-- end .post -->
    <?php endwhile; else: ?>
    <h1>Page Not Found</h1>
			<p>You are looking for might have been deleted or moved. Please <a href="<?php bloginfo('siteurl'); ?>">visit our home page</a>, or try searching below: </p>
		<?php get_search_form(); ?>
			<p>Sorry for the inconvenience.</p>
    <?php endif; ?>

    <?php get_template_part( 'pagination' ) ?>     </div>
  </div>
<?php get_sidebar(); ?>
  
</div>
</div>
<?php get_footer(); ?>