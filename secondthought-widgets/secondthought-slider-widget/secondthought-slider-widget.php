<?php

/*
Widget Name: Inzite Slider Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class Secondthought_slider_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-slider-widget',
			__('Secondthought Slider Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple slider widget.', 'hello-world-widget-text-domain'),
			),
			array(

			),
			array(
				'slides' => array(
	        'type' => 'repeater',
	        'label' => __( 'Slides.' , 'widget-form-fields-text-domain' ),
	        'item_name'  => __( 'Slide', 'siteorigin-widgets' ),
	        'item_label' => array(
            'selector'     => "[id*='repeat_text']",
            'update_event' => 'change',
            'value_method' => 'val'
	        ),
	        'fields' => array(
            'slide_header' => array(
              'type' => 'text',
              'label' => __( 'Slide header', 'widget-form-fields-text-domain' )
            ),
						'slide_caption' => array(
			        'type' => 'textarea',
			        'label' => __( 'Caption', 'widget-form-fields-text-domain' ),
			        'default' => '',
			        'allow_html_formatting' => true,
			        'rows' => 10
				    ),
						'slide_link' => array(
              'type' => 'link',
              'label' => __( 'Link', 'widget-form-fields-text-domain' )
            ),
						'slide_background' => array(
			        'type' => 'media',
			        'label' => __( 'Choose a background image', 'widget-form-fields-text-domain' ),
			        'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
			        'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
			        'library' => 'image'
			    	),
						'bg_color_settings' => array(
			        'type' => 'section',
			        'label' => __( 'Background Color Settings' , 'widget-form-fields-text-domain' ),
			        'hide' => true,
			        'fields' => array(
								'background_color_type' => array(
					        'type' => 'select',
					        'label' => __( 'Background Color Type', 'widget-form-fields-text-domain' ),
					        'default' => 'nothing',
					        'options' => array(
				            'caption_bg' => __( 'Caption Background', 'widget-form-fields-text-domain' ),
				            'slide_overlay' => __( 'Slide Overlay', 'widget-form-fields-text-domain' ),
				            'nothing' => __( 'No Background Color', 'widget-form-fields-text-domain' ),
					        )
						    ),
								'background_color' => array(
					        'type' => 'color',
					        'label' => __( 'Background Color', 'widget-form-fields-text-domain' ),
					        'default' => '#000'
						    ),
								'bg_transparency' => array(
					        'type' => 'number',
					        'label' => __( 'Background Color Opacity (%)', 'widget-form-fields-text-domain' ),
					        'default' => 80,
						    ),
								'bg_border_radius' => array(
					        'type' => 'number',
					        'label' => __( 'Background border radius (px)', 'widget-form-fields-text-domain' ),
					        'default' => 15,
						    ),
			        )
				    )
	        )
	    	),
				'layout' => array(
	        'type' => 'section',
	        'label' => __( 'Slide Layout Settings' , 'widget-form-fields-text-domain' ),
	        'hide' => true,
	        'fields' => array(
						'slide_height' => array(
			        'type' => 'text',
			        'label' => __( 'Slide Height', 'widget-form-fields-text-domain' ),
			        'default' => '500px'
				    ),
						'heading_color' => array(
			        'type' => 'color',
			        'label' => __( 'Header Color', 'widget-form-fields-text-domain' ),
			        'default' => '#fff'
				    ),
						'caption_color' => array(
			        'type' => 'color',
			        'label' => __( 'Caption Color', 'widget-form-fields-text-domain' ),
			        'default' => '#fff'
				    ),
						'background_size' => array(
			        'type' => 'select',
			        'label' => __( 'Background Size', 'widget-form-fields-text-domain' ),
							'default' => 'cover',
			        'options' => array(
		            'cover' => __( 'Cover', 'widget-form-fields-text-domain' ),
		            'center' => __( 'Center', 'widget-form-fields-text-domain' ),
		            'contain' => __( 'Contain', 'widget-form-fields-text-domain' ),
			        )
				    ),
						'background_position' => array(
			        'type' => 'select',
			        'label' => __( 'Background Position', 'widget-form-fields-text-domain' ),
							'default' => 'center',
			        'options' => array(
		            'top' => __( 'Top', 'widget-form-fields-text-domain' ),
		            'center' => __( 'Center', 'widget-form-fields-text-domain' ),
		            'bottom' => __( 'Bottom', 'widget-form-fields-text-domain' ),
			        )
				    ),
						'caption_width' => array(
			        'type' => 'slider',
			        'label' => __( 'Caption Width', 'widget-form-fields-text-domain' ),
			        'default' => 1200,
			        'min' => 320,
			        'max' => 2000,
			        'integer' => true
				    ),
						'caption_align' => array(
			        'type' => 'select',
			        'label' => __( 'Caption Alignment', 'widget-form-fields-text-domain' ),
							'default' => 'center',
			        'options' => array(
		            'left' => __( 'Top', 'widget-form-fields-text-domain' ),
		            'center' => __( 'Center', 'widget-form-fields-text-domain' ),
		            'right' => __( 'Bottom', 'widget-form-fields-text-domain' ),
			        )
				    ),
	        )
		    ),
				'animation' => array(
	        'type' => 'section',
	        'label' => __( 'Slide Animation Settings' , 'widget-form-fields-text-domain' ),
	        'hide' => true,
	        'fields' => array(
						'autoplay' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Autoplay', 'widget-form-fields-text-domain' ),
			        'default' => false
				    ),
						'fade' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Fade animation', 'widget-form-fields-text-domain' ),
			        'default' => false
				    ),
						'autoplay_speed' => array(
			        'type' => 'slider',
			        'label' => __( 'Autoplay Speed (ms)', 'widget-form-fields-text-domain' ),
			        'default' => 6000,
			        'min' => 0,
			        'max' => 10000,
			        'integer' => true
				    ),

						'animation_speed' => array(
			        'type' => 'slider',
			        'label' => __( 'Animation Speed (ms)', 'widget-form-fields-text-domain' ),
			        'default' => 300,
			        'min' => 0,
			        'max' => 10000,
			        'integer' => true
				    ),
	        )
		    ),
				'dots' => array(
	        'type' => 'section',
	        'label' => __( 'Dots' , 'widget-form-fields-text-domain' ),
	        'hide' => true,
	        'fields' => array(
						'color_active' => array(
			        'type' => 'color',
			        'label' => __( 'Active Color', 'widget-form-fields-text-domain' ),
			        'default' => '#E34A3D'
				    ),
						'color_passive' => array(
			        'type' => 'color',
			        'label' => __( 'Passive Color', 'widget-form-fields-text-domain' ),
			        'default' => '#434343'
				    ),
						'dot_spacing' => array(
			        'type' => 'number',
			        'label' => __( 'Dot Spacing', 'widget-form-fields-text-domain' ),
			        'default' => '10'
				    ),
						'dot_size' => array(
			        'type' => 'number',
			        'label' => __( 'Dot Size', 'widget-form-fields-text-domain' ),
			        'default' => '10'
				    ),
						'dot_position' => array(
			        'type' => 'number',
			        'label' => __( 'Dot vertical position', 'widget-form-fields-text-domain' ),
			        'default' => '0'
				    )
	        )
		    ),
				'arrows' => array(
	        'type' => 'section',
	        'label' => __( 'Arrows' , 'widget-form-fields-text-domain' ),
	        'hide' => true,
	        'fields' => array(
						'toogle_arrow_visibility' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Show Arrows', 'widget-form-fields-text-domain' ),
			        'default' => true
				    ),
						'icon_right' => array(
			        'type' => 'text',
			        'label' => __('Right Arrow Appearence', 'widget-form-fields-text-domain'),
							'default' => 'chevron-right'
				    ),
						'icon_left' => array(
			        'type' => 'text',
			        'label' => __('Left Arrow Appearence', 'widget-form-fields-text-domain'),
							'default' => 'chevron-left'
				    ),
						'arrow_size' => array(
			        'type' => 'text',
			        'label' => __('Arrow Size', 'widget-form-fields-text-domain'),
							'default' => '20'
				    ),
						'arrow_indent' => array(
			        'type' => 'text',
			        'label' => __('Arrow Indentation', 'widget-form-fields-text-domain'),
							'default' => '20'
				    )
	        )
		    )

			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-slider-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-slider-widget-style';
	}

	/**
	 * Enqueue the slider scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-slider-widget');
	}

}

siteorigin_widget_register('secondthought-slider-widget', __FILE__, 'Secondthought_slider_widget');

/**
 * Register all the slider scripts
 */
function secondthought_slider_register_scripts(){

	wp_register_script('secondthought-slider-widget', siteorigin_widget_get_plugin_dir_url('secondthought-slider-widget').'js/secondthought-slider-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_slider_register_scripts', 1);
