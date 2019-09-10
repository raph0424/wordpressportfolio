<?php
/**
 * Plugin Name: Meteohub
 * Description: Displays data from a meteohub file in the content with shorttags.
 * Version: 1.1
 * Author: Daan Oostindiën
 * Author URI: http://www.oostindien.eu
 * License: GPL
 */

/** Step 2 (from text above). */
add_action( 'admin_menu', 'Meteohub_menu' );

/** Step 1. */
function Meteohub_menu() {
	add_options_page( 'Meteohub Options', 'Meteohub', 'manage_options', 'Meteohub', 'Meteohub_options' );
	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
	//register our settings
	register_setting( 'Meteohub-group', 'pad' );
	register_setting( 'Meteohub-group', 'datumtijdkoppel' );
	register_setting( 'Meteohub-group', 'spatieren' );
}

/** Step 3. */
function Meteohub_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
		<div class="wrap">
			<h2><?php _e('Meteohub settings'); ?></h2>
				<form method="post" action="options.php"> 
				<?php settings_fields( 'Meteohub-group' ); ?>
				<?php do_settings_sections( 'Meteohub-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e('Location of the Meteohub all-sensors.txt file'); ?></th>
						<td><input type="text" name="pad" value="<?php echo get_option('pad'); ?>" /></td>
						<td><?php _e('This can either be an URL or a path. Make sure the path is valid.<br>The current full path is:'); ?> '<?php echo getcwd(); ?>'</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Time and date separator:'); ?></th>
						<td><input type="text" name="datumtijdkoppel" value="<?php echo get_option('datumtijdkoppel'); ?>" /></td>
						<td><?php _e("Will be the separator between the date and time in case of full datetime fields. ie: 24-03-2014 <i>on</i> 11:52. (where ' on ' is the separator). Default is a space."); ?></td>
					</tr>
					<tr valign="top">
					<th scope="row">&nbsp;</th>
						<td><label><input type="checkbox" name="spatieren" value="1" <?php echo checked( '1' == get_option('spatieren'), true ); ?>><?php _e('Add spaces around separator.'); ?></label></td>
						<td><?php _e('Because WordPress keeps trimming my separator field.'); ?></td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
			<div class="donate" style="background-color: #FEFF99; border: 1px solid #FDE8AF; border-radius: 5px; text-align: center;">
				<br>
				<?php _e('Love me? Show me!'); ?>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
					<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
					<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
				</form>
				<br>
			</div>
		</div>
	<?php
}
 
function tijd($string){
	return date("H:i",strtotime($string)); // Aanpassen? check: http://php.net/manual/en/function.date.php
}

function laadData(){
	// sensor bestand pad
	$lines = file(get_option('pad'));
	 
	 // Alles even netjes in een Array zetten.
	foreach ($lines as $line_num => $line) {
		$spatie = strpos($line," ");
		$data[substr($line,0,$spatie)] = substr($line, $spatie);
	}
	
	return $data;
}

function meteohub_func( $atts ) {
	extract( shortcode_atts( array(
		'sensor' => '',
	), $atts ) );
	
	if(!$data = laadData()){
		return 'Error!';
	}

	$output = $data[$sensor];

	$dateformatstring = get_option('date_format');
	$timeformatstring = get_option('time_format');
	$spatieren = get_option('spatieren');
	$koppel = get_option('datumtijdkoppel');
	if($spatieren){
		$koppel = ' ' . $koppel . ' ';
	}
	if(strstr($sensor, '_trend')){
		$path = '/wp-content/plugins/meteohub';
		if($output == 1){
			$output = '<img style="vertical-align: middle;" src="' . $path . '/images/pijltjerood.gif">';
		}elseif($output == 0){
			$output = '<img style="vertical-align: middle;" src="' . $path . '/images/pijltjezwart.gif">';
		}elseif($output == -1){
			$output = '<img style="vertical-align: middle;" src="' . $path . '/images/pijltjeblauw.gif">';
		}
	}elseif(strstr($sensor, 'puredate')){
		$output = date_i18n( $dateformatstring, strtotime($output));// date("d-m-Y", strtotime($output));
	}elseif(preg_match("/alltime_.*?_time/", $sensor) || preg_match("/year1_.*?_time/", $sensor) || preg_match("/month1_.*?_time/", $sensor)){
		$output = date_i18n($dateformatstring, strtotime($output)) . (!empty($koppel)? $koppel : ' ') . date_i18n($timeformatstring, strtotime($output));//date("d-m-Y \o\m H:i", strtotime($output));
	}elseif(strstr(str_replace("alltime", "", $sensor), 'time')){
		$output = date_i18n( $timeformatstring, strtotime($output));
	}
	
	return $output;
}
add_shortcode( 'meteohub', 'meteohub_func' );
add_shortcode( 'meteodata', 'meteohub_func' );