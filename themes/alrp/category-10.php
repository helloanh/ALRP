<?php get_header(); ?>  

<!-- end of header -->

<div id="inner">
  <div id="inner-left">
    <div <?php post_class('padder-20 drop-shadow'); ?>>
<?php $posts = query_posts( $query_string . '&orderby=date&order=desc' ); ?>
<?php if ( have_posts() ) :
?>
<?php if (is_category( '10' ) ){
echo '<p style="text-align:right;"><a href="'.get_page_link( 1563 ).'">Alpha Listing of Gallery Categories &raquo;</a></p>';
} ?>
 <?php echo category_description(); ?> 
		<h1 class="pagetitle cat-title"><?php single_cat_title(); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>
<div class="single-post-gal">
     
      <div class="gallery-img">
        <a href='<?php the_permalink(); ?>'> <?php
      $thumb = thumb_or_first_attachment($post->ID);
      ?><?php echo $thumb; ?></a>
      </div>
    <a href="<?php the_permalink(); ?>"><h2 class="post-list-title"><?php the_title(); ?></h2></a>
    <?php if ( has_excerpt() ){ 
      the_excerpt();
    } ?>
    <div class="clear"><br /></div>

    <div class="tags"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
</div>    <!-- end .post -->
    <?php endwhile; else: ?>
    <h1>Page Not Found</h1>
			<p>You are looking for might have been deleted or moved. Please <a href="<?php bloginfo('siteurl'); ?>">visit our home page</a>, or try searching below: </p>
		<?php get_search_form(); ?>
			<p>Sorry for the inconvenience.</p>
    <?php endif; ?>

    <?php  get_template_part( 'pagination' ) ?>     </div>
  </div>
<?php get_sidebar(); ?>
  
</div>
</div>
<?php get_footer(); ?>
