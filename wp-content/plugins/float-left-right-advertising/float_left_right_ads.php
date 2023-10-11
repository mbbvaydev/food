<?php
/**
 Plugin Name: Float Left Right Advertising
 Plugin URI: http://blog.casanova.vn/float-left-right-advertising/
 Version: 2.0.1
 Description: Float Advertising on Left and Right
 Author: RT Edit
 Author URI: http://thietkewebmienphi.com
*/


/*****************Frontend****************************************/
function load_csnv_script(){
	if(get_option('csnv_is_active') ){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script(
			'floatads.js',
			plugins_url('/floatads.js', __FILE__),
			'',
			'',
			false
		);
		add_action('wp_footer', 'append_code_to_body');
	}
}

function is_mobile() {

	// Get the user agent

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	// Create an array of known mobile user agents
	// This list is from the 21 October 2010 WURFL File.
	// Most mobile devices send a pretty standard string that can be covered by
	// one of these.  I believe I have found all the agents (as of the date above)
	// that do not and have included them below.  If you use this function, you
	// should periodically check your list against the WURFL file, available at:
	// http://wurfl.sourceforge.net/


	$mobile_agents = Array(


		"240x320",
		"acer",
		"acoon",
		"acs-",
		"abacho",
		"ahong",
		"airness",
		"alcatel",
		"amoi",
		"android",
		"anywhereyougo.com",
		"applewebkit/525",
		"applewebkit/532",
		"asus",
		"audio",
		"au-mic",
		"avantogo",
		"becker",
		"benq",
		"bilbo",
		"bird",
		"blackberry",
		"blazer",
		"bleu",
		"cdm-",
		"compal",
		"coolpad",
		"danger",
		"dbtel",
		"dopod",
		"elaine",
		"eric",
		"etouch",
		"fly " ,
		"fly_",
		"fly-",
		"go.web",
		"goodaccess",
		"gradiente",
		"grundig",
		"haier",
		"hedy",
		"hitachi",
		"htc",
		"huawei",
		"hutchison",
		"inno",
		"ipad",
		"ipaq",
		"ipod",
		"jbrowser",
		"kddi",
		"kgt",
		"kwc",
		"lenovo",
		"lg ",
		"lg2",
		"lg3",
		"lg4",
		"lg5",
		"lg7",
		"lg8",
		"lg9",
		"lg-",
		"lge-",
		"lge9",
		"longcos",
		"maemo",
		"mercator",
		"meridian",
		"micromax",
		"midp",
		"mini",
		"mitsu",
		"mmm",
		"mmp",
		"mobi",
		"mot-",
		"moto",
		"nec-",
		"netfront",
		"newgen",
		"nexian",
		"nf-browser",
		"nintendo",
		"nitro",
		"nokia",
		"nook",
		"novarra",
		"obigo",
		"palm",
		"panasonic",
		"pantech",
		"philips",
		"phone",
		"pg-",
		"playstation",
		"pocket",
		"pt-",
		"qc-",
		"qtek",
		"rover",
		"sagem",
		"sama",
		"samu",
		"sanyo",
		"samsung",
		"sch-",
		"scooter",
		"sec-",
		"sendo",
		"sgh-",
		"sharp",
		"siemens",
		"sie-",
		"softbank",
		"sony",
		"spice",
		"sprint",
		"spv",
		"symbian",
		"tablet",
		"talkabout",
		"tcl-",
		"teleca",
		"telit",
		"tianyu",
		"tim-",
		"toshiba",
		"tsm",
		"up.browser",
		"utec",
		"utstar",
		"verykool",
		"virgin",
		"vk-",
		"voda",
		"voxtel",
		"vx",
		"wap",
		"wellco",
		"wig browser",
		"wii",
		"windows ce",
		"wireless",
		"xda",
		"xde",
		"zte"
	);

	// Pre-set $is_mobile to false.

	$is_mobile = false;

	// Cycle through the list in $mobile_agents to see if any of them
	// appear in $user_agent.

	foreach ($mobile_agents as $device) {

		// Check each element in $mobile_agents to see if it appears in
		// $user_agent.  If it does, set $is_mobile to true.

		if (stristr($user_agent, $device)) {

			$is_mobile = true;

			// break out of the foreach, we don't need to test
			// any more once we get a true value.

			break;
		}
	}

	return $is_mobile;
}

