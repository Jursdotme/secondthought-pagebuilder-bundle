<?php

/*
Widget Name: Inzite Flexbox Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class Secondthought_flexbox_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-flexbox-widget',
			__('Inzite Flexbox Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple flexbox widget.', 'secondthought_pagebuilder_bundle'),
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
			'settings' => array(
				'type' => 'section',
				'label' => __( 'Flexbox Settings' , 'widget-form-fields-text-domain' ),
				'hide' => true,
				'fields' => array(
						'flex_direction' => array(
								'type' => 'select',
								'label' => __( 'Main axis of the items', 'widget-form-fields-text-domain' ),
								'default' => 'row',
								'options' => array(
										'row' => __( 'Row', 'widget-form-fields-text-domain' ),
										'row-reverse' => __( 'Row Reverse', 'widget-form-fields-text-domain' ),
										'column' => __( 'Column', 'widget-form-fields-text-domain' ),
										'column-reverese' => __( 'Column Reverse', 'widget-form-fields-text-domain' ),
								)
						),
						'flex_wrap' => array(
								'type' => 'select',
								'label' => __( 'Allow items to wrap', 'widget-form-fields-text-domain' ),
								'default' => 'nowrap',
								'options' => array(
										'nowrap' => __( 'No Wrap', 'widget-form-fields-text-domain' ),
										'wrap' => __( 'Wrap', 'widget-form-fields-text-domain' ),
										'wrap-reverse' => __( 'Wrap Reverse', 'widget-form-fields-text-domain' ),
								)
						),
						'justify_content' => array(
								'type' => 'select',
								'label' => __( 'Justification of the items', 'widget-form-fields-text-domain' ),
								'default' => 'flex-start',
								'options' => array(
										'flex-start' => __( 'Start', 'widget-form-fields-text-domain' ),
										'flex-end' => __( 'End', 'widget-form-fields-text-domain' ),
										'center' => __( 'Center', 'widget-form-fields-text-domain' ),
										'space-between' => __( 'Space out (no outer margin)', 'widget-form-fields-text-domain' ),
										'space-around' => __( 'Space out', 'widget-form-fields-text-domain' ),
								)
						),
						'align_items' => array(
								'type' => 'select',
								'label' => __( 'Item alignment', 'widget-form-fields-text-domain' ),
								'default' => 'stretch',
								'options' => array(
										'flex-start' => __( 'Start', 'widget-form-fields-text-domain' ),
										'flex-end' => __( 'End', 'widget-form-fields-text-domain' ),
										'center' => __( 'Center', 'widget-form-fields-text-domain' ),
										'stretch' => __( 'Stretch', 'widget-form-fields-text-domain' ),
										'baseline' => __( 'baseline', 'widget-form-fields-text-domain' ),
								)
						),
						'align_content' => array(
								'type' => 'select',
								'label' => __( 'Content alignment', 'widget-form-fields-text-domain' ),
								'default' => 'flex-start',
								'options' => array(
										'flex-start' => __( 'Start', 'widget-form-fields-text-domain' ),
										'flex-end' => __( 'End', 'widget-form-fields-text-domain' ),
										'center' => __( 'Center', 'widget-form-fields-text-domain' ),
										'stretch' => __( 'Stretch', 'widget-form-fields-text-domain' ),
										'space-between' => __( 'Space out (no outer margin)', 'widget-form-fields-text-domain' ),
										'space-around' => __( 'Space out', 'widget-form-fields-text-domain' ),
								)
						),
						'flex_grow' => array(
							'type' => 'text',
							'default' => '0',
							'label' => __( 'Grow', 'secondthought_pagebuilder_bundle' ),
							'description' => __('This defines the ability for a flex item to grow if necessary. It accepts a unitless value that serves as a proportion. It dictates what amount of the available space inside the flex container the item should take up.</br>If all items have flex-grow set to 1, the remaining space in the container will be distributed equally to all children. If one of the children a value of 2, the remaining space would take up twice as much space as the others (or it will try to, at least).', 'secondthought_pagebuilder_bundle')
						),
						'flex_shrink' => array(
							'type' => 'text',
							'default' => '1',
							'label' => __( 'Shrink', 'secondthought_pagebuilder_bundle' ),
							'description' => __('This defines the ability for a flex item to shrink if necessary.', 'secondthought_pagebuilder_bundle')
						),
						'flex_basis' => array(
							'type' => 'text',
							'default' => 'auto',
							'label' => __( 'Basis', 'secondthought_pagebuilder_bundle' ),
							'description' => __('This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property" (which was temporarily done by the main-size keyword until deprecated). The content keyword means "size it based on the items content" - this keyword is not well supported yet, so it is hard to test and harder to know what its brethren max-content, min-content, and fit-content do.', 'secondthought_pagebuilder_bundle')
						),
						'min_width' => array(
							'type' => 'text',
							'default' => '',
							'label' => __( 'Minimum item Width', 'secondthought_pagebuilder_bundle' ),
							// 'description' => __('This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property" (which was temporarily done by the main-size keyword until deprecated). The content keyword means "size it based on the items content" - this keyword is not well supported yet, so it is hard to test and harder to know what its brethren max-content, min-content, and fit-content do.', 'secondthought_pagebuilder_bundle')
						),
						'max_width' => array(
							'type' => 'text',
							'default' => '',
							'label' => __( 'Maximum item Width', 'secondthought_pagebuilder_bundle' ),
							// 'description' => __('This defines the default size of an element before the remaining space is distributed. It can be a length (e.g. 20%, 5rem, etc.) or a keyword. The auto keyword means "look at my width or height property" (which was temporarily done by the main-size keyword until deprecated). The content keyword means "size it based on the items content" - this keyword is not well supported yet, so it is hard to test and harder to know what its brethren max-content, min-content, and fit-content do.', 'secondthought_pagebuilder_bundle')
						),
				)
			),
			'flexbox_repeater' => array(
				'type' => 'repeater',
				'label' => __( 'flexbox Tabs' , 'secondthought_pagebuilder_bundle' ),
				'item_name'  => __( 'flexbox Tab', 'siteorigin-widgets' ),
				'item_label' => array(
					'selector'     => "[id*='repeat_text']",
					'update_event' => 'change',
					'value_method' => 'val'
				),
				'fields' => array(
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
					),
				),
			)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-flexbox-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-flexbox-widget-style';
	}

	/**
	 * Enqueue the flexbox scripts
	 */


	function get_less_variables( $instance ) {
    return array(
				'st_flex_direction' => $instance['settings']['flex_direction'],
				'st_flex_wrap' => $instance['settings']['flex_wrap'],
				'st_justify_content' => $instance['settings']['justify_content'],
				'st_align_items' => $instance['settings']['align_items'],
				'st_align_content' => $instance['settings']['align_content'],
				// Items
				'st_flex_grow' => $instance['settings']['flex_grow'],
				'st_flex_shrink' => $instance['settings']['flex_shrink'],
				'st_flex_basis' => $instance['settings']['flex_basis'],
				'st_max_width' => $instance['settings']['max_width'],
				'st_min_width' => $instance['settings']['min_width'],
    );
	}

}

siteorigin_widget_register('secondthought-flexbox-widget', __FILE__, 'Secondthought_flexbox_widget');

/**
 * Register all the flexbox scripts
 */
function secondthought_flexbox_register_scripts(){

	wp_register_script('secondthought-flexbox-widget', siteorigin_widget_get_plugin_dir_url('secondthought-flexbox-widget').'js/secondthought-flexbox-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_flexbox_register_scripts', 1);
