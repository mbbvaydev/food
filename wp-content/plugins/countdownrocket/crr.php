<?php
/** 
 * Plugin Name: Countdown Rocket | Shared By Themes24x7.com
 * Plugin URI:  http://countdownrocket.com
 * Description: A fully responsive countdown plugin that you can use for coming soon pages, under construction pages or sacracy.
 * Version:     1.0.12
 * Author:      Mark Dulisse
 * Author URI:  http://markdulisse.com/blog
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once( plugin_dir_path( __FILE__ ) . 'crrscriprts.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/addcrrmetabox.php' );

/*define('BESTPLUGIN_UPDATER', plugin_dir_path( __FILE__ ).'plugin_update' );
define('BESTPLUGIN_UPHOST', 'http://www.licenseguardsoft.com/wp-content/plugins/wp-licenseguard-svr/updater/105802/105802.json'); 
require (BESTPLUGIN_UPDATER.'/plugin-update-checker.php');
$yqPpjF_UpdateChecker = new PluginUpdateChecker( BESTPLUGIN_UPHOST, __FILE__, 'cr-developer');


function addSecretKeyBzoYyI($query){
	$query['secret'] = get_option('BzoYyI_key_license');
	return $query;
}
$yqPpjF_UpdateChecker->addQueryArgFilter('addSecretKeyBzoYyI');*/

