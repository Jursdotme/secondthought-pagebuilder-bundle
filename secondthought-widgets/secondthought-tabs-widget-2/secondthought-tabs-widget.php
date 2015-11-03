<?php

/*
Widget Name: Inzite Tabs Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class secondthought_tabs_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-tabs-widget',
			__('Inzite Tabs Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple tabs widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
			array(
				'tab_repeater' => array(
	        'type' => 'repeater',
	        'label' => __( 'Tabs' , 'secondthought_pagebuilder_bundle' ),
	        'item_name'  => __( 'Tab', 'siteorigin-widgets' ),
	        'item_label' => array(
            'selector'     => "[id*='repeat_text']",
            'update_event' => 'change',
            'value_method' => 'val'
	        ),
	        'fields' => array(
            'tab_label' => array(
              'type' => 'text',
              'label' => __( 'Label', 'secondthought_pagebuilder_bundle' )
            ),
						'tab_content' => array(
			        'type' => 'tinymce',
							'label' => __( 'Content', 'secondthought_pagebuilder_bundle' ),
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
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-tabs-widget');
	}

}

// siteorigin_widget_register('secondthought-tabs-widget', __FILE__, 'Secondthought_tabs_widget');

/**
 * Register all the tabs scripts
 */
function secondthought_tabs_register_scripts(){

	wp_register_script('secondthought-tabs-widget', siteorigin_widget_get_plugin_dir_url('secondthought-tabs-widget').'js/secondthought-tabs-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_tabs_register_scripts', 1);
