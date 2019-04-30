<?php
/**
 * 
 * @package WordPress
 * @subpackage One Click Demo Import
 * @subpackage wpcast
 * @version 1.0.0
 * Settings for the demo import
 * https://wordpress.org/plugins/one-click-demo-import/
 * 
*/

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function wpcast_ocdi_import_files() {
	$url = 'http://qantumthemes.xyz/public_plugins/wpcast/demodata-20190103/';



	return array(
		array(
			'import_file_name'           => 'Wpcast Demo',
			'categories'                 => array( 'Category 1', 'Category 2' ),
			'import_file_url'            => $url.'wpcastdemo.wordpress.2019-02-04.xml',
			'import_widget_file_url'     => $url.'wpcast.qantumthemes.xyz-demo-widgets.wie',
			'import_customizer_file_url' => $url.'wpcast-child-export.json',
			'import_notice'              => esc_html__( 'IMPORTANT NOTICE BEFORE PROCEEDING: Please be sure you actived the Wpcast Child theme for an optimal result, or the customizations won\'t be imported. Also, please, make sure all the required plugins are activated. All demo content will be imported under the current user.', 'wpcast' ),
			'preview_url'                => 'https://wpcast.qantumthemes.xyz/demo/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'wpcast_ocdi_import_files' );



function wpcast_ocdi_after_import_setup() {
	$primary_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
	$secondary_menu = get_term_by( 'name', 'Secondary', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
	$notfound_menu = get_term_by( 'name', '404', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
			'wpcast_menu_primary' => $primary_menu->term_id,
			'wpcast_menu_secondary' => $secondary_menu->term_id,
			'wpcast_menu_footer' => $footer_menu->term_id,
			'wpcast_menu_notfound' => $notfound_menu->term_id
		)
	);
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'wpcast_ocdi_after_import_setup' );