$shortcode_counter = 0;
function add_crr_shortcode($atts, $content = null) {
	if ( isset( $atts['id'] ) ) {
    $id = $atts['id'];
   	// get the meta from the post type
	$size         			= get_post_meta( $id, 'crr_pe_countdownsize', true );
	$borderwidth            = get_post_meta( $id, 'crr_pe_counterborderwidth', true );
	$bordercolor            = get_post_meta( $id, 'crr_pe_counterbordercolor', true );
	$cdholderbgcolor1        = get_post_meta( $id, 'crr_pe_countercdholdercolor', true );
	$cdbgopacity        = get_post_meta( $id, 'crr_pe_counterbgopacity', true );
	$cddigitbgopacity        = get_post_meta( $id, 'crr_pe_counterdigitbgopacity', true );
	$counterdigitbgcolor        = get_post_meta( $id, 'crr_pe_counterbgcolor', true );
	
	
	$abccontbg1cr = rtcdr1menuppHexToRGB2($cdholderbgcolor1);
	$cdholderbgcolor = 'rgba('.$abccontbg1cr[r].', '.$abccontbg1cr[g].', '.$abccontbg1cr[b].', '.$cdbgopacity.')';
	
	$abccontbg1cr1 = rtcdr1menuppHexToRGB2($counterdigitbgcolor);
	$cddigitbgcolor = 'rgba('.$abccontbg1cr1[r].', '.$abccontbg1cr1[g].', '.$abccontbg1cr1[b].', '.$cddigitbgopacity.')';
	
	$counterborderradius            = get_post_meta( $id, 'crr_pe_counterborderradius', true );
	
	if($counterborderradius == '')
	{
		$counterborderradius = 0;	
	}
	
	$cdcounterbgwidth            = get_post_meta( $id, 'crr_pe_counterbgwidth', true );
	$cdcountertextborderwidth    = get_post_meta( $id, 'crr_pe_countertextborderwidth', true );
	$cdcountertextbordercolor    = get_post_meta( $id, 'crr_pe_countertextbordercolor', true );
	$cdcountercdstyle    		 = get_post_meta( $id, 'crr_pe_cdstyle', true );
	
	$cdcountercontbgbottomcolor      = get_post_meta( $id, 'crr_pe_countercontbgbottomcolor', true );
	$cdcounterbgbottomcolor    		 = get_post_meta( $id, 'crr_pe_counterbgbottomcolor', true );
	$cdcountertextothercolor    	 = get_post_meta( $id, 'crr_pe_countertextothercolor', true );
	
	$abccontbg1crt = rtcdr1menuppHexToRGB2($cdcountercontbgbottomcolor);
	$cdholderbgcolort = 'rgba('.$abccontbg1crt[r].', '.$abccontbg1crt[g].', '.$abccontbg1crt[b].', '.$cdbgopacity.')';
	
	$abccontbg1crt2 = rtcdr1menuppHexToRGB2($cdcounterbgbottomcolor);
	$cdholderbgcolort2 = 'rgba('.$abccontbg1crt2[r].', '.$abccontbg1crt2[g].', '.$abccontbg1crt2[b].', '.$cddigitbgopacity.')';
	
	$sizeforjs = 1;
	
	//return $cdholderbgcolor . '||' . $cddigitbgcolor;
	wp_enqueue_script("crrcountdownlargehs1", plugins_url( '/js/jquery.countdowncr.js', __FILE__ ), false);
    if($size == "large")
    {
		/*$sizeforjs = 1;
        wp_enqueue_script("crrcountdownlargehs1", plugins_url( '/js/jquery.countdown2large.js', __FILE__ ), false);
        wp_register_style( 'crrcountdownlargecss1', 
        plugins_url( '/js/jquery.countdown2large.css', __FILE__ ), 
        array(), 
        '20120208', 
        'all' );
		wp_enqueue_style( 'crrcountdownlargecss1' );*/
		if($cdcountercdstyle == "1")
		{
			$sizeforjs = 1;
			wp_register_style( 'crrcountdownlargecss1', 
			plugins_url( '/js/jquery.countdown2large.css', __FILE__ ), 
			array(), 
			'20120208', 
			'all' );
			wp_enqueue_style( 'crrcountdownlargecss1' );
		}
		else
		{
			if($cdcountercdstyle == "2")
			{
				$sizeforjs = 4;
				
				wp_register_style( 'crrcountdownlargecss12', 
				plugins_url( '/js/jquery.countdowncr1.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss12' );
				
			}
			else
			{
				$sizeforjs = 7;
				
				wp_register_style( 'crrcountdownlargecss212', 
				plugins_url( '/js/jquery.countdowncr21.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss212' );
				
			}
		}
        
        
    }
    elseif($size == "medium")
    {
		if($cdcountercdstyle == "1")
		{
			$sizeforjs = 2;
			/*wp_enqueue_script("crrcountdownlargehs2", plugins_url( '/js/jquery.countdown2medium.js', __FILE__ ), false);*/
			
			wp_register_style( 'crrcountdownlargecss2', 
			plugins_url( '/js/jquery.countdown2medium.css', __FILE__ ),
			array(), 
			'20120208', 
			'all' );
			wp_enqueue_style( 'crrcountdownlargecss2' );
			/*wp_register_style( 'crrcountdownlargecss', 
			plugins_url( '/js/jquery.countdownother.css', __FILE__ ),
			array(), 
			'20120208', 
			'all' );*/
		}
		else
		{
			if($cdcountercdstyle == "2")
			{
				$sizeforjs = 5;
				
				wp_register_style( 'crrcountdownlargecss22', 
				plugins_url( '/js/jquery.countdowncr2.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss22' );
				
			}
			else
			{
				$sizeforjs = 8;
				
				wp_register_style( 'crrcountdownlargecss222', 
				plugins_url( '/js/jquery.countdowncr22.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss222' );
				
			}
		}
    }
    elseif($size == "small")
    {
		if($cdcountercdstyle == "1")
		{
			$sizeforjs = 3;
			/*wp_enqueue_script("crrcountdownlargehs3", plugins_url( '/js/jquery.countdown2small.js', __FILE__ ), false);*/
			wp_register_style( 'crrcountdownlargecss3', 
			plugins_url( '/js/jquery.countdown2small.css', __FILE__ ), 
			array(), 
			'20120208', 
			'all' );
			wp_enqueue_style( 'crrcountdownlargecss3' );
		}
		else
		{
			if($cdcountercdstyle == "2")
			{
				$sizeforjs = 6;
				
				wp_register_style( 'crrcountdownlargecss32', 
				plugins_url( '/js/jquery.countdowncr3.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss32' );
				
			}
			else
			{
				$sizeforjs = 9;
				
				wp_register_style( 'crrcountdownlargecss232', 
				plugins_url( '/js/jquery.countdowncr23.css', __FILE__ ), 
				array(), 
				'20120208', 
				'all' );
				wp_enqueue_style( 'crrcountdownlargecss232' );
				
				
			}
		}
    }
    
	 $my_theme = wp_get_theme();
	 // echo $my_theme->get( 'Name' ) . " is version " . $my_theme->get( 'Version' );
	 $theme_name = $my_theme->get( 'Name' );
	 $theme_version = $my_theme->get( 'Version' );
     if($theme_name == 'OptimizePress' && $theme_version > 2)
	 {
	 	wp_register_style( 'crrop2cssfixcss', 
		plugins_url( '/css/crrop2cssfix.css', __FILE__ ), 
		array(), 
		'20120208', 
		'all' );
		wp_enqueue_style( 'crrop2cssfixcss' );
	 } 
    //wp_enqueue_script('jquery');
	//wp_enqueue_script("font-preview5", plugins_url( '/js/jquery.lwtCountdown-1.0.js', __FILE__ ));
    
	STATIC $i = 1;
	global $shortcode_counter;
	$shortcode_counter++;
	global ${"dys".$id.$shortcode_counter},${"hys".$id.$shortcode_counter},${"mys".$id.$shortcode_counter},${"sys".$id.$shortcode_counter},${"link".$id.$shortcode_counter},$id;
	$id=$atts['id'];
	global $expirer_time_left;
	global $wpdb;
	global $blog_id;
	global $current_blog;
	$loading_delay = 0;
	$the_content = "";
	if (${"dys".$id.$shortcode_counter} =="" && ${"hys".$id.$shortcode_counter}=="" && ${"mys".$id.$shortcode_counter}=="" && ${"sys".$id.$shortcode_counter}=="")
	{
		global $default_url;
	if(is_home()){
		//return $mainlayout;
	}
	global $post;
	global ${"dys".$id.$shortcode_counter},${"hys".$id.$shortcode_counter},${"mys".$id.$shortcode_counter},${"sys".$id.$shortcode_counter},${"link".$id.$shortcode_counter};
	global $wpdb;
	global $expirer_time_left, $expirer_date_time;
	$id=$atts['id'];
	$qry="SELECT * FROM ".$wpdb->prefix."crrcounterredirect WHERE post_id=$id  LIMIT 1";
	$info = $wpdb->get_row($qry, ARRAY_A);
	if(!$info){
		return $mainlayout;
	}
	if(!is_array($info)){
		return $mainlayout;
	}
	if(!isset($info['P_Id'])){
		return $mainlayout;
	}
	if(!is_numeric($info['P_Id'])){
		return $mainlayout;
	}
	//return "hi";
	//$brwoser = $_SERVER['HTTP_USER_AGENT'];
	//$query = "INSERT INTO temp_test(post_id, field1) values(1,'".$_SERVER['HTTP_USER_AGENT']."')";
	//$wpdb->query($query);
	$expiry_method = $info['expiry_method'];
	$time=$info['expiry_time'];
	$expirer_date_time=$info['expiry_date_time'];
	$current_time = $timestamp = crrscgettime_timezoness($info["time_zone"]);

	// for action / reach
	if ($expiry_method == 3)
	{
	}
	else
	{
			// for fixed all
			if($info['method']==2){ 
				$expiry_timestamp=$info['timestamp']+$info['expiry_time'];
				$timeleft= $expiry_timestamp-$current_time;
				if($timeleft<=0 && $info['event']!=1){
					if(!isset($info['redirection_url']) or $info['redirection_url'] == ''){
						${"link".$id.$shortcode_counter}=$default_url;
					}
					else{
						${"link".$id.$shortcode_counter}=$info['redirection_url'];
					}

$scr= <<<DOM
<script type='text/javascript'>
window.location="${'link'.$id.$shortcode_counter}";
</script>
DOM;
					return $scr;
				}
                if($timeleft <= 0 && $info['event']==1)
                {
                	$expirer_time_left=$time=0;
                }
                else
                {
					$expirer_time_left=$time=$timeleft;
                }
			}
			// for IP
			if($info['method']==0 ){
				$id=$atts['id'];
				$ip=addslashes($_SERVER['REMOTE_ADDR']);
				$qry="SELECT * FROM ".$wpdb->prefix."crrcounterredirectip WHERE post_id=$id AND ip='$ip' LIMIT 1";
				$res = $wpdb->get_row($qry, ARRAY_A);
				$mtr=$current_time;
				if(empty($res)){
					$post_id=$atts['id'];
					
					$qry="INSERT INTO ".$wpdb->prefix."crrcounterredirectip (post_id,ip,timestamp) VALUES ($post_id,'$ip',$mtr)";
					$wpdb->query($qry);
					if($info['expiry_time'] > 0)
					{
						//$left_time=$info['expiry_time'];
						if ($info['expiry_date_time'] != "0000-00-00 00:00:00")
						{
							$left_time=strtotime($info['expiry_date_time'])-$current_time;
							//$qry="INSERT INTO temp_test (post_id,field1,field2,field3,field4) VALUES ($post_id,'".strtotime($info['expiry_date_time'])."','".time()."','".$left_time."','1')";
							//$wpdb->query($qry);
						}
						else
						{
							//$left_time=($info['timestamp']+$info['expiry_time'])-time();
							$left_time=$info['expiry_time'];
							//$qry="INSERT INTO temp_test (post_id,field1,field2,field3,field4) VALUES ($post_id,'".($info['timestamp']+$info['expiry_time'])."','".time()."','".$left_time."','2')";
							//$wpdb->query($qry);
						}
					}
					else
						$left_time=$mtr;
				}
				else{
					if ($info['expiry_date_time'] != "0000-00-00 00:00:00")
					{
						$left_time=strtotime($info['expiry_date_time'])-$current_time;
					}
					else
					{
						$left_time=($res['timestamp']+$info['expiry_time'])-$current_time;
					}
				}
				if($left_time<=0 && $info['event']!=1){
				if(!isset($info['redirection_url']) or $info['redirection_url'] == ''){
					
					
				${"link".$id.$shortcode_counter}=$default_url;
				}
				else{
				${"link".$id.$shortcode_counter}=$info['redirection_url'];
				}
$scr= <<<DOM
<script type='text/javascript'>
window.location="${'link'.$id.$shortcode_counter}";
</script>
DOM;
				return $scr;

				}
				else{
                    if($left_time <= 0 && $info['event']==1)
                    {
                        $expirer_time_left=$time=0;
                    }
                    else
                    {
                        $expirer_time_left=$time=$left_time;
                    }
					
				}

			}
			// for cookie
			if($info['method']==1){
			$id = $atts['id'];
			if(!isset($_COOKIE['expirer_timestamp_'.$id.$shortcode_counter])){
            	//return "oopsss";
				$tme=$current_time;
$setcookie= <<<DOM
<script type='text/javascript'>
c_name="expirer_timestamp_$id$shortcode_counter";
value="$tme";
exdays=50;
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
</script>
DOM;
				echo $setcookie;
            $mainlayout.=$setcookie;
            echo $_COOKIE['expirer_timestamp_'.$id.$shortcode_counter];
				
				if ($info['expiry_date_time'] != "0000-00-00 00:00:00")
				{
					$expirer_time_left=strtotime($info['expiry_date_time'])-$current_time;
				}
				else
				{
					//$expirer_time_left=($info['timestamp']+$info['expiry_time'])-time();
					$expirer_time_left = $info['expiry_time'];
				}
			}
			elseif(!is_numeric($_COOKIE['expirer_timestamp_'.$id.$shortcode_counter])){
				$tme=$current_time;
$setcookie= <<<DOM
<script type='text/javascript'>
c_name="expirer_timestamp_$id$shortcode_counter";
value="$tme";
exdays=50;
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
</script>
DOM;
				$mainlayout.=$setcookie;
				if ($info['expiry_date_time'] != "0000-00-00 00:00:00")
				{
					$expirer_time_left=strtotime($info['expiry_date_time'])-$current_time;
				}
				else
				{
					//$expirer_time_left=($info['timestamp']+$info['expiry_time'])-time();
					$expirer_time_left = $info['expiry_time']; 
				}
			}
			else{
				$timestamp=$_COOKIE['expirer_timestamp_'.$id.$shortcode_counter];
				$expiry_timestamp=$timestamp+$info['expiry_time'];
				if ($info['expiry_date_time'] != "0000-00-00 00:00:00")
				{
					$expirer_time_left=strtotime($info['expiry_date_time'])-$current_time;
				}
				else
				{
                	if($expiry_timestamp<=$current_time && $info['event']==1)
                    {
                    	$expirer_time_left=$time=0;
                    }
                    else
                    {
                    	$expirer_time_left=$time=$expiry_timestamp-$current_time;
                    }
					
				}
				if($expiry_timestamp<=$current_time && $info['event']!=1){
					if(!isset($info['redirection_url']) or $info['redirection_url'] == ''){
					${"link".$id.$shortcode_counter}=$default_url;
					}
					else{
					${"link".$id.$shortcode_counter}=$info['redirection_url'];
					}                
$scr= <<<DOM
<script type='text/javascript'>
window.location="${'link'.$id.$shortcode_counter}";
</script>
DOM;
					return $scr;
				}
			}
		}
	}
$days=floor($time/(24*60*60));
$hours=floor($time/(60*60));
$minutes=floor($time/60);
$seconds=floor($time);
$hours-=($days*24);
$minutes-=(($days*24*60)+($hours*60));
$seconds-=(($days*24*60*60)+($hours*60*60)+($minutes*60));
if($days<1){
	$dy="";
}
else{
	$dy="$days day(s), ";
    
}
if($hours<1){
	$hr="";

}
else{
	$hr="$hours hour(s), ";
}
if($minutes<1){
	$min="";
}
else{
	$min="$minutes minute(s), ";
}
if($seconds<1){
	$sec="0 second";
}
else{
	$sec="$seconds second(s)";
}
if(!isset($info['redirection_url']) or $info['redirection_url'] == ''){
	${"link".$id.$shortcode_counter}=$default_url;
}
else{
	${"link".$id.$shortcode_counter}=$info['redirection_url'];
}
$micro_sec=$time*1000;
if($info['expiry_time']>0){
${"dys".$id.$shortcode_counter}=$days."";
${"hys".$id.$shortcode_counter}=$hours."";
${"mys".$id.$shortcode_counter}=$minutes."";
${"sys".$id.$shortcode_counter}=$seconds."";
 
if($days<=9){
${"dys".$id.$shortcode_counter}="0".$days;
}
if($hours<=9){
${"hys".$id.$shortcode_counter}="0".$hours;
}
if($minutes<=9){
${"mys".$id.$shortcode_counter}="0".$minutes;
}
if($seconds<=9){
${"sys".$id.$shortcode_counter}="0".$seconds;
}
$mainlayout.= <<<DOM
<Br />

DOM;
}
else{
//$mainlayout.="<Br /><Br />First time visit only!";
}


$the_content = $mainlayout;
	}
    //return $sys;
	if (${"dys".$id.$shortcode_counter} !="" || ${"hys".$id.$shortcode_counter}!="" || ${"mys".$id.$shortcode_counter}!="" || ${"sys".$id.$shortcode_counter}!="" || $the_content == "")
	{	
    	//return $id;
		$qry="SELECT * FROM ".$wpdb->prefix."crrcounterredirect WHERE post_id=$id && blog_id=$blog_id LIMIT 1";
        //return $qry;
		$res = $wpdb->get_row($qry, ARRAY_A);
		$num_color = "#000000";
		$bg_color = "#ffffff";
		$current_time = $timestamp = crrscgettime_timezoness($res["time_zone"]);
		if ($res["color_num"] == 1)
		{
			$num_color = str_replace("0x","#",$res["myhexcode"]);
		}
		if ($res["back_color"] == 1)
		{
			$bg_color = str_replace("0x","#",$res["myhexcode1"]);
		}
		if($res['counter_size']==0){
			$width="273";
			$hight="90";
		}elseif($res['counter_size']==1){
			$width="400";
			$hight="100";
		}elseif($res['counter_size']==2){
			$width="560";
			$hight="105";
		}
		if($res['alignment']==0){
			$align="left";
		}elseif($res['alignment']==1){
			$align="center";
		}elseif($res['alignment']==2){
			$align="right";
		}
		//echo date('Y-m-d-H-i-s')."===".date('Y-m-d-H-i-s',time())."===".date('Y-m-d-H-i-s',time()+$expirer_time_left)."======".$expirer_time_left;
		/*iPhone*/
		$browser = strtolower($_SERVER['HTTP_USER_AGENT']);
		$iphone = false;
		$jsCounterDisplay = "none";
		$flashCounterDisplay = "block";
		if (strpos($browser,"iphone") !== false || strpos($browser,"ipad") !== false)
		{
			$iphone = true;
			$jsCounterDisplay = "none";
			$flashCounterDisplay = "none";
		}
		/*iPhone*/
		if($res['event']==2){
			$image =$res['splash_url'];
 
			$et=$current_time+$expirer_time_left+$loading_delay;
			$et=$expirer_time_left;
			$post_id = $id;
			$home_url=get_option('siteurl');
			$size_array = array($res['day'],$res['mins'], $res['hrs'], $res['secs']  );
	$totalsecs	= ${"dys".$id.$shortcode_counter}*24*60*60 + ${"hys".$id.$shortcode_counter}*60*60 + ${"mys".$id.$shortcode_counter}*60 + ${"sys".$id.$shortcode_counter};
    $countbgcolor=$cddigitbgcolor;//$res['back_color'];
    $countdigitcolor=$res['color_num'];
    $crrcounterborderwidth = $borderwidth; //$res['border_width'];
    $crrcounterbordercolor = $bordercolor; //$res['border_color'];
    $custompx = "px";
    $counterholderbgcolor = $cdholderbgcolor;
    $counterborderradiuscss = $counterborderradius; 
    $cdcounterbgwidth1 = $cdcounterbgwidth;
    $cdcountertextborderwidth1 = $cdcountertextborderwidth;
	$cdcountertextbordercolor1 = $cdcountertextbordercolor;
    $countdownsize = $sizeforjs;
    $csscountercontbgbottomcolor = $cdcountercontbgbottomcolor;
	$csscdcounterbgbottomcolor = $cdcounterbgbottomcolor;
	$csscdcountertextothercolor = $cdcountertextothercolor;
    $csscdholderbgcolor1 = $cdholderbgcolor1;
    $csscounterdigitbgcolor = $counterdigitbgcolor;
    $csscountercontbgbottomcolor2 = $cdholderbgcolort;
    $csscdcounterbgbottomcolor2 = $cdholderbgcolort2;
			
$amainlayout.= <<<DOM

<br clear="all" />
<!--<div style="display: none;" id="flashcontent" class="info_message"><img src="$flash_path2/images/expired-notice.png"></div>
<script src="$flash_path2/SlideCountdownClockSlide.as" > </script> -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
<style type="text/css">
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	background-color:$countbgcolor !important;
	background-image: -moz-linear-gradient(center top , $countbgcolor, $csscdcounterbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($countbgcolor), to($csscdcounterbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor)";
	color:#$countdigitcolor !important;
	border-radius:$counterborderradiuscss$custompx !important;
}
#countdown$id$shortcode_counter .digit{
	color:#$countdigitcolor !important;
}
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	border:$crrcounterborderwidth$custompx solid #$crrcounterbordercolor !important;
}
#countdown$id$shortcode_counter {
	background-color:$counterholderbgcolor !important;
	background-image: -moz-linear-gradient(center top , $counterholderbgcolor, $csscountercontbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($counterholderbgcolor), to($csscountercontbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor)";
}
#countdown$id$shortcode_counter.squaresetwidth,#countdown$id$shortcode_counter.squaresetwidthmed,#countdown$id$shortcode_counter.squaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth,#countdown$id$shortcode_counter.sepsquaresetwidthmed,#countdown$id$shortcode_counter.sepsquaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth2sm,#countdown$id$shortcode_counter.sepsquaresetwidth2med,#countdown$id$shortcode_counter.sepsquaresetwidth2 {
max-width:$cdcounterbgwidth1$custompx !important;
}
#countdown$id$shortcode_counter .position2{
	border-top:$cdcountertextborderwidth1$custompx solid #$cdcountertextbordercolor1 !important;
	color:#$csscdcountertextothercolor !important;
}
</style>
<div id="countdown$id$shortcode_counter"></div>
<script language="javascript" type="text/javascript">
	 jQuery(document).ready(function($)
	 {
/*	ts = new Date(2012, 0, 1),
		newYear = true;*/
	
	//if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		//ts = new Date(2012, 0, 1),
		ts = (new Date()).getTime() + $totalsecs*1000;
		newYear = false;
	//}
		
	jQuery('#countdown$id$shortcode_counter').countdowncr({
		timestamp	: ts,
		csize		: $countdownsize,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			/*if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}*/
			
			//note.html(message);
		}
	});
	
});
</script>

<div style="display:none; margin-left:auto;" id="countdownimage_$i" class="info_message" align='center' ><img src="$image"></div>	

<div id="countdown_dashboard_$i" style="display:$jsCounterDisplay;text-align:$align;">
		<div style="margin:0px auto;float:$align;width:$jwidth;">	
			<div class="dash days_dash" style="background:$bg_color;color:$num_color;display:$jdays;">
				<span class="dash_title">days</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash" style="background:$bg_color;color:$num_color;display:$jhours;">
				<span class="dash_title">hours</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash" style="background:$bg_color;color:$num_color;display:$jmins;">
				<span class="dash_title">minutes</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash" style="background:$bg_color;color:$num_color;display:$jsecs;">
				<span class="dash_title">seconds</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
			<div style="clear:both;"></div>

		</div>
</div>	

<script language="javascript" type="text/javascript">
jQuery.noConflict();
			// Initiate Countdown
jQuery(document).ready(function($) {

$('#countdown_dashboard_$i').countDown({
		targetOffset: {
			'day': 		${"dys".$id.$shortcode_counter},
			'month': 	0,
			'year': 	0,
			'hour': 	${"hys".$id.$shortcode_counter},
			'min': 		${"mys".$id.$shortcode_counter},
			'sec': 		${"sys".$id.$shortcode_counter}
		},
		omitWeeks:true,
		onComplete: function() {  setTimeout("showExpireImage$id$shortcode_counter()",0); }
	});
	
});	
function showExpireImage$id$shortcode_counter()
{
	jQuery('#countdownimage_$i').slideDown();
}
</script>
	
DOM;

	}elseif($res['event']==1){ 
		$et=$current_time+$expirer_time_left+$loading_delay;
		$et=$expirer_time_left;
		$post_id = $id;

		$home_url=get_option('siteurl');
		

		$hr = $res['hrs'];
		$ms = $res['mins'];
		$ds = $res['day'];
		$ss = $res['secs'];
		  
		$size_array = array($res['day'],$res['mins'], $res['hrs'], $res['secs']  );
		$totalsecs	= ${"dys".$id.$shortcode_counter}*24*60*60 + ${"hys".$id.$shortcode_counter}*60*60 + ${"mys".$id.$shortcode_counter}*60 + ${"sys".$id.$shortcode_counter};
	$countbgcolor=$cddigitbgcolor;//$res['back_color'];
    $countdigitcolor=$res['color_num'];
    $crrcounterborderwidth = $borderwidth; //$res['border_width'];
    $crrcounterbordercolor = $bordercolor; //$res['border_color'];
    $custompx = "px";
    $counterholderbgcolor = $cdholderbgcolor;
    $counterborderradiuscss = $counterborderradius;
    $cdcounterbgwidth1 = $cdcounterbgwidth;
    $cdcountertextborderwidth1 = $cdcountertextborderwidth;
	$cdcountertextbordercolor1 = $cdcountertextbordercolor;
    $countdownsize = $sizeforjs;
    $csscountercontbgbottomcolor = $cdcountercontbgbottomcolor;
	$csscdcounterbgbottomcolor = $cdcounterbgbottomcolor;
	$csscdcountertextothercolor = $cdcountertextothercolor;
    $csscdholderbgcolor1 = $cdholderbgcolor1;
    $csscounterdigitbgcolor = $counterdigitbgcolor;
    $csscountercontbgbottomcolor2 = $cdholderbgcolort;
    $csscdcounterbgbottomcolor2 = $cdholderbgcolort2;
$amainlayout.=<<<DOM
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
<style type="text/css">
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	background-color:$countbgcolor !important;
	background-image: -moz-linear-gradient(center top , $countbgcolor, $csscdcounterbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($countbgcolor), to($csscdcounterbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor)";
	color:#$countdigitcolor !important;
	border-radius:$counterborderradiuscss$custompx !important;
}
#countdown$id$shortcode_counter .digit{
	color:#$countdigitcolor !important;
}
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	border:$crrcounterborderwidth$custompx solid #$crrcounterbordercolor !important;
}
#countdown$id$shortcode_counter {
	background-color:$counterholderbgcolor !important;
	background-image: -moz-linear-gradient(center top , $counterholderbgcolor, $csscountercontbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($counterholderbgcolor), to($csscountercontbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor)";
}
#countdown$id$shortcode_counter.squaresetwidth,#countdown$id$shortcode_counter.squaresetwidthmed,#countdown$id$shortcode_counter.squaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth,#countdown$id$shortcode_counter.sepsquaresetwidthmed,#countdown$id$shortcode_counter.sepsquaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth2sm,#countdown$id$shortcode_counter.sepsquaresetwidth2med,#countdown$id$shortcode_counter.sepsquaresetwidth2 {
max-width:$cdcounterbgwidth1$custompx !important;
}
#countdown$id$shortcode_counter .position2{
	border-top:$cdcountertextborderwidth1$custompx solid #$cdcountertextbordercolor1 !important;
	color:#$csscdcountertextothercolor !important;
}
</style>
<div id="countdown$id$shortcode_counter"></div>
		
