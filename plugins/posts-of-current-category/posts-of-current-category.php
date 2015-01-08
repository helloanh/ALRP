<?php
/*
Plugin Name: Posts of Current Category
Plugin URI: http://anupraj.com.np/index.php/display-posts-of-current-category-widget/68
Description: Lists (Show/Display title) Posts of Current Category and Order Posts by author,content,date,ID, .. etc  Sort ASC/DESC. Go to Appearance>Widgets and Drag "Posts of Current Category" widget to your Sidebar.
Version: 0.4
Author: Anup Raj
Author URI: http://anupraj.com.np/
*/

class posts_cur_cat extends WP_Widget {
	function posts_cur_cat() {
		$widget_ops = array('description' => __('Display Posts of current category and order it.', 'posts-of-cur-cat') );
		//Create widget
		$this->WP_Widget('postsofcurrentcategory', __('Posts of Current Category', 'posts-of-cur-cat'), $widget_ops);
	}

  function widget($args, $instance) {
	 		extract($args, EXTR_SKIP);
			
			$title = empty($instance['title']) ? __('', 'posts-of-cur-cat') : apply_filters('widget_title', $instance['title']);
			$parameters = array(
			  'title' => $title,
				'limit' => (int) $instance['show-num'],
				'excerpt' => (int) $instance['excerpt-length'],
				'AscDesc' => esc_attr($instance['AscDesc']),
				'OrderBy' => esc_attr($instance['OrderBy'])
				
			);
			echo $before_title;
			echo '<a href="';
			echo get_permalink($post->post_parent);
			echo '" tile="';
			if ( !empty( $title ) ) {
				echo $title;
				echo '">';
				echo $title;
			}else{
				if($post->post_parent) {
					$parent_title = get_the_title($post->post_parent);
					echo $parent_title;
					echo '">';
					echo $parent_title;
				} else {
					wp_title('');
					echo '">';
					wp_title('');
				}
			}
			echo '</a>';
			echo $after_title;
			
			echo $before_widget;
			if (is_page()){
			/*
				if($post->post_parent){
					$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&sort_column=menu_order"); 
				}else{
					$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&sort_column=menu_order");
				}
				if ($children && !$s) { 
					//echo '<ul>';
					echo $children; 
					//echo '</ul>';
				}
			*/
			}
			if(is_category()){//print recent posts
					post_of_curCat($parameters);
			}
			echo $after_widget;
			
  } //end of widget
	
	//Update widget options
  function update($new_instance, $old_instance) {

		$instance = $old_instance;
		//get old variables
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['show-num'] = (int) abs($new_instance['show-num']);
		
		$instance['OrderBy'] = esc_attr($new_instance['OrderBy']);
		$instance['AscDesc'] = esc_attr($new_instance['AscDesc']);
		
		return $instance;
  } //end of update
	
