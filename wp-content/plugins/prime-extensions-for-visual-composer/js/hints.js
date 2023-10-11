/*----------------------------------------------------------------------------*\
	VISUAL COMPOSER - HINTS
\*----------------------------------------------------------------------------*/
( function( $ ) {
	"use strict";

	var $panel = $( '#vc_ui-panel-edit-element' );

	$panel.on( 'vcPanel.shown', function() {
		var $params = $panel.find( '.vc_shortcode-param' );

		$params.each( function() {
			var $param    = $( this ),
				_settings = $param.data( 'param_settings' ),
				_tooltip  = '';

			if ( typeof _settings != 'undefined' && ( typeof _settings.tooltip != 'undefined' || typeof _settings.tooltip_title != 'undefined' ) ) {
				_tooltip += '<span class="prime-hint">?<span class="prime-hint-content"><span class="prime-hint-triangle"></span>';
					if ( typeof _settings.tooltip_title != 'undefined' ) {
						_tooltip += '<strong class="prime-hint-title">' + _settings.tooltip_title + '</strong>';
					}
					if ( typeof _settings.tooltip != 'undefined' ) {
						_tooltip += _settings.tooltip;
					}
				_tooltip += '</span></span>';

				$param.find( '.wpb_element_label' )
					.addClass( 'prime-with-tooltip' )
					.append( _tooltip );
			}
		} );

		$panel.on( 'mouseenter', '.prime-hint', function() {
			var $hint         = $( this ),
				_panel_center = $panel.offset().left + parseInt( $panel.width() / 2 );

			$hint.removeClass( 'prime-hint-right prime-hint-left' );

			if( _panel_center > $hint.offset().left ) {
				$hint.addClass( 'prime-hint-left' );
			} else {
				$hint.addClass( 'prime-hint-right' )
			}
		} );
	} );
} )( jQuery );
