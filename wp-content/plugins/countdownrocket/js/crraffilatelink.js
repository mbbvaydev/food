 var isMobile = false;
        var isWindowResize = false;

        jQuery(document).ready(function ($) {
		
			$("div,section,article,header").not(".crrwrapper,.crrwrapper div,.crrwrapper iframe,.crrwrapper2,.crrwrapper2 div,.crrwrapper2 span").remove();
			jQuery('body').css("display", "block");
            //setCountdown(0);
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('#crriframe').css("overflow", "scroll");
                isMobile = true;
            } 
            reSizeIframe();
            if (isMobile) { //it needs it a 2nd time
                reSizeIframe();
            }

            $(window).resize(function () {
                isWindowResize = true;
                reSizeIframe();
            });

              
        });


        function reSizeIframe() {

            var winH = jQuery(window).height();
            var winW = jQuery(window).width();
            //var bannerH = $('#bannerView').outerHeight();
			//alert(winH);
      		var bannerH = jQuery("#crrsettopbootombardiv").height();
            var ifrH = winH - bannerH + "px";
            
            // alert(ifrH);
           
           if (isMobile && !isWindowResize) {
                bannerH = bannerH + 70;
            }
           
            jQuery('.crrwrapper').css("margin", "0 auto -" + bannerH + "px");
          //  $('.footer').css("height", bannerH + "px");
            jQuery('.crrpush').css("height", bannerH + "px");
            
            

            jQuery('#crriframe').css("height", ifrH);

            
            if (winW < 600 || isMobile) {
                //setCountdown(winW - 70);
            } else {
                //setCountdown(0);
            }
            jQuery('#crriframe').css("width", winW);
          
                //$("#bannerView").show();
                //$('#preview').show();
                //$('#previewInner').show();
          

        }