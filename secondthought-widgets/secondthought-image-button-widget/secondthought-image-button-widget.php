<?php

/*
Widget Name: Inzite Image Button
Description: Add morphing device screenshots.
Author: Me
Author URI: http://example.com
*/

class secondthought_image_button_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-image-button-widget',
			__('Inzite Image Button', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple device widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'image_button_image' => array(
	        'type' => 'media',
	        'label' => __( 'Image', 'widget-form-fields-text-domain' ),
	        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
	        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
	        'library' => 'image'
		    ),
				'image_button_text' => array(
	        'type' => 'text',
	        'label' => __('Label', 'widget-form-fields-text-domain'),
	        'default' => 'Some default text.'
		    ),
				'image_button_link' => array(
	        'type' => 'link',
	        'label' => __('Link', 'widget-form-fields-text-domain'),
	        'default' => 'http://www.example.com'
		    ),
				'image_button_overlay_transparency' => array(
	        'type' => 'number',
	        'label' => __( 'Overlay transparency', 'widget-form-fields-text-domain' ),
	        'default' => '70'
		    ),
				'image_button_height' => array(
	        'type' => 'number',
	        'label' => __( 'Button Height (In pixels)', 'widget-form-fields-text-domain' ),
	        'default' => '300'
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-image-button-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-image-button-widget-style';
	}

	/**
	 * Enqueue the device scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought_image_button_widget_script');
	}

}

siteorigin_widget_register('secondthought-image-button-widget', __FILE__, 'Secondthought_image_button_widget');

/**
 * Register all the device scripts
 */
function secondthought_image_button_register_scripts(){

	wp_enqueue_script('secondthought_image_button_widget_script', siteorigin_widget_get_plugin_dir_url('secondthought-image-button-widget').'js/secondthought-image-button-widget.js','', SOW_BUNDLE_VERSION, '', 0);
}
add_action('wp_enqueue_scripts', 'secondthought_image_button_register_scripts', 1);