<script language="javascript" type="text/javascript">
	  jQuery(document).ready(function($)
	{
	/*	ts = new Date(2012, 0, 1),
		newYear = true;*/
	
	//if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		//ts = new Date(2012, 0, 1),
		ts = (new Date()).getTime() + $totalsecs*1000;
		newYear = false;
	//}
		
	jQuery('#countdown$id$shortcode_counter').countdowncr({
		timestamp	: ts,
		csize		: $countdownsize,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			/*if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}*/
			
			
		}
	});
	
});
</script>
<div style="display: none;" id="countdownimage_$i" class="info_message" align='center'><img src="$flash_path2/images/expired-notice.png"></div>


<div id="countdown_dashboard_$i" style="display:$jsCounterDisplay;text-align:$align;">
		<div style="margin:0px auto;float:$align;width:$jwidth;">	
			<div class="dash days_dash" style="background:$bg_color;color:$num_color;display:$jdays;">
				<span class="dash_title">days</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash" style="background:$bg_color;color:$num_color;display:$jhours;">
				<span class="dash_title">hours</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash" style="background:$bg_color;color:$num_color;display:$jmins;">
				<span class="dash_title">minutes</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash" style="background:$bg_color;color:$num_color;display:$jsecs;">
				<span class="dash_title">seconds</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
			<div style="clear:both;"></div>

		</div>
	</div>

