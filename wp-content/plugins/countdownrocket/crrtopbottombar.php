<?php 
$backtopbotbartopcolor = $crrset_barbackgroundcolor1[$y];
$backtopbotbarbotcolor = $crrset_barbackgroundbottomcolor1[$y];
$backtopbotbaropacity = $crrset_makebgtransparent1[$y];

$abctopcolor1 = rtcdr1menuppHexToRGB2($backtopbotbartopcolor);
$cdholdertopdinalcolor1 = 'rgba('.$abctopcolor1[r].', '.$abctopcolor1[g].', '.$abctopcolor1[b].', '.$backtopbotbaropacity.')';

$abctopcolor2 = rtcdr1menuppHexToRGB2($backtopbotbarbotcolor);
$cdholdertopdinalcolor2 = 'rgba('.$abctopcolor2[r].', '.$abctopcolor2[g].', '.$abctopcolor2[b].', '.$backtopbotbaropacity.')';
?>
<style>
#crrsettopbootombardiv2{
background-color: <?php echo $cdholdertopdinalcolor1; ?> !important;
background-image: -moz-linear-gradient(center top , <?php echo $cdholdertopdinalcolor1; ?>, <?php echo $cdholdertopdinalcolor2; ?>);
background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(<?php echo $cdholdertopdinalcolor1 ?>), to(<?php echo $cdholdertopdinalcolor2 ?>));
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $backtopbotbartopcolor ?>, endColorstr=#<?php echo $backtopbotbarbotcolor ?>);
-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo $backtopbotbartopcolor ?>, endColorstr=#<?php echo $backtopbotbarbotcolor ?>)";
}
</style>
<div class="crrwrapper2" id="crrsettopbootombardiv" style=" <?php echo $crrset_barposition1[$y]; ?>:0;left:0;right:0; <?php if($crrset_disablesticky1[$y] != 'true') { echo 'position:fixed;';} else if($crrset_disablesticky1[$y] == 'true' && $crrset_barposition1[$y] == 'top') { echo 'position:absolute;'; } ?>">
<div id="crrsettopbootombardiv2" style="text-align:center;width:<?php $outerwidth = $crrset_barwidth1[$y]; echo $outerwidth;?>%;<?php if($crrset_barborderwidth1[$y] != '') { ?> border: <?php echo $crrset_barborderwidth1[$y].'px '.$crrset_barborderstyle1[$y].' #'.$crrset_barbordercolor1[$y];?> ;<?php } ?>">
<span style=" <?php if($crrset_showclosebutton1[$y] == 'true') { echo 'display:inline-block;'; } ?>width:<?php if($crrset_showclosebutton1[$y] == 'true') { $innerwidth = 100 - 5; } else { $innerwidth = 100; } echo $innerwidth;?>%;">
<?php if($crrset_contentbeforecountdown1[$y] != '') { ?>
<div class="inlinedivs" style="font-family:<?php echo $crrset_contentfontfamily1[$y]; ?>;color:#<?php echo $crrset_contentfontcolor1[$y]; ?>;font-size:<?php if($crrset_contentfontsize1[$y] == '') { echo '20'; } else { echo $crrset_contentfontsize1[$y]; } ?>px;">
<?php echo do_shortcode($crrset_contentbeforecountdown1[$y]); ?>
</div>
<?php } ?>
<div class="inlinedivs inlinedivscen" style="width:<?php if($crrset_contentcountdownwidth1[$y] == '') { echo '30'; } else { echo $crrset_contentcountdownwidth1[$y]; } ?>%;">
<?php echo do_shortcode('[countdownrocket id="'.$crrset_baroptin1[$y].'"]');?>
</div>
<?php if($crrset_contentaftercountdown1[$y] != '') { ?>
<div class="inlinedivs" style="font-family:<?php echo $crrset_contentfontfamily1[$y]; ?>;color:#<?php echo $crrset_contentfontcolor1[$y]; ?>;font-size:<?php if($crrset_contentfontsize1[$y] == '') { echo '20'; } else { echo $crrset_contentfontsize1[$y]; } ?>px;">
<?php echo do_shortcode($crrset_contentaftercountdown1[$y]); ?>
</div>
<?php } ?>
</span>
<?php if($crrset_showclosebutton1[$y] == 'true') { ?>
<span id="crrsettopbootombardivdelete" style="background: url(<?php echo plugins_url('images/closebar.png', __FILE__)?>) no-repeat center;padding:0 15px;" onClick="crrsetcloseBottom()"></span>
<?php } ?>
<div style="clear:both"></div>
</div>
</div>
<?php if($crrset_affiliatelinkurl1[$y] != '' && $crrset_enablebarposition1[$y] == 'true') { ?>
    <div class="crrwrapper" id="crrcontent" style="margin: 0px auto -114px;height:auto !important;overflow:scroll;position:fixed;">
	<!--   <div id="crriframe" style="width: 1280px; overflow-y:auto !important;-webkit-overflow-scrolling:touch !important; height: 466px;"> -->
     <div id="crriframe" style="width: 1280px;-webkit-overflow-scrolling:touch !important; height: 466px;">
            <iframe src="<?php echo $crrset_affiliatelinkurl1[$y];?>" id="crrifr" style="border: 0;width:100%;height:100%;overflow:auto;">Your browser doesn't support iFrames.</iframe>
        </div>
        <div class="crrpush" style="height: 114px;"></div>
    </div>
    
<?php } ?>