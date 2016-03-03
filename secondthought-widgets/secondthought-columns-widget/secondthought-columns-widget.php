<?php

/*
Widget Name: Inzite Columns Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class secondthought_columns_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-columns-widget',
			__('Inzite Columns Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple columns widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
			array(
				'column_tinymce_editor' => array(
		        'type' => 'tinymce',
		        'label' => __( 'Content.', 'widget-form-fields-text-domain' ),
		        'default' => '',
		        'rows' => 10,
		        'default_editor' => 'html',
		        'button_filters' => array(
		            'mce_buttons' => array( $this, 'filter_mce_buttons' ),
		            'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
		            'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
		            'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
		            'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
		        ),
		    ),
				'column_settings' => array(
		        'type' => 'section',
		        'label' => __( 'Settings' , 'widget-form-fields-text-domain' ),
		        'hide' => true,
		        'fields' => array(
								'column_number' => array(
									'type' => 'number',
									'label' => __( 'Maximum column count.', 'widget-form-fields-text-domain' ),
									'default' => '3'
								),
								'column_width' => array(
									'type' => 'measurement',
									'label' => __( 'Max column width', 'secondthought-hero' ),
									'default' => '15em',
								),
								'gutter_width' => array(
									'type' => 'measurement',
									'label' => __( 'Gutter width', 'secondthought-hero' ),
									'default' => '30px',
								)
		        )
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_less_variables( $instance ) {
    return array(
        'max_column_count' => $instance['column_settings']['column_number'],
        'max_column_width' => $instance['column_settings']['column_width'],
				'column_gap' => $instance['column_settings']['gutter_width'],
    );
	}

	function get_template_name($instance) {
		return 'secondthought-columns-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-columns-widget-style';
	}

}

siteorigin_widget_register('secondthought-columns-widget', __FILE__, 'Secondthought_columns_widget');
