<?php
/*
Plugin Name: Prime Extensions For Visual Composer
Plugin URI: https://wordpress.org/plugins/prime-extensions-for-visual-composer/
Description: Add 40+ new elements to Visual Composer, includes: Draggable Timeline, Metro Carousel and Tile, Zooma or Magnify, Carousel & Gallery, Tabs, Accordion, Image Hotspot with Tooltip, Parallax, Medium Gallery, Stack Gallery, Testimonial Carousel, iHover, Scrolling Notification and Masonry Gallery etc.
Author: codecans
Version: 2.6.1
Author URI: http://codecans.com
License: GPL2
*/

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	/* Constants */
	define( 'PRIME_EXT_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
	define( 'PRIME_EXT_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
	if ( ! function_exists( 'prime_WordPressCheckup' ) ) {
		function prime_WordPressCheckup() {
			$version = '3.8';
			global $wp_version;
			if ( version_compare( $wp_version, $version, '>=' ) ) {
				return "true";
			} else {
				return "false";
			}
		}
	}

	// Admin Style CSS
	function prime_admin_enqeue() {
		wp_enqueue_style( 'primecom_admin_css', plugins_url( 'admin/css/admin.css', __FILE__ ) );
		wp_enqueue_style( 'primecom_adminicon_css', plugins_url( 'admin/css/admin_icon.css', __FILE__ ) );
		wp_enqueue_script( 'prime-hint-js', plugins_url( '/js/hints.js', __FILE__ ), array( 'jquery' ), '', true );
		wp_enqueue_script( 'prime-primesl-js', plugins_url( '/js/primesl.js', __FILE__ ), array( 'jquery' ), '', true );
	}

	add_action( 'admin_enqueue_scripts', 'prime_admin_enqeue' );

	// Enqueue Style CSS
	function prime_wpexqueue_script() {
		wp_enqueue_style( 'prime_master_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css', __FILE__ );
		wp_enqueue_style( 'prime_master_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', __FILE__ );
	}

	add_action( 'wp_enqueue_scripts', 'prime_wpexqueue_script' );

	//params
	require_once 'admin/params/index.php';

	// Shortcode
	require_once 'shortcodes/index.php';

	if ( ! class_exists( 'Prime_VC_Extensions' ) ) {
		class Prime_VC_Extensions {
			function Prime_VC_Extensions() {
				if ( ! function_exists( 'prime_vc_animatebox_func' ) ) {
					$prime_extension_animatebox = new Prime_Extension_AnimateBox();
				}
				if ( ! function_exists( 'prime_vc_iconanimation_func' ) ) {
					$prime_icon_animation = new Prime_Icon_Animation();
				}
				if ( ! function_exists( 'prime_vc_infobox_func' ) ) {
					$prime_infobox = new Prime_InfoBox();
				}
				if ( ! function_exists( 'prime_vc_flipbox_func' ) ) {
					$Prime_3d_flipbox = new Prime_3d_flipbox();
				}
				if ( ! function_exists( 'prime_vc_accordion_func' ) ) {
					$prime_accordion_fun = new Prime_Accordion_Fun();
				}
				if ( ! function_exists( 'prime_vc_model_func' ) ) {
					$prime_model_fun = new Prime_Model_fun();
				}
				if ( ! function_exists( 'prime_vc_testimonial_func' ) ) {
					$prime_testimonial_func = new Prime_Testimonial_Func();
				}
				if ( ! function_exists( 'prime_vc_tooltips_func' ) ) {
					$prime_tooltips_fun = new Prime_Tooltips_fun();
				}
				if ( ! function_exists( 'prime_vc_pricing_table_func' ) ) {
					$prime_pricing_table_fun = new Prime_Pricing_Table_fun();
				}
				if ( ! function_exists( 'prime_vc_beforeafter_func' ) ) {
					$prime_extension_beforeafter = new prime_extension_beforeafter();
				}
				if ( ! function_exists( 'prime_vc_contentblock_func' ) ) {
					$Prime_Extensions_contentBlock = new Prime_Extensions_contentBlock();
				}
				if ( ! function_exists( 'prime_vc_idealhover_func' ) ) {
					$Prime_IdealHover = new Prime_IdealHover();
				}
				if ( ! function_exists( 'prime_vc_pagetrans_func' ) ) {
					$Prime_PageTransaction = new Prime_PageTransaction();
				}
				if ( ! function_exists( 'prime_vc_primemodel_func' ) ) {
					$Prime_Extensions_PrimeModal = new Prime_Extensions_PrimeModal();
				}
				if ( ! function_exists( 'prime_vc_primetab_func' ) ) {
					$Prime_Extensions_TAB = new Prime_Extensions_TAB();
				}
				if ( ! function_exists( 'prime_vc_team_member_func' ) ) {
					$Prime_Team_Member = new Prime_Team_Member();
				}
				if ( ! function_exists( 'Prime_Image_Zoom' ) ) {
					$Prime_Image_Zoom = new Prime_Image_Zoom();
				}
				if ( ! function_exists( 'Prime_videoGallery' ) ) {
					$Prime_videoGallery = new Prime_videoGallery();
				}
				if ( ! function_exists( 'Prime_Box_Shadow' ) ) {
					$Prime_Box_Shadow = new Prime_Box_Shadow();
				}
				if ( ! function_exists( 'prime_extension_func' ) ) {
					$prime_extension_ihotspot = new prime_extension_ihotspot();
				}
				if ( ! function_exists( 'Prime_ProfileCard' ) ) {
					$Prime_ProfileCard = new Prime_ProfileCard();
				}
			}
		}

		function Prime_VC_Extensions_init() {
			if ( class_exists( 'Prime_VC_Extensions' ) ) {
				$prime_vc_extensions = new Prime_VC_Extensions();
			}
		}

		add_action( 'init', 'Prime_VC_Extensions_init' );
	}
} // Check If King Composer is activate
else {
	function prime_vc_required_plugin() {
		if ( is_admin() && current_user_can( 'activate_plugins' ) && ! is_plugin_active( 'js_composer/js_composer.php' ) ) {
			add_action( 'admin_notices', 'prime_vc_required_plugin_notice' );

			deactivate_plugins( plugin_basename( __FILE__ ) );

			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
		}

	}

	add_action( 'admin_init', 'prime_vc_required_plugin' );

	function prime_vc_required_plugin_notice() {
		?>
        <div class="error"><p>Error! you need to install or activate the <a href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=Rakibur_Rahman_Sagar">Visual
                    Composer</a> plugin to run "<span style="font-weight: bold;">Prime Extension Visual Composer</span>" plugin.</p></div><?php
	}
}
?>