<?php

/*
Widget Name: Inzite Image Button
Description: Image with hovereffect and link.
Author: Me
Author URI: http://example.com
*/

class secondthought_image_button_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-image-button-widget',
			__('Inzite Image Button', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple device widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
			array(
				'image_button_image' => array(
	        'type' => 'media',
	        'label' => __( 'Image', 'secondthought_pagebuilder_bundle' ),
	        'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
	        'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
	        'library' => 'image'
		    ),
				'image_button_text' => array(
	        'type' => 'text',
	        'label' => __('Label', 'secondthought_pagebuilder_bundle'),
	        'default' => 'Some default text.'
		    ),
				'image_button_link' => array(
	        'type' => 'link',
	        'label' => __('Link', 'secondthought_pagebuilder_bundle'),
	        'default' => 'http://www.example.com'
		    ),
				'image_button_overlay_transparency' => array(
	        'type' => 'number',
	        'label' => __( 'Overlay transparency', 'secondthought_pagebuilder_bundle' ),
	        'default' => '70'
		    ),
				'image_button_height' => array(
	        'type' => 'number',
	        'label' => __( 'Button Height (In pixels)', 'secondthought_pagebuilder_bundle' ),
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
		wp_enqueue_script('image-loaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js');
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