<script language="javascript" type="text/javascript">
			// Initiate Countdown
			
jQuery(document).ready(function($) {

$('#countdown_dashboard_$i').countDown({
		targetOffset: {
			'day': 		${"dys".$id.$shortcode_counter},
			'month': 	0,
			'year': 	0,
			'hour': 	${"hys".$id.$shortcode_counter},
			'min': 		${"mys".$id.$shortcode_counter},
			'sec': 		${"sys".$id.$shortcode_counter}
		},
		omitWeeks:true
		onComplete: function() {  setTimeout("showExpireImage$id$shortcode_counter()",0); }
	});
	
});	
function showExpireImage$id$shortcode_counter()
{
	jQuery('#countdownimage_$i').slideDown();
}
</script>
DOM;
}
	elseif($res['event']==0){
		if(!isset($res['redirection_url']) || $res['redirection_url']==''){
		${"link".$id.$shortcode_counter}=$default_url;
		}
		else{

		${"link".$id.$shortcode_counter}=$res['redirection_url'];
		}

		$et=$current_time+$expirer_time_left+$loading_delay;
		$et=$expirer_time_left;
		$post_id = $id;

		$home_url=get_option('siteurl');
		$hr = $res['hrs'];
		$ms = $res['mins'];
		$ds = $res['day'];
		$ss = $res['secs'];
		  
		$size_array = array($res['day'],$res['mins'], $res['hrs'], $res['secs']  );
$totalsecs	= ${"dys".$id.$shortcode_counter}*24*60*60 + ${"hys".$id.$shortcode_counter}*60*60 + ${"mys".$id.$shortcode_counter}*60 + ${"sys".$id.$shortcode_counter};
	$countbgcolor=$cddigitbgcolor;//$res['back_color'];
    $countdigitcolor=$res['color_num'];
    $crrcounterborderwidth = $borderwidth; //$res['border_width'];
    $crrcounterbordercolor = $bordercolor; //$res['border_color'];
    $custompx = "px";
    $counterholderbgcolor = $cdholderbgcolor;
    $counterborderradiuscss = $counterborderradius;
    $cdcounterbgwidth1 = $cdcounterbgwidth;
    $cdcountertextborderwidth1 = $cdcountertextborderwidth;
	$cdcountertextbordercolor1 = $cdcountertextbordercolor;
    $countdownsize = $sizeforjs;
    $csscountercontbgbottomcolor = $cdcountercontbgbottomcolor;
	$csscdcounterbgbottomcolor = $cdcounterbgbottomcolor;
	$csscdcountertextothercolor = $cdcountertextothercolor;
    $csscdholderbgcolor1 = $cdholderbgcolor1;
    $csscounterdigitbgcolor = $counterdigitbgcolor;
    $csscountercontbgbottomcolor2 = $cdholderbgcolort;
    $csscdcounterbgbottomcolor2 = $cdholderbgcolort2;
$amainlayout.=<<<DOM
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
<style type="text/css">
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	background-color:$countbgcolor !important;
	background-image: -moz-linear-gradient(center top , $countbgcolor, $csscdcounterbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($countbgcolor), to($csscdcounterbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscounterdigitbgcolor, endColorstr=#$csscdcounterbgbottomcolor)";
	color:#$countdigitcolor !important;
	border-radius:$counterborderradiuscss$custompx !important;
}
#countdown$id$shortcode_counter .digit{
	color:#$countdigitcolor !important;
}
#countdown$id$shortcode_counter {
	background-color:$counterholderbgcolor !important;
	background-image: -moz-linear-gradient(center top , $counterholderbgcolor, $csscountercontbgbottomcolor2);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from($counterholderbgcolor), to($csscountercontbgbottomcolor2));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#$csscdholderbgcolor1, endColorstr=#$csscountercontbgbottomcolor)";
}
#countdown$id$shortcode_counter .countalign,#countdown$id$shortcode_counter .crposition2 .digit{
	border:$crrcounterborderwidth$custompx solid #$crrcounterbordercolor !important;
}
#countdown$id$shortcode_counter.squaresetwidth,#countdown$id$shortcode_counter.squaresetwidthmed,#countdown$id$shortcode_counter.squaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth,#countdown$id$shortcode_counter.sepsquaresetwidthmed,#countdown$id$shortcode_counter.sepsquaresetwidthsm,#countdown$id$shortcode_counter.sepsquaresetwidth2sm,#countdown$id$shortcode_counter.sepsquaresetwidth2med,#countdown$id$shortcode_counter.sepsquaresetwidth2 {
max-width:$cdcounterbgwidth1$custompx !important;
}
#countdown$id$shortcode_counter .position2{
	border-top:$cdcountertextborderwidth1$custompx solid #$cdcountertextbordercolor1 !important;
	color:#$csscdcountertextothercolor !important;
}
</style>
<div id="countdown$id$shortcode_counter"> </div>
	
