<?php

if ( function_exists('register_sidebar') )
    register_sidebar(array(
      	'name' => 'Sidebar',    
        'before_widget' => '<div id="%1$s" class="widget %2$s drop-shadow">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
/*
if ( function_exists('register_sidebar') )
    register_sidebar(array(
      	'name' => 'Blog Sidebar',    
        'before_widget' => '<div id="%1$s" class="widget %2$s drop-shadow">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
*/

function get_page_content($id){
	$page = get_page($id);
	echo $page->post_content;
}

function display_menu($parent_id){
  global $post;
  //construct a list of posts to exclude
$args=array(
   //don't limit returned posts
  'numberposts' => -1
  );
$pages = get_posts($args);
  if ($pages) {
    $pageids = array();
    
    foreach ($pages as $page) {
      $pageids[]= $page->ID;
    }
  echo '<ul class="children">'. wp_list_pages('title_li=&echo=0&sort_column=menu_order&child_of='.$parent_id.'&exclude='.implode(",", $pageids)) . '</ul>';
  }
}

function get_spotlight($num){

	// Get array of post info.
	$cat_posts = get_posts('orderby=rand&numberposts='.$num.'&category=4');
	global $post;

	foreach($cat_posts as $post) {
		setup_postdata($post);
		$date = date("F j, Y",strtotime($post->post_date));

		echo '<h2 class="spot-title">
						  <a href="' . get_permalink($post) . '">'.$post->post_title.'</a>
						</h2>';
		if (has_post_thumbnail()){
      echo '<div id="spotlight-img">
					 '.get_the_post_thumbnail($post->ID, array(145,145) ).'
					 </div>';
		}
						
    echo '<p class="news-item-desc">';
  	if ($post->post_excerpt!=NULL) {
  		echo $post->post_excerpt;
  	 } else {
  		the_excerpt();
		  }
		echo '&nbsp;<a class="more-link-block" href="' . get_permalink($post) . '">Read more...</a>
		      </p>';
	}
}

function list_latest_news($cat_id,$num){

	// Get array of post info.
	$cat_posts = get_posts('numberposts='.$num.'&category='.$cat_id);
	echo '<div id="news-items">';
	global $post;

	foreach($cat_posts as $post) {
		setup_postdata($post);

		echo '<h2 class="news-item-title">
					  <a href="' . get_permalink($post) . '">&raquo; '.$post->post_title.'</a>
					</h2>
		   		<div class="news-item-desc">';
					if ($post->post_excerpt!=NULL) {
						echo $post->post_excerpt;
				  } else {
						the_excerpt();
 				  }
 				  //echo '<br>' . date('l, F j, g:ia', $post->post_date);
				echo '</div>';
	}
		echo '</div>';
}

function get_latest_gallery($num){

	// Get array of post info.
	$cat_posts = get_posts('orderby=date&numberposts='.$num.'&category=10');
	global $post;
  $html = '';

	foreach($cat_posts as $post) {
	  $html .= '<div>';

		setup_postdata($post);
		$date = date("F j, Y",strtotime($post->post_date));

		$html .= '<h2 class="gal-title">
						  <a href="' . get_permalink($post) . '">'.$post->post_title.'</a>
						  </h2>';
      
    $html .= '<a href="' . get_permalink($post) . '">
              <div id="spotlight-img">'.thumb_or_first_attachment($post->ID).'</div>
              </a>';
						
    $html .= '<p class="news-item-desc">';
    if ( has_excerpt() ){ 
      $html .= get_the_excerpt();
    }
		$html .= '</p>';
    $html .= '</div><div class="clear"><br /></div>';	

	}
	echo $html;
}

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 960, 405, true );
}

if ( !is_admin() ) {
function my_init_method() {
wp_deregister_script( 'l10n' );
}
add_action('init', 'my_init_method'); 
}


function is_subpage() {
	global $post;                                 // load details about this page
        if ( is_page() && $post->post_parent ) {      // test to see if the page has a parent
               return $post->post_parent;             // return the ID of the parent post
        } else {                                      // there is no parent so...
               return false;                          // ...the answer to the question is false
        }
}

function has_children($post_id) {
    $children = get_pages("child_of=$post_id");
    if( count( $children ) != 0 ) { return true; } // Has Children
    else { return false; } // No children
}

add_filter('mce_css', 'my_editor_style');
function my_editor_style($url) {

  if ( !empty($url) )
    $url .= ',';

  // Change the path here if using sub-directory
  $url .= trailingslashit( get_stylesheet_directory_uri() ) . 'wysiwyg_styles.css';

  return $url;
}


function custom_excerpt_length($length) {
    if (is_front_page()) {  //For the events page
        return 20;
    } else {
        return 55; //for all others pages
    }
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more) {
	return '...';
}

add_filter('excerpt_more', 'new_excerpt_more');


function thumb_or_first_attachment($post_id){
      $attachments = get_children(array(
        'post_parent' => $post_id,
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'orderby' => 'menu_order ASC, ID',
        'order' => 'DESC',
        'numberposts' => 1));
      if(count($attachments) == 1){
        $first_image = array_pop($attachments);
      }      
            
      if(has_post_thumbnail($post_id)){
        $thumb = get_the_post_thumbnail($post_id,'thumbnail');
      }
      else
      {
        $thumb = wp_get_attachment_image($first_image->ID, 'thumbnail');
      }
      
      return $thumb;
}

function child_force_category_template($template) {

    $cat = get_query_var('cat');
    $category = get_category ($cat);

    if ( file_exists(TEMPLATEPATH . '/category-' . $category->cat_ID . '.php') ) {
        $cat_template = TEMPLATEPATH . '/category-' . $category ->cat_ID . '.php';
    }
    elseif ( file_exists(TEMPLATEPATH . '/category-' . $category->category_parent . '.php') ) {
        $cat_template = TEMPLATEPATH . '/category-' . $category->category_parent . '.php';
    }
    else{
        $cat_template = $template;
    }

  return $cat_template;
}
add_action('category_template', 'child_force_category_template');