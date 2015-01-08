<!-- list of gallery categories -->
<?php get_header(); ?>  

<!-- end of header -->

<div id="inner">
  <div id="inner-left">
    <div <?php post_class('padder-20 drop-shadow'); ?>>
    <h1 class="pagetitle"><?php the_title(); ?></h1>
<?php
//for each category, show 5 posts
$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'exclude' => array(10,1,6,4)
  
   );
$categories=get_categories($cat_args);
  foreach($categories as $category) { 
    $args=array(
      'category__in' => array($category->term_id),
      'caller_get_posts'=>1
    );
    $posts=get_posts($args);
      if ($posts) {
        echo '<div class="single-post-gal">';     
        echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '><h2 class="post-list-title">' . $category->name.'</h2></a> </p> ';
        echo '<p>' . $category->description.'</p> ';
        echo '</div>';
      } // if ($posts
    } // foreach($categories
?>

    <?php  get_template_part( 'pagination' ) ?>     </div>
  </div>
<?php get_sidebar(); ?>
  
</div>
</div>
<?php get_footer(); ?>
