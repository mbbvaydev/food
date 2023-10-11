<?php
if (!class_exists('prime_extension_beforeafter')) {
    class prime_extension_beforeafter{
        function prime_extension_beforeafter() {
            vc_map(array(
            "name" => __("Before & After", 'RD_vc'),
            "base" => "prime_beforeafter",
			"icon"        => "prime_icon_beforeafter",
			"category"    => 'Prime VC Extensions',
            'description' => __('Image comparison slider', 'js_composer'),
            "params" => array(
              array(
                "type" => "attach_image",
                "heading" => __("Before image", "RD_vc"),
                "param_name" => "before_image",
                "value" => "",
                "description" => __("Select image from media library.", "RD_vc")
              ),
              array(
                "type" => "attach_image",
                "heading" => __("After image", "RD_vc"),
                "param_name" => "after_image",
                "value" => "",
                "description" => __("Select image from media library.", "RD_vc")
              ),
                array(
                    "type" => "prime_param_heading",
                    "text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/Ed-h8qT21CQ' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
                    "param_name" => "notification",
                    'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                    "group" => "Video Tutorial"
                ),
           )
        ));

        function prime_vc_beforeafter_func($atts, $content=null, $tag) {
            extract(shortcode_atts(array(
              "before_image" => '',
              "after_image" => '',
            ), $atts));

// Loading CSS & JS
          // wp_register_style('tooltipster', plugins_url('css/tooltipster.css', __FILE__));
          // wp_enqueue_style('tooltipster');
		  
          // wp_register_script('tooltipster', plugins_url('js/jquery.tooltipster.min.js', __FILE__), array('jquery'));
          // wp_enqueue_script('tooltipster');

          wp_register_style( 'prime_beforeafter_style', plugins_url('css/before-after.css', __FILE__) );
          wp_enqueue_style( 'prime_beforeafter_style' );
		  
		  wp_enqueue_script( "jquery" );
          wp_register_script('jquery_mobile_touch', plugins_url('js/jquery.event.move.js', __FILE__));
          wp_enqueue_script('jquery_mobile_touch');
		  
          wp_register_script('prime_beforeafter_script', plugins_url('js/jquery.twentytwenty.js', __FILE__));
          wp_enqueue_script('prime_beforeafter_script');
		  
		$autoslide  = $atts[ 'autoslide' ] != '' ? (int) esc_attr( $atts[ 'autoslide' ] ) : 0;
			$id = rand(1, 10000000);            
			$before_image = wp_get_attachment_image_src( $before_image, 'full' );
			$after_image = wp_get_attachment_image_src( $after_image, 'full' );	
			$output = ' <div class="'.esc_attr( $atts['css'] ).'" id="container_'.$id.'">
						  <img src="'.$before_image[0].'">
						  <img src="'.$after_image[0].'">
						</div>';
			
			$output .= '<script>
						jQuery(window).load(function() {
						  jQuery("#container_'.$id.'").twentytwenty();
						});
					</script>';
          return $output;
        }

        add_shortcode('prime_beforeafter', 'prime_vc_beforeafter_func');

      }
  }

}

?>