	//Widget options form
  function form($instance) {
		
		$instance = wp_parse_args(
		(array) $instance, 
		array(
			'title' => __('Posts of Current Category','posts-of-cur-cat'), 
			'show-num' => 10,
			'AscDesc' => "ASC",
			'OrderBy' => "ID"
			)
		);
		
		$title = esc_attr($instance['title']);
		$show_num = (int) $instance['show-num'];
		$AscDesc = esc_attr($instance['AscDesc']);
		$OrderBy = esc_attr($instance['OrderBy']);

		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /><br />
			<em>Leave this field blank, if you want to display Parent's Post's or Page's Title on widget heading</em>
		   </label>
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('show-num'); ?>"><?php _e('Number of posts to show:');?> 
		  <input id="<?php echo $this->get_field_id('show-num'); ?>" name="<?php echo $this->get_field_name('show-num'); ?>" type="text" value="<?php echo $show_num; ?>" size ="3" /><br />
			
		  </label>
	  </p>
		<p>
			<label for="<?php echo $this->get_field_id('OrderBy'); ?>"> <?php _e('Order By, Post\'s :  ', 'posts-of-cur-cat');?></label>
			<select class="select" id="<?php echo $this->get_field_id('OrderBy'); ?>" name="<?php echo $this->get_field_name('OrderBy'); ?>">
				<option value="author" <?php if($OrderBy=="author") echo "SELECTED"; ?>>author</option>
				<option value="category" <?php if($OrderBy=="category") echo "SELECTED"; ?>>category</option>
				<option value="content" <?php if($OrderBy=="content") echo "SELECTED"; ?>>content</option>
				<option value="date" <?php if($OrderBy=="date") echo "SELECTED"; ?>>date</option>
				<option value="ID" <?php if($OrderBy=="ID") echo "SELECTED"; ?>>ID</option>
				<option value="menu_order" <?php if($OrderBy=="menu_order") echo "SELECTED"; ?>>menu_order</option>
				<option value="mime_type" <?php if($OrderBy=="mime_type") echo "SELECTED"; ?>>mime_type</option>
				<option value="modified" <?php if($OrderBy=="modified") echo "SELECTED"; ?>>modified</option>
				<option value="name" <?php if($OrderBy=="name") echo "SELECTED"; ?>>name</option>
				<option value="parent" <?php if($OrderBy=="parent") echo "SELECTED"; ?>>parent</option>
				<option value="password" <?php if($OrderBy=="password") echo "SELECTED"; ?>>password</option>
				<option value="rand" <?php if($OrderBy=="rand") echo "SELECTED"; ?>>rand</option>
				<option value="status" <?php if($OrderBy=="status") echo "SELECTED"; ?>>status</option>
				<option value="title" <?php if($OrderBy=="title") echo "SELECTED"; ?>>title</option>
				<option value="type" <?php if($OrderBy=="type") echo "SELECTED"; ?>>type</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('AscDesc'); ?>"> <?php _e('Sort Order By : &nbsp; &nbsp; ', 'posts-of-cur-cat');?></label>
			<select class="select" id="<?php echo $this->get_field_id('AscDesc'); ?>" name="<?php echo $this->get_field_name('AscDesc'); ?>">
				<option value="ASC" <?php if($AscDesc=="ASC") echo "SELECTED"; ?>>ASCending</option>
				<option value="DESC" <?php if($AscDesc=="DESC") echo "SELECTED"; ?>>DESCending</option>
			</select>
		</p>
   <?php
  } //end of form
}

add_action( 'widgets_init', create_function('', 'return register_widget("posts_cur_cat");') );
//Register Widget

 // Show recent posts function
 function post_of_curCat($args = '') {
  global $wpdb;
	
	$defaults = array(
		'limit' => 10,
		'AscDesc' => "ASC", 
		'OrderBy' =>'ID',
		
	);
	$args = wp_parse_args( $args, $defaults );
	extract($args);
	
	$limit = (int) abs($limit);
		
	if(is_category()){
	 $curCategoryID = get_query_var('cat');
	}
	if (is_single()) {
	 $curCategoryID = '';
	 foreach (get_the_category() as $catt) {
	   $curCategoryID .= $catt->cat_ID.' '; 
	 }
	 $curCategoryID = str_replace(" ", ",", trim($curCategoryID));
	}
	if (!intval($curCategoryID)) $curCategoryID='';
	
	$query = "&category=$curCategoryID&showposts=$limit&orderby=$OrderBy&order=$AscDesc";
	$posts = get_posts($query); //get posts
	$postlist = '';	
    foreach ($posts as $post) {
		$post_title = htmlspecialchars(stripslashes($post->post_title));
		$postlist .= '<li><a href="' . get_permalink($post->ID) . '" title="'. $post_title .'" >' . $post_title . '</a> </li>';
    }
	
	echo '<ul class="posts-of-current-category">';		
		echo $postlist;
	echo '</ul>';
 }
?>