<script language="javascript" type="text/javascript">
	  jQuery(document).ready(function($) {
	
/*	ts = new Date(2012, 0, 1),
		newYear = true;*/
	
	//if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		//ts = new Date(2012, 0, 1),
		ts = (new Date()).getTime() + $totalsecs *1000;
		newYear = false;
	//}
			
	jQuery('#countdown$id$shortcode_counter').countdowncr({
		timestamp	: ts,
		csize		: $countdownsize,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			/*if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}*/
			
			//note.html(message);
		}
	});
	
});
</script>
<div id="countdown_dashboard_$i" style="display:$jsCounterDisplay;text-align:$align;  ">
		<div style="margin:0px auto;float:$align;width:$jwidth;">	
			<div class="dash days_dash" style="background:$bg_color;color:$num_color;display:$jdays;">
				<span class="dash_title">days</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash" style="background:$bg_color;color:$num_color;display:$jhours;">
				<span class="dash_title">hours</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash" style="background:$bg_color;color:$num_color;display:$jmins;">
				<span class="dash_title">minutes</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash" style="background:$bg_color;color:$num_color;display:$jsecs;">
				<span class="dash_title">seconds</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
			<div style="clear:both;"></div>
			
		</div>
</div>		
<script language="javascript" type="text/javascript">
			// Initiate Countdown
		
