<?php  
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function wpcast_additional_plugins_url(){
	return 'http://qantumthemes.xyz/t2gconnector-comm/wpcast/tgm-json/';
}
function wpcast_tgm_iid_url(){
	return 'http://qantumthemes.xyz/t2gconnector-comm/wpcast/iid/';
}
function wpcast_connector_url(){
	return 'http://envato-connector.qantumthemes.xyz/';
}
function wpcast_support_message(){
	return 'Please contact us at info@qantumthemes.com';
}

/**
 * This is the list of plugins used by TGM
 * It can be extended by our repository list which can be fetched dynamically.
 */
function wpcast_default_plugins_list(){
	return array(
		array(
            'name'				=> 'Give – Donation Plugin and Fundraising Platform',
            'slug'				=> 'give',
		),
		array(
            'name'				=> 'Easy SwipeBox - mobile-friendly Lightbox',
            'slug'				=> 'easy-swipebox',
		),
		array(
            'name'				=> 'MailChimp for WordPress', 
            'slug'				=> 'mailchimp-for-wp'
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
}