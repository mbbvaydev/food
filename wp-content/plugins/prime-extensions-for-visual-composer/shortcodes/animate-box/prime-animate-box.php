<?php
if ( ! class_exists( 'Prime_Extension_AnimateBox' ) ) {
	class Prime_Extension_AnimateBox {
		function Prime_Extension_AnimateBox() {
			vc_map( array(
				"name"        => __( "Animate Box", 'RD_vc' ),
				"base"        => "pr_animatebox",
				"icon"        => "prime_iconimageaccordion",
				"category"    => 'Prime VC Extensions',
				'description' => 'Icon animation with Text',
				// 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
				"params"      => array(
						// Image Field
						array(
							"type"        => "attach_image",
							"heading"     => __( "Upload Image", "RD_vc" ),
							"param_name"  => "images",
							"value"       => "",
							"description" => __( "Select image from media library.", "RD_vc" )
						),
						array(
							"type"        => "textfield",
							/*"holder" => "div",*/
							"class"       => "",
							"heading"     => __( "Title", 'RD_vc' ),
							"param_name"  => "title",
							"admin_label" => true,
							"value"       => "Title Goes Here",
							"description" => __("Provide the title for the Animate Box.", 'prime')
						),
						
						array(
							"type"        => "textarea",
							/*"holder" => "div",*/
							"class"       => "",
							"heading"     => __( "Description", 'RD_vc' ),
							"param_name"  => "descript",
							"admin_label" => true,
							"value"       => "Description Goes Here",
							"description" => __("Provide the Description for the Animate Box.", 'prime'),
						),
				array(
                            "type"        => "prime_switch",
                            "heading"     => __( "External Link?  <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'> PRO Feature</a>", "prime_vc" ),
                            "param_name"  => "ext_link",
                            'value' => array(__('Link', 'prime_vc') => 'off'),
                            "options"     => array(
                                "on" => array(
                                    "label" => __( "", "prime_vc" ),
                                    "on"    => "Yes",
                                    "off"   => "No",
                                ),
                            ),
                            "default_set" => false,
                            "description" => "Switch Yes If you want Add A External Link In Infobox items.",
                ),
					// Link Field
					array(
					"type"        => "vc_link",
						"heading"     => __( "External Link <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'> PRO Feature</a>", 'prime_vc' ),
						"param_name"  => "link",
						"description" => __( "Provide the Info Box link here.", 'prime_vc' ),
						"dependency" => array('element' => 'ext_link', 'value' => 'on'),
					),		
						array(
						"type" => "prime_param_heading",
						"text" => "<span style='display: block;'><a href='https://youtu.be/DozAaEKNVII' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
						"param_name" => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
					),
						// TItle Font Size Field
						array(
							'type'             => 'prime_slider',
							'heading'          => __( 'Title Font Size', 'prime_vc' ),
							'param_name'       => 'title_f_size',
							'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'              => 1,
							'max'              => 100,
							'step'             => 1,
							'value'            => 18,
							'unit'             => 'px',
							"description" => __("Chose Title Font Size as Pixel. Default is 18px", "prime_vc"),
							"group" => "Typography"
						),
						// Description Font Size Field
						array(
							'type'             => 'prime_slider',
							'heading'          => __( 'Description Font Size', 'prime_vc' ),
							'param_name'       => 'descr_f_size',
							'tooltip'          => __( 'Choose Member Name Font Size Here. For large numbers it\'s better use 18px Font Size.', 'team_vc' ),
							'min'              => 1,
							'max'              => 100,
							'step'             => 1,
							'value'            => 14,
							'unit'             => 'px',
							"description" => __("Chose Description Font Size as Pixel. Default is 14px", "prime_vc"),
							"group" => "Typography"
						),
					// Background Color
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Item Background color", "my-text-domain" ),
						"param_name"  => "bg_color",
						"value"       => '#bdc3c7', //Default Red color
						"description" => __( "Choose text color", "my-text-domain" ),
						"group"       => "Typography"
					),
						array(
							"type"        => "colorpicker",
							"class"       => "",
							"heading"     => __( "Title color", "my-text-domain" ),
							"param_name"  => "title_color",
							"description" => __( "Choose text color", "my-text-domain" ),
							"group"       => "Typography",
							"value"       => '#000000',
						),
						array(
							"type"        => "colorpicker",
							"class"       => "",
							"heading"     => __( "Description color", "my-text-domain" ),
							"param_name"  => "descr_color",
							"description" => __( "Choose text color", "my-text-domain" ),
							"group"       => "Typography"
						),
						
					array(
						"type" => "prime_param_heading",
						"text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/DozAaEKNVII' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
						"param_name" => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                        "group" => "Video Tutorial"
					),
						
				)
			) );
			function prime_animatebox_shortcode_function( $atts, $content = null, $tag ) {
				extract( shortcode_atts( array(
					'images'       => '',
					'title'        => 'Title Goes Here',
					'descript'     => 'Description Goes Here',
					'bg_color'     => '',
					'title_f_size' => '18',
					'descr_f_size' => '14',
					'title_color'  => '#000000',
					'descr_color'  => ''
				), $atts ) );
				wp_register_style( 'pr-animatebox-css', plugins_url( 'css/style.css', __FILE__ ) );
				wp_enqueue_style( 'pr-animatebox-css' );

				$content = wpb_js_remove_wpautop( $content ); // fix unclosed/unwanted paragraph tags in $content
				$images  = wp_get_attachment_image_src( $images, 'full' );
				$title_f_size   = $atts[ 'title_f_size' ] != '' ? (int) esc_attr( $atts[ 'title_f_size' ] ) : 18;
				$descr_f_size   = $atts[ 'descr_f_size' ] != '' ? (int) esc_attr( $atts[ 'descr_f_size' ] ) : 14;

			echo '<style type="text/css">
            .homeBox .one_fourth:hover{
                background:' . $bg_color . ';
            }</style>';
				$output = '<div class="homeBox">
        <div class="one_fourth">
            <div class = "boxImage"><img style="border-radius:0;" src = "' . $images[0] . '"></div>	
            <h2 style="font-size:' . $title_f_size . 'px; color:' . $title_color . ';">' . strtoupper( $title ) . '</h2>	
            <div class = "boxDescription">
            <p style="font-size:' . $descr_f_size . 'px;  color:' . $descr_color . ';">' . $descript . '</p>
            </div>	
        </div> 
    </div>';

				return $output;
			}

			add_shortcode( 'pr_animatebox', 'prime_animatebox_shortcode_function' );
		}
	}
}
?>