jQuery(document).ready(function($) {

$('#countdown_dashboard_$i').countDown({
		targetOffset: {
			'day': 		${"dys".$id.$shortcode_counter},
			'month': 	0,
			'year': 	0,
			'hour': 	${"hys".$id.$shortcode_counter},
			'min': 		${"mys".$id.$shortcode_counter},
			'sec': 		${"sys".$id.$shortcode_counter}
		},
		//omitWeeks:true,
		onComplete: function() { window.location="${"link".$id.$shortcode_counter}"; }
	});
	
});	
</script>

DOM;
	}
	$i++;
	return $amainlayout;
	}
						
	
	}
}
// Register shortcode
//if(BzoYyI_license_valid()) {
add_shortcode( 'countdownrocket', 'add_crr_shortcode' );
//}
function crrscgettime_timezoness($timeZone, $datetime="")
{
	if ($timeZone == '')
		$timeZone = 'Europe/London';
	$userTimezone = new DateTimeZone($timeZone);
	if ($datatime == "")
		$mydatetime = new DateTime();
	else
		$mydatetime = new DateTime($datetime);
		
	$mydatetime->setTimezone($userTimezone);
	$current_time = $mydatetime->format('Y-m-d H:i:s');
	$timestamp=strtotime($current_time);
	return $timestamp;
}
function rtcdr1menuppHexToRGB2($hex) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
		 
		if(strlen($hex) == 3) {
		$color['r'] = hexdec(substr($hex, 0, 1) . $r);
		$color['g'] = hexdec(substr($hex, 1, 1) . $g);
		$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
		$color['r'] = hexdec(substr($hex, 0, 2));
		$color['g'] = hexdec(substr($hex, 2, 2));
		$color['b'] = hexdec(substr($hex, 4, 2));
		}
		 
		return $color;
		}

