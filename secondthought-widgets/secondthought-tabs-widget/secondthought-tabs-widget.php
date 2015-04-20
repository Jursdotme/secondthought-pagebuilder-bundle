<?php

/*
Widget Name: Secondthought Tabs Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class secondthought_tabs_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-tabs-widget',
			__('Secondthought Tabs Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple tabs widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'tab_repeater' => array(
	        'type' => 'repeater',
	        'label' => __( 'Tabs' , 'widget-form-fields-text-domain' ),
	        'item_name'  => __( 'Tab', 'siteorigin-widgets' ),
	        'item_label' => array(
            'selector'     => "[id*='repeat_text']",
            'update_event' => 'change',
            'value_method' => 'val'
	        ),
	        'fields' => array(
            'tab_label' => array(
              'type' => 'text',
              'label' => __( 'Label', 'widget-form-fields-text-domain' )
            ),
						'tab_content' => array(
			        'type' => 'textarea',
			        'label' => __( 'Content', 'widget-form-fields-text-domain' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
				    )
	        ),
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-tabs-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-tabs-widget-style';
	}

	/**
	 * Enqueue the tabs scripts
	 */
	function enqueue_frontend_scripts(){
		wp_enqueue_script('secondthought-tabs-widget');
	}

}

siteorigin_widget_register('secondthought-tabs-widget', __FILE__, 'Secondthought_tabs_widget');

/**
 * Register all the tabs scripts
 */
function secondthought_tabs_register_scripts(){

	wp_register_script('secondthought-tabs-widget', siteorigin_widget_get_plugin_dir_url('secondthought-tabs-widget').'js/secondthought-tabs-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_tabs_register_scripts', 1);