function append_code_to_body(){
?>
	<?php
		$screen_w	=	get_option("screen_w");
		$MainContentW	=	get_option("csnv_content_w")?get_option("csnv_content_w"):1000;

		//Width + height
		$LeftBannerW	=	get_option("csnv_left_w")?get_option("csnv_left_w"):100;
		$LeftBannerH	=	get_option("csnv_left_h")?get_option("csnv_left_h"):500;

		$RightBannerW	=	get_option("csnv_right_w")?get_option("csnv_right_w"):100;
		$RightBannerH	=	get_option("csnv_right_h")?get_option("csnv_right_h"):500;


		//Ajust
		$LeftAdjust		=	get_option("csnv_margin_left")?get_option("csnv_margin_left"):10;
		$RightAdjust	=	get_option("csnv_margin_right")?get_option("csnv_margin_right"):10;
		$TopAdjust		=	get_option("csnv_margin_top")?get_option("csnv_margin_top"):80;

		$mobile_show	=	get_option("mobile_show");
		$is_mobile		=	is_mobile();

		$nofollow 		= 	( get_option("csnv_follow") == 1 ) ? 'rel="nofollow"' : '';
		$newtab 		= 	( get_option("csnv_newtab") == 1 ) ? 'target="_blank"' : '';

		$csnv_source_left    =   get_option("csnv_source_left");
		$csnv_link_left  	= 	get_option("csnv_link_left");
		$csnv_source_right 	= 	get_option("csnv_source_right");
		$csnv_link_right 	= 	get_option("csnv_link_right");
	 ?>

    <?php if(empty($is_mobile))://Neu la may tinh ?>
		<script type="text/javascript">
            var clientWidth	=	window.screen.width;
            if(clientWidth >= <?php echo $screen_w; ?>){
                document.write('<div id="divAdRight" style="position: absolute; top: 0px; width:<?php echo $RightBannerW; ?>px; <?php if($RightBannerH) echo "height:".$RightBannerH."px;"; ?> overflow:hidden;"><a href="<?php echo $csnv_link_right ?>" <?php echo $newtab ?> <?php echo $nofollow ?>><img src="<?php echo $csnv_source_right ?>" /></a></div><div id="divAdLeft" style="position: absolute; top: 0px; width:<?php echo $LeftBannerW; ?>px; <?php if($LeftBannerH) echo "height:".$LeftBannerH."px;"; ?> overflow:hidden;"><a href="<?php echo $csnv_link_left ?>" <?php echo $newtab ?> <?php echo $nofollow ?>><img src="<?php echo $csnv_source_left ?>" /></a></div>');

                var MainContentW = <?php echo $MainContentW; ?>;
                var LeftBannerW = <?php echo $LeftBannerW; ?>;
                var RightBannerW = <?php echo $RightBannerW; ?>;
                var LeftAdjust = <?php echo $LeftAdjust; ?>;
                var RightAdjust = <?php echo $RightAdjust; ?>;
                var TopAdjust = <?php echo $TopAdjust; ?>;
                ShowAdDiv();
                window.onresize=ShowAdDiv;
            }
        </script>
    <?php else: //Neu la mobile ?>
    	<?php if($mobile_show==1):?>
        	<script type="text/javascript">
            var clientWidth	=	window.screen.width;
            if(clientWidth >= <?php echo $screen_w; ?>){
                document.write('<div id="divAdRight" style="position: absolute; top: 0px; width:<?php echo $RightBannerW; ?>px; <?php if($RightBannerH) echo "height:".$RightBannerH."px;"; ?> overflow:hidden;"><a href="<?php echo $csnv_link_right ?>" <?php echo $csnv_newtab ?>><img src="<?php echo $csnv_source_right ?>" /></a></div><div id="divAdLeft" style="position: absolute; top: 0px; width:<?php echo $LeftBannerW; ?>px; <?php if($LeftBannerH) echo "height:".$LeftBannerH."px;"; ?> overflow:hidden;"><a href="<?php echo $csnv_link_left ?>" <?php echo $csnv_newtab ?>><img src="<?php echo $csnv_source_left ?>" /></a></div>');

                var MainContentW = <?php echo $MainContentW; ?>;
                var LeftBannerW = <?php echo $LeftBannerW; ?>;
                var RightBannerW = <?php echo $RightBannerW; ?>;
                var LeftAdjust = <?php echo $LeftAdjust; ?>;
                var RightAdjust = <?php echo $RightAdjust; ?>;
                var TopAdjust = <?php echo $TopAdjust; ?>;
                ShowAdDiv();
                window.onresize=ShowAdDiv;
            }
        </script>
        <?php endif; ?>
    <?php endif;//End check mobile?>

<?php
}


