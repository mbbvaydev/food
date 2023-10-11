
/*----------------------------------------------------------------------------*\
	VISUAL COMPOSER - DIVIDERS
\*----------------------------------------------------------------------------*/
( function( $ ) {
	"use strict";

	var $panel = $( '#vc_ui-panel-edit-element' );

	/* Wrap dividers and fields in sections */
	$panel.on( 'vcPanel.shown', function() {
		var $dividers = $( '.vc_wrapper-param-type-prime_divider' );

		if( typeof tinyMCE !== 'undefined' ) {
			if ( tinyMCE.get( 'wpb_tinymce_content' ) ) {
				var _formated_content = tinyMCE.get( 'wpb_tinymce_content' ).getContent();
			}
			tinyMCE.EditorManager.execCommand( 'mceRemoveEditor', true, 'wpb_tinymce_content' );
		}

		$dividers.each( function() {
			var $divider = $( this ),
				$fields  = $divider.nextUntil( '.vc_wrapper-param-type-prime_divider, .vc_shortcode-param.prime-no-wrap' ),
				$wrapper = $( '<div class="prime-vc-wrapper' + ( $divider.is( '.prime-vc-highlight' ) ? ' prime-vc-highlight' : '' ) + '" />' ),
				$indent  = $( '<div class="prime-vc-indent" />' );

			$divider.before( $wrapper );
			$wrapper.append( $divider );

			if ( $divider.is( '[data-vc-shortcode-param-name*="border_divider"], [data-vc-shortcode-param-name*="padding_divider"], [data-vc-shortcode-param-name*="margin_divider"]' ) ) {
				// $fields.find( 'input:not(.prime-vc-css):not(.prime-extra-field), select' ).addClass( 'prime-ignored-field' );
				$fields.filter( ':not(.prime-extra-field)' ).find( 'input:not(.prime-vc-css), select' ).addClass( 'prime-ignored-field' );
			}

			if ( $fields.length ) {
				$indent.append( $fields );
				$wrapper.append( $indent );
			}
		} );

		if( typeof tinyMCE !== 'undefined' ) {
			tinyMCE.EditorManager.execCommand( 'mceAddEditor', true, 'wpb_tinymce_content' );
			if ( typeof _formated_content !== typeof undefined ) {
				tinyMCE.get( 'wpb_tinymce_content' ).setContent( _formated_content );
			}
		}

		$panel.trigger( 'prime.render' );
	} );

	/* Hide indented sections on param update */
	$panel.on( 'change', '.wpb_el_type_prime_divider', function() {
		var $divider = $( this );

		if ( $divider.is( '.vc_dependent-hidden' ) ) {
			$divider.parent( '.prime-vc-wrapper' ).addClass( 'vc_dependent-hidden' );
		} else {
			$divider.parent( '.prime-vc-wrapper' ).removeClass( 'vc_dependent-hidden' );
		}
	} );

	/* Hide indented sections on panel init */
	$panel.on( 'prime.render', function() {
		$( '.wpb_el_type_prime_divider' ).each( function() {
			var $divider = $( this );

			if ( $divider.is( '.vc_dependent-hidden' ) ) {
				$divider.parent( '.prime-vc-wrapper' ).addClass( 'vc_dependent-hidden' );
			} else {
				$divider.parent( '.prime-vc-wrapper' ).removeClass( 'vc_dependent-hidden' );
			}
		} );
	} );
} )( jQuery );