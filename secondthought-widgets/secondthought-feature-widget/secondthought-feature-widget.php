<?php

/*
Widget Name: Inzite Feature Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class secondthought_feature_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-feature-widget',
			__('Secondthought Feature Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple feature widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'header_text' => array(
	        'type' => 'text',
	        'label' => __('Header Text', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'label_text' => array(
	        'type' => 'text',
	        'label' => __('Caption Text', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'link' => array(
	        'type' => 'link',
	        'label' => __('Link', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'text_placement' => array(
	        'type' => 'radio',
	        'label' => __( 'Text placement', 'widget-form-fields-text-domain' ),
	        'default' => 'below',
	        'options' => array(
            'above' => __( 'Above image', 'widget-form-fields-text-domain' ),
            'below' => __( 'Below image', 'widget-form-fields-text-domain' ),
	        )
		    ),
				'image' => array(
		        'type' => 'media',
		        'label' => __( 'Image', 'widget-form-fields-text-domain' ),
		        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
		        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
		        'library' => 'image'
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-feature-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-feature-widget-style';
	}

	/**
	 * Enqueue the feature scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-feature-widget');
	}

}

siteorigin_widget_register('secondthought-feature-widget', __FILE__, 'Secondthought_feature_widget');

/**
 * Register all the feature scripts
 */
function secondthought_feature_register_scripts(){

	wp_register_script('secondthought-feature-widget', siteorigin_widget_get_plugin_dir_url('secondthought-feature-widget').'js/secondthought-feature-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_feature_register_scripts', 1);