function crrshowtopbottombar()
	{	
	if(!is_admin() && !in_array( $GLOBALS['pagenow'] , array( 'wp-login.php', 'wp-register.php' ) ) )  
		{
        	$crrset_titleiden1 = get_option('crrset_titleiden');
            $crrset_pagetopbottombar1 = get_option('crrset_pagetopbottombar');
            $crrset_enablebarposition1 = get_option('crrset_enablebarposition');
            $crrset_barposition1 = get_option('crrset_barposition');
            $crrset_barwidth1 = get_option('crrset_barwidth');
            $crrset_barbackgroundcolor1 = get_option('crrset_barbackgroundcolor');
            $crrset_barbackgroundbottomcolor1 = get_option('crrset_barbackgroundbottomcolor');
            $crrset_barborderwidth1 = get_option('crrset_barborderwidth');
            $crrset_barborderstyle1 = get_option('crrset_barborderstyle');
            $crrset_barbordercolor1 = get_option('crrset_barbordercolor');
            $crrset_baroptin1 = get_option('crrset_baroptin');
            $crrset_disablesticky1 = get_option('crrset_disablesticky');
            $crrset_showclosebutton1 = get_option('crrset_showclosebutton');
            
            $crrset_makebgtransparent1 = get_option('crrset_makebgtransparent');
            $crrset_posttopbottombar1 = get_option('crrset_posttopbottombar');
            $crrset_contentbeforecountdown1 = get_option('crrset_contentbeforecountdown');
            $crrset_contentaftercountdown1 = get_option('crrset_contentaftercountdown');
            $crrset_contentfontfamily1 = get_option('crrset_contentfontfamily');
            $crrset_contentfontsize1 = get_option('crrset_contentfontsize');
            $crrset_contentfontcolor1 = get_option('crrset_contentfontcolor');
            $crrset_contentcountdownwidth1 = get_option('crrset_contentcountdownwidth');
            $crrset_affiliatelinkurl1 = get_option('crrset_affiliatelinkurl');
            $crrset_pagetopbottombar1 = get_option('crrset_pagetopbottombar');
        	for ($y=0; $y<count($crrset_pagetopbottombar1); $y++)
			{
            	
                if($crrset_enablebarposition1[$y] == 'true')
                {
                    global $post;

                    if ($post->post_type == 'post' || $post->post_type == 'events') {
			global $wp_query;
			$thePostID = $wp_query->post->ID; 
                        if($crrset_pagetopbottombar1[$y] != ''){
                            if($thePostID == $crrset_posttopbottombar1[$y]){
                                $file = dirname(__FILE__).'/crrtopbottombar.php';
                                include_once($file);
                            }
                        }
                    }
                   
                    if ($post->post_type == 'page' || $post->post_type == 'events') {
			 $page_object = get_queried_object();
			$page_id     = get_queried_object_id();
                        if($crrset_pagetopbottombar1[$y] != ''){
                            if($page_id == $crrset_pagetopbottombar1[$y]){
                                $file = dirname(__FILE__).'/crrtopbottombar.php';
                                include_once($file);
                            }
                        }
                    }
                    /*if(get_option('crrset_topbottomhomepage') != ''){
                            if ( is_front_page() || is_home() ) {
                                $file = dirname(__FILE__).'/crrtopbottombar.php';
                                include_once($file);
                            }
                        }*/
                    
                }
            }
			
		}
	}