add_action('init', 'load_csnv_script');

/************Admin Panel***********/
function csnv_ads_plugin_remove(){
	delete_option('csnv_is_active');
	delete_option('screen_w');

	delete_option('csnv_content_w');
	delete_option('csnv_left_w');
	delete_option('csnv_left_h');
	delete_option('csnv_right_w');
	delete_option('csnv_right_h');
	delete_option('csnv_margin_left');
	delete_option('csnv_margin_right');
	delete_option('csnv_margin_top');
	delete_option('csnv_left_code');
	delete_option('csnv_right_code');
	delete_option('mobile_show');
	delete_option('csnv_follow');
	delete_option('csnv_newtab');

	delete_option('csnv_source_left');
	delete_option('csnv_link_left');
	delete_option('csnv_source_right');
	delete_option('csnv_link_right');
}
function csnv_ads_plugin_install(){
	add_option('csnv_is_active', 1 );
	add_option('screen_w','1024');
	add_option('csnv_content_w','1000');

	add_option('csnv_left_w','100');
	add_option('csnv_left_h','500');

	add_option('csnv_right_w','100');
	add_option('csnv_right_h','500');

	add_option('csnv_follow', '1' );
	add_option('csnv_newtab', '1' );

	add_option('csnv_margin_left','10');
	add_option('csnv_margin_right','10');
	add_option('csnv_margin_top','80');
	add_option('mobile_show','0');

	add_option('csnv_source_left', plugins_url('/leftbanner.jpg', __FILE__) );
	add_option('csnv_link_left', 'http://yourwebsite.com' );
	add_option('csnv_source_right', plugins_url('/rightbanner.jpg', __FILE__) );
	add_option('csnv_link_right', 'http://yourwebsite.com' );

}

