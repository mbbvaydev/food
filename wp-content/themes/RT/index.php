<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __RT
 * @subpackage RT_Theme
 * @since 1.0
 * @version 1.0
 */
global $rt_option;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
    	<?php do_action('rt_before_main'); ?>
		<!-- End Product -->
		<div class="news-home clear">
			<?php  
				$new = $rt_option['product_category']; 
		        $num_post = $rt_option['numberpost']; 
		    	$style_post = $rt_option['style_category'];
		        foreach($new as $news) :
		        if(!empty($news)) {
		        $news_post = $news['product_category_sub'];
		         // var_dump($style_post);
		    ?>
		    	<div class="list <?php echo $style_post; ?> clear">
		    		<h2 class="heading">
		    			<a href="<?php echo get_category_link($news_post); ?>">
			           		<?php echo get_cat_name($news_post); ?>
			           	</a>
			        </h2>
			        <div class="list-news">
			         <?php echo do_shortcode('[rtblog style="'.$style_post.'" posts_per_page="' . $num_post . '" categories="' . $news_post . '" custom_text="Xem Thêm"]'); ?>
		            </div>
		    	</div>
		    	<?php
		    		}
		            endforeach;
				?>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
