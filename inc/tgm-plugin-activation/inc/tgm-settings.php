<?php
/**
 * @package    TGM-Plugin-Activation
 * @subpackage Wpcast
 **/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'tgmpa_register', 'wpcast_register_required_plugins' );
function wpcast_register_required_plugins() {


	if(!is_admin()){
		return;
	}

	$plugins = array(
		array(
			'name'				=> 'Easy SwipeBox - mobile-friendly Lightbox',
			'slug'				=> 'easy-swipebox',
		),
		array(
			'name'				=> 'MailChimp for WordPress', 
			'slug'				=> 'mailchimp-for-wp'
		),
		array(
			'name'				=> 'Contact Form 7',
			'slug'				=> 'contact-form-7',
		),
		array(
			'name'				=> 'Category Order and Taxonomy Terms Order',
			'slug'				=> 'taxonomy-terms-order',
		),
		array(
			'name'				=> 'Category Order and Taxonomy Terms Order',
			'slug'				=> 'taxonomy-terms-order',
		),
	);

	$additional_plugins = wpcast_get_pluginslist( wpcast_additional_plugins_url() );
	if( $additional_plugins ){
		$plugins = array_merge (
			$additional_plugins,
			$plugins
		);
	}

	if( is_array( $plugins ) ) {

		if( count( $plugins ) > 0 ) {
			$config = array(
				'id'           => 'wpcast-tgmpa',
				'default_path' => '',
				'menu'         => 'wpcast-tgmpa-install-plugins',
				'parent_slug'  => 'themes.php',
				'capability'   => 'edit_theme_options',
				'has_notices'  => true,
				'dismissable'  => true,
				'dismiss_msg'  => '',
				'is_automatic' => true,
				'message'      => wpcast_message_tgm()
			);
			tgmpa( $plugins, $config );
		} else {
			// It seems that something is wrong, let's display a link to refresh this
			add_action( 'admin_notices', 'wpcast_plugins_notice__refresh' );
		}
	} else {
		 add_action( 'admin_notices', 'wpcast_plugins_notice__nolist' );
	}

}