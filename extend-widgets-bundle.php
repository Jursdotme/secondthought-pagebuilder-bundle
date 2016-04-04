<?php

/*
Plugin Name: Secondthought Widget Pack
Description: A bundle of additional widgets and functions used with Secondthought theme framework and Site Origin Pagebuilder.
Version: 1.14.8
Author: Rasmus Jürs / Johnnie Bertelsen
Author URI: http://jurs.me
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
GitHub Plugin URI: https://github.com/Jursdotme/secondthought-pagebuilder-bundle
GitHub Branch: master
*/

/**
 * Initialize the language files
 */
function secondthought_widget_bundle_init_lang(){
	load_plugin_textdomain('secondthought_pagebuilder_bundle', false, dirname( plugin_basename( __FILE__ ) ). '/lang/');
}
add_action('plugins_loaded', 'secondthought_widget_bundle_init_lang');


// All the custom fields
require_once plugin_dir_path(__FILE__) . 'inc/custom-fields-row.php';
require_once plugin_dir_path(__FILE__) . 'inc/custom-fields-widget.php';

function secondthought_widgets_collection($folders){
	$folders[] = plugin_dir_path(__FILE__).'secondthought-widgets/';
	return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'secondthought_widgets_collection');

// Add Overall additions

function secondthought_addons_scripts() {
    wp_register_style( 'secondthought-styles',  plugin_dir_url( __FILE__ ) . 'build/stylesheets/secondthought-addons-styles.css' );
    wp_enqueue_style( 'secondthought-styles' );

		wp_register_style('awesomefonts', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '1.0', 'all');
  	wp_enqueue_style('awesomefonts'); // Enqueue it!
}
add_action( 'wp_enqueue_scripts', 'secondthought_addons_scripts' );

function secondthought_addons_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

      wp_deregister_script( 'jquery' ); // Deregister WordPress jQuery

      wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", array(), '1.11.0', true); // jQuery
      wp_enqueue_script('jquery'); // Enqueue it!

			wp_register_script( 'secondthought-addons-scripts',  plugin_dir_url( __FILE__ ) . 'build/scripts/secondthought-addons-scripts.js', 'jquery', '1.0.0', true );
	    wp_enqueue_script( 'secondthought-addons-scripts' );

    }
}

add_action('init', 'secondthought_addons_header_scripts'); // Add Custom Scripts to wp_head

//pannel Group

function inzite_group($tabs) {
    $tabs[] = array(
        'title' => __('Inzite Widgets', 'inzite'),
        'filter' => array(
            'groups' => array('inzite')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'inzite_group', 20);

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
