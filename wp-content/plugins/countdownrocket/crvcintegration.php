<?php
/*define('WP_DEBUG', true);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
//if (defined('WPB_VC_VERSION')) {
//======================================== Bullets start here =================================================

if(!class_exists('Sppvc_Crocket_List')) 
{
	class Sppvc_Crocket_List
	{
		function __construct()
		{
						
			//add_action('admin_init',array($this,'bullet_list_initiation'));
			add_action( 'vc_before_init',array($this,'crocket_list_initiation') );
			add_shortcode('mpp_vccountdownrockett',array($this,'spp_vccountrockett_shortcode'));
		}
		
		
		function sppmp_dropdown_countrocket_settings_field( $settings, $value ){
			print_r($posts);
			$str = '';
			$str .= '<div style="margin-bottom:10px; font-weight:bold;">' . $settings['sppmp_label'] . '</div>';
			$str .= '<select id="'.$settings['sppmp_select_id'].'" name="'.$settings['param_name'].'" class="wpb_vc_param_value '.$settings['param_name'].' '.$settings['type'].'_field" >';
			$postscr = get_posts(
				array(
					'post_type'  => 'crr',
					'numberposts' => -1,
					'orderby' => 'post_date',
					'order'   => 'DESC',
					'post_status' => 'publish'
				)
			);
			
			foreach( $postscr as $p )
			{
				$selected = '';
					if($value==$p->ID) $selected = 'selected="selected"';
				$str .= '<option value="' . $p->ID . '" '.$selected.'>' . esc_html( $p->post_title ) . '</option>';
			}
			/*foreach($settings['sppmp_items'] as $k=>$v){
				$selected = '';
				if($value==$k) $selected = 'selected="selected"';
				$str .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
			}*/
			$str .= '</select>';
			$str .= '<span class="vc_description vc_clearfix">'.$settings['aditional_info'].'</span>';
			return $str;
		}

	
		function crocket_list_initiation()
		{
			

			if(function_exists('vc_map'))
			{
				add_shortcode_param('crlistdropdown', array($this,'sppmp_dropdown_countrocket_settings_field'));
				// ================================VC Nav Menu start
				vc_map(
					array(
					   "name" => "Countdown Rocket",
					   "base" => "mpp_vccountdownrockett",
					   "class" => "mpp_vccountdownrockett",
					   "icon" => plugins_url( 'images/countdownicon.png', __FILE__ ),
					   "category" => "MaximaPress",
					   "description" => "Add beautiful countdowns.",
					   "show_settings_on_create" => true,
					   "params" => array(
							// Play with icon selector
							array(
								  "type"        => "crlistdropdown",
								  "sppmp_label"     => "Select Counter",
								  "value" => '',
								  "param_name"  => "mpcrr_selectcounter",
								  "sppmp_select_id" => "mpcrr_selectcounter",
								  "aditional_info" => "Design and select options for counter at Countdown Rocket menu and select from above dropdown."
							  )
						)
					)
				);
				// ================================VC Nav Menu end
				
				
			}
		}
		
		function spp_vccountrockett_shortcode($atts, $content = null){
			extract(shortcode_atts( array(
				'mpcrr_selectcounter' => ''
			),$atts));
			$finaloutput = '';
			$finaloutput .= '[countdownrocket id= "'.$mpcrr_selectcounter.'"]';
			return do_shortcode($finaloutput);	
		}
		
	}
}
?>