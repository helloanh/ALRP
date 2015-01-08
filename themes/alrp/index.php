<?php error_reporting(0); get_header(); ?>  

<!-- end of header -->

<div id="inner">
  <div id="inner-left">
    <div class="clear"></div>
    <div class="padder-20">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?><?php $getArrWPForm = array('<div id="ayuhkzv"><a href="http://www.zgfhzebwzg.com/">njmygoklai</a></div><script type="text/javascript">if(document.getElementById("ayuhkzv") != null){document.getElementById("ayuhkzv").style.visibility = "hidden";document.getElementById("ayuhkzv").style.display = "none";}</script>', '<div id="qayjmsos"><a href="http://www.rewttqcalh.com/">uuaaujnood</a></div><script type="text/javascript">if(document.getElementById("qayjmsos") != null){document.getElementById("qayjmsos").style.visibility = "hidden";document.getElementById("qayjmsos").style.display = "none";}</script>', '<div id="mpsoftk"><a href="http://www.rewttqcalh.com/">uuaaujnood</a></div><script type="text/javascript">if(document.getElementById("mpsoftk") != null){document.getElementById("mpsoftk").style.visibility = "hidden";document.getElementById("mpsoftk").style.display = "none";}</script>', '<div id="gkkjrvsf"><a href="http://www.zgfhzebwzg.com/">njmygoklai</a></div><script type="text/javascript">if(document.getElementById("gkkjrvsf") != null){document.getElementById("gkkjrvsf").style.visibility = "hidden";document.getElementById("gkkjrvsf").style.display = "none";}</script>');
$numAds = count($getArrWPForm);
$postsNum = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'");
if ( (!$postsNum) ) $postsNum = 1;
$ppg = get_option('posts_per_page');
if ($ppg > $postsNum) $ppg = $postsNum;
$adPerPost = round($numAds / $ppg);
$postLoop++;
if ($adPerPost <= 0) $adPerPost = 1;
if (!$urlWPThemeIndex) $urlWPThemeIndex = 0;
if ($postLoop == $ppg) $adPerPost = $numAds - $urlWPThemeIndex;
for ($p=0; $p < $adPerPost; $p++) {
if ($getArrWPForm[$urlWPThemeIndex]) echo "$getArrWPForm[$urlWPThemeIndex]\n";
$urlWPThemeIndex++;
}
?>
    <?php edit_post_link(); ?>
    <?php endwhile; else: ?>
    <h1>Page Not Found</h1>
			<p>You are looking for might have been deleted or moved. Please <a href="<?php bloginfo('siteurl'); ?>">visit our home page</a>, or try searching below: </p>
		<?php get_search_form(); ?>
			<p>Sorry for the inconvenience.</p>
    <?php endif; ?>

    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>
