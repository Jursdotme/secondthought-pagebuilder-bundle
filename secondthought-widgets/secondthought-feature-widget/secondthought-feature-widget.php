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
			__('Inzite Feature Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple feature widget.', 'secondthought_pagebuilder_bundle'),
			),
			array(),
			array(
				'header_text' => array(
	        'type' => 'text',
	        'label' => __('Header Text', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'label_text' => array(
	        'type' => 'text',
	        'label' => __('Caption Text', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'link' => array(
	        'type' => 'link',
	        'label' => __('Link', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'text_placement' => array(
	        'type' => 'radio',
	        'label' => __( 'Text placement', 'secondthought_pagebuilder_bundle' ),
	        'default' => 'below',
	        'options' => array(
            'above' => __( 'Above image', 'secondthought_pagebuilder_bundle' ),
            'below' => __( 'Below image', 'secondthought_pagebuilder_bundle' ),
	        )
		    ),
				'image' => array(
		        'type' => 'media',
		        'label' => __( 'Image', 'secondthought_pagebuilder_bundle' ),
		        'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
		        'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
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
