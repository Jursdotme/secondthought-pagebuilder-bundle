<?php

/*
Widget Name: Inzite Accordion Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class Secondthought_accordion_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-accordion-widget',
			__('Inzite Accordion Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple accordion widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'accordion_header' => array(
					'type' => 'text',
		  		'label' => __( 'Overskrift', 'widget-form-fields-text-domain' )
				),
				'accordion_repeater' => array(
	        'type' => 'repeater',
	        'label' => __( 'Accordion Tabs' , 'widget-form-fields-text-domain' ),
	        'item_name'  => __( 'Accordion Tab', 'siteorigin-widgets' ),
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
							'type' => 'tinymce',
							'label' => __( 'Content', 'widget-form-fields-text-domain' ),
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
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-accordion-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-accordion-widget-style';
	}

	/**
	 * Enqueue the accordion scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-accordion-widget');
	}

}

siteorigin_widget_register('secondthought-accordion-widget', __FILE__, 'Secondthought_accordion_widget');

/**
 * Register all the accordion scripts
 */
function secondthought_accordion_register_scripts(){

	wp_register_script('secondthought-accordion-widget', siteorigin_widget_get_plugin_dir_url('secondthought-accordion-widget').'js/secondthought-accordion-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_accordion_register_scripts', 1);
