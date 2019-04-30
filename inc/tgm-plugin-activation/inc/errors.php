<?php
/**
 * @package    TGM-Plugin-Activation
 * @subpackage Wpcast
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Error notices
 */



function wpcast_plugins_refresh__success() {
	?>
	<div class="notice notice-success is-dismissible">
		<h4><?php esc_html_e( 'Wpcast - The plugins list was successfully updated', 'wpcast' ); ?></h4>
	</div>
	<?php
}


// refreshing too fast
function wpcast_tgm_remote_refreshed__message(){
	?>
	<div class="notice notice-warning is-dismissible">
		<h4><?php esc_html_e( 'Heeeey!!! Slow down please! It seems you are pushing that button too much! Cooldown 20 seconds.', 'wpcast' ); ?></h4>
	</div>
	<?php
}

// allow refresh
function wpcast_plugins_notice__refresh() {
	$urladmin = admin_url( 'themes.php?page=wpcast-tgmpa-install-plugins' );
	$url = add_query_arg(
		array(
			'tgmpa-force' => '1',
			'tgmpa-force-nonce' => wp_create_nonce( 'tgmpa-force-nonce' )
		),
		$urladmin
	);
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'The stored list of required plugins is empty, do you want to try again?', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact us via email providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><?php esc_html_e( 'If you already tried this, please wait some time, the server can be under maintainance.', 'wpcast' ); ?></p>
		<p><a href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Try to refresh clicking here', 'wpcast' ); ?></a></p>
	</div>
	<?php
}


// Activation notice
function wpcast_plugins_notice__activationnag() {
	$scr = get_current_screen();
	if( $scr->id !== 'appearance_page_wpcast-tgmpa-install-plugins' &&  $scr->id !== 'appearance_page_wpcast-welcome' && !wpcast_tgm_pcv( wpcast_iid() ) ){
		?>
		<div class="notice notice-success is-dismissible wpcast-welcome__notice">
			<img src="<?php echo esc_url( get_theme_file_uri( '/inc/tgm-plugin-activation/img/logo.png' ) ); ?>" alt="logo">
			<h3><?php esc_html_e( 'Thanks for choosing WpCast!', 'wpcast' ); ?></h3>
			<p><a href="<?php echo admin_url().'themes.php?page=wpcast-welcome'; ?>"><?php esc_html_e( 'Please activate your license', 'wpcast' ); ?></a> <?php esc_html_e("to install the premium plugins and demo contents", 'wpcast') ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'wpcast_plugins_notice__activationnag' );



// generic error
function wpcast_plugins_notice__error() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'We are experiencing an error while searching for the required plugins. Please make sure your server or firewall are not blocking outgoing requests to our server.', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact us via email, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}
// generic error
function wpcast_plugins_notice__nolist() {
	?>
	<div class="notice notice-warning is-dismissible">
		<h3><?php esc_html_e( 'WpCast Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'It seems the list of plugins is actually empty. You can try searching again in a couple of minutes.', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact us via email, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}

// database error
function wpcast_plugins_update_error() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast TGM Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'There is some issue while saving data in your database, please check database permissions', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please check the Support section of your manual.', 'wpcast' ); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}

// connection error
function wpcast_plugins_conn__error() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'Your server is being blocked while searching for plugins. Please make sure your server or firewall are not blocking outgoing requests to our server.', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact us via email at, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}


// connection error server
function wpcast_plugins_conn__error_server() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast TGM Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, our server is temporary unable to retreive the plugins list. You may try in a few minutes or contact our helpdesk at, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}

// product ID missing
function wpcast_plugins_id_miss() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast TGM Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'Your server is not able to parse the product ID. Your firewall or server settings are blocking the request.', 'wpcast' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact us via email, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}

// product ID missing
function wpcast_plugins_id_miss_server() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'WpCast TGM Notice', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, our server is not able to handle your request. You may try in a few minutes or contact our helpdesk, providing the Envato purchase code.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
		<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Where is my purchase code?', 'wpcast' ); ?></a></p>
	</div>
	<?php
}

// Server responding wrong
function wpcast_plugins_conn__error_sever() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'Activation required', 'wpcast' ); ?></h3>
		<p><?php esc_html_e( 'Premium plugins require a valid purchase code activation.', 'wpcast' ); ?> <?php echo wpcast_support_message(); ?></p>
	</div>
	<?php
}


// Check if a purchase code is stored and if its structure is valid
function wpcast_tgm_pcv ( $req = false ){
	if(!is_admin()){
		return;
	}
	if(  trim($req) == 'pending' ){
		return true;
	}
	$rid = trim( $req );
	$rok = get_option( 'wpcast_ack_'.trim( $rid ) );
	if( $rok ){
		return true;
	}
	return false;
}