<?php
/**
* Plugin Name: Protect BenignSource
* Plugin URI: http://www.benignsource.com/
* Version: 2.0
* Author: BenignSource
* Author URI: http://www.benignsource.com/
* Description: Protect your WordPress from be used or downloaded!
* License: GPL2
*/

class ProtectBenignSourceOne {
	/**
	* Constructor
	*/
	public function __construct() {

		// Plugin Details
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'protect-benignsource'; // Plugin Folder
        $this->plugin->displayName  = 'Protect BenignSource'; // Plugin Name
        $this->plugin->version      = '1.0';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->url          = plugin_dir_url( __FILE__ );

		// Hooks
		add_action('admin_init', array(&$this, 'registerSettings'));
        add_action('admin_menu', array(&$this, 'adminPanelsAndprotectbenignsource'));
		
global $pbs_db_version;
$pbs_db_version = '2.0';
function protectbenignsource_denyip_install() {
	global $wpdb;
	global $pbs_db_version;
	$pbstable_name = $wpdb->prefix . 'protectbenignsource_denyip';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $pbstable_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ipaddress varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'pbs_db_version', $pbs_db_version );
}
register_activation_hook( __FILE__, 'protectbenignsource_denyip_install' );     
function protectbenignsource_denydomain_install() {
	global $wpdb;
	global $pbs_db_version;
	$pbstable_name = $wpdb->prefix . 'protectbenignsource_denydomain';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $pbstable_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		domain varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'pbs_db_version', $pbs_db_version );
}
register_activation_hook( __FILE__, 'protectbenignsource_denydomain_install' );  
function protectbenignsource_automatic_ban_install() {
	global $wpdb;
	global $pbs_db_version;
	$pbstable_name = $wpdb->prefix . 'protectbenignsource_automatic_ban';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $pbstable_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ipaddress varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'pbs_db_version', $pbs_db_version );
}
register_activation_hook( __FILE__, 'protectbenignsource_automatic_ban_install' );  
function protectbenignsource_allowip_install() {
	global $wpdb;
	global $pbs_db_version;
	$pbstable_name = $wpdb->prefix . 'protectbenignsource_allowip';
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $pbstable_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ipaddress varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'pbs_db_version', $pbs_db_version );
}
register_activation_hook( __FILE__, 'protectbenignsource_allowip_install' );  
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
 }
}	
	/**
	* Register Settings
	*/
	function registerSettings() {
		register_setting($this->plugin->name, 'benign_protectbs_load_footer', 'trim');
		register_setting($this->plugin->name, 'pbs_deny_baidu', 'trim');
		register_setting($this->plugin->name, 'pbs_deny_yandex', 'trim');
		register_setting($this->plugin->name, 'pbs_deny_acunetix', 'trim');
		register_setting($this->plugin->name, 'pbs_deny_fhscan', 'trim');
		register_setting($this->plugin->name, 'pbs_redirect', 'trim');
		register_setting($this->plugin->name, 'pbs_redirectlogout', 'trim');
		register_setting($this->plugin->name, 'pbs_applyredirect', 'trim');
		register_setting($this->plugin->name, 'pbs_applyredirectlogout', 'trim');
	}
	/**
    * Register the plugin settings panel
    */
    function adminPanelsAndprotectbenignsource() {
    	add_submenu_page('options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array(&$this, 'adminPanel'));
	}
    /**
    * Output the Administration Panel
    * Save POSTed data from the Administration Panel into a WordPress option
    */
    function adminPanel() {
    	// Save Settings
        if (isset($_POST['submit'])) {
        	// Check nonce
        	if (!isset($_POST[$this->plugin->name.'_nonce'])) {
	        	// Missing nonce	
	        	$this->errorMessage = __('nonce field is missing. Settings NOT saved.', $this->plugin->name);
        	} elseif (!wp_verify_nonce($_POST[$this->plugin->name.'_nonce'], $this->plugin->name)) {
	        	// Invalid nonce
	        	$this->errorMessage = __('Invalid nonce specified. Settings NOT saved.', $this->plugin->name);
        	} else {        	
	        	// Save
	    		$benign_protectbs_load_footer = sanitize_text_field( $_POST['benign_protectbs_load_footer'] );
				update_option( 'benign_protectbs_load_footer', $benign_protectbs_load_footer );
				$this->message = __('Settings Saved.', $this->plugin->name);
			}
        }
		if (isset($_POST['applydenybaidu'])) {    	
	        	// Save
				$pbs_deny_baidu = sanitize_text_field( $_POST['pbs_deny_baidu'] );
	    		update_option('pbs_deny_baidu', $pbs_deny_baidu);
				$this->message = __('Settings Saved.', $this->plugin->name);	
        }
		if (isset($_POST['applydenyyandex'])) {	
	        	// Save
				$pbs_deny_yandex = sanitize_text_field( $_POST['pbs_deny_yandex'] );
				update_option('pbs_deny_yandex', $pbs_deny_yandex);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		if (isset($_POST['applydenyacunetix'])) {	
	        	// Save
				$pbs_deny_acunetix = sanitize_text_field( $_POST['pbs_deny_acunetix'] );
				update_option('pbs_deny_acunetix', $pbs_deny_acunetix);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		if (isset($_POST['applydenyfhscan'])) {
             	
	        	// Save
				$pbs_deny_fhscan = sanitize_text_field( $_POST['pbs_deny_fhscan'] );
				update_option('pbs_deny_fhscan', $pbs_deny_fhscan);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		if (isset($_POST['applyredirect'])) {   	
	        	// Save
				$pbs_redirect = sanitize_text_field( $_POST['pbs_redirect'] );
				update_option('pbs_redirect', $pbs_redirect);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		if (isset($_POST['applyredirecton'])) {	
	        	// Save
				$pbs_applyredirect = sanitize_text_field( $_POST['pbs_applyredirect'] );
				update_option('pbs_applyredirect', $pbs_applyredirect);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		
        if (isset($_POST['applyredirectlogout'])) {   	
	        	// Save
				$pbs_redirectlogout = sanitize_text_field( $_POST['pbs_redirectlogout'] );
				update_option('pbs_redirectlogout', $pbs_redirectlogout);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }
		if (isset($_POST['applyredirectonlogout'])) {   	
	        	// Save
				$pbs_applyredirectlogout = sanitize_text_field( $_POST['pbs_applyredirectlogout'] );
				update_option('pbs_applyredirectlogout', $pbs_applyredirectlogout);
				$this->message = __('Settings Saved.', $this->plugin->name);
        }

        // Get latest settings
        $this->settings = array(
        	'benign_protectbs_load_footer' => stripslashes(get_option('benign_protectbs_load_footer')),
			'pbs_deny_baidu' => stripslashes(get_option('pbs_deny_baidu')),
			'pbs_deny_yandex' => stripslashes(get_option('pbs_deny_yandex')),
			'pbs_deny_acunetix' => stripslashes(get_option('pbs_deny_acunetix')),
			'pbs_deny_fhscan' => stripslashes(get_option('pbs_deny_fhscan')),
			'pbs_redirect' => stripslashes(get_option('pbs_redirect')),
			'pbs_applyredirect' => stripslashes(get_option('pbs_applyredirect')),
			'pbs_redirectlogout' => stripslashes(get_option('pbs_redirectlogout')),
			'pbs_applyredirectlogout' => stripslashes(get_option('pbs_applyredirectlogout')),
        );
    	// Load Settings Form
        include_once(WP_PLUGIN_DIR.'/'.$this->plugin->name.'/settings/settings.php');  
    }
}
?>
<?php

// Redirect wp-login
$applyredirect = get_option('pbs_applyredirect');
if ($applyredirect < 1 ){
}else{
add_action('init','custom_login');
function custom_login(){
$pbsredirect = get_option('pbs_redirect');
global $pagenow;
if( 'wp-login.php' == $pagenow ) {
wp_redirect($pbsredirect);
  exit();
  }
 }
}
// Redirect Logout
$applyredirectlogout = get_option('pbs_applyredirectlogout');
if ($applyredirectlogout < 1 ){
}else{
add_action( 'wp_logout', 'auto_redirect_external_after_logout');
function auto_redirect_external_after_logout(){
$pbsredirectlogout = get_option('pbs_redirectlogout');
global $pbslogout;
if( 'wp-login.php' == $pbslogout ) {
  wp_redirect($pbsredirectlogout);
  exit();
  }
 }
}
 
?>
<?php
    /**
	* After saving your WordPress automatically becomes protected from: Copy Text, Right Click, Save Images
	*/
add_action('wp_head', 'benign_protectbs_load_head');
function benign_protectbs_load_head() {
?>
<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
<script type="text/javascript">
function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
</script><script type="text/javascript">
document.oncontextmenu=function(e){var t=e||window.event;var n=t.target||t.srcElement;if(n.nodeName!="A")return false};
document.ondragstart=function(){return false};
</script><script type="text/javascript">
window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==70||e.which==73||e.which==80||e.which==83||e.which==85)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==70||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85)){}return false}</script><script type="text/javascript">
document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}</script>
<?php } ?>
<?php

    /**
	* Protect your WordPress from being loaded in another website
	*/

