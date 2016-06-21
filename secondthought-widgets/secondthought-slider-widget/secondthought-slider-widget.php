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
			__('Inzite Slider Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple slider widget.', 'secondthought_pagebuilder_bundle'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(

			),
			array(
				'slides' => array(
	        'type' => 'repeater',
	        'label' => __( 'Slides.' , 'secondthought_pagebuilder_bundle' ),
	        'item_name'  => __( 'Slide', 'siteorigin-widgets' ),
	        'item_label' => array(
            'selector'     => "[id*='repeat_text']",
            'update_event' => 'change',
            'value_method' => 'val'
	        ),
	        'fields' => array(
            'slide_header' => array(
              'type' => 'text',
              'label' => __( 'Slide header', 'secondthought_pagebuilder_bundle' )
            ),
						'slide_wysiwyg' => array(
							'type' => 'tinymce',
							'label' => __( 'Caption', 'secondthought_pagebuilder_bundle' ),
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
						'slide_background' => array(
			        'type' => 'media',
			        'label' => __( 'Choose a background image', 'secondthought_pagebuilder_bundle' ),
			        'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
			        'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
			        'library' => 'image'
			    	),
						'bg_color_settings' => array(
			        'type' => 'section',
			        'label' => __( 'Background Color Settings' , 'secondthought_pagebuilder_bundle' ),
			        'hide' => true,
			        'fields' => array(
								'background_color_type' => array(
					        'type' => 'select',
					        'label' => __( 'Background Color Type', 'secondthought_pagebuilder_bundle' ),
					        'default' => 'nothing',
					        'options' => array(
				            'caption_bg' => __( 'Caption Background', 'secondthought_pagebuilder_bundle' ),
				            'slide_overlay' => __( 'Slide Overlay', 'secondthought_pagebuilder_bundle' ),
				            'nothing' => __( 'No Background Color', 'secondthought_pagebuilder_bundle' ),
					        )
						    ),
								'background_color' => array(
					        'type' => 'color',
					        'label' => __( 'Background Color', 'secondthought_pagebuilder_bundle' ),
					        'default' => '#000'
						    ),
								'bg_transparency' => array(
					        'type' => 'number',
					        'label' => __( 'Background Color Opacity (%)', 'secondthought_pagebuilder_bundle' ),
					        'default' => 80,
						    ),
								'bg_border_radius' => array(
					        'type' => 'number',
					        'label' => __( 'Background border radius (px)', 'secondthought_pagebuilder_bundle' ),
					        'default' => 15,
						    ),
			        )
				    )
	        )
	    	),
				'layout' => array(
	        'type' => 'section',
	        'label' => __( 'Slide Layout Settings' , 'secondthought_pagebuilder_bundle' ),
	        'hide' => true,
	        'fields' => array(
						'slide_height' => array(
			        'type' => 'text',
			        'label' => __( 'Slide Height', 'secondthought_pagebuilder_bundle' ),
			        'default' => '500px'
				    ),
						'heading_color' => array(
			        'type' => 'color',
			        'label' => __( 'Header Color', 'secondthought_pagebuilder_bundle' ),
			        'default' => '#fff'
				    ),
						'caption_color' => array(
			        'type' => 'color',
			        'label' => __( 'Caption Color', 'secondthought_pagebuilder_bundle' ),
			        'default' => '#fff'
				    ),
						'background_size' => array(
			        'type' => 'select',
			        'label' => __( 'Background Size', 'secondthought_pagebuilder_bundle' ),
							'default' => 'cover',
			        'options' => array(
		            'cover' => __( 'Cover', 'secondthought_pagebuilder_bundle' ),
		            'center' => __( 'Center', 'secondthought_pagebuilder_bundle' ),
		            'contain' => __( 'Contain', 'secondthought_pagebuilder_bundle' ),
			        )
				    ),
						'background_position' => array(
			        'type' => 'select',
			        'label' => __( 'Background Position', 'secondthought_pagebuilder_bundle' ),
							'default' => 'center',
			        'options' => array(
		            'top' => __( 'Top', 'secondthought_pagebuilder_bundle' ),
		            'center' => __( 'Center', 'secondthought_pagebuilder_bundle' ),
		            'bottom' => __( 'Bottom', 'secondthought_pagebuilder_bundle' ),
			        )
				    ),
						'random_order' => array(
				        'type' => 'checkbox',
				        'label' => __( 'Random order', 'secondthought_pagebuilder_bundle' ),
				        'default' => false
				    ),
						'caption_width' => array(
			        'type' => 'slider',
			        'label' => __( 'Caption Width', 'secondthought_pagebuilder_bundle' ),
			        'default' => 1200,
			        'min' => 320,
			        'max' => 2000,
			        'integer' => true
				    ),
						'caption_align' => array(
			        'type' => 'select',
			        'label' => __( 'Caption Alignment', 'secondthought_pagebuilder_bundle' ),
							'default' => 'center',
			        'options' => array(
		            'left' => __( 'Top', 'secondthought_pagebuilder_bundle' ),
		            'center' => __( 'Center', 'secondthought_pagebuilder_bundle' ),
		            'right' => __( 'Bottom', 'secondthought_pagebuilder_bundle' ),
			        )
				    ),
	        )
		    ),
			'animation' => array(
	        'type' => 'section',
	        'label' => __( 'Slide Animation Settings' , 'secondthought_pagebuilder_bundle' ),
	        'hide' => true,
	        'fields' => array(
						'autoplay' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Autoplay', 'secondthought_pagebuilder_bundle' ),
			        'default' => false
				    ),
						'fade' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Fade animation', 'secondthought_pagebuilder_bundle' ),
			        'default' => false
				    ),
						'autoplay_speed' => array(
			        'type' => 'slider',
			        'label' => __( 'Autoplay Speed (ms)', 'secondthought_pagebuilder_bundle' ),
			        'default' => 6000,
			        'min' => 0,
			        'max' => 10000,
			        'integer' => true
				    ),

						'animation_speed' => array(
			        'type' => 'slider',
			        'label' => __( 'Animation Speed (ms)', 'secondthought_pagebuilder_bundle' ),
			        'default' => 300,
			        'min' => 0,
			        'max' => 10000,
			        'integer' => true
				    ),
	        )
		    ),
				'dots' => array(
	        'type' => 'section',
	        'label' => __( 'Dots' , 'secondthought_pagebuilder_bundle' ),
	        'hide' => true,
	        'fields' => array(
						'color_active' => array(
			        'type' => 'color',
			        'label' => __( 'Active Color', 'secondthought_pagebuilder_bundle' ),
			        'default' => '#E34A3D'
				    ),
						'color_passive' => array(
			        'type' => 'color',
			        'label' => __( 'Passive Color', 'secondthought_pagebuilder_bundle' ),
			        'default' => '#434343'
				    ),
						'dot_spacing' => array(
			        'type' => 'number',
			        'label' => __( 'Dot Spacing', 'secondthought_pagebuilder_bundle' ),
			        'default' => '10'
				    ),
						'dot_size' => array(
			        'type' => 'number',
			        'label' => __( 'Dot Size', 'secondthought_pagebuilder_bundle' ),
			        'default' => '10'
				    ),
						'dot_position' => array(
			        'type' => 'number',
			        'label' => __( 'Dot vertical position', 'secondthought_pagebuilder_bundle' ),
			        'default' => '0'
				    )
	        )
		    ),
				'arrows' => array(
	        'type' => 'section',
	        'label' => __( 'Arrows' , 'secondthought_pagebuilder_bundle' ),
	        'hide' => true,
	        'fields' => array(
						'toogle_arrow_visibility' => array(
			        'type' => 'checkbox',
			        'label' => __( 'Show Arrows', 'secondthought_pagebuilder_bundle' ),
			        'default' => true
				    ),
						'icon_right' => array(
			        'type' => 'text',
			        'label' => __('Right Arrow Appearence', 'secondthought_pagebuilder_bundle'),
							'default' => 'chevron-right'
				    ),
						'icon_left' => array(
			        'type' => 'text',
			        'label' => __('Left Arrow Appearence', 'secondthought_pagebuilder_bundle'),
							'default' => 'chevron-left'
				    ),
						'arrow_size' => array(
			        'type' => 'text',
			        'label' => __('Arrow Size', 'secondthought_pagebuilder_bundle'),
							'default' => '20'
				    ),
						'arrow_indent' => array(
			        'type' => 'text',
			        'label' => __('Arrow Indentation', 'secondthought_pagebuilder_bundle'),
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

	wp_register_script('secondthought-slider-widget', siteorigin_widget_get_plugin_dir_url('secondthought-slider-widget').'js/secondthought-slider-widget.js', array('jquery'), SOW_BUNDLE_VERSION, false);
}
add_action('wp_enqueue_scripts', 'secondthought_slider_register_scripts', 1);
