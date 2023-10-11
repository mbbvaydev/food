<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Crr_Meta_Box {
	protected $plugin_slug;
	protected static $instance = null;
	public static function crrmeta_get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function __construct() {

		$countdownrocket1 = CountdownRocket::crr_get_instance();
		$this->plugin_slug = 'crr';
		add_action( 'add_meta_boxes', array( $this, 'add_countdown_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_crr_countdown_details' ) );

	}
	public function add_countdown_meta_box() {

		add_meta_box(
			'crr_countdown_details',
			__( 'Countdown Rocket Options', 'crr' ),
			array( $this, 'display_countdown_meta_box' ),
			'crr',
			'normal',
			'default'
		);

	}

	/**
	 * Displays the meta box for displaying the 'Flowplayer Video'
	 *
	 * @since      1.0.0
	 */
	
	public function display_countdown_meta_box( $post ) {

		wp_nonce_field( plugin_basename( __FILE__ ), 'crr-nonce' );
		$crr_stored_meta = get_post_meta( $post->ID );
		echo '[countdownrocket id="' . get_the_ID() . '"]<p>Copy this shortcode to a post, page or widget to show the countdown.</p>';
		?>
    <div class="crr-admin">
				<header>Countdown Basic Configuration</header>
				
				<fieldset>
                	<section>
						<label class="label">Default Designs</label>
						<div class="inline-group">
							<label class="radio"><input name="crr_pe_conterdefaultdesigns" value="1" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '1') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 1</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="2" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '2') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 2</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="3" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '3') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 3</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="4" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '4') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 4</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="5" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '5') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 5</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="6" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '6') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 6</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="7" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '7') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 7</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="8" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '8') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 8</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="9" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '9') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 9</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="10" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '10') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 10</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="11" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '11') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 11</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="12" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '12') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 12</label>
                            <label class="radio"><input name="crr_pe_conterdefaultdesigns" value="13" type="radio" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '13') { echo 'checked="checked"'; }?> onclick="crrpreviewhandleClicking(this);" ><i></i>Style 13</label>
						</div>
                        </section>
						<section>
						<label class="label">Preview</label>
                        <?php $preivewimgurl = site_url() . '/wp-content/plugins/countdownrocket/images/'; ?>
                      
                      <div id="crrpreview1" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '1') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>1.png"/>
                      </div>
                      <div id="crrpreview2" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '2') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>2.png"/>
                      </div>
                      <div id="crrpreview3" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '3') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>3.png"/>
                      </div>
                      <div id="crrpreview4" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '4') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>4.png"/>
                      </div>
                      <div id="crrpreview5" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '5') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>5.png"/>
                      </div>
                      <div id="crrpreview6" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '6') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>6.png"/>
                      </div>
                      <div id="crrpreview7" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '7') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>7.png"/>
                      </div>
                      <div id="crrpreview8" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '8') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>8.png"/>
                      </div>
                      <div id="crrpreview9" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '9') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>9.png"/>
                      </div>
                      <div id="crrpreview10" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '10') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>10.png"/>
                      </div>
                      <div id="crrpreview11" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '11') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>11.png"/>
                      </div>
                      <div id="crrpreview12" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '12') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>12.png"/>
                      </div>
                      <div id="crrpreview13" style=" <?php if($crr_stored_meta['crr_pe_conterdefaultdesigns'][0] == '13') {  } else { echo 'display:none;';}?>text-align:center;">
                      <img src="<?php echo $preivewimgurl;?>13.png"/>
                      </div>
                    </section>
                    <section>
						<label class="label">Countdown Size</label>
						<div class="inline-group">
							<label class="radio"><input id="crrcountdownsize1" name="crr_pe_countdownsize" value="large" checked="checked" type="radio" <?php if($crr_stored_meta['crr_pe_countdownsize'][0] == 'large' || $crr_stored_meta['crr_pe_countdownsize'][0] == '') { echo 'checked="checked"'; }?>><i></i>Large</label>
							<label class="radio"><input id="crrcountdownsize2" name="crr_pe_countdownsize" value="medium" type="radio" <?php if($crr_stored_meta['crr_pe_countdownsize'][0] == 'medium') { echo 'checked="checked"'; }?>><i></i>Medium</label>
							<label class="radio"><input id="crrcountdownsize3" name="crr_pe_countdownsize" value="small" type="radio" <?php if($crr_stored_meta['crr_pe_countdownsize'][0] == 'small') { echo 'checked="checked"'; }?>><i></i>Small</label>
						</div>
					</section>
                	<section>
                    <div class="twoinoneline">
						<label class="label">Time Zone</label>
						<label class="select">
							<select name="crr_pe_timezone" id="crr_pe_timezone">
								<option  value="Pacific/Midway" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Midway' ); ?>>(GMT-11:00) Midway Island, Samoa</option>
                                <option  value="America/Adak" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Adak' ); ?>>(GMT-10:00) Hawaii-Aleutian</option>
                                <option  value="Etc/GMT+10" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Etc/GMT+10' ); ?>>(GMT-10:00) Hawaii</option>
                                <option  value="Pacific/Marquesas" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Marquesas' ); ?>>(GMT-09:30) Marquesas Islands</option>
                                <option  value="Pacific/Gambier" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Gambier' ); ?>>(GMT-09:00) Gambier Islands</option>
                                <option  value="America/Anchorage" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Anchorage' ); ?>>(GMT-09:00) Alaska</option>
                                <option  value="America/Ensenada" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Ensenada' ); ?>>(GMT-08:00) Tijuana, Baja California</option>
                                <option  value="Etc/GMT+8" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Etc/GMT+8' ); ?>>(GMT-08:00) Pitcairn Islands</option>
                                <option  value="America/Los_Angeles" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Los_Angeles' ); ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
                                <option  value="America/Denver" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Denver' ); ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
                                <option  value="America/Chihuahua" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Chihuahua' ); ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                <option  value="America/Dawson_Creek" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Dawson_Creek' ); ?>>(GMT-07:00) Arizona</option>
                                <option  value="America/Belize" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Belize' ); ?>>(GMT-06:00) Saskatchewan, Central America</option>
                                <option  value="America/Cancun" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Cancun' ); ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                <option  value="Chile/EasterIsland" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Chile/EasterIsland' ); ?>>(GMT-06:00) Easter Island</option>
                                <option  value="America/Chicago" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Chicago' ); ?>>(GMT-06:00) Central Time (US & Canada)</option>
                                <option  value="America/New_York" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/New_York' ); ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
                                <option  value="America/Havana" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Havana' ); ?>>(GMT-05:00) Cuba</option>
                                <option  value="America/Bogota" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Bogota' ); ?>>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                <option  value="America/Caracas" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Caracas' ); ?>>(GMT-04:30) Caracas</option>
                                <option  value="America/Santiago" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Santiago' ); ?>>(GMT-04:00) Santiago</option>
                                <option  value="America/La_Paz" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/La_Paz' ); ?>>(GMT-04:00) La Paz</option>
                                <option  value="Atlantic/Stanley" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Atlantic/Stanley' ); ?>>(GMT-04:00) Faukland Islands</option>
                                <option  value="America/Campo_Grande" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Campo_Grande' ); ?>>(GMT-04:00) Brazil</option>
                                <option  value="America/Goose_Bay" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Goose_Bay' ); ?>>(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                <option  value="America/Glace_Bay" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Glace_Bay' ); ?>>(GMT-04:00) Atlantic Time (Canada)</option>
                                <option  value="America/St_Johns" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/St_Johns' ); ?>>(GMT-03:30) Newfoundland</option>
                                <option  value="America/Araguaina" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Araguaina' ); ?>>(GMT-03:00) UTC-3</option>
                                <option  value="America/Montevideo" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Montevideo' ); ?>>(GMT-03:00) Montevideo</option>
                                <option  value="America/Miquelon" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Miquelon' ); ?>>(GMT-03:00) Miquelon, St. Pierre</option>
                                <option  value="America/Godthab" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Godthab' ); ?>>(GMT-03:00) Greenland</option>
                                <option  value="America/Argentina/Buenos_Aires" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Argentina/Buenos_Aires' ); ?>>(GMT-03:00) Buenos Aires</option>
                                <option  value="America/Sao_Paulo" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Sao_Paulo' ); ?>>(GMT-03:00) Brasilia</option>
                                <option  value="America/Noronha" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'America/Noronha' ); ?>>(GMT-02:00) Mid-Atlantic</option>
                                <option  value="Atlantic/Cape_Verde" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Atlantic/Cape_Verde' ); ?>>(GMT-01:00) Cape Verde Is.</option>
                                <option  value="Atlantic/Azores" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Atlantic/Azores' ); ?>>(GMT-01:00) Azores</option>
                                <option  value="Europe/Belfast" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Belfast' ); ?>>(GMT) Greenwich Mean Time : Belfast</option>
                                <option  value="Europe/Dublin" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Dublin' ); ?>>(GMT) Greenwich Mean Time : Dublin</option>
                                <option  value="Europe/Lisbon" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Lisbon' ); ?>>(GMT) Greenwich Mean Time : Lisbon</option>
                                <option  value="Europe/London" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/London' ); ?>>(GMT) Greenwich Mean Time : London</option>
                                <option  value="Africa/Abidjan" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Abidjan' ); ?>>(GMT) Monrovia, Reykjavik</option>
                                <option  value="Europe/Amsterdam" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Amsterdam' ); ?>>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                <option  value="Europe/Belgrade" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Belgrade' ); ?>>(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                <option  value="Europe/Brussels" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Brussels' ); ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                <option  value="Africa/Algiers" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Algiers' ); ?>>(GMT+01:00) West Central Africa</option>
                                <option  value="Africa/Windhoek" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Windhoek' ); ?>>(GMT+01:00) Windhoek</option>
                                <option  value="Asia/Beirut" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Beirut' ); ?>>(GMT+02:00) Beirut</option>
                                <option  value="Africa/Cairo" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Cairo' ); ?>>(GMT+02:00) Cairo</option>
                                <option  value="Asia/Gaza" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Gaza' ); ?>>(GMT+02:00) Gaza</option>
                                <option  value="Africa/Blantyre" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Blantyre' ); ?>>(GMT+02:00) Harare, Pretoria</option>
                                <option  value="Asia/Jerusalem" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Jerusalem' ); ?>>(GMT+02:00) Jerusalem</option>
                                <option  value="Europe/Minsk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Minsk' ); ?>>(GMT+02:00) Minsk</option>
                                <option  value="Asia/Damascus" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Damascus' ); ?>>(GMT+02:00) Syria</option>
                                <option  value="Europe/Moscow" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Europe/Moscow' ); ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                <option  value="Africa/Addis_Ababa" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Africa/Addis_Ababa' ); ?>>(GMT+03:00) Nairobi</option>
                                <option  value="Asia/Tehran" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Tehran' ); ?>>(GMT+03:30) Tehran</option>
                                <option  value="Asia/Dubai" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Dubai' ); ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
                                <option  value="Asia/Yerevan" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Yerevan' ); ?>>(GMT+04:00) Yerevan</option>
                                <option  value="Asia/Kabul" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Kabul' ); ?>>(GMT+04:30) Kabul</option>
                                <option  value="Asia/Yekaterinburg" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Yekaterinburg' ); ?>>(GMT+05:00) Ekaterinburg</option>
                                <option  value="Asia/Tashkent" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Tashkent' ); ?>>(GMT+05:00) Tashkent</option>
                                <option  value="Asia/Kolkata" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Kolkata' ); ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                <option  value="Asia/Katmandu" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Katmandu' ); ?>>(GMT+05:45) Kathmandu</option>
                                <option  value="Asia/Dhaka" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Dhaka' ); ?>>(GMT+06:00) Astana, Dhaka</option>
                                <option  value="Asia/Novosibirsk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Novosibirsk' ); ?>>(GMT+06:00) Novosibirsk</option>
                                <option  value="Asia/Rangoon" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Rangoon' ); ?>>(GMT+06:30) Yangon (Rangoon)</option>
                                <option  value="Asia/Bangkok" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Bangkok' ); ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                <option  value="Asia/Krasnoyarsk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Krasnoyarsk' ); ?>>(GMT+07:00) Krasnoyarsk</option>
                                <option  value="Asia/Hong_Kong" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Hong_Kong' ); ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                <option  value="Asia/Irkutsk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Irkutsk' ); ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                <option  value="Australia/Perth" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Perth' ); ?>>(GMT+08:00) Perth</option>
                                <option  value="Australia/Eucla" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Eucla' ); ?>>(GMT+08:45) Eucla</option>
                                <option  value="Asia/Tokyo" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Tokyo' ); ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                <option  value="Asia/Seoul" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Seoul' ); ?>>(GMT+09:00) Seoul</option>
                                <option  value="Asia/Yakutsk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Yakutsk' ); ?>>(GMT+09:00) Yakutsk</option>
                                <option  value="Australia/Adelaide" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Adelaide' ); ?>>(GMT+09:30) Adelaide</option>
                                <option  value="Australia/Darwin" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Darwin' ); ?>>(GMT+09:30) Darwin</option>
                                <option  value="Australia/Brisbane" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Brisbane' ); ?>>(GMT+10:00) Brisbane</option>
                                <option  value="Australia/Hobart" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Hobart' ); ?>>(GMT+10:00) Hobart</option>
                                <option  value="Asia/Vladivostok" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Vladivostok' ); ?>>(GMT+10:00) Vladivostok</option>
                                <option  value="Australia/Lord_Howe" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Australia/Lord_Howe' ); ?>>(GMT+10:30) Lord Howe Island</option>
                                <option  value="Etc/GMT-11" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Etc/GMT-11' ); ?>>(GMT+11:00) Solomon Is., New Caledonia</option>
                                <option  value="Asia/Magadan" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Magadan' ); ?>>(GMT+11:00) Magadan</option>
                                <option  value="Pacific/Norfolk" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Norfolk' ); ?>>(GMT+11:30) Norfolk Island</option>
                                <option  value="Asia/Anadyr" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Asia/Anadyr' ); ?>>(GMT+12:00) Anadyr, Kamchatka</option>
                                <option  value="Pacific/Auckland" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Auckland' ); ?>>(GMT+12:00) Auckland, Wellington</option>
                                <option  value="Etc/GMT-12" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Etc/GMT-12' ); ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                <option  value="Pacific/Chatham" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Chatham' ); ?>>(GMT+12:45) Chatham Islands</option>
                                <option  value="Pacific/Tongatapu" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Tongatapu' ); ?>>(GMT+13:00) Nukualofa</option>
                                <option  value="Pacific/Kiritimati" <?php if ( isset ( $crr_stored_meta['crr_pe_timezone'] ) ) selected( $crr_stored_meta['crr_pe_timezone'][0], 'Pacific/Kiritimati' ); ?>>(GMT+14:00) Kiritimati</option>
							</select>
							<i></i>						</label>
                            </div>
                            <div class="twoinoneline2">
                            <label class="label">Expire After</label>
						<label class="select">
							<select name="crr_pe_expireafter" id="crr_pe_expireafter">
								<option  value="0" <?php if ( isset ( $crr_stored_meta['crr_pe_expireafter'] ) ) selected( $crr_stored_meta['crr_pe_expireafter'][0], '0' ); ?>>One Time Event Countdown</option>
                                <option  value="2" <?php if ( isset ( $crr_stored_meta['crr_pe_expireafter'] ) ) selected( $crr_stored_meta['crr_pe_expireafter'][0], '2' ); ?>>Evergreen Countdown</option>
<!--                                <option  value="1" <?php //if ( isset ( $crr_stored_meta['crr_pe_expireafter'] ) ) selected( $crr_stored_meta['crr_pe_expireafter'][0], '1' ); ?>>First Visit Only</option>-->
							</select>
							<i></i>						</label>
                            </div>
					</section>
                    
					<section>
                    	<label class="label">Date / Time</label>
						<label class="input">
							<input type="text" name="crr_pe_datetime" id="crr_pe_datetime" value="<?php if ( isset ( $crr_stored_meta['crr_pe_datetime'] ) ) echo $crr_stored_meta['crr_pe_datetime'][0]; ?>"/>
						</label>
                        <div class="note"><strong>Note:</strong> You can enter datetime or time in this text box. If you select "One Time Event Countdown" in "Expire After" dropdown then enter date in "mm/dd/yyyy mm:ss" format like "09/09/2012 21:00". Time is in 24 hour format. If you select "Evergreen Countdown" in "Expire After" dropdown then enter time in "dd:hh:mm:ss" format like "00:12:21:10". Formats should be strictly followed otherwise it will not work properly.</div>
                    </section>
                    
                    <section>
                    <div class="twoinoneline">
						<label class="label">Expire Page Visitor By</label>
						<label class="select">
                        <?php if($crr_stored_meta['crr_pe_expireafter'][0] == '' || $crr_stored_meta['crr_pe_expireafter'][0] == '0') { ?>
							<select name="crr_pe_expirepagevisiby" id="crr_pe_expirepagevisiby">
                                <option  value="2" <?php if ( isset ( $crr_stored_meta['crr_pe_expirepagevisiby'] ) ) selected( $crr_stored_meta['crr_pe_expirepagevisiby'][0], '2' ); ?>>Fixed for All</option>
							</select>
                            <?php } else  { ?>
                            <select name="crr_pe_expirepagevisiby" id="crr_pe_expirepagevisiby">
								<option  value="0" <?php if ( isset ( $crr_stored_meta['crr_pe_expirepagevisiby'] ) ) selected( $crr_stored_meta['crr_pe_expirepagevisiby'][0], '0' ); ?>>IP</option>
                                <option  value="1" <?php if ( isset ( $crr_stored_meta['crr_pe_expirepagevisiby'] ) ) selected( $crr_stored_meta['crr_pe_expirepagevisiby'][0], '1' ); ?>>Cookie</option>
                                <option  value="2" <?php if ( isset ( $crr_stored_meta['crr_pe_expirepagevisiby'] ) ) selected( $crr_stored_meta['crr_pe_expirepagevisiby'][0], '2' ); ?>>Fixed for All</option>
							</select>
                            <?php } ?>
							<i></i>						</label>
                            </div>
							<div class="twoinoneline2">
						<label class="label">Redirect URL</label>
						<label class="input">
							<input type="text" name="crr_pe_redirecturl" id="crr_pe_redirecturl" value="<?php if ( isset ( $crr_stored_meta['crr_pe_redirecturl'] ) ) echo $crr_stored_meta['crr_pe_redirecturl'][0]; ?>" />
						</label>
                        </div>
                    </section>
                    
                    <section>
                    <div class="twoinoneline">
						<label class="label">On Finish</label>
						<label class="select">
							<select name="crr_pe_onfinish" id="crr_pe_onfinish">
								<option  value="0" <?php if ( isset ( $crr_stored_meta['crr_pe_onfinish'] ) ) selected( $crr_stored_meta['crr_pe_onfinish'][0], '0' ); ?>>Redirect Automatically</option>
                                <option  value="2" <?php if ( isset ( $crr_stored_meta['crr_pe_onfinish'] ) ) selected( $crr_stored_meta['crr_pe_onfinish'][0], '2' ); ?>>Show Own Image</option>
                                <option  value="1" <?php if ( isset ( $crr_stored_meta['crr_pe_onfinish'] ) ) selected( $crr_stored_meta['crr_pe_onfinish'][0], '1' ); ?>>No Redirect</option>
							</select>
							<i></i>						</label>
                            </div>
                            <div class="twoinoneline2">
                            <label class="label">Image URL</label>
						<label class="input">
							<input type="text" class="crrimage_upload_field" name="crr_pe_imageurl" id="crr_pe_imageurl" value="<?php if ( isset ( $crr_stored_meta['crr_pe_imageurl'] ) ) echo $crr_stored_meta['crr_pe_imageurl'][0]; ?>" style="display:inline-block;width:65%;" /><a href="#" style="display:inline-block;float:none;margin:0px;" type="button" class="crr_settings_upload_button button" title="Select Image"/>Select Image</a>
						</label>
                            </div>
					</section>
                    
                                       
				</fieldset>
                
                <header>Main Contanier Options</header>
				
				<fieldset>
                	<section>
                    <div class="twoinoneline">
						<label class="label">Countdown Style</label>
						<label class="select">
							<select name="crr_pe_cdstyle" id="crr_pe_cdstyle">
								<option  value="1" <?php if ( isset ( $crr_stored_meta['crr_pe_cdstyle'] ) ) selected( $crr_stored_meta['crr_pe_cdstyle'][0], '1' ); ?>>Square</option>
                                <option  value="2" <?php if ( isset ( $crr_stored_meta['crr_pe_cdstyle'] ) ) selected( $crr_stored_meta['crr_pe_cdstyle'][0], '2' ); ?>>Square Separate</option>
                                <option  value="3" <?php if ( isset ( $crr_stored_meta['crr_pe_cdstyle'] ) ) selected( $crr_stored_meta['crr_pe_cdstyle'][0], '3' ); ?>>Square Separate 2</option>
							</select>
							<i></i>						</label>
                            </div>
                            <div class="twoinoneline2">
                            <label class="label">Counter Background Max. Width (px)</label>
						<label class="input">
							<input type="text" name="crr_pe_counterbgwidth" id="crr_pe_counterbgwidth" value="<?php if (  $crr_stored_meta['crr_pe_counterbgwidth'][0] == '') { echo '450'; } else { echo $crr_stored_meta['crr_pe_counterbgwidth'][0]; } ?>"/>
						</label>
                            </div>
					</section>
 
                	<section>
                    <div class="twoinoneline">
						<label class="label">Counter Background Top Color</label>
						<label class="input">
							<input type="text" name="crr_pe_countercdholdercolor" id="crr_pe_countercdholdercolor" value="<?php if($crr_stored_meta['crr_pe_countercdholdercolor'][0] == '') { echo 'FFFFFF'; } else { echo $crr_stored_meta['crr_pe_countercdholdercolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong>  Use different top and bottom colors for gradient effect.</div>
                        </div>
                        <div class="twoinoneline2">
						<label class="label">Counter Background Bottom Color</label>
						<label class="input">
							<input type="text" name="crr_pe_countercontbgbottomcolor" id="crr_pe_countercontbgbottomcolor" value="<?php if($crr_stored_meta['crr_pe_countercontbgbottomcolor'][0] == '') { echo 'FFFFFF'; } else { echo $crr_stored_meta['crr_pe_countercontbgbottomcolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong>  Use different top and bottom colors for gradient effect.</div>
                        </div>
					</section>
                    
            
                    <section>
						<label class="label">Counter Background Opacity</label>
						<label class="input">
							<input type="text" name="crr_pe_counterbgopacity" id="crr_pe_counterbgopacity" value="<?php if($crr_stored_meta['crr_pe_counterbgopacity'][0] == '') { echo '1'; } else { echo $crr_stored_meta['crr_pe_counterbgopacity'][0]; } ?>"/>
						</label>
                        <div class="note"><strong>Note:</strong>  value from .01 to 1 (1 means no opacity)</div>
					</section>
                </fieldset>
                
                <header>Digit Options</header>
				
				<fieldset>
                    <section>
                    <div class="twoinoneline">
						<label class="label">Counter Digit Background Top Color</label>
						<label class="input">
							<input type="text" name="crr_pe_counterbgcolor" id="crr_pe_counterbgcolor" value="<?php if($crr_stored_meta['crr_pe_counterbgcolor'][0] == '') { echo '444444'; } else { echo $crr_stored_meta['crr_pe_counterbgcolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong>  Use different top and bottom colors for gradient effect.</div>
                        </div>
                        <div class="twoinoneline2">
						<label class="label">Counter Digit Background Bottom Color</label>
						<label class="input">
							<input type="text" name="crr_pe_counterbgbottomcolor" id="crr_pe_counterbgbottomcolor" value="<?php if($crr_stored_meta['crr_pe_counterbgbottomcolor'][0] == '') { echo '444444'; } else { echo $crr_stored_meta['crr_pe_counterbgbottomcolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong>  Use different top and bottom colors for gradient effect.</div>
                        </div>
					</section>
                    
                            	
                    <section>
                    <div class="twoinoneline">
						<label class="label">Counter Digit Background Opacity</label>
						<label class="input">
							<input type="text" name="crr_pe_counterdigitbgopacity" id="crr_pe_counterdigitbgopacity" value="<?php if($crr_stored_meta['crr_pe_counterdigitbgopacity'][0] == '') { echo '1'; } else { echo $crr_stored_meta['crr_pe_counterdigitbgopacity'][0]; } ?>"/>
						</label>
                        <div class="note"><strong>Note:</strong>  value from .01 to 1 (1 means no opacity)</div>
                        </div>
                        <div class="twoinoneline2" style="margin-bottom:41px;">
						<label class="label">Counter Digit Color</label>
						<label class="input">
							<input type="text" name="crr_pe_counterdigitcolor" id="crr_pe_counterdigitcolor" value="<?php if($crr_stored_meta['crr_pe_counterdigitcolor'][0] == '') { echo 'FFFFFF'; } else { echo $crr_stored_meta['crr_pe_counterdigitcolor'][0]; } ?>" class="color" />
						</label>
                        </div>
					</section>
                    
                   
                   <section>
                   <div class="twoinoneline">
						<label class="label">Counter Border Width (px)</label>
						<label class="input">
							<input type="text" name="crr_pe_counterborderwidth" id="crr_pe_counterborderwidth" value="<?php if ( isset ( $crr_stored_meta['crr_pe_counterborderwidth'] ) ) echo $crr_stored_meta['crr_pe_counterborderwidth'][0]; ?>"/>
						</label>
                        </div>
                        <div class="twoinoneline2">
						<label class="label">Counter Border Color</label>
						<label class="input">
							<input type="text" name="crr_pe_counterbordercolor" id="crr_pe_counterbordercolor" value="<?php if($crr_stored_meta['crr_pe_counterbordercolor'][0] == '') { echo 'D60000'; } else { echo $crr_stored_meta['crr_pe_counterbordercolor'][0]; } ?>" class="color" />
						</label>
                        </div>
					</section>
                    
                    
                    <section>
                    <div class="twoinoneline">
						<label class="label">Counter Border Radius (px)</label>
						<label class="input">
							<input type="text" name="crr_pe_counterborderradius" id="crr_pe_counterborderradius" value="<?php if ( isset ( $crr_stored_meta['crr_pe_counterborderradius'] ) ) echo $crr_stored_meta['crr_pe_counterborderradius'][0]; ?>"/>
						</label>
                        <div class="note"><strong>Note:</strong> You can make your countdown timer round using that option.</div>
                        </div>
                        <div class="twoinoneline2">
						<label class="label">Counter Text Border Width (px)</label>
						<label class="input">
							<input type="text" name="crr_pe_countertextborderwidth" id="crr_pe_countertextborderwidth" value="<?php if ( isset ( $crr_stored_meta['crr_pe_countertextborderwidth'] ) ) echo $crr_stored_meta['crr_pe_countertextborderwidth'][0]; ?>"/>
						</label>
                        <div class="note"><strong>Note:</strong> It will add top border above Days, Hours, Minutes and Seconds text.</div>
                        </div>
					</section>
                   
                    
                    <section>
                    <div class="twoinoneline">
						<label class="label">Counter Text Border Color</label>
						<label class="input">
							<input type="text" name="crr_pe_countertextbordercolor" id="crr_pe_countertextbordercolor" value="<?php if($crr_stored_meta['crr_pe_countertextbordercolor'][0] == '') { echo 'D60000'; } else { echo $crr_stored_meta['crr_pe_countertextbordercolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong> It will add top border above Days, Hours, Minutes and Seconds text.</div>
                        </div>
                        <div class="twoinoneline2">
						<label class="label">Other Text Color</label>
						<label class="input">
							<input type="text" name="crr_pe_countertextothercolor" id="crr_pe_countertextothercolor" value="<?php if($crr_stored_meta['crr_pe_countertextothercolor'][0] == '') { echo 'FFFFFF'; } else { echo $crr_stored_meta['crr_pe_countertextothercolor'][0]; } ?>" class="color" />
						</label>
                        <div class="note"><strong>Note:</strong> It will change color of Days, Hours, Minutes and Seconds text.</div>
                        </div>
					</section>
                    
				</fieldset>
			</div>
	<?php
	}

	public function save_crr_countdown_details( $post_id ) {
		if ( $this->user_can_save( $post_id, 'crr-nonce' ) ) {

			// Checks for input and saves if needed
			
			if( isset( $_POST[ 'crr_pe_countdownsize' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countdownsize', $_POST[ 'crr_pe_countdownsize' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_timezone' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_timezone', $_POST[ 'crr_pe_timezone' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_expireafter' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_expireafter', $_POST[ 'crr_pe_expireafter' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_datetime' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_datetime', $_POST[ 'crr_pe_datetime' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_expirepagevisiby' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_expirepagevisiby', $_POST[ 'crr_pe_expirepagevisiby' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_redirecturl' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_redirecturl', $_POST[ 'crr_pe_redirecturl' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_onfinish' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_onfinish', $_POST[ 'crr_pe_onfinish' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_imageurl' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_imageurl', $_POST[ 'crr_pe_imageurl' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_cdstyle' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_cdstyle', $_POST[ 'crr_pe_cdstyle' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterbgwidth' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterbgwidth', $_POST[ 'crr_pe_counterbgwidth' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterbgcolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterbgcolor', $_POST[ 'crr_pe_counterbgcolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterdigitcolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterdigitcolor', $_POST[ 'crr_pe_counterdigitcolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterborderwidth' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterborderwidth', $_POST[ 'crr_pe_counterborderwidth' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterbordercolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterbordercolor', $_POST[ 'crr_pe_counterbordercolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_countercdholdercolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countercdholdercolor', $_POST[ 'crr_pe_countercdholdercolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterbgopacity' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterbgopacity', $_POST[ 'crr_pe_counterbgopacity' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterdigitbgopacity' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterdigitbgopacity', $_POST[ 'crr_pe_counterdigitbgopacity' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterborderradius' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterborderradius', $_POST[ 'crr_pe_counterborderradius' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_countertextborderwidth' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countertextborderwidth', $_POST[ 'crr_pe_countertextborderwidth' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_countertextbordercolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countertextbordercolor', $_POST[ 'crr_pe_countertextbordercolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_countercontbgbottomcolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countercontbgbottomcolor', $_POST[ 'crr_pe_countercontbgbottomcolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_counterbgbottomcolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_counterbgbottomcolor', $_POST[ 'crr_pe_counterbgbottomcolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_countertextothercolor' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_countertextothercolor', $_POST[ 'crr_pe_countertextothercolor' ]);
			}
			
			if( isset( $_POST[ 'crr_pe_conterdefaultdesigns' ] ) ) {
				update_post_meta( $post_id, 'crr_pe_conterdefaultdesigns', $_POST[ 'crr_pe_conterdefaultdesigns' ]);
			}
			
			
			
			// Saving for countdown
				$expiry_method = $_POST[ 'crr_pe_expireafter' ];
				$method=addslashes($_POST[ 'crr_pe_expirepagevisiby' ]);
				$url=addslashes($_POST[ 'crr_pe_redirecturl' ]);
				//$expiry_date_time = $_POST["expiry_date_time"];
				$timestamp=time();
				$timeZone = $_POST[ 'crr_pe_timezone' ];
			
				$expiry_date_time = $_POST[ 'crr_pe_datetime' ];
			
				
					if($expiry_method==0){
$userTimezone = new DateTimeZone($timeZone);
			try {
				$userdatetime = new DateTime($expiry_date_time,$userTimezone);
			
				$expiry_date_time = $userdatetime->format('m-d-Y H:i:s');
			
				$timestamp = $this->crrgettime_timezone($timeZone);
			
				//echo $expiry_date_time."<br />";
			
				$m = substr($expiry_date_time, 0, 2);
			
				$d = substr($expiry_date_time, 3, 2);
			
				$y = substr($expiry_date_time, 6, 4);
			
				$t =substr($expiry_date_time, 11, 8);
			
			
			
				//echo $month."---".$day."--".$year."<br />";
			
				//echo $time."<br />";
			
				$expiry_dateandtime = $y."-".$m."-".$d." ".$t;
			
						$timestamp=time();
				
						$timestamp = $this->crrgettime_timezone($timeZone);
				
						//$endtime = strtotime($_POST["expiry_date_time"]." 23:59:59");
				
						$expiry_dateandtime = $y."-".$m."-".$d." ".$t;
				
						$endtime = strtotime($expiry_dateandtime);
				
						$exptime = $endtime - $timestamp;
						
				}
				catch(Exception $e)
			  {
			  }
						//$expiry_dateandtime = $y."-".$m."-".$d." 23:59:59";
				
						
				
					}
				
					else if($expiry_method==2){
				
						$timestamp = $this->crrgettime_timezone($timeZone);
						$exptime = 0;
				
						$exptime = substr($expiry_date_time,0,2) * 24 * 60 * 60;
				
						$exptime+= substr($expiry_date_time,3,2) * 60 * 60;
				
						$exptime+= substr($expiry_date_time,6,2) * 60;
				
						$exptime+= substr($expiry_date_time,9,2);
				
						$expiry_dateandtime = "";
				
					}
					$time = $exptime;
					$pid=addslashes($post_id);
				
					$event=$_POST[ 'crr_pe_onfinish' ];
				
					$flash_path2=$xml_path_abs;//dirname(__FILE__);
				
					//move_uploaded_file($_FILES['imag']['tmp_name'],$flash_path2."/uploaded/".$_FILES['imag']['name']);
				
					$image=$_FILES['imag']['name'];
				
					$color_num=$_POST[ 'crr_pe_counterdigitcolor' ];
				
					$str=$_POST['myhexcode'];
				
					$myhexcode =str_replace('#','0x',$str);
				
					$splash_url=$_POST[ 'crr_pe_imageurl' ];
				
					$back_color=$_POST[ 'crr_pe_counterbgcolor' ];
					
					$border_width=$_POST[ 'crr_pe_counterborderwidth' ];
					
					$border_color=$_POST[ 'crr_pe_counterbordercolor' ];
					
					
					$str1=$_POST['myhexcode1'];
				
					$myhexcode1 =str_replace('#','0x',$str1);
				
					
				
					$counter_size=$_POST['counter_size'];
				
					$alignment=$_POST['alignment'];
				
					$hid_label=$_POST['hid_label']; 
				
					$day=$hid_label["day"];
				
					$hrs=$hid_label["hrs"];
				
					$mins=$hid_label["mins"];
				
					$secs=$hid_label["secs"]; 
				
					
				
					global $blog_id;
				
					global $current_blog;
				
					global $wpdb;
					
				
							$query="INSERT INTO ".$wpdb->prefix."crrcounterredirect (expiry_time,redirection_url,post_id,method,event,splash_url,color_num,myhexcode,back_color,myhexcode1,counter_size,alignment,day,hrs,mins,secs,timestamp,blog_id,expiry_date_time,expiry_method,time_zone,border_width,border_color) VALUES ('$time','$url',$pid,'$method','$event','$splash_url','$color_num','$myhexcode','$back_color','$myhexcode1','$counter_size','$alignment','$day','$hrs','$mins','$secs','$timestamp','$blog_id','$expiry_dateandtime','$expiry_method','$timeZone','$border_width','$border_color')";
	
					$query2="DELETE FROM ".$wpdb->prefix."crrcounterredirect WHERE post_id=$pid";
				
//					global $wpdb;
				
					
				
					$wpdb->query($query2);
				
					$wpdb->query($query);
				 
			
			
		}

	}
	
	private function crrgettime_timezone($timeZone, $datetime="")
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
	private function user_can_save( $post_id, $nonce ) {

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ $nonce ] ) && wp_verify_nonce( $_POST[ $nonce ], plugin_basename( __FILE__ ) ) ) ? true : false;
		return ! ( $is_autosave || $is_revision) && $is_valid_nonce;

	}

}