add_action('wp_footer', 'benign_protectbs_load_footer');
function benign_protectbs_load_footer() {
$benign_protectbs_load_footer = get_option('benign_protectbs_load_footer');
?>
<script type='text/javascript'>
    var u = top.location.toString();
    var domain = '<?php echo $benign_protectbs_load_footer; ?>'.toString();
    var domain_decrypted = domain.replace(/135/gi, '');

    if (u.indexOf(domain_decrypted) == -1) {
        top.location = 'http://' + domain_decrypted;
    }
</script>
<?php } ?>
<?php
/**
 * Register BenignSource menu page.
 */
 
if (! function_exists('bs_register_benignsource_menu_page')){
function bs_register_benignsource_menu_page() {
    add_menu_page(
        __( 'BenignSource', 'BenignSource' ),
        'BenignSource',
        'manage_options',
        'protect-benignsource/plugins.php',
        '',
        plugins_url( 'protect-benignsource/img/icon.png' ),
        6
    );
}
add_action( 'admin_menu', 'bs_register_benignsource_menu_page' ); 
}else{
}
function load_custom_pbs_admin_style() {
       
        wp_enqueue_style( 'custom_bs_admin_css', plugins_url('css/style.css', __FILE__) );
		wp_enqueue_script( 'custom_bs_admin_css', plugins_url('css/tabs.js', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'load_custom_pbs_admin_style' );

?>
<?php $benign_protectbs = new ProtectBenignSourceOne(); ?>