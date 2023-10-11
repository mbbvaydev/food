jQuery(document).ready(function($) {
 $( "#crraffaccordion" )
.accordion({
collapsible: true,
heightStyle: "content",
header: "> div > h3"
})
.sortable({
axis: "y",
handle: "h3",
stop: function( event, ui ) {
// IE doesn't register the blur when sorting
// so trigger focusout handlers to remove .ui-state-focus
ui.item.children( "h3" ).triggerHandler( "focusout" );
}
});

$('.btnDelscrr').click(function(e){
			var current_del = $(this).parent().parent();
			var myvideogvp = current_del.siblings('.group');
        if (myvideogvp.length === 0) {
            alert("You should atleast have one record.");
            return;
        }
			//current_del.next("div").remove();
          //$(this).parent().remove();
		  current_del.remove();
        });
		
		
		$('.addaffcountcrr').click(function(e){

		var lastRepeatingGroup = $('.group').last();
		//var lastRepeatingGrouphead = $('.collheading').last();
        var cloned2 = lastRepeatingGroup.clone(true) ;
		//var cloned1 = lastRepeatingGrouphead.clone(true) ;
        cloned2.insertAfter(lastRepeatingGroup);
		
		$('.class1:last').val('New Affiliate Countdown');
		$('.class2:last').prop('checked', true);
		$('.class3:last').val('bottom');
		$('.class4:last').val('100');
		//$('.class5:last').val('191919');
		//$('.class6:last').val('191919');
		$('.class7:last').val('1');
		
		$('.class8:last').val('');
		$('.class9:last').val('solid');
		//$('.class10:last').val('000000');
		$('.class11:last').prop('checked', false);
		$('.class12:last').prop('checked', false);
		$('.class14:last').val('45');
		$('.class15:last').val('Mark Bonus Expires In:');
		
		$('.class16:last').val('');
		$('.class17:last').val('Arial, Helvetica, sans-serif');
		$('.class18:last').val('34');
		//$('.class19:last').val('FFFFFF');
		$('.class20:last').val('http://www.cnn.com');
		$('.class21:last').val('0');


var num = 0;
$(".class5").each(function() {
    num++;
});
num=num-1;
		var myPicker = new jscolor.color(document.getElementsByClassName("class5")[num], {})
		myPicker.fromString('191919');
		
		var num1 = 0;
$(".class6").each(function() {
    num1++;
});
num1=num1-1;
		var myPicker1 = new jscolor.color(document.getElementsByClassName("class6")[num1], {})
		myPicker1.fromString('191919');
		
		var num2 = 0;
$(".class10").each(function() {
    num2++;
});
num2=num2-1;
		var myPicker2 = new jscolor.color(document.getElementsByClassName("class10")[num2], {})
		myPicker2.fromString('000000');
		
		var num3 = 0;
$(".class19").each(function() {
    num3++;
});
num3=num3-1;
		var myPicker3 = new jscolor.color(document.getElementsByClassName("class19")[num3], {})
		myPicker3.fromString('FFFFFF');
	        });
});