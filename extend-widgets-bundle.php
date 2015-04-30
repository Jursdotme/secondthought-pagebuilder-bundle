<?php

/*
Plugin Name: Secondthought Widget Pack
Description: A bundle of additional widgets and functions used with Secondthought theme framework and Sit Origin Pagebuilder.
Version: 1.4.3
Author: Rasmus Jürs
Author URI: http://jurs.me
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
GitHub Plugin URI: https://github.com/Jursdotme/secondthought-pagebuilder-bundle
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