//if(BzoYyI_license_valid())
//{
	add_action('wp_footer', 'crrshowtopbottombar');
//}
if ( is_admin() ) {
add_action( 'wp_ajax_crr_pagepost_duplicate', 'crr_pagepost_duplicate' );
	function crr_pagepost_duplicate() {
		global $wpdb;
		check_ajax_referer( 'm4c_ajax_file_nonce', 'security' );
		$original_id  = $_POST['original_id'];
		$duplicate = get_post( $original_id, 'ARRAY_A' );
		$duplicate['post_title'] = $duplicate['post_title'].' Duplicate';
		$timestamp = strtotime($duplicate['post_date']);
		$duplicate['post_date'] = date('Y-m-d H:i:s', $timestamp);
		unset( $duplicate['ID'] );
		unset( $duplicate['guid'] );
		unset( $duplicate['comment_count'] );
		$duplicate_id = wp_insert_post( $duplicate );
		$taxonomies = get_object_taxonomies( $duplicate['post_type'] );
		foreach( $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $original_id, $taxonomy, array('fields' => 'names') );
			wp_set_object_terms( $duplicate_id, $terms, $taxonomy );
		}
		$custom_fields = get_post_custom( $original_id );
	  foreach ( $custom_fields as $key => $value ) {
			add_post_meta( $duplicate_id, $key, maybe_unserialize($value[0]) );
	  }
	  
		echo 'Duplicate Post Created!';
		die();
	}
	
	
	
	
	add_filter( 'post_row_actions', 'crr_duplicate_action_row', 10, 2 );
	function crr_duplicate_action_row( $actions, $post ){
		$post_type = get_post_type_object( $post->post_type );
		if($post_type->labels->singular_name == 'Countdown Rocket')
		{
		$nonce = wp_create_nonce( 'm4c_ajax_file_nonce' ); 
	  $actions['duplicate_post'] = '<a class="crrduplicatepagepost" rel="'.$nonce.'" href="'.$post->ID.'">Duplicate '.$post_type->labels->singular_name.'</a>';
	}
		return $actions;
	}
}
 if (function_exists ('wpoptinpro_unautop')) {

	add_filter ('widget_text', 'wpoptinpro_unautop');

  }

add_filter ('widget_text', 'do_shortcode');
CountdownRocket::crr_get_instance();
Crr_Meta_Box::crrmeta_get_instance();

include('crvcintegration.php');
if(class_exists('Sppvc_Crocket_List'))
{
	$Sppvc_Crocket_List = new Sppvc_Crocket_List;
}