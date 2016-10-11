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
			__('Inzite Device Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple device widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(
			'image_lg_desktop' => array(
					'type' => 'media',
					'label' => __( 'Large Desktop', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			),
			'image_sm_desktop' => array(
					'type' => 'media',
					'label' => __( 'Small Desktop', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			),
			'image_tablet_portrait' => array(
					'type' => 'media',
					'label' => __( 'Tablet (Portrait)', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			),
			'image_tablet_landscape' => array(
					'type' => 'media',
					'label' => __( 'Tablet (Landscape)', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			),
			'image_mobile_portrait' => array(
					'type' => 'media',
					'label' => __( 'Mobile (Portrait)', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			),
			'image_mobile_landscape' => array(
					'type' => 'media',
					'label' => __( 'Mobile (Landscape)', 'secondthought_pagebuilder_bundle' ),
					'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
					'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
					'library' => 'image'
			)
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
