<?php
if (!class_exists('Prime_Extensions_contentBlock')) {
    class Prime_Extensions_contentBlock{
        function Prime_Extensions_contentBlock() {
            vc_map(array(
            "name" => __("Content Block", 'vc_stackblock_cq'),
            "base" => "prime_vc_contentblock",
            "icon" => "prime_icon_contentblock",
            "category" => __('Prime VC Extensions', 'rd_vc'),
            'description' => __('Place any content inside it', 'rd_vc'),
            "params" => array(
              array(
                "type" => "textarea_html",
                "holder" => "div",
                "heading" => __("content Block", "vc_stackblock_cq"),
                "param_name" => "content",
                "value" => __("", "vc_stackblock_cq"), "description" => __("", "vc_stackblock_cq") ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "vc_stackblock_cq",
                "heading" => __("background color", "vc_stackblock_cq"),
                "param_name" => "panelbackground",
                "value" => array("White" => "white", "Gray" => "gray", "Orange" => "orange", "Red" => "red", "Green" => "green", "Mint" => "mint", "Aqua" => "aqua", "Blue" => "blue", "Lavender" => "lavender", "Pink" => "pink", "Yellow" => "yellow"),
                'std' => 'white',
                "description" => __("", "vc_stackblock_cq")
              ),
              array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "vc_stackblock_cq",
                "heading" => __("Text align", "vc_stackblock_cq"),
                "param_name" => "textalign",
                "value" => array("left", "center", "right"),
                "description" => __("", "vc_stackblock_cq")
              ),
			array(
					"type"        => "prime_switch",
					"class"       => "",
					"heading"     => __( "Use External Link?", "prime_vc" ),
					"param_name"  => "url_show",
					"value"       => "off",
					"options"     => array(
						"on" => array(
							"label" => __( "", "prime_vc" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"default_set" => true,
					"description" => "Switch Yes If you want to use link for whole content.",
				), 
              array(
                "type" => "vc_link",
                "heading" => __("Link for the whole stack (optional)", "vc_stackblock_cq"),
                "param_name" => "link",
                "value" => "",
                "description" => __("", "vc_stackblock_cq"),
				"dependency" => array('element' => 'url_show', 'value' => 'on'),
              ),
              array(
                "type" => "textfield",
                "heading" => __("Extra class name", "vc_stackblock_cq"),
                "param_name" => "extraclass",
                "value" => "",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "vc_stackblock_cq")
              ),
                array(
                    "type" => "prime_param_heading",
                    "text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/lX5QfpT92_8' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
                    "param_name" => "notification",
                    'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                    "group" => "Video Tutorial"
                ),

           )
        ));


        function prime_vc_contentblock_func($atts, $content=null, $tag) {
            extract(shortcode_atts(array(
              "panelbackground" => "gray",
              "textalign" => "left",
              "elementheight" => "",
              "contentwidth" => "",
              // "fontsize" => "",
              "tooltip" => "",
              "link" => "",
              "extraclass" => ""
            ), $atts));
          $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
          $output = '';

          $link = vc_build_link($link);
		  
          wp_register_style( 'prime-extensions-contentblock-style', plugins_url('css/style.css', __FILE__) );
          wp_enqueue_style( 'prime-extensions-contentblock-style' );
		  
          wp_register_script('prime-extensions-contentblock-script', plugins_url('js/init.min.js', __FILE__), array("jquery", "tooltipster"));
          wp_enqueue_script('prime-extensions-contentblock-script');

          $i = -1;
          $output = '';
          $output .= '<div class="cq-stackblock" data-elementheight="auto" data-contentwidth="100%" data-textalign="'.$textalign.'" data-tooltip="'.$tooltip.'">';
          if($link["url"]!=="") $output .= '<a href="'.$link["url"].'" title="'.$link["title"].'" target="'.$link["target"].'" class="cq-stackblock-link">';
          $output .= '<div class="cq-stackblock-card card-'.$panelbackground.'">';
          $output .= '<div class="cq-stackblock-content">';
          $output .= $content;
          $output .= '</div>';
          $output .= '</div>';
          if($link["url"]!=="") $output .= '</a>';
          $output .= '</div>';
          return $output;

        }

        add_shortcode('prime_vc_contentblock', 'prime_vc_contentblock_func');

      }
  }

}

?>
