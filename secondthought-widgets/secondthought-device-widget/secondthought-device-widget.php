<?php

/*
Widget Name: Inzite Device Widget
Description: Add morphing device screenshots.
Author: Me
Author URI: http://example.com
*/

class secondthought_device_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-device-widget',
			__('Inzite Device Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple device widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'image_lg_desktop' => array(
		        'type' => 'media',
		        'label' => __( 'Large Desktop', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    ),
				'image_sm_desktop' => array(
		        'type' => 'media',
		        'label' => __( 'Small Desktop', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    ),
				'image_tablet_portrait' => array(
		        'type' => 'media',
		        'label' => __( 'Tablet (Portrait)', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    ),
				'image_tablet_landscape' => array(
		        'type' => 'media',
		        'label' => __( 'Tablet (Landscape)', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    ),
				'image_mobile_portrait' => array(
		        'type' => 'media',
		        'label' => __( 'Mobile (Portrait)', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    ),
				'image_mobile_landscape' => array(
		        'type' => 'media',
		        'label' => __( 'Mobile (Landscape)', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-device-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-device-widget-style';
	}

	/**
	 * Enqueue the device scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought_device_widget_script');
	}

}

siteorigin_widget_register('secondthought-device-widget', __FILE__, 'Secondthought_device_widget');

/**
 * Register all the device scripts
 */
function secondthought_device_register_scripts(){

	wp_enqueue_script('secondthought_device_widget_script', siteorigin_widget_get_plugin_dir_url('secondthought-device-widget').'js/secondthought-device-widget.js','', SOW_BUNDLE_VERSION, '', 0);
}
add_action('wp_enqueue_scripts', 'secondthought_device_register_scripts', 1);