function csnv_ads_menu() {
	//add_options_page( __('Float Left Right Advertising',''), __('Float Left Right Advertising',''), 8, basename(__FILE__), 'csnv_ads_setting');
	add_menu_page( __( 'Ảnh QC 2 bên', 'beethemes' ), __( 'Ảnh QC 2 bên', 'beethemes' ), 'edit_theme_options', basename(__FILE__), 'csnv_ads_setting', 'dashicons-format-gallery', '80.01' );
}
function csnv_ads_setting(){
		if($_POST['status_submit']==1){
			update_option('csnv_is_active',intval($_POST['csnv_is_active']));
			update_option('csnv_left_code',htmlentities(stripslashes($_POST['csnv_left_code'])));
			update_option('csnv_right_code',htmlentities(stripslashes($_POST['csnv_right_code'])));

			update_option('csnv_content_w',intval($_POST['csnv_content_w']));

			update_option('csnv_follow',intval($_POST['csnv_follow']));
			update_option('csnv_newtab',intval($_POST['csnv_newtab']));

			update_option('csnv_left_w',intval($_POST['csnv_left_w']));
			update_option('csnv_left_h',intval($_POST['csnv_left_h']));

			update_option('csnv_right_w',intval($_POST['csnv_right_w']));
			update_option('csnv_right_h',intval($_POST['csnv_right_h']));

			update_option('csnv_margin_left',intval($_POST['csnv_margin_left']));
			update_option('csnv_margin_right',intval($_POST['csnv_margin_right']));
			update_option('csnv_margin_top',intval($_POST['csnv_margin_top']));
			update_option('mobile_show',intval($_POST['mobile_show']));

			update_option('csnv_source_left', stripslashes($_POST['csnv_source_left']));
			update_option('csnv_link_left', stripslashes($_POST['csnv_link_left']));
			update_option('csnv_source_right', stripslashes($_POST['csnv_source_right']));
			update_option('csnv_link_right', stripslashes($_POST['csnv_link_right']));

			update_option('screen_w',intval($_POST['screen_w']));
			echo '<div id="message" class="updated fade"><p>Đã lưu thiết lập !</p></div>';
		}
		if($_POST['status_submit']==2){
			update_option('csnv_is_active', 1 );
			update_option('screen_w','1024');
			update_option('csnv_content_w','1000');
			update_option('csnv_left_w','100');
			update_option('csnv_left_h','500');

			update_option('csnv_right_w','100');
			update_option('csnv_right_h','500');

			update_option('csnv_follow', '1' );
			update_option('csnv_newtab', '1' );

			update_option('csnv_margin_left','10');
			update_option('csnv_margin_right','10');
			update_option('csnv_margin_top','80');

			update_option('mobile_show',0);

			update_option('csnv_source_left', plugins_url('/leftbanner.jpg', __FILE__) );
			update_option('csnv_link_left', 'http://yourwebsite.com' );
			update_option('csnv_source_right', plugins_url('/rightbanner.jpg', __FILE__) );
			update_option('csnv_link_right', 'http://yourwebsite.com' );

			echo '<div id="message" class="updated fade"><p>Thiết lập đã được khôi phục !</p></div>';
		}
	?>
	<h2>Float Left Right Advertising Setting</h2>
	<form method="post" id="csnv_options">
    	<input type="hidden" name="status_submit" id="status_submit" value="2"  />
		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
			<tr valign="top">
				<td width="150" scope="row">Kích hoạt:</td>
				<td>
                	<label><input type="radio" name="csnv_is_active" <?php if (get_option('csnv_is_active')=='1'):?> checked="checked"<?php endif;?> value="1" />Có</label>
                    <label><input type="radio" name="csnv_is_active" <?php if (get_option('csnv_is_active')=='0'):?> checked="checked"<?php endif;?> value="0" />Không</label>
				</td>
			</tr>

            <tr valign="top">
				<td scope="row">Hiển thị với màn hình <strong></strong> &gt;=</td>
				<td>
                	<select name="screen_w">
                    	<option value="800" <?php if(get_option("screen_w")==800) echo "selected"; ?>>800</option>
                        <option value="1024" <?php if(get_option("screen_w")==1024) echo "selected"; ?>>1024</option>
                        <option value="1280" <?php if(get_option("screen_w")==1280) echo "selected"; ?>>1280</option>
                    </select> px
				</td>
			</tr>
            <tr valign="top">
				<td  scope="row">Chiều rộng khung website:</td>
				<td scope="row">
					<input name="csnv_content_w" size="4" maxlength="4" value="<?php echo html_entity_decode(get_option('csnv_content_w'));?>" /> px (chỉ điền số)
				</td>
			</tr>

            <tr>
            	<td>Hiển thị trên di động</td>
                <td>
                	<select name="mobile_show">
                    	<option value="1"<?php if(get_option("mobile_show")==1) echo " selected"; ?>>Có</option>
                        <option value="0"<?php if(get_option("mobile_show")==0) echo " selected"; ?>>Không</option>
                    </select>
                </td>
            </tr>

            <tr>
            	<td>Nofollow ? <br /> <small>Không cho phép google index</small></td>
                <td>
                	<select name="csnv_follow">
                    	<option value="1"<?php if(get_option("csnv_follow")==1) echo " selected"; ?>>Có</option>
                        <option value="0"<?php if(get_option("csnv_follow")==0) echo " selected"; ?>>Không</option>
                    </select>
                </td>
            </tr>

            <tr>
            	<td>Mở trong tab mới<br /></td>
                <td>
                	<select name="csnv_newtab">
                    	<option value="1"<?php if(get_option("csnv_newtab")==1) echo " selected"; ?>>Có</option>
                        <option value="0"<?php if(get_option("csnv_newtab")==0) echo " selected"; ?>>Không</option>
                    </select>
                </td>
            </tr>

            <tr>
				<td  scope="row">Cách lề trái:</td>
				<td scope="row">
					<input name="csnv_margin_left" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_left'));?>" /> px ( chỉ điền số )
				</td>
			</tr>
            <tr>
				<td  scope="row">Cách lề phải:</td>
				<td scope="row">
					<input name="csnv_margin_right" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_right'));?>" /> px ( chỉ điền số )
				</td>
			</tr>
            <tr>
				<td  scope="row">Cách lề trên:</td>
				<td scope="row">
					<input name="csnv_margin_top" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_top'));?>" /> px ( chỉ điền số )
				</td>
			</tr>
        </table>

	<div id="rtsettings">
        <fieldset>
			<legend>Ảnh Trái:</legend>

		<p id="csnv_source_left">
			<label class="csnv-spleft">Nguồn ảnh: </label>
			<input class="rt-value-upload" type="text" size="36" name="csnv_source_left" value="<?php echo get_option('csnv_source_left') ?>" />
			<input class="button rt-upload" type="button" value="Upload" />
		</p>

		<p>
			<label class="csnv-spleft">Liên kết ảnh: </label>
			<input type="text" size="36" name="csnv_link_left" value="<?php echo get_option('csnv_link_left') ?>" />
		</p>

		<p>
			<span class="csnv-left">
				<label>Rộng: <input name="csnv_left_w" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_left_w'));?>" /> px
                <br /><small>Chiều rộng tối đa của ảnh</small>
                </label>
			</span>

			<span class="csnv-left">
				<label>Cao: <input name="csnv_left_h" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_left_h'));?>" /> px
                <br /><small>Chiều cao tối đa của ảnh</small>
                </label>
			</span>
		</p>

		</fieldset>
		<!-- end 1 -->
		<br />

		<fieldset>
			<legend>Ảnh Phải:</legend>

		<p id="csnv_source_right">
			<label class="csnv-spleft">Nguồn ảnh: </label>
			<input class="rt-value-upload" type="text" size="36" name="csnv_source_right" value="<?php echo get_option('csnv_source_right') ?>" />
			<input class="button rt-upload" type="button" value="Upload" />
		</p>

		<p>
			<label class="csnv-spleft">Liên kết ảnh: </label>
			<input type="text" size="36" name="csnv_link_right" value="<?php echo get_option('csnv_link_right') ?>" />
		</p>

		<p>
			<span class="csnv-left">
				<label>Rộng: <input name="csnv_right_w" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_right_w'));?>" /> px
                <br /><small>Chiều rộng tối đa của ảnh</small>
                </label>
			</span>

			<span class="csnv-left">
				<label>Cao: <input name="csnv_right_h" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_right_h'));?>" /> px
                <br /><small>Chiều cao tối đa của ảnh</small>
                </label>
			</span>
		</p>

		</fieldset>
		<!-- end 2 -->
		<br />
	</div>

		<table>
         	<tr valign="top">
				<td  scope="row"></td>
				<td scope="row">
					<input type="button" name="save" onclick="document.getElementById('status_submit').value='1'; document.getElementById('csnv_options').submit();" value="Save setting" class="button-primary" />
				</td>
			</tr>
            <tr><td colspan="2"><br /><br /></td></tr>
            <tr valign="top">
				<td  scope="row"></td>
				<td scope="row">
					<input type="button" name="reset" onclick="document.getElementById('status_submit').value='2'; document.getElementById('csnv_options').submit();" value="Reset to default setting" class="button" />
				</td>
			</tr>
		</table>

	</form>
	<?php
}

//add setting menu
add_action('admin_menu', 'csnv_ads_menu');
/* What to do when the plugin is activated? */
register_activation_hook(__FILE__,'csnv_ads_plugin_install');
/* What to do when the plugin is deactivated? */
register_deactivation_hook( __FILE__, 'csnv_ads_plugin_remove' );
?>