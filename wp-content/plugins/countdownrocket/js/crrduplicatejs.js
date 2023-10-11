jQuery( document ).ready( function() {
	jQuery( '.crrduplicatepagepost' ).click( function( e ) {
		e.preventDefault();
		var data = {
			action: 'crr_pagepost_duplicate',
			original_id: jQuery(this).attr('href'),
			security: jQuery(this).attr('rel')
		};
		jQuery.post( ajaxurl, data, function( response ) {
			location.reload();
		});
	});
	
	/*if(jQuery('#crr_pe_expireafter').val() == 0)
	{
		jQuery('#crr_pe_expirepagevisiby').html("<option value='2'>Fixed for All</option>");
	}
	else
	{
		jQuery('#crr_pe_expirepagevisiby').html("<option value='0'>IP</option><option value='1'>Cookie</option><option value='2'>Fixed for All</option>");
	}*/
	
	jQuery('#crr_pe_expireafter').change(function()
		  {
			  if(jQuery(this).val() == "0")
			  {
			  	jQuery('#crr_pe_expirepagevisiby').html("<option value='2'>Fixed for All</option>");
			  }
			  else
			  {
			  	jQuery('#crr_pe_expirepagevisiby').html("<option value='0'>IP</option><option value='1'>Cookie</option><option value='2'>Fixed for All</option>");
			  }
		  });
	
	
	jQuery("#posttopbottombarjscrr #crrset_posttopbottombarcheckall").click(function () {
				if (jQuery("#posttopbottombarjscrr #crrset_posttopbottombarcheckall").is(':checked')) {
					jQuery("#posttopbottombarjscrr input[type=checkbox]").each(function () {
						jQuery(this).prop("checked", true);
					});
		
				} else {
					jQuery("#posttopbottombarjscrr input[type=checkbox]").each(function () {
						jQuery(this).prop("checked", false);
					});
				}
			});
			
			jQuery("#pagetopbottombarjscrr #crrset_pagetopbottombarcheckall").click(function () {
				if (jQuery("#pagetopbottombarjscrr #crrset_pagetopbottombarcheckall").is(':checked')) {
					jQuery("#pagetopbottombarjscrr input[type=checkbox]").each(function () {
						jQuery(this).prop("checked", true);
					});
		
				} else {
					jQuery("#pagetopbottombarjscrr input[type=checkbox]").each(function () {
						jQuery(this).prop("checked", false);
					});
				}
			});
		 
});
function crrpreviewhandleClicking(myRadio) {
		if(myRadio.value == "1")
		{
			document.getElementById("crrcountdownsize3").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="3";
			
			document.getElementById("crr_pe_counterbgwidth").value="700";	
			document.getElementById("crr_pe_countercdholdercolor").value="404040";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="6E6E6E";
			
			document.getElementById("crr_pe_counterbgopacity").value="0";
			document.getElementById("crr_pe_counterbgcolor").value="3C3C3C";
			document.getElementById("crr_pe_counterbgbottomcolor").value="2C2C2C";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterborderwidth").value="2";
			document.getElementById("crr_pe_counterbordercolor").value="000000";
			document.getElementById("crr_pe_counterborderradius").value="6";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="210505";
			document.getElementById("crr_pe_countertextothercolor").value="000000";
			
			document.getElementById("crrpreview1").style.display="";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "2")
		{
			document.getElementById("crrcountdownsize3").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="3";
			
			document.getElementById("crr_pe_counterbgwidth").value="570";	
			document.getElementById("crr_pe_countercdholdercolor").value="404040";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="6E6E6E";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="B5B5B5";
			document.getElementById("crr_pe_counterbgbottomcolor").value="7E7E7E";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="333333";
			
			document.getElementById("crr_pe_counterborderwidth").value="2";
			document.getElementById("crr_pe_counterbordercolor").value="000000";
			document.getElementById("crr_pe_counterborderradius").value="6";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="FAFAFA";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "3")
		{
			document.getElementById("crrcountdownsize2").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="1";
			
			document.getElementById("crr_pe_counterbgwidth").value="450";	
			document.getElementById("crr_pe_countercdholdercolor").value="EBEBEB";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="444444";
			document.getElementById("crr_pe_counterbgbottomcolor").value="444444";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterborderwidth").value="";
			document.getElementById("crr_pe_counterbordercolor").value="D60000";
			document.getElementById("crr_pe_counterborderradius").value="10";
			document.getElementById("crr_pe_countertextborderwidth").value="5";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="FFFFFF";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "4")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="C5E0DC";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="DEF4F1";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="E08E79";
			document.getElementById("crr_pe_counterbgbottomcolor").value="C47662";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="ECE5CE";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="ECE5CE";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="7D7459";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "5")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="3E4651";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="363E48";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="FC4349";
			document.getElementById("crr_pe_counterbgbottomcolor").value="F03B41";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FAFAFA";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="CC2B30";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="FAFAFA";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "6")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="E0E4CC";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="EEF1DD";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="FA6900";
			document.getElementById("crr_pe_counterbgbottomcolor").value="E36002";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FAFAFA";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="FEFEFE";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="1F1F1F";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "7")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="F1A101";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="FFAA00";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="FFD073";
			document.getElementById("crr_pe_counterbgbottomcolor").value="FFBF40";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="A66F00";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="A66F00";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="1A1A1A";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "8")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="258BB3";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="4EBAE4";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="2F2F2F";
			document.getElementById("crr_pe_counterbgbottomcolor").value="111111";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FAFAFA";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="FEFEFE";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="FAFAFA";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "9")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="E1E1E1";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="FCFCFC";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="EE0101";
			document.getElementById("crr_pe_counterbgbottomcolor").value="BD0101";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FAFAFA";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="CC2B30";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="262626";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "10")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="605";	
			document.getElementById("crr_pe_countercdholdercolor").value="010101";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="3F3F3F";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="F8F8F8";
			document.getElementById("crr_pe_counterbgbottomcolor").value="BFBFBF";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="333333";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="333333";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="FAFAFA";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "11")
		{
			document.getElementById("crrcountdownsize2").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="2";
			
			document.getElementById("crr_pe_counterbgwidth").value="400";	
			document.getElementById("crr_pe_countercdholdercolor").value="FFFFFF";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="000000";
			document.getElementById("crr_pe_counterbgbottomcolor").value="000000";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterborderwidth").value="1";
				document.getElementById("crr_pe_counterbordercolor").value="000000";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D60000";
			document.getElementById("crr_pe_countertextothercolor").value="111111";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "12")
		{
			document.getElementById("crrcountdownsize1").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="1";
			
			document.getElementById("crr_pe_counterbgwidth").value="550";	
			document.getElementById("crr_pe_countercdholdercolor").value="FFFFFF";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="FFFFFF";
			
			document.getElementById("crr_pe_counterbgopacity").value=".01";
			document.getElementById("crr_pe_counterbgcolor").value="FFFFFF";
			document.getElementById("crr_pe_counterbgbottomcolor").value="FFFFFF";
			document.getElementById("crr_pe_counterdigitbgopacity").value=".01";
			document.getElementById("crr_pe_counterdigitcolor").value="000000";
			
			document.getElementById("crr_pe_counterborderwidth").value="2";
				document.getElementById("crr_pe_counterbordercolor").value="000000";
			document.getElementById("crr_pe_counterborderradius").value="";
			document.getElementById("crr_pe_countertextborderwidth").value="2";
			document.getElementById("crr_pe_countertextbordercolor").value="000000";
			document.getElementById("crr_pe_countertextothercolor").value="000000";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="";
			document.getElementById("crrpreview13").style.display="none";
		}
		else if(myRadio.value == "13")
		{
			document.getElementById("crrcountdownsize3").checked = true;
			document.getElementById("crr_pe_expireafter").value="2";
			document.getElementById("crr_pe_datetime").value="00:12:21:10";		
			document.getElementById("crr_pe_expirepagevisiby").value="2";	
			document.getElementById("crr_pe_redirecturl").value="http://www.countdownrocket.com";			

			document.getElementById("crr_pe_onfinish").value="0";
			document.getElementById("crr_pe_imageurl").value="";
			document.getElementById("crr_pe_cdstyle").value="3";
			
			document.getElementById("crr_pe_counterbgwidth").value="570";	
			document.getElementById("crr_pe_countercdholdercolor").value="191919";
			document.getElementById("crr_pe_countercontbgbottomcolor").value="191919";
			
			document.getElementById("crr_pe_counterbgopacity").value="1";
			document.getElementById("crr_pe_counterbgcolor").value="FAFAFA";
			document.getElementById("crr_pe_counterbgbottomcolor").value="F5F5F5";
			document.getElementById("crr_pe_counterdigitbgopacity").value="1";
			document.getElementById("crr_pe_counterdigitcolor").value="000000";
			
			document.getElementById("crr_pe_counterborderwidth").value="2";
			document.getElementById("crr_pe_counterbordercolor").value="000000";
			document.getElementById("crr_pe_counterborderradius").value="6";
			document.getElementById("crr_pe_countertextborderwidth").value="";
			document.getElementById("crr_pe_countertextbordercolor").value="D6D6d6";
			document.getElementById("crr_pe_countertextothercolor").value="FAFAFA";
			
			document.getElementById("crrpreview1").style.display="none";
			document.getElementById("crrpreview2").style.display="none";
			document.getElementById("crrpreview3").style.display="none";
			document.getElementById("crrpreview4").style.display="none";
			document.getElementById("crrpreview5").style.display="none";
			document.getElementById("crrpreview6").style.display="none";
			document.getElementById("crrpreview7").style.display="none";
			document.getElementById("crrpreview8").style.display="none";
			document.getElementById("crrpreview9").style.display="none";
			document.getElementById("crrpreview10").style.display="none";
			document.getElementById("crrpreview11").style.display="none";
			document.getElementById("crrpreview12").style.display="none";
			document.getElementById("crrpreview13").style.display="";
		}
}