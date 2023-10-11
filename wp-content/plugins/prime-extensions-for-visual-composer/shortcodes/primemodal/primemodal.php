<?php
if (!class_exists( 'Prime_Extensions_PrimeModal' ) ) {

    class Prime_Extensions_PrimeModal {
        function __construct() {
            vc_map( array(
              "name" => __("Prime Modal", 'prime_vc'),
              "base" => "prime_cq_vc_modal",
              "class" => "prime_cq_vc_extension_depthmodal",
              "controls" => "full",
              "icon" => "prime_icon_pr_modal",
              "category" => __('Prime VC Extensions', 'js_composer'),
              'description' => __( 'Popup modal', 'js_composer' ),
              // 'admin_enqueue_js' => array(plugins_url('prime_vc_admin.js', __FILE__)),
              // 'admin_enqueue_css' => array(plugins_url('css/vc_extensions_cq_admin.css', __FILE__)),
              "params" => array(
			  
				array(
					"type"        => "textfield",
					"heading"     => __( "Link label", 'prime_vc' ),
					"param_name"  => "buttontext",
					"admin_label" => true,
					"value"       => "Click Me",
					"description" => __( "The link user click to open the modal", 'prime_vc' ),

				),
                array(
                  "type" => "textarea_html",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Popup content", 'prime_vc'),
                  "param_name" => "content",
                  "value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'prime_vc'),
                  "description" => __("", 'prime_vc')
                ),
				array(
					"type" => "prime_param_heading",
					"text" => "<span style='display: block;'><a href='https://youtu.be/ix4bj7_9ubg' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
					"param_name" => "notification",
					'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
				),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Popup text color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "textcolor",
                  "value" => '#333',
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Popup background <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "background",
                  "value" => '#fff',
                  "description" => __("", 'prime_vc'),
				   "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc_tiny_text",
                  "heading" => __("Popup width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "width",
                  "value" => __("640", 'prime_vc'),
                  "description" => __("A fixed value like 640, or a (responsive) percent value like 60%.", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc_tiny_text",
                  "heading" => __("Popup margin top <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "margintop",
                  "value" => __("40", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "prime_vc",
                "heading" => __("Display the Popup in: <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
                "param_name" => "popupposition",
                "value" => array("fixed" => "fixed", "absolute (work better for long contnet)" => "absolute"),
                "description" => __("CSS position value for the Popup.", "prime_vc"),
				"group" => __("PRO Features", 'prime_vc')
              ),
                array(
                  "type" => "checkbox",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("Do not hide the popup content when page is loaded <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "loadedvisible",
                  "value" => array(__("Yes, set the popup content visible by default", "prime_vc") => 'on'),
                  "description" => __("Sometime you have to display the popup content when page is loaded, for example my hotspot plugin need it's container to be visible when loaded.", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
              array(
                  "type" => "prime_param_heading",
                  "text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
                        <iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
                        src='https://www.youtube.com/embed/ix4bj7_9ubg' frameborder='0' allowfullscreen>
                        </iframe> 
                    </span>",
                  "param_name" => "notification",
                  'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                  "group" => "Video Tutorial"
              ),

              )
            ) );


            vc_map( array(
              "name" => __("Scrolling Notification", 'prime_vc'),
              "base" => "prime_cq_vc_notify",
              "class" => "prime_cq_vc_extension_scrollnotification   ",
              "controls" => "full",
              "icon" => "prime_scroll_notification",
              "category" => __('Prime VC Extensions', 'js_composer'),
              'description' => __( 'Popup notification', 'js_composer' ),
              'admin_enqueue_js' => array(plugins_url('js/prime_vc_admin.js', __FILE__)),
              // 'admin_enqueue_css' => array(plugins_url('css/prime_vc_admin.css', __FILE__)),
              "params" => array(
                array(
                  "type" => "textarea_html",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Notification content", 'prime_vc'),
                  "param_name" => "content",
                  "value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'prime_vc'),
                  "description" => __("", 'prime_vc')
                ),
				array(
						"type" => "prime_param_heading",
						"text" => "<span style='display: block;'><a href='https://youtu.be/bUSK-wFFX00' target='_blank'>".__("Watch Video Tutorial","prime_vc")." &nbsp; <span class='dashicons dashicons-video-alt3' style='font-size:30px;vertical-align: middle;color: #e52d27;'></span></a></span>",
						"param_name" => "notification",
						'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
				),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("opacity <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "opacity",
                  "value" => __("0.8", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "dropdown",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("easein <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
                  "param_name" => "easein",
                  "value" => array(__("random", "prime_vc") => 'random', __("fadeIn", "prime_vc") => "fadeIn", __("wobble", "prime_vc") => "wobble", __("tada", "prime_vc") => "tada", __("shake", "prime_vc") => "shake", __("swing", "prime_vc") => "swing", __("pulse", "prime_vc") => "pulse", __("fadeInLeft", "prime_vc") => "fadeInLeft", __("fadeInRight", "prime_vc") => "fadeInRight", __("fadeInUp", "prime_vc") => "fadeInUp", __("fadeInDown", "prime_vc") => "fadeInDown", __("fadeInLeftBig", "prime_vc") => "fadeInLeftBig", __("fadeInRightBig", "prime_vc") => "fadeInRightBig", __("fadeInUpBig", "prime_vc") => "fadeInUpBig", __("fadeInDownBig", "prime_vc") => "fadeInDownBig", __("bounceInLeft", "prime_vc") => "bounceInLeft", __("bounceInRight", "prime_vc") => "bounceInRight", __("bounce", "prime_vc") => "bounce", __("bounceInUp", "prime_vc") => "bounceInUp", __("bounceInDown", "prime_vc") => "bounceInDown", __("rollIn", "prime_vc") => "rollIn", __("rotateIn", "prime_vc") => "rotateIn", __("rotateInDownLeft", "prime_vc") => "rotateInDownLeft", __("rotateInDownRight", "prime_vc") => "rotateInDownRight", __("rotateInUpLeft", "prime_vc") => "rotateInUpLeft", __("rotateInUpRight", "prime_vc") => "rotateInUpRight", __("flipInX", "prime_vc") => "flipInX", __("flipInY", "prime_vc") => "flipInY", __("lightSpeedIn", "prime_vc") => "lightSpeedIn"),
                  "description" => __("Select easin in animation type. Note: Works only in modern browsers.", "prime_vc"), 
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "dropdown",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("easeout <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
                  "param_name" => "easeout",
                  "value" => array(__("random", "prime_vc") => 'random', __("fadeOut", "prime_vc") => "fadeOut", __("fadeOutLeft", "prime_vc") => "fadeOutLeft", __("fadeOutRight", "prime_vc") => "fadeOutRight", __("fadeOutUp", "prime_vc") => "fadeOutUp", __("fadeOutDown", "prime_vc") => "fadeOutDown", __("fadeOutLeftBig", "prime_vc") => "fadeOutLeftBig", __("fadeOutRightBig", "prime_vc") => "fadeOutRightBig", __("fadeOutUpBig", "prime_vc") => "fadeOutUpBig", __("fadeOutDownBig", "prime_vc") => "fadeOutDownBig", __("bounceOutLeft", "prime_vc") => "bounceOutLeft", __("bounceOutRight", "prime_vc") => "bounceOutRight", __("bounceOutUp", "prime_vc") => "bounceOutUp", __("bounceOutDown", "prime_vc") => "bounceOutDown", __("rollOut", "prime_vc") => "rollOut", __("rotateOut", "prime_vc") => "rotateOut", __("rotateOutDownLeft", "prime_vc") => "rotateOutDownLeft", __("rotateOutDownRight", "prime_vc") => "rotateOutDownRight", __("rotateOutUpLeft", "prime_vc") => "rotateOutUpLeft", __("rotateOutUpRight", "prime_vc") => "rotateOutUpRight", __("flipOutX", "prime_vc") => "flipOutX", __("flipOutY", "prime_vc") => "flipOutY", __("lightSpeedOut", "prime_vc") => "lightSpeedOut"),
                  "description" => __("Select easout in animation type. Note: Works only in modern browsers.", "prime_vc"),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "dropdown",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("Display the notification <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
                  "param_name" => "displaywhen",
                  "value" => array( __("hidden by default, visible only when user scrolling", "prime_vc") => "scrolling", __("always visible", "prime_vc") => "loaded", __("visible by default, hidden when user scrolling", "prime_vc") => "scrollhidden"),
                  "description" => __("Choose when to display the notification.", "prime_vc"),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "dropdown",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("Put the close button on the <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "prime_vc"),
                  "param_name" => "closeposition",
                  "value" => array(__("left", "prime_vc") => "left", __("right", "prime_vc") => "right"),
                  "description" => __("", "prime_vc"),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "width",
                  "value" => __("240", 'prime_vc'),
                  "description" => __("A fixed value like 640, or a percent value like 60%, or leave it to be blank equal to auto.", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("height <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "height",
                  "value" => __("auto", 'prime_vc'),
                  "description" => __("A fixed value like 640, or a percent value like 60%, or leave it to be blank equal to auto.", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Notification text color <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_extend'),
                  "param_name" => "textcolor",
                  "value" => '#333',
                  "description" => __("", 'vc_extend'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Notification background <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_extend'),
                  "param_name" => "background",
                  "value" => '#fff',
                  "description" => __("", 'vc_extend'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("top <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "top",
                  "value" => __("", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("right <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "right",
                  "value" => __("10", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("bottom <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "bottom",
                  "value" => __("10", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("left <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "left",
                  "value" => __("", 'prime_vc'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("Auto hide delay <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "autohidedelay",
                  "value" => __("", 'prime_vc'),
                  "description" => __("For example, 5000 stand for 5 seconds, leave it to blank if you do not want it", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                array(
                  "type" => "checkbox",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("After close, store it in cookie <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "cookie",
                  "value" => array(__("yes", "prime_vc") => 'on'),
                  "description" => __("", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),

                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "prime_vc",
                  "heading" => __("After close, do not show the notification again for days <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'prime_vc'),
                  "param_name" => "days",
                  "value" => __("10", 'prime_vc'),
                  "description" => __("You have to enable the store in cookie", 'prime_vc'),
				  "group" => __("PRO Features", 'prime_vc')
                ),
                  array(
                      "type" => "prime_param_heading",
                      "text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/bUSK-wFFX00' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
                      "param_name" => "notification",
                      'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                      "group" => "Video Tutorial"
                  ),

              )
            ) );


            // gallery part
            vc_map( array(
              "name" => __("Masonry Gallery", 'vc_gallery_cq'),
              "base" => "prime_cq_vc_gallery",
              "class" => "prime_cq_vc_extension_masonry",
              "controls" => "full",
              "icon" => "prime_massonary_gallery",
              "category" => __('Prime VC Extensions', 'js_composer'),
              'description' => __( 'Responsive grid gallery', 'js_composer' ),
              // 'admin_enqueue_js' => array(plugins_url('prime_vc_admin.js', __FILE__)),
              // 'admin_enqueue_css' => array(plugins_url('css/vc_gallery_cq_admin.css', __FILE__)),
              "params" => array(
                array(
                  "type" => "attach_images",
                  "heading" => __("Images", "vc_gallery_cq"),
                  "param_name" => "images",
                  "value" => "",
                  "description" => __("Select images from media library.", "vc_gallery_cq")
                ),
                array(
                  "type" => "dropdown",
                  "holder" => "",
                  "class" => "vc_gallery_cq",
                  "heading" => __("On click", "vc_gallery_cq"),
                  "param_name" => "onclick",
                  "value" => array(__("open large image (lightbox)", "vc_gallery_cq") => "link_image", __("Do nothing", "vc_gallery_cq") => "link_no", __("Open custom link", "vc_gallery_cq") => "custom_link"),
                  "description" => __("Define action for onclick event if needed.", "vc_gallery_cq")
                ),
                array(
                  "type" => "exploded_textarea",
                  "heading" => __("Custom links", "vc_gallery_cq"),
                  "param_name" => "custom_links",
                  "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'vc_gallery_cq'),
                  "dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
                ),
                array(
                  "type" => "dropdown",
                  "heading" => __("Custom link target", "vc_gallery_cq"),
                  "param_name" => "custom_links_target",
                  "description" => __('Select where to open custom links.', 'vc_gallery_cq'),
                  "dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
                  'value' => array(__("Same window", "vc_gallery_cq") => "_self", __("New window", "vc_gallery_cq") => "_blank")
                ),
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Container width", "Prime_vc" ),
					'param_name'       => 'itemwidth',
					'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 150,
					'max'              => 600,
					'step'             => 1,
					'value'            => 240,
					'unit'             => '',
					"description" => __("Width of each thumbnail in the masonry gallery.", "prime_vc"),
				),
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "Thumbnail padding <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "Prime_vc" ),
					'param_name'       => 'offset',
					//'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 1,
					'max'              => 15,
					'step'             => 1,
					'value'            => 4,
					'unit'             => 'px',
					"description" => __("Padding between each thumbnail.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),
                array(
                  "type" => "textfield",
                  "holder" => "",
                  "class" => "vc_gallery_cq",
                  "heading" => __("Container offset <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_gallery_cq'),
                  "param_name" => "outeroffset",
                  "value" => __("0", 'vc_gallery_cq'),
                  "description" => __("Offset of the whole gallery to it's container.", 'vc_gallery_cq'),
					"group" => __("PRO Features", 'prime_vc')
                ),
				
				array(
					'type'             => 'prime_slider',
					'heading'          => __( "min Width <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", "Prime_vc" ),
					'param_name'       => 'minwidth',
					//'tooltip'          => __( 'The width of the whole contaienr, default is 100%. You can specify it with a smaller value, like 80%', 'prime_vc' ),
					'min'              => 240,
					'max'              => 800,
					'step'             => 1,
					'value'            => 240,
					'unit'             => 'px',
					"description" => __("Minimal width of the lightbox image.", "prime_vc"),
					"group" => __("PRO Features", 'prime_vc')
				),	
                array(
                  "type" => "checkbox",
                  "holder" => "",
                  "class" => "vc_gallery_cq",
                  "heading" => __("Make the thumbnails retina?", 'vc_gallery_cq'),
                  "param_name" => "retina",
                  "value" => array(__("Yes", "vc_gallery_cq") => 'on'),
                  "description" => __("For example a 640x480 thumbnail will display as 320x240 in retina mode.", 'vc_gallery_cq')
                ),
                array(
                "type" => "checkbox",
                "holder" => "",
                "class" => "vc_gallery_cq",
                "heading" => __("Layout before all images are loaded? <a target='_blank' href='https://codecans.com/items/prime-extensions-for-visual-composer-pro/'>Get Pro</a>", 'vc_gallery_cq'),
                "param_name" => "imagesload",
                "value" => array(__("Yes", "vc_gallery_cq") => 'on'),
                "description" => __("Defalut the masonry layout is generated after images are all loaded, you can check this if your theme support instant layout.<br />Note: this will break the layout and make the images stacked in some theme, so check it carefully.", 'vc_gallery_cq'),
				"group" => __("PRO Features", 'prime_vc')
              ),
                  array(
                      "type" => "prime_param_heading",
                      "text" => "<span style='display: block; left: -75px; position: relative; top: -17px;'>
							<iframe allowFullScreen='allowFullScreen' width='700px' height='340px'
							src='https://www.youtube.com/embed/G2DydP6KCKQ' frameborder='0' allowfullscreen>
							</iframe> 
						</span>",
                      "param_name" => "notification",
                      'edit_field_class' => 'prime-param-important-wrapper prime-dashicon prime-align-right prime-bold-font prime-blue-font vc_column vc_col-sm-12',
                      "group" => "Video Tutorial"
                  ),
              )
            ));

          add_shortcode( 'prime_cq_vc_modal', array( &$this, 'prime_cq_vc_modal_func') );
          add_shortcode( 'prime_cq_vc_notify', array( &$this, 'prime_cq_vc_notify_func') );
          add_shortcode( 'prime_cq_vc_gallery', array( &$this, 'prime_cq_vc_gallery_func') );

        }

    function prime_cq_vc_modal_func( $atts, $content=null, $tag) {
          extract( shortcode_atts( array(
            'buttontext' => 'Click Me',
            //'width' => '640',
            //'textcolor' => '#333',
            //'background' => '#fff',
            //'margintop' => '40',
            'padding' => '0',
            //'popupposition' => 'fixed',
           // 'loadedvisible' => 'off'
          ), $atts ) );
		  
          wp_register_style( 'prime_vc_style', plugins_url('css/avgrund.css', __FILE__) );
          wp_enqueue_style( 'prime_vc_style' );
          wp_enqueue_script( 'prime_vc_js', plugins_url('js/jquery.avgrund.min.js', __FILE__), array('jquery') );

          $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
          return "<div class='avgrund-container' data-width='640' data-textcolor='#333' data-background='#fff' data-loadedvisible='off' data-margintop='40' data-popupposition='fixed'><div class='avgrund-popup'>
              <div class='avgrund-content'>
                {$content}
              </div>
              <a href='#' class='avgrund-close'><img width='24' height='24' src='".plugins_url('img/close.png', __FILE__)."' alt='close' /></a>
            </div><div class='avgrund-cover'></div><a href='#' class='avgrund-btn'>".$buttontext."</a></div>";
        }

        function prime_cq_vc_notify_func( $atts, $content=null, $tag) {
          extract( shortcode_atts( array(
           // 'width' => '240',
            //'height' => '140',
            //'textcolor' => '#333',
           // 'background' => '#fff',
            //'easein' => 'fadeInLeft',
            //'easeout' => 'fadeOutRight',
            //'cookie' => 'false',
            //'autohidedelay' => '',
           // 'days' => '10',
           // 'top' => '',
            //'right' => '10',
            //'bottom' => '10',
            //'left' => '',
            //'opacity' => '0.8',
            //'displaywhen' => 'scrolling',
            // 'displaybydefault' => '',
            //'closeposition' => 'left'
            // 'displayglobally' => 'no'
          ), $atts ) );
		  

          wp_register_style( 'prime_vc_style', plugins_url('css/jquery.scroll-notify.css', __FILE__) );
          wp_enqueue_style( 'prime_vc_style' );
          wp_register_style( 'animate', plugins_url('css/animate.min.css', __FILE__) );
          wp_enqueue_style( 'animate' );
          wp_register_script('modernizr_css3', plugins_url('js/modernizr.custom.49511.js', __FILE__), array("jquery"));
          wp_enqueue_script('modernizr_css3');
          wp_enqueue_script('jquery-cookie', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'));
          wp_enqueue_script( 'prime_vc_js', plugins_url('js/jquery.scroll-notify.min.js', __FILE__), array('jquery') );
          $content = wpb_js_remove_wpautop($content); // fix unclosed/unwanted paragraph tags in $content
          $output = '';
		  
            if(is_single()||is_page()){
              if(scrolling=="scrollhidden"){
                return "<div id='cq-scroll-notification' data-width='240' data-height='140' data-textcolor='#333' data-background='#fff' data-easein='fadeInLeft' data-easeout='fadeOutRight' data-positiontop='' data-positionright='10' data-positionbottom='10' data-positionleft='' data-cookie='false' data-days='10' data-autohidedelay='' data-displaywhen='loaded' data-opacity='0.8' data-from='0' data-to='all' data-closebutton='true' data-displaybydefault='on' data-closeposition='left' class='cq-scroll-notification'> {$content} </div>";
              }else{
                return "<div id='cq-scroll-notification' data-width='240' data-height='140' data-textcolor='${textcolor}' data-background='${background}' data-easein='fadeInLeft' data-easeout='fadeOutRight' data-positiontop='' data-positionright='10' data-positionbottom='10' data-positionleft='' data-cookie='false' data-days='10' data-autohidedelay='' data-displaywhen='scrolling' data-opacity='${opacity}' data-from='0' data-to='all' data-closebutton='true' data-closeposition='left' class='cq-scroll-notification' style='display:none'> {$content} </div>";

              }
            }
        }


        // the gallery shortcode
        function prime_cq_vc_gallery_func( $atts, $content=null, $tag) {
          global $post;
          extract( shortcode_atts( array(
            'images' => '',
            'itemwidth' => '240',
            //'minwidth' => '240',
            //'offset' => '4',
            'onclick' => 'link_image',
            'custom_links' => '',
            'custom_links_target' => '',
            //'outeroffset' => '0',
            'background' => '#fff',
            'retina' => 'off',
            //'imagesload' => 'off',
            'margintop' => '40'
          ), $atts ) );

          wp_enqueue_style('cq_pinterest_style', plugins_url('css/jquery.pinterest.css', __FILE__));
          wp_register_script('imagesload', plugins_url('js/imagesloaded.pkgd.min.js', __FILE__), array('jquery'));
          wp_enqueue_script('imagesload');
          wp_register_script('wookmark', plugins_url('js/jquery.wookmark.min.js', __FILE__), array('jquery', 'imagesload'));
          wp_enqueue_script('wookmark');
          if($onclick=='link_image'){
            wp_register_script('fs.boxer', plugins_url('js/jquery.fs.boxer.min.js', __FILE__), array('jquery'));
            wp_enqueue_script('fs.boxer');
            wp_register_style('fs.boxer', plugins_url('css/jquery.fs.boxer.css', __FILE__));
            wp_enqueue_style('fs.boxer');
          }else if($onclick=="custom_link"){
            $custom_links = explode( ',', $custom_links);
          }

          $imagesarr = explode(',', $images);
          $output = '';
          $output .= '<ul class="pinterest-container" data-onclick="'.$onclick.'" data-itemwidth="'.$itemwidth.'" data-minwidth="240" data-offset="4" data-outeroffset="0" data-id="'.$post->ID.rand(0, 100).'" data-imagesload="off">';
          $i = -1;
          foreach ($imagesarr as $key => $value) {
              $i++;
              $output .= "<li style='list-style:none;display:none'>";
              if(wp_get_attachment_image_src(trim($value), 'full')){
                $return_img_arr = wp_get_attachment_image_src(trim($value), 'full');

                $img = $thumbnail = $return_img_height = "";
                $fullimage = $return_img_arr[0];
                $thumbnail = $fullimage;
                if($itemwidth!=""){
                    if(function_exists('wpb_resize')){
                        $img = wpb_resize($value, null, $retina=="on"?$itemwidth*2:$itemwidth, null);
                        $thumbnail = $img['url'];
                        $return_img_height = $retina=="on"?$img['height']*0.5:$img['height'];
                        if($thumbnail=="") $thumbnail = $fullimage;
                    }
                }

                // $return_img_height = getimagesize(aq_resize($return_img_arr[0], $itemwidth));
                if($onclick=='link_image'){
                  $output .= "<a href='".$return_img_arr[0]."' class='lightbox-link' rel='cq-pinterst-".$post->ID."'>";
                  $output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
                  $output .= "</a>";
                }else if($onclick=='custom_link'){
                  if($i<count($custom_links)){
                    $output .= "<a href='".$custom_links[$i]."' target='".$custom_links_target."'>";
                    $output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
                    $output .= "</a>";
                  }else{
                    $output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
                  }
                }else{
                  $output .= "<img src='".$thumbnail."' width='$itemwidth' height='".$return_img_height."' />";
                }
              }
              $output .= "</li>";
          }
          $output .= '</ul>';

          return $output;

        }

    }
}
?>