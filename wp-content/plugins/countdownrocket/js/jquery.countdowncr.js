	/**
 * @name		jQuery Countdown Plugin
 * @author		Martin Angelov
 * @version 	1.0
 * @url			http://tutorialzine.com/2011/12/countdown-jquery/
 * @license		MIT License
 */
(function($){
	
	// Number of seconds in every time division
	var days	= 24*60*60,
		hours	= 60*60,
		minutes	= 60;
	
	// Creating the plugin
	$.fn.countdowncr = function(prop){
		
		var options = $.extend({
			callback	: function(){},
			timestamp	: 0
		},prop);
		
		var left, d, h, m, s, positions;
		// Initialize the plugin
		init(this, options);
		
		positions = this.find('.position');
		
		(function tick(){
			
			// Time left
			left = Math.floor((options.timestamp - (new Date())) / 1000);
			
			if(left < 0){
				left = 0;
			}
			
			// Number of days left
			d = Math.floor(left / days);
			updateDuo(0, 1, d);
			left -= d*days;
			
			// Number of hours left
			h = Math.floor(left / hours);
			updateDuo(2, 3, h);
			left -= h*hours;
			
			// Number of minutes left
			m = Math.floor(left / minutes);
			updateDuo(4, 5, m);
			left -= m*minutes;
			
			// Number of seconds left
			s = left;
			updateDuo(6, 7, s);
			
			// Calling an optional user supplied callback
			options.callback(d, h, m, s);
			
			// Scheduling another call of this function in 1s
			setTimeout(tick, 1000);
		})();
		
		// This function updates two digit positions at once
		function updateDuo(minor,major,value){
			switchDigit(positions.eq(minor),Math.floor(value/10)%10);
			switchDigit(positions.eq(major),value%10);
		}
		
		return this;
	};
	function init(elem, options){
		elem.addClass('countdownHolder');
		elem.addClass('row');
		if(options.csize == 1)
		{
			elem.addClass('squaresetwidth');
		}
		if(options.csize == 2)
		{
			elem.addClass('squaresetwidthmed');
		}
		if(options.csize == 3)
		{
			elem.addClass('squaresetwidthsm');
		}
		if(options.csize == 4)
		{
			elem.addClass('sepsquaresetwidth');
		}
		if(options.csize == 5)
		{
			elem.addClass('sepsquaresetwidthmed');
		}
		if(options.csize == 6)
		{
			elem.addClass('sepsquaresetwidthsm');
		}
		if(options.csize == 7)
		{
			elem.addClass('sepsquaresetwidth2');
		}
		if(options.csize == 8)
		{
			elem.addClass('sepsquaresetwidth2med');
		}
		if(options.csize == 9)
		{
			elem.addClass('sepsquaresetwidth2sm');
		}
		// Creating the markup inside the container
		if(options.csize == 3)
		{
			$.each(['Days','Hours','Mins','Secs'],function(i){
			$('<div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1 count'+this+'">' +
	'<div class="countalign">' +
	'<span class="position">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position2">' +this+'</span>' +
	'</div>' +
'</div>').appendTo(elem);
			
		});
		}
		else if(options.csize == 4 || options.csize == 5 || options.csize == 6 || options.csize == 7 || options.csize == 8 || options.csize == 9)
		{
			$.each(['Days','Hours','Minutes','Seconds'],function(i){
			$('<div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1 count'+this+'">' +
	'<div class="countaligns">' +
	'<span class="position crposition2">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position crposition2">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position2">' +this+'</span>' +
	'</div>' +
'</div>').appendTo(elem);
			
		});
		}
		else
		{
			$.each(['Days','Hours','Minutes','Seconds'],function(i){
			$('<div class="col-md-2 col-md-offset-1 col-sm-2 col-sm-offset-1 col-xs-2 col-xs-offset-1 count'+this+'">' +
	'<div class="countalign">' +
	'<span class="position">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position">' +
		'<span class="digit static">0</span>' +
	'</span>' +
	'<span class="position2">' +this+'</span>' +
	'</div>' +
'</div>').appendTo(elem);
			
		});
		}
	}
	// Creates an animated transition between the two numbers
	function switchDigit(position,number){
		
		var digit = position.find('.digit')
		
		if(digit.is(':animated')){
			return false;
		}
		
		if(position.data('digit') == number){
			// We are already showing this number
			return false;
		}
		
		position.data('digit', number);
		
		var replacement = $('<span>',{
			'class':'digit',
			css:{
				top:'-2.1em',
				opacity:0
			},
			html:number
		});
		
		// The .static class is added when the animation
		// completes. This makes it run smoother.
		
		digit
			.before(replacement)
			.removeClass('static')
			.animate({top:'2.5em',opacity:0},'fast',function(){
				digit.remove();
			})
		replacement
			.delay(100)
			.animate({top:0,opacity:1},'fast',function(){
				replacement.addClass('static');
			});
	}
})(jQuery);