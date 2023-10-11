<?php
/**
 * Template for displaying search forms in RT Theme
 *
 * @package __RT
 * @subpackage RT_Theme
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Tìm kiếm:', 'label', 'rt' ); ?></span>
	</label>
	<form method="get" action="" id="findresult">
	        <h2><?php _e( 'City' ); ?></h2>       
	       <?php wp_dropdown_categories('show_option_none=Select City&name=city&child_of=2'); ?>
	       <h2><?php _e( 'Manufacturer' ); ?></h2>
	       <?php wp_dropdown_categories('show_option_none=Select Manufacturer&name=manufacturer&child_of=25');  ?>
	       <input type="submit" value="Search"/>
	    </form>

	    <?php 
	    if (($_GET['city'] != -1) && ($_GET['manufacturer'] != -1)):

	        $query = new WP_Query(array('category__and' => array($_GET['city'],$_GET['manufacturer'])));
	        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	            echo "<p>".the_title()."</p>";
	            echo "<p>".the_content()."</p>";
	        endwhile;endif;

	    endif;
	    ?>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'rt' ); ?></span></button>
</form>
