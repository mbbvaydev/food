<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
//include('validator.php');
/*function license_footer () {
if(BXmlMh_license_valid()){
echo '<div class="footer">Powered by <a href="#">Wordpress.ORG</a><div';
	}
}
add_action('wp_footer', 'license_footer');*/
class CountdownRocket {
	protected static $instance = null;
	protected $plugin_settings_screen_hook_suffix = null;
	private function __construct() {
		//if(BzoYyI_license_valid()) {
		add_action( 'admin_menu', array( $this, 'crr_add_plugin_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'crr_enqueue_admin_stylesscripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'crr_enqueue_stylesscripts' ) );
		//add_action( 'wp_head', array( $this, 'gvp_global_config_script' ) );
		add_action( 'init', array( $this, 'add_crr_customposttype' ) );
		//$plugin_basename = plugin_basename( plugin_dir_path( __FILE__ ) . 'flowplayer.php' );
		//add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'crr_add_action_links' ) );
		add_filter( 'post_updated_messages', array( $this, 'set_messages' ) );
		add_action( 'admin_init', array( $this, 'crr_register_mysettingss' )  );
		add_filter( 'manage_edit-crr_columns', array( $this, 'my_edit_crr_columns' ) ) ;
		add_action( 'manage_crr_posts_custom_column', array( $this, 'my_manage_crr_columns' ), 10, 2 );
		//}
  }
	public static function crr_get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	public function crr_enqueue_admin_stylesscripts() {
		$current_screen = get_current_screen();
		
		if ( $current_screen->post_type === 'crr' ) {
			wp_register_style('jquery-customcrrui-style', plugins_url( '/js/jquery-ui-1.10.3.custom.css', __FILE__ ), array(), '1', 'screen'); 
			wp_enqueue_style('jquery-customcrrui-style');	
			wp_enqueue_script(
				'custom-crruiaccordion1',
				plugins_url( '/js/jquery-ui-1.10.3.custom.js', __FILE__ ),
				array('jquery')
				);
			wp_enqueue_script(
				'custom-crraccordion',
				plugins_url( '/js/crraccordion.js', __FILE__ ),
				array('jquery')
				);
			wp_enqueue_style( 'cr-admin-styles1', plugins_url( '/css/font-awesome.css', __FILE__ ));
			wp_enqueue_style( 'cr-admin-styles2', plugins_url( '/css/crr-admin.css', __FILE__ ));
			wp_enqueue_style( 'cr-admin-styles3', plugins_url( '/css/crr-admin-orange.css', __FILE__ ));
			wp_enqueue_script('jquery');
			wp_enqueue_script('gvpcolorjs', plugins_url( '/jscolor/jscolor.js', __FILE__ ));
			wp_enqueue_script('crrduplicatejs', plugins_url( '/js/crrduplicatejs.js', __FILE__ ));
			
			wp_enqueue_media();
				wp_enqueue_script( 'crr-media', plugins_url( '/js/media.js', __FILE__ ), array(), true, false );
				wp_localize_script( 'crr-media', 'countdownimage',
					array(
						'title'  => __( 'Upload or choose image', 'crr' ), 
						'button' => __( 'Insert Image', 'crr' )              
					)
				);
				if ( $wp_version >= 3.5 ) {
				wp_enqueue_media();
				}
				wp_enqueue_style( 'craff-admin-style', plugins_url( '/css/affadmin.css', __FILE__ ));
		}
	}
	
