<?php

function __construct() {
    
vc_add_shortcode_param( 'prime_custom_notice', 'prime_notice_filed_type' );
function prime_notice_filed_type( $settings, $value ) {
   return '<div class="prime_custom_notice">
			   <h1>codecans</h1>
			</div>';
    }

}