<?php

/*
Widget Name: Inzite Slider Widget v2
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class Secondthought_slider_widget_2 extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-slider-widget-2',
			__('Inzite Slider Widget v2', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple slider widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(

			),
			array(
				'slider_2_repeater' => array(
	        'type' => 'repeater',
	        'label' => __( 'A repeating repeater.' , 'widget-form-fields-text-domain' ),
	        'item_name'  => __( 'Repeater item', 'siteorigin-widgets' ),
	        'item_label' => array(
            'selector'     => "[id*='repeat_text']",
            'update_event' => 'change',
            'value_method' => 'val'
	        ),
	        'fields' => array(
						'tinymce_editor' => array(
			        'type' => 'tinymce',
			        'label' => __( 'Visually edit, richly.', 'widget-form-fields-text-domain' ),
			        'default' => 'An example of a long message.</br>It is even possible to add a few html tags.</br><a href="siteorigin.com" target="_blank"">Links!</a>',
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

						'background_image' => array(
				      'type' => 'media',
				      'label' => __( 'Choose a background image', 'widget-form-fields-text-domain' ),
				      'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
				      'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
				      'library' => 'image',
				      'fallback' => true
					  )
	        ),


		    ),
				'content_width' => array(
					'type' => 'slider',
					'label' => __( 'Content width', 'widget-form-fields-text-domain' ),
					'default' => 100,
					'min' => 0,
					'max' => 100,
					'integer' => true
				),
				'horizontal_align_radio' => array(
					'type' => 'select',
					'label' => __( 'Align content', 'widget-form-fields-text-domain' ),
					'default' => 'left',
					'options' => array(
						'left' => __( 'Left', 'widget-form-fields-text-domain' ),
						'right' => __( 'Right', 'widget-form-fields-text-domain' ),
						'middle' => __( 'Middle', 'widget-form-fields-text-domain' )
					)
				),
				'vertical_align_radio' => array(
					'type' => 'select',
					'label' => __( 'Align content', 'widget-form-fields-text-domain' ),
					'default' => 'center',
					'options' => array(
						'top' => __( 'Top', 'widget-form-fields-text-domain' ),
						'center' => __( 'Center', 'widget-form-fields-text-domain' ),
						'bottom' => __( 'Bottom', 'widget-form-fields-text-domain' )
					)
				),
				'background_color' => array(
					'type' => 'color',
					'label' => __( 'Background color', 'widget-form-fields-text-domain' ),
					'default' => ''
				),
				'background_transparency' => array(
					'type' => 'slider',
					'label' => __( 'Opacity', 'widget-form-fields-text-domain' ),
					'default' => 70,
					'min' => 0,
					'max' => 100,
					'integer' => true
				),
				'caption_padding' => array(
					'type' => 'slider',
					'label' => __( 'Padding', 'widget-form-fields-text-domain' ),
					'default' => 0,
					'min' => 0,
					'max' => 60,
					'integer' => true
				),
				'fill_screen' => array(
	        'type' => 'checkbox',
	        'label' => __( 'Fill screen width', 'widget-form-fields-text-domain' ),
	        'default' => false
		    ),
				'full_height' => array(
	        'type' => 'checkbox',
	        'label' => __( 'Fill screen height', 'widget-form-fields-text-domain' ),
	        'default' => false
		    ),
				'minimum_height' => array(
	        'type' => 'number',
	        'label' => __( 'Slider height', 'widget-form-fields-text-domain' ),
	        'default' => '300'
		    )
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-slider-widget-2-template';
	}

	function get_style_name($instance) {
		return 'secondthought-slider-widget-2-style';
	}

	/**
	 * Enqueue the slider scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-slider-widget-2');
	}

}

siteorigin_widget_register('secondthought-slider-widget-2', __FILE__, 'Secondthought_slider_widget_2');

/**
 * Register all the slider scripts
 */
function secondthought_slider_2_register_scripts(){

	wp_register_script('secondthought-slider-widget-2', siteorigin_widget_get_plugin_dir_url('secondthought-slider-widget-2').'js/secondthought-slider-widget-2.js', array('jquery'), SOW_BUNDLE_VERSION, false);
}
add_action('wp_enqueue_scripts', 'secondthought_slider_2_register_scripts', 1);
