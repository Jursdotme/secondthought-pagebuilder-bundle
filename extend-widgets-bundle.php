<?php

/*
Plugin Name: Secondthought Widget Pack
Description: An example plugin to demonstrate extending the SiteOrigin Widgets Bundle.
Version: 0.1
Author: Rasmus Jürs
Author URI: http://siteorigin.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
*/

function secondthought_widgets_collection($folders){
	$folders[] = plugin_dir_path(__FILE__).'secondthought-widgets/';
	return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'secondthought_widgets_collection');


// Add Overall additions

function secondthought_addons_scripts() {
    wp_register_style( 'secondthought-styles',  plugin_dir_url( __FILE__ ) . 'build/stylesheets/secondthought-addons-styles.css' );
    wp_enqueue_style( 'secondthought-styles' );

		wp_register_script( 'secondthought-scripts',  plugin_dir_url( __FILE__ ) . 'build/scripts/secondthought-addons-scripts.js' );
    wp_enqueue_script( 'secondthought-scripts' );
}
add_action( 'wp_enqueue_scripts', 'secondthought_addons_scripts' );
