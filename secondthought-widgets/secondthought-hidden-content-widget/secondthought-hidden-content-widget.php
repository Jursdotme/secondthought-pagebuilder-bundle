<?php

/*
Widget Name: Inzite Hidden content Widget
Description: A link that shows additional content hidden by default.
Author: Me
Author URI: http://example.com
*/

class secondthought_hidden_content_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-hidden-content-widget',
			__('Inzite Hidden content Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A link that shows additional content hidden by default.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
			array(
				'header_text' => array(
	        'type' => 'text',
	        'label' => __('Link tekst', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'content' => array(
		        'type' => 'tinymce',
		        'label' => __( 'Indhold', 'secondthought_pagebuilder_bundle' ),
		        'default' => '',
		        'rows' => 10,
		        'default_editor' => 'tinymce',
		        'button_filters' => array(
		            'mce_buttons' => array( $this, 'filter_mce_buttons' ),
		            'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
		            'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
		            'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
		            'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
		        ),
		    ),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-hidden-content-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-hidden-content-widget-style';
	}

	/**
	 * Enqueue the feature scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-hidden-content-widget');
	}

}

siteorigin_widget_register('secondthought-hidden-content-widget', __FILE__, 'secondthought_hidden_content_widget');

/**
 * Register all the feature scripts
 */
function secondthought_hidden_content_register_scripts(){

	wp_register_script('secondthought-hidden-content-widget', siteorigin_widget_get_plugin_dir_url('secondthought-hidden-content-widget').'js/secondthought-hidden-content-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_hidden_content_register_scripts', 1);