	public function crr_enqueue_stylesscripts() {
		//global $post;
		
/*		if( function_exists( 'has_shortcode' ) ) {
			
			if( has_shortcode( $post->post_content, 'gridvideoplayer' ) ) {
			*/	
					/*wp_enqueue_style( 'gvp-skins', plugins_url( '/flowplayer/skin/all-skins.css', __FILE__ ));
				
				wp_enqueue_style( 'gvp-publiccsss', plugins_url( '/css/public.css', __FILE__ ));*/
			/*}
		}*/
		wp_enqueue_script('jquery');
		
		wp_enqueue_style( 'cr-bootstrap-styles', plugins_url( '/css/bootstrap.css', __FILE__ ));
		$crrset_affiliatelinkurl2 = get_option('crrset_affiliatelinkurl');
		$crrset_enablebarposition2 = get_option('crrset_enablebarposition');
		$crrset_posttopbottombar2 = get_option('crrset_posttopbottombar');
		$crrset_pagetopbottombar2 = get_option('crrset_pagetopbottombar');
		for ($z=0; $z<count($crrset_pagetopbottombar2); $z++)
		{
			if($crrset_affiliatelinkurl2[$z] != '' && $crrset_enablebarposition2[$z] == 'true')
			{
				global $post;
					if ($post->post_type == 'post') {
						if($crrset_posttopbottombar2[$z] != ''){
							if($post->ID == $crrset_posttopbottombar2[$z]){
								wp_enqueue_style( 'cr-stylebar', plugins_url( '/css/crrstylebaraffliatelink.css', __FILE__ ));
								wp_enqueue_script('crrsaffilatelink', plugins_url( '/js/crraffilatelink.js', __FILE__ ));
							}
						}
					}
					
					if ($post->post_type == 'page') {
						if($crrset_pagetopbottombar2[$z] != ''){
							if($post->ID == $crrset_pagetopbottombar2[$z]){
								wp_enqueue_style( 'cr-stylebar', plugins_url( '/css/crrstylebaraffliatelink.css', __FILE__ ));
								wp_enqueue_script('crrsaffilatelink', plugins_url( '/js/crraffilatelink.js', __FILE__ ));
							}
						}
					}
					/*if(get_option('crrset_topbottomhomepage') != ''){
							if ( is_front_page() || is_home() ) {
								wp_enqueue_style( 'cr-stylebar', plugins_url( '/css/crrstylebaraffliatelink.css', __FILE__ ));
								wp_enqueue_script('crrsaffilatelink', plugins_url( '/js/crraffilatelink.js', __FILE__ ));
							}
						}*/
			}
			else
			{
				wp_enqueue_style( 'cr-stylebar', plugins_url( '/css/crrstylebar.css', __FILE__ ));
			}
		}
		wp_enqueue_script('crrtopbotbar', plugins_url( '/js/crrtopbotbar.js', __FILE__ ));
		
	}

/*	public function gvp_global_config_script() {
    gvp_global_config_script_helper();
  } */
	public function crr_add_plugin_admin_menu() {
		$this->plugin_settings_screen_hook_suffix = add_submenu_page(
			'edit.php?post_type=crr',
			__( 'Countdown Rocket Options', 'crr' ),
			__( 'Affiliate Countdown', 'crr' ),
			'manage_options',
			'crr_settings',
			array( $this, 'crr_display_plugin_admin_page' )
		);
	}
	public function gvp_activate_plugin_admin_menu() {
      //add_menu_page('Member Player Plugin', 'Member Player', 'administrator', 'gvp', 'mplayer_not_authorized');
	}
	public function crr_register_mysettingss() {
	
		//register our settings
		register_setting( 'crrsetgen-settings-group', 'crrset_titleiden' );
		register_setting( 'crrsetgen-settings-group', 'crrset_enablebarposition' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barposition' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barwidth' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barbackgroundcolor' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barbackgroundbottomcolor' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barborderwidth' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barborderstyle' );
		register_setting( 'crrsetgen-settings-group', 'crrset_barbordercolor' );
		register_setting( 'crrsetgen-settings-group', 'crrset_baroptin' );
		register_setting( 'crrsetgen-settings-group', 'crrset_disablesticky' );
		register_setting( 'crrsetgen-settings-group', 'crrset_showclosebutton' );
		register_setting( 'crrsetgen-settings-group', 'crrset_makebgtransparent' );
		register_setting( 'crrsetgen-settings-group', 'crrset_posttopbottombar' );
		register_setting( 'crrsetgen-settings-group', 'crrset_contentbeforecountdown' );
		register_setting( 'crrsetgen-settings-group', 'crrset_contentaftercountdown' );
		
		register_setting( 'crrsetgen-settings-group', 'crrset_contentfontfamily' );
		register_setting( 'crrsetgen-settings-group', 'crrset_contentfontsize' );
		register_setting( 'crrsetgen-settings-group', 'crrset_contentfontcolor' );
		register_setting( 'crrsetgen-settings-group', 'crrset_contentcountdownwidth' );
		register_setting( 'crrsetgen-settings-group', 'crrset_affiliatelinkurl' );
		
		register_setting( 'crrsetgen-settings-group', 'crrset_posttopbottombarcheckall' );
		register_setting( 'crrsetgen-settings-group', 'crrset_pagetopbottombar' );
		register_setting( 'crrsetgen-settings-group', 'crrset_pagetopbottombarcheckall' );
		register_setting( 'crrsetgen-settings-group', 'crrset_topbottomhomepage' );
		
	}
	public function crr_display_plugin_admin_page() { ?>
		<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php settings_errors(); ?>
	<form method="post" action="options.php">
		<?php
		// This prints out all hidden setting fields
		settings_fields( 'crrsetgen-settings-group' ); 
		$crrset_titleiden1 = get_option('crrset_titleiden');
		$crrset_pagetopbottombar1 = get_option('crrset_pagetopbottombar');
		$crrset_enablebarposition1 = get_option('crrset_enablebarposition');
		$crrset_barposition1 = get_option('crrset_barposition');
		$crrset_barwidth1 = get_option('crrset_barwidth');
		$crrset_barbackgroundcolor1 = get_option('crrset_barbackgroundcolor');
		$crrset_barbackgroundbottomcolor1 = get_option('crrset_barbackgroundbottomcolor');
		$crrset_barborderwidth1 = get_option('crrset_barborderwidth');
		$crrset_barborderstyle1 = get_option('crrset_barborderstyle');
		$crrset_barbordercolor1 = get_option('crrset_barbordercolor');
		$crrset_baroptin1 = get_option('crrset_baroptin');
		$crrset_disablesticky1 = get_option('crrset_disablesticky');
		$crrset_showclosebutton1 = get_option('crrset_showclosebutton');
		
		$crrset_makebgtransparent1 = get_option('crrset_makebgtransparent');
		$crrset_posttopbottombar1 = get_option('crrset_posttopbottombar');
		$crrset_contentbeforecountdown1 = get_option('crrset_contentbeforecountdown');
		$crrset_contentaftercountdown1 = get_option('crrset_contentaftercountdown');
		$crrset_contentfontfamily1 = get_option('crrset_contentfontfamily');
		$crrset_contentfontsize1 = get_option('crrset_contentfontsize');
		$crrset_contentfontcolor1 = get_option('crrset_contentfontcolor');
		$crrset_contentcountdownwidth1 = get_option('crrset_contentcountdownwidth');
		$crrset_affiliatelinkurl1 = get_option('crrset_affiliatelinkurl');
		$crrset_pagetopbottombar1 = get_option('crrset_pagetopbottombar');		
		?>
         <br />
    <h1> Header / Footer Bar Options </h1>
	<p> You can show countdown at very top and very bottom of page using these options. </p>
    <br />
    
    <div id="crraffaccordion">
        <?php if ($crrset_pagetopbottombar1 == '') { ?>
        <div class="group">
        <h3 class="collheading">Affiliate Countdown<input id="btnDelscrrs" class="btnDelscrr" type="button" value="Remove"></h3>
        
        <div class="colcontent">
	 <table class="form-table"> 
     <tr valign="top" style="border:2px solid #888888;">
        <th style="padding-left:10px;" scope="row"><b>Title</b></th>

        <td colspan="3"><input id="crrset_titleiden" name="crrset_titleiden[]" type="text" style="width: 95%" value="<?php echo get_option('crrset_titleiden'); ?>"
                   size="50" class="code class1"><br><small>For Identification. It will show on collapsible panel also.</small></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><h3></h3></th>

        <td colspan="3"><input type="checkbox" value="true" name="crrset_enablebarposition[]" id="crrset_enablebarposition" class="class2" <?php if(get_option('crrset_enablebarposition') == 'true') { echo 'checked="checked"'; }?>> <b>Enable bar options</b></td>
        

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Bar Position</b></th>

        <td><select name="crrset_barposition[]" id="crrset_barposition" style="width:250px;" class="class3">
                <option value="bottom" <?php if(get_option('crrset_barposition') == 'bottom') { echo 'selected="selected"'; }?>>Footer</option>
                <option value="top" <?php if(get_option('crrset_barposition') == 'top') { echo 'selected="selected"'; }?>>Header</option>       
            </select></td>
        
        <th style="padding-left:10px;" scope="row"><b>Bar Width (%)</b></th>

        <td><input id="crrset_barwidth" name="crrset_barwidth[]" type="text" style="width: 95%" value="<?php if(get_option('crrset_barwidth') == '') {echo '100';} else { echo get_option('crrset_barwidth'); } ?>"
                   size="50" class="code class4"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Bar Background Top Color</b></th>

        <td><input id="crrset_barbackgroundcolor" name="crrset_barbackgroundcolor[]" type="text" style="width: 250px;" value="<?php if(get_option('crrset_barbackgroundcolor') == '') { echo '191919'; } else { echo get_option('crrset_barbackgroundcolor'); } ?>"
                   size="50" class="color class5"></td>
        
        <th style="padding-left:10px;" scope="row"><b>Bar Background Bottom Color</b></th>

        <td><input id="crrset_barbackgroundbottomcolor" name="crrset_barbackgroundbottomcolor[]" type="text" style="width: 250px;" value="<?php if(get_option('crrset_barbackgroundbottomcolor') == '') { echo '191919'; } else { echo get_option('crrset_barbackgroundbottomcolor'); } ?>"
                   size="50" class="color class6"></td>

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Background Opacity</b></th>

        <td><input id="crrset_makebgtransparent" name="crrset_makebgtransparent[]" type="text" style="width: 95%" value="<?php if(get_option('crrset_makebgtransparent') == '') { echo "1"; } else { echo get_option('crrset_makebgtransparent'); } ?>" size="50" class="code class7"></td>
        
        <th style="padding-left:10px;" scope="row"><b>Border Width (px)</b></th>

        <td><input id="crrset_barborderwidth" name="crrset_barborderwidth[]" type="text" style="width: 95%" value="<?php echo get_option('crrset_barborderwidth'); ?>"
                   size="50" class="code class8"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Border Style</b></th>

        <td>
        <select name="crrset_barborderstyle[]" id="crrset_barborderstyle" style="width:250px;" class="class9">
                <option value="none" <?php if(get_option('crrset_barborderstyle') == 'none') { echo 'selected="selected"'; }?>>None</option>
                <option value="dotted" <?php if (get_option('crrset_barborderstyle') == 'dotted') { echo 'selected="selected"'; } ?>>Dotted</option>
                <option value="dashed" <?php if (get_option('crrset_barborderstyle') == 'dashed') { echo 'selected="selected"'; } ?>>Dashed</option>
                <option value="solid" <?php if (get_option('crrset_barborderstyle') == 'solid' || get_option('crrset_barborderstyle') == '') { echo 'selected="selected"'; } ?>>Solid</option>
                <option value="double" <?php if (get_option('crrset_barborderstyle') == 'double') { echo 'selected="selected"'; } ?>>Double</option>
                <option value="groove" <?php if (get_option('crrset_barborderstyle') == 'groove') { echo 'selected="selected"'; } ?>>Groove</option>
                <option value="ridge" <?php if (get_option('crrset_barborderstyle') == 'ridge') { echo 'selected="selected"'; } ?>>Ridge</option>
        </select>
        </td>
        
        <th style="padding-left:10px;" scope="row"><b>Border Color</b></th>

        <td><input id="crrset_barbordercolor" name="crrset_barbordercolor[]" type="text" style="width: 250px;" value="<?php if(get_option('crrset_barbordercolor') == '') { echo '000000'; } else { echo get_option('crrset_barbordercolor'); } ?>" size="50" class="color class10"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><h3></h3></th>

        <td colspan="2"><input type="checkbox" value="true" name="crrset_disablesticky[]" id="crrset_disablesticky" class="class11" <?php if(get_option('crrset_disablesticky') == 'true') { echo 'checked="checked"'; }?>> Disable Sticky (if you check this, bar will not move when page scroll)</td>
        
        <td><input type="checkbox" value="true" name="crrset_showclosebutton[]" id="crrset_showclosebutton" class="class12" <?php if(get_option('crrset_showclosebutton') == 'true') { echo 'checked="checked"'; }?>> Show close button</td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Select countdown to display (Use small countdowns)</b></th>

        <td>       
        <select name="crrset_baroptin[]" id="crrset_baroptin" style="width:250px;" class="class13">
                <?php
				global $wpdb;
$args = array( 'post_type' => 'crr', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<option value="<?php echo get_the_ID();?>" <?php if(get_the_ID() == get_option('crrset_baroptin')) { echo 'selected="selected"'; }?>><?php echo get_the_title();?></option>
<?php endwhile;	?>		
				</select>
    			</td>
                <th style="padding-left:10px;" scope="row"><b>Content Area Width (%)</b></th>

        <td><input id="crrset_contentcountdownwidth" name="crrset_contentcountdownwidth[]" type="text" style="width: 95%" value="<?php if(get_option('crrset_contentcountdownwidth') == '') { echo '45'; } else { echo get_option('crrset_contentcountdownwidth'); } ?>"
                   size="50" class="code class14"></td>
                
        

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Before Countdown</b></th>

        <td>       
        <textarea name="crrset_contentbeforecountdown[]" id= "crrset_contentbeforecountdown" cols="30" rows="5" class="class15"><?php echo get_option('crrset_contentbeforecountdown'); ?></textarea>
    			</td>
        <th style="padding-left:10px;" scope="row"><b>Content After Countdown</b></th>

        <td>       
        <textarea name="crrset_contentaftercountdown[]" id= "crrset_contentaftercountdown" cols="30" rows="5" class="class16"><?php echo get_option('crrset_contentaftercountdown'); ?></textarea>
    			</td>
        

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Font Family</b></th>

        <td>       
        <select name="crrset_contentfontfamily[]" id="crrset_contentfontfamily" style="width:250px;" class="class17">
                <option value="Arial, Helvetica, sans-serif" <?php if(get_option('crrset_contentfontfamily') == 'Arial, Helvetica, sans-serif') { echo 'selected="selected"'; }?>>Arial, Helvetica, sans-serif</option>
                <option value="Arial Black, Gadget, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Arial Black, Gadget, sans-serif') { echo 'selected="selected"'; } ?>>Arial Black, Gadget, sans-serif</option>
                <option value="Comic Sans MS, cursive, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Comic Sans MS, cursive, sans-serif') { echo 'selected="selected"'; } ?>>Comic Sans MS, cursive, sans-serif</option>
                <option value="Impact, Charcoal, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Impact, Charcoal, sans-serif' || get_option('crrset_barborderstyle') == '') { echo 'selected="selected"'; } ?>>Impact, Charcoal, sans-serif</option>
                <option value="Lucida Sans Unicode, Lucida Grande, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Lucida Sans Unicode, Lucida Grande, sans-serif') { echo 'selected="selected"'; } ?>>Lucida Sans Unicode, Lucida Grande, sans-serif</option>
                <option value="Tahoma, Geneva, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Tahoma, Geneva, sans-serif') { echo 'selected="selected"'; } ?>>Tahoma, Geneva, sans-serif</option>
                <option value="Trebuchet MS, Helvetica, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Trebuchet MS, Helvetica, sans-serif') { echo 'selected="selected"'; } ?>>Trebuchet MS, Helvetica, sans-serif</option>
                <option value="Verdana, Geneva, sans-serif" <?php if (get_option('crrset_contentfontfamily') == 'Verdana, Geneva, sans-serif') { echo 'selected="selected"'; } ?>>Verdana, Geneva, sans-serif</option>
                <option value="Georgia, serif" <?php if (get_option('crrset_contentfontfamily') == 'Georgia, serif') { echo 'selected="selected"'; } ?>>Georgia, serif</option>
                <option value="Palatino Linotype, Book Antiqua, Palatino, serif" <?php if (get_option('crrset_contentfontfamily') == 'Palatino Linotype, Book Antiqua, Palatino, serif') { echo 'selected="selected"'; } ?>>Palatino Linotype, Book Antiqua, Palatino, serif</option>
                <option value="Times New Roman, Times, serif" <?php if (get_option('crrset_contentfontfamily') == 'Times New Roman, Times, serif') { echo 'selected="selected"'; } ?>>Times New Roman, Times, serif</option>
                <option value="Courier New, Courier, monospace" <?php if (get_option('crrset_contentfontfamily') == 'Courier New, Courier, monospace') { echo 'selected="selected"'; } ?>>Courier New, Courier, monospace</option>
                <option value="Lucida Console, Monaco, monospace" <?php if (get_option('crrset_contentfontfamily') == 'Lucida Console, Monaco, monospace') { echo 'selected="selected"'; } ?>>Lucida Console, Monaco, monospace</option>
        </select>
    			</td>
        <th style="padding-left:10px;" scope="row"><b>Content Font Size</b></th>
	<td><input id="crrset_contentfontsize" name="crrset_contentfontsize[]" type="text" style="width: 95%" value="<?php if(get_option('crrset_contentfontsize') == '') { echo '34'; } else { echo get_option('crrset_contentfontsize'); } ?>"
                   size="50" class="code class18"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Font Color</b></th>
        <td>       
        <input id="crrset_contentfontcolor" name="crrset_contentfontcolor[]" type="text" style="width: 250px;" value="<?php if(get_option('crrset_contentfontcolor') == '') { echo 'FFFFFF'; } else { echo get_option('crrset_contentfontcolor'); } ?>" size="50" class="color class19"></td>
        <th style="padding-left:10px;" scope="row"><b>Affiliate Link URL</b></th>
        <td><input id="crrset_affiliatelinkurl" name="crrset_affiliatelinkurl[]" type="text" style="width: 95%" value="<?php echo get_option('crrset_affiliatelinkurl'); ?>" size="50" class="code class20"> <small>Full URL like "http://www.cnn.com" where you want to show countdown bar.</small></td>
        
        </tr>
        
        <tr valign="top" style="border:2px solid #888888;" id="posttopbottombarjscrr">

        <th style="padding-left:10px;" scope="row"><h3>Select posts to show Header / Footer Bar</h3></th>

        <td colspan="3"><select name="crrset_posttopbottombar[]" id="crrset_posttopbottombar" class="class21">
        <option value="0">Select Post</option>
<?php query_posts('post_status=publish&posts_per_page=-1&post_type=post'); ?>
<?php //echo $value['name']; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php $inp_idtb = get_the_ID(); ?>
<?php if(get_option('crrset_posttopbottombar') != '') { if(in_array($inp_idtb,(array)get_option('crrset_posttopbottombar')) || get_option('crrset_posttopbottombar') == 'true'){ $checkedtb = "selected=\"selected\""; }else{ $checkedtb = ""; } }?>
<option value="<?php echo $inp_idtb; ?>" ><?php the_title(); ?></option>
<?php
  endwhile;?>
  </select>
  </td>

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;" id="pagetopbottombarjscrr">

        <th style="padding-left:10px;" scope="row"><h3>Select page to show Header / Footer Bar</h3></th>

        <td colspan="3"><select name="crrset_pagetopbottombar[]" id="crrset_pagetopbottombar" class="class22">
<?php query_posts('post_status=publish&posts_per_page=-1&post_type=page'); ?>
<?php //echo $value['name']; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php $inp_idtb2 = get_the_ID(); ?>
<?php if(get_option('crrset_pagetopbottombar') != '') { if(in_array($inp_idtb2,(array)get_option('crrset_pagetopbottombar')) || get_option('crrset_pagetopbottombar') == 'true'){ $checkedtb2 = "checked=\"checked\""; }else{ $checkedtb2 = ""; } }?>
<option value="<?php echo $inp_idtb2; ?>" ><?php the_title(); ?></option>
<?php  endwhile; ?>
</select>
</td>
        </tr>
    </table>
    </div>
        </div>
        <?php } else { 
			for ($x=0; $x<count($crrset_pagetopbottombar1); $x++)
  {?>
  <div class="group">
        <h3 class="collheading"><?php if($crrset_titleiden1[$x] == '') { echo 'Affiliate Countdown'; } else { echo $crrset_titleiden1[$x]; } ?><input id="btnDelscrrs" class="btnDelscrr" type="button" value="Remove"></h3>
        <div class="colcontent">
	 <table class="form-table"> 
     <tr valign="top" style="border:2px solid #888888;">
        <th style="padding-left:10px;" scope="row"><b>Title</b></th>

        <td colspan="3"><input id="crrset_titleiden" name="crrset_titleiden[]" type="text" style="width: 95%" value="<?php echo $crrset_titleiden1[$x]; ?>"
                   size="50" class="code class1"><br> <small> For Identification. It will show on collapsible panel also.</small></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><h3></h3></th>

        <td colspan="3"><input type="checkbox" value="true" name="crrset_enablebarposition[]" id="crrset_enablebarposition" class="class2" <?php if($crrset_enablebarposition1[$x] == 'true') { echo 'checked="checked"'; }?>> <b>Enable bar options</b></td>
        

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Bar Position</b></th>

        <td><select name="crrset_barposition[]" id="crrset_barposition" style="width:250px;" class="class3">
                <option value="bottom" <?php if($crrset_barposition1[$x] == 'bottom') { echo 'selected="selected"'; }?>>Footer</option>
                <option value="top" <?php if($crrset_barposition1[$x] == 'top') { echo 'selected="selected"'; }?>>Header</option>       
            </select></td>
        
        <th style="padding-left:10px;" scope="row"><b>Bar Width (%)</b></th>

        <td><input id="crrset_barwidth" name="crrset_barwidth[]" type="text" style="width: 95%" value="<?php if($crrset_barwidth1[$x] == '') { echo '100';} else { echo $crrset_barwidth1[$x]; } ?>"
                   size="50" class="code class4"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Bar Background Top Color</b></th>

        <td><input id="crrset_barbackgroundcolor" name="crrset_barbackgroundcolor[]" type="text" style="width: 250px;" value="<?php if($crrset_barbackgroundcolor1[$x] == '') { echo '191919'; } else { echo $crrset_barbackgroundcolor1[$x]; } ?>"
                   size="50" class="color class5"></td>
        
        <th style="padding-left:10px;" scope="row"><b>Bar Background Bottom Color</b></th>

        <td><input id="crrset_barbackgroundbottomcolor" name="crrset_barbackgroundbottomcolor[]" type="text" style="width: 250px;" value="<?php if($crrset_barbackgroundbottomcolor1[$x] == '') { echo '191919'; } else { echo $crrset_barbackgroundbottomcolor1[$x]; } ?>"
                   size="50" class="color class6"></td>

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Background Opacity</b></th>

        <td><input id="crrset_makebgtransparent" name="crrset_makebgtransparent[]" type="text" style="width: 95%" value="<?php if($crrset_makebgtransparent1[$x] == '') { echo "1"; } else { echo $crrset_makebgtransparent1[$x]; } ?>" size="50" class="code class7"></td>
        
        <th style="padding-left:10px;" scope="row"><b>Border Width (px)</b></th>

        <td><input id="crrset_barborderwidth" name="crrset_barborderwidth[]" type="text" style="width: 95%" value="<?php echo $crrset_barborderwidth1[$x]; ?>"
                   size="50" class="code class8"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Border Style</b></th>

        <td>
        <select name="crrset_barborderstyle[]" id="crrset_barborderstyle" style="width:250px;" class="class9">
                <option value="none" <?php if($crrset_barborderstyle1[$x] == 'none') { echo 'selected="selected"'; }?>>None</option>
                <option value="dotted" <?php if ($crrset_barborderstyle1[$x] == 'dotted') { echo 'selected="selected"'; } ?>>Dotted</option>
                <option value="dashed" <?php if ($crrset_barborderstyle1[$x] == 'dashed') { echo 'selected="selected"'; } ?>>Dashed</option>
                <option value="solid" <?php if ($crrset_barborderstyle1[$x] == 'solid' || $crrset_barborderstyle1[$x] == '') { echo 'selected="selected"'; } ?>>Solid</option>
                <option value="double" <?php if ($crrset_barborderstyle1[$x] == 'double') { echo 'selected="selected"'; } ?>>Double</option>
                <option value="groove" <?php if ($crrset_barborderstyle1[$x] == 'groove') { echo 'selected="selected"'; } ?>>Groove</option>
                <option value="ridge" <?php if ($crrset_barborderstyle1[$x] == 'ridge') { echo 'selected="selected"'; } ?>>Ridge</option>
        </select>
        </td>
        
        <th style="padding-left:10px;" scope="row"><b>Border Color</b></th>

        <td><input id="crrset_barbordercolor" name="crrset_barbordercolor[]" type="text" style="width: 250px;" value="<?php if($crrset_barbordercolor1[$x] == '') { echo '000000'; } else { echo $crrset_barbordercolor1[$x]; } ?>" size="50" class="color class10"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><h3></h3></th>

        <td colspan="2"><input type="checkbox" value="true" name="crrset_disablesticky[]" id="crrset_disablesticky" class="class11" <?php if($crrset_disablesticky1[$x] == 'true') { echo 'checked="checked"'; }?>> Disable Sticky (if you check this, bar will not move when page scroll)</td>
        
        <td><input type="checkbox" value="true" name="crrset_showclosebutton[]" id="crrset_showclosebutton" class="class12" <?php if($crrset_showclosebutton1[$x] == 'true') { echo 'checked="checked"'; }?>> Show close button</td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Select countdown to display (Use small countdowns)</b></th>

        <td>       
        <select name="crrset_baroptin[]" id="crrset_baroptin" style="width:250px;" class="class13">
                <?php
				global $wpdb;
$args = array( 'post_type' => 'crr', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<option value="<?php echo get_the_ID();?>" <?php if(get_the_ID() == $crrset_baroptin1[$x]) { echo 'selected="selected"'; }?>><?php echo get_the_title();?></option>
<?php endwhile;	?>		
				</select>
    			</td>
                <th style="padding-left:10px;" scope="row"><b>Content Area Width (%)</b></th>

        <td><input id="crrset_contentcountdownwidth" name="crrset_contentcountdownwidth[]" type="text" style="width: 95%" value="<?php if($crrset_contentcountdownwidth1[$x] == '') { echo '45'; } else { echo $crrset_contentcountdownwidth1[$x]; } ?>"
                   size="50" class="code class14"></td>
                
        

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Before Countdown</b></th>

        <td>       
        <textarea name="crrset_contentbeforecountdown[]" id= "crrset_contentbeforecountdown" cols="30" rows="5" class="class15"><?php echo $crrset_contentbeforecountdown1[$x]; ?></textarea>
    			</td>
        <th style="padding-left:10px;" scope="row"><b>Content After Countdown</b></th>

        <td>       
        <textarea name="crrset_contentaftercountdown[]" id= "crrset_contentaftercountdown" cols="30" rows="5" class="class16"><?php echo $crrset_contentaftercountdown1[$x]; ?></textarea>
    			</td>
        

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Font Family</b></th>

        <td>       
        <select name="crrset_contentfontfamily[]" id="crrset_contentfontfamily" style="width:250px;" class="class17">
                <option value="Arial, Helvetica, sans-serif" <?php if($crrset_contentfontfamily1[$x] == 'Arial, Helvetica, sans-serif') { echo 'selected="selected"'; }?>>Arial, Helvetica, sans-serif</option>
                <option value="Arial Black, Gadget, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Arial Black, Gadget, sans-serif') { echo 'selected="selected"'; } ?>>Arial Black, Gadget, sans-serif</option>
                <option value="Comic Sans MS, cursive, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Comic Sans MS, cursive, sans-serif') { echo 'selected="selected"'; } ?>>Comic Sans MS, cursive, sans-serif</option>
                <option value="Impact, Charcoal, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Impact, Charcoal, sans-serif' || get_option('crrset_barborderstyle') == '') { echo 'selected="selected"'; } ?>>Impact, Charcoal, sans-serif</option>
                <option value="Lucida Sans Unicode, Lucida Grande, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Lucida Sans Unicode, Lucida Grande, sans-serif') { echo 'selected="selected"'; } ?>>Lucida Sans Unicode, Lucida Grande, sans-serif</option>
                <option value="Tahoma, Geneva, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Tahoma, Geneva, sans-serif') { echo 'selected="selected"'; } ?>>Tahoma, Geneva, sans-serif</option>
                <option value="Trebuchet MS, Helvetica, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Trebuchet MS, Helvetica, sans-serif') { echo 'selected="selected"'; } ?>>Trebuchet MS, Helvetica, sans-serif</option>
                <option value="Verdana, Geneva, sans-serif" <?php if ($crrset_contentfontfamily1[$x] == 'Verdana, Geneva, sans-serif') { echo 'selected="selected"'; } ?>>Verdana, Geneva, sans-serif</option>
                <option value="Georgia, serif" <?php if ($crrset_contentfontfamily1[$x] == 'Georgia, serif') { echo 'selected="selected"'; } ?>>Georgia, serif</option>
                <option value="Palatino Linotype, Book Antiqua, Palatino, serif" <?php if ($crrset_contentfontfamily1[$x] == 'Palatino Linotype, Book Antiqua, Palatino, serif') { echo 'selected="selected"'; } ?>>Palatino Linotype, Book Antiqua, Palatino, serif</option>
                <option value="Times New Roman, Times, serif" <?php if ($crrset_contentfontfamily1[$x] == 'Times New Roman, Times, serif') { echo 'selected="selected"'; } ?>>Times New Roman, Times, serif</option>
                <option value="Courier New, Courier, monospace" <?php if ($crrset_contentfontfamily1[$x] == 'Courier New, Courier, monospace') { echo 'selected="selected"'; } ?>>Courier New, Courier, monospace</option>
                <option value="Lucida Console, Monaco, monospace" <?php if ($crrset_contentfontfamily1[$x] == 'Lucida Console, Monaco, monospace') { echo 'selected="selected"'; } ?>>Lucida Console, Monaco, monospace</option>
        </select>
    			</td>
        <th style="padding-left:10px;" scope="row"><b>Content Font Size</b></th>
	<td><input id="crrset_contentfontsize" name="crrset_contentfontsize[]" type="text" style="width: 95%" value="<?php if($crrset_contentfontsize1[$x] == '') { echo '34'; } else { echo $crrset_contentfontsize1[$x]; } ?>"
                   size="50" class="code class18"></td>

        </tr>
        <tr valign="top" style="border:2px solid #888888;">

        <th style="padding-left:10px;" scope="row"><b>Content Font Color</b></th>
        <td>       
        <input id="crrset_contentfontcolor" name="crrset_contentfontcolor[]" type="text" style="width: 250px;" value="<?php if($crrset_contentfontcolor1[$x] == '') { echo 'FFFFFF'; } else { echo $crrset_contentfontcolor1[$x]; } ?>" size="50" class="color class19"></td>
        <th style="padding-left:10px;" scope="row"><b>Affiliate Link URL</b></th>
        <td><input id="crrset_affiliatelinkurl" name="crrset_affiliatelinkurl[]" type="text" style="width: 95%" value="<?php echo $crrset_affiliatelinkurl1[$x]; ?>" size="50" class="code class20"> <small>Full URL like "http://www.cnn.com" where you want to show countdown bar.</small></td>
        
        </tr>
        
        <tr valign="top" style="border:2px solid #888888;" id="posttopbottombarjscrr">

        <th style="padding-left:10px;" scope="row"><h3>Select posts to show Header / Footer Bar</h3></th>

        <td colspan="3"><select name="crrset_posttopbottombar[]" id="crrset_posttopbottombar" class="class21">
        <option value="0">Select Post</option>
<?php query_posts('post_status=publish&posts_per_page=-1&post_type=post'); ?>
<?php //echo $value['name']; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php $inp_idtb = get_the_ID(); ?>
<?php if($crrset_posttopbottombar1[$x] != '') { if($inp_idtb == $crrset_posttopbottombar1[$x] ){ $checkedtb = "selected=\"selected\""; }else{ $checkedtb = ""; } }?>
<option value="<?php echo $inp_idtb; ?>" <?php echo $checkedtb;?>><?php the_title(); ?></option>
<?php
  endwhile;?>
  </select>
  </td>

        </tr>
        
        <tr valign="top" style="border:2px solid #888888;" id="pagetopbottombarjscrr">

        <th style="padding-left:10px;" scope="row"><h3>Select page to show Header / Footer Bar</h3></th>

        <td colspan="3">
<select name="crrset_pagetopbottombar[]" id="crrset_pagetopbottombar" class="class22">
<?php query_posts('post_status=publish&posts_per_page=-1&post_type=page'); ?>
<?php //echo $value['name']; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php $inp_idtb2 = get_the_ID(); ?>
<?php if($crrset_pagetopbottombar1[$x] != '') { if($inp_idtb2 == $crrset_pagetopbottombar1[$x] ){ $checkedtb2 = "selected=\"selected\""; }else{ $checkedtb2 = ""; } }?>
<option value="<?php echo $inp_idtb2; ?>" <?php echo $checkedtb2;?>><?php the_title(); ?></option>
<?php  endwhile; ?>
</select>
</td>
        </tr>
    </table>
    </div>
        </div>
  <?php
  }
		}
  ?>
  </div>
  <input id="btnAdds" type="button" class="addaffcountcrr button-primary" value="Add Affiliate Countdown" style="margin-top:10px;">
     <br />
         
	<?php	submit_button();
	?>
	</form>
		</div>
    <?php }
	
	public function crr_add_action_links( $links ) {
		/*return array_merge(
			array(
				'settings' => '<a href="' . admin_url( 'edit.php?post_type=gvp&page=gvp_settings' ) . '">' . __( 'Settings', 'gvp' ) . '</a>'
			),
			$links
		);*/
	}
	public function add_crr_customposttype() {
		$labels = array(
			'name'                => _x( 'Countdown Rocket', 'Post Type General Name', 'crr' ),
			'singular_name'       => _x( 'Countdown Rocket', 'Post Type Singular Name', 'crr' ),
			'menu_name'           => __( 'Countdown Rocket', 'crr' ),
			'parent_item_colon'   => __( 'Parent Countdown', 'crr' ),
			'all_items'           => __( 'All Countdowns', 'crr' ),
			'view_item'           => __( 'View Countdown', 'crr' ),
			'add_new_item'        => __( 'Add New Countdown', 'crr' ),
			'add_new'             => __( 'Add New Countdown', 'crr' ),
			'edit_item'           => __( 'Edit Countdown', 'crr' ),
			'update_item'         => __( 'Update Countdown', 'crr' ),
			'search_items'        => __( 'Search Countdown', 'crr' ),
			'not_found'           => __( 'No countdown found', 'crr' ),
			'not_found_in_trash'  => __( 'No videos found in Trash', 'crr' ),
		);
		$args = array(
			'label'               => __( 'Countdown', 'crr' ),
			'description'         => __( 'Countdown Rocket Timer', 'crr' ),
			'labels'              => $labels,
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => ( version_compare( $GLOBALS['wp_version'], '3.8-alpha', '>' ) ) ? 'dashicons-share-alt2' : '',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'query_var'           => 'countdown',
			'rewrite'             => false,
			'capability_type'     => 'page',
		);
		register_post_type( 'crr', $args );
		
		global $wpdb;
     
    //create the name of the table including the wordpress prefix (wp_ etc)
    $search_table = $wpdb->prefix . "crrcounterredirect";
	$search_table1 = $wpdb->prefix . "crrcounterredirectip";
    //$wpdb->show_errors();
     
    //check if there are any tables of that name already
    if($wpdb->get_var("show tables like '$search_table'") !== $search_table)
    {
    //create your sql
    $sql = "CREATE TABLE ". $search_table . " (
    P_Id BIGINT NOT NULL AUTO_INCREMENT,
			post_id BIGINT NOT NULL,
			expiry_time BIGINT NOT NULL,
			method INT NOT NULL,
			event INT NOT NULL,
			splash_url varchar(255) NOT NULL,
			color_num varchar(8) NOT NULL,
			myhexcode varchar(8) NOT NULL,
			myhexcode1 varchar(8) NOT NULL,		
			back_color varchar(8) NOT NULL,
			counter_size INT NOT NULL,
			alignment INT NOT NULL,
			day INT NOT NULL,
			hrs INT NOT NULL,
			mins INT NOT NULL,
			secs INT NOT NULL,
			timestamp BIGINT,
			redirection_url TEXT NOT NULL,
			blog_id BIGINT NOT NULL,
			expiry_date_time DATETIME NOT NULL,
			expiry_method INT NULL,
			time_zone VARCHAR( 255 ) NOT NULL,
			border_width varchar(8) NOT NULL,
			border_color varchar(8) NOT NULL,
			PRIMARY KEY (P_Id));";
    
	
	$sql .= "CREATE TABLE ". $search_table1 . " (
    P_Id BIGINT NOT NULL AUTO_INCREMENT,
			post_id BIGINT NOT NULL,
			timestamp BIGINT,
			ip TEXT,
			blog_id BIGINT NOT NULL,
			PRIMARY KEY (P_Id));";
    }
     
    //include the wordpress db functions
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
     
    //register the new table with the wpdb object
    if (!isset($wpdb->stats))
    {
    $wpdb->stats = $search_table;
    //add the shortcut so you can use $wpdb->stats
    $wpdb->tables[] = str_replace($wpdb->prefix, '', $search_table);
    }
		wp_enqueue_script('jquery');
		//wp_enqueue_script("font-preview5", plugins_url( '/js/jquery.lwtCountdown-1.0.js', __FILE__ ), false);
		
			if ( ! is_admin() )
			  {
				  wp_enqueue_script('sppjqueryui', plugins_url( '/js/jquery-ui.js', __FILE__ ), false);
				  wp_enqueue_script("font-preview5", plugins_url( '/js/jquery.lwtCountdown-1.0.js', __FILE__ ), false);
				  
			  }
	}
	
		function my_edit_crr_columns( $columns ) {
		
			$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => __( 'Countdown Title' ),
				'shortcode' => __( 'Shortcode' ),
				'date' => __( 'Date' )
			);
		
			return $columns;
		}
function my_manage_crr_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'duration' column. */
		case 'shortcode' :
				echo '[countdownrocket id= "'.$post_id.'"]';
			break;
		default :
			break;
	}
}
	public function set_messages($messages) {
		global $post;
		$messages['crr'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Countdown updated.', 'crr' ),
			2  => __( 'Custom field updated.', 'crr' ),
			3  => __( 'Custom field deleted.', 'crr' ),
			4  => __( 'Countdown updated.', 'crr' ),
			5  => isset( $_GET['revision'] ) ? sprintf( __( $singular . ' restored to revision from %s', 'crr' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Countdown published.', 'crr' ),
			7  => __( 'Countdown saved.', 'crr' ),
			8  => __( 'Countdown submitted.', 'crr' ),
			9  => sprintf( __( 'Countdown scheduled for: %1$s', 'crr' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ) ),
			10 => __( 'Countdown draft updated.', 'crr' ),
		);
		return $messages;
	}
	
	
}
