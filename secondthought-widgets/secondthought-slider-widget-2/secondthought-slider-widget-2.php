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
			        'label' => __( 'Add images to slide' , 'widget-form-fields-text-domain' ),
			        'item_name'  => __( 'Image', 'siteorigin-widgets' ),
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
								),

								'hide_slide' => array(
							        'type' => 'checkbox',
							        'label' => __( 'Skjul dette slide', 'widget-form-fields-text-domain' ),
							        'default' => false
							  ),

								'thumbnail_text' => array(
							        'type' => 'text',
							        'label' => __( 'Thumbnail text', 'widget-form-fields-text-domain' ),
							        'default' => ''
							    )
								)
					   ),

				'dots' => array(
			        'type' => 'section',
			        'label' => __( 'Dots' , 'secondthought_pagebuilder_bundle' ),
			        'hide' => true,
			        'fields' => array(
						'toogle_dots_visibility' => array(
					        'type' => 'checkbox',
					        'label' => __( 'Show dots', 'secondthought_pagebuilder_bundle' ),
					        'default' => false
					    ),
					    'color_active' => array(
					        'type' => 'color',
					        'label' => __( 'Active Color', 'secondthought_pagebuilder_bundle' ),
					        'default' => '#333333'
						),
						'color_passive' => array(
					        'type' => 'color',
					        'label' => __( 'Passive Color', 'secondthought_pagebuilder_bundle' ),
					        'default' => '#cccccc'
						),
						'dot_spacing' => array(
					        'type' => 'number',
					        'label' => __( 'Dot Spacing', 'secondthought_pagebuilder_bundle' ),
					        'default' => '5'
						),
						'dot_size' => array(
					        'type' => 'number',
					        'label' => __( 'Dot Size', 'secondthought_pagebuilder_bundle' ),
					        'default' => '30'
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
					        'default' => false
					    ),
					    'arrow_color' => array(
					        'type' => 'color',
					        'label' => __( 'Arrow Color', 'secondthought_pagebuilder_bundle' ),
					        'default' => '#ffffff'
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
			    ),

				'animation' => array(
			        'type' => 'section',
			        'label' => __( 'Animation Settings' , 'secondthought_pagebuilder_bundle' ),
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
						        'default' => 5000,
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

					'thumbnails' => array(
				        'type' => 'section',
				        'label' => __( 'Thumbnails' , 'secondthought_pagebuilder_bundle' ),
				        'hide' => true,
				        'fields' => array(
									'thumbnail_display' => array(
								        'type' => 'checkbox',
								        'label' => __( 'Show thumbnails', 'widget-form-fields-text-domain' ),
								        'default' => false
								  ),
									'thumbnail_count_desktop' => array(
								        'type' => 'slider',
								        'label' => __( 'Thumbnails per row (desktop)', 'secondthought_pagebuilder_bundle' ),
												'min' => 3,
        								'max' => 8,
								        'default' => '6'
								  ),
									'thumbnail_count_tablet' => array(
								        'type' => 'slider',
								        'label' => __( 'Thumbnails per row (tablet)', 'secondthought_pagebuilder_bundle' ),
												'min' => 2,
        								'max' => 5,
								        'default' => '3'
								  ),
									'thumbnail_count_mobile' => array(
								        'type' => 'slider',
								        'label' => __( 'Thumbnails per row (mobile)', 'secondthought_pagebuilder_bundle' ),
												'min' => 0,
        								'max' => 3,
								        'default' => '0'
								  ),
									'thumbnail_margin' => array(
								        'type' => 'text',
								        'label' => __( 'Margin around thumbnails', 'secondthought_pagebuilder_bundle' ),
								        'default' => '6px 3px'
								  ),
									'thumbnail_arrows' => array(
								        'type' => 'checkbox',
								        'label' => __( 'Show arrows on thumbnail bar', 'widget-form-fields-text-domain' ),
								        'default' => false
								  ),
									'thumbnail_centered' => array(
								        'type' => 'checkbox',
								        'label' => __( 'Center align thumbnails', 'widget-form-fields-text-domain' ),
								        'default' => false
								  ),
				    )
					),
				'minimum_height' => array(
			        'type' => 'number',
			        'label' => __( 'Slider height', 'widget-form-fields-text-domain' ),
			        'default' => '300'
			    ),

			    /*'content_settings' => array(
			        'type' => 'section',
			        'label' => __( 'Tekst/indholds opsætning' , 'secondthought_pagebuilder_bundle' ),
			        'hide' => true,
			        'fields' => array(*/
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
		        /*	)
				),*/


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
add_image_size('secondthought_slider_thumbnails', 300, 225, true);
/**
 * Register all the slider scripts
 */
function secondthought_slider_2_register_scripts(){

	wp_register_script('secondthought-slider-widget-2', siteorigin_widget_get_plugin_dir_url('secondthought-slider-widget-2').'js/secondthought-slider-widget-2.js', array('jquery'), SOW_BUNDLE_VERSION, false);
}
add_action('wp_enqueue_scripts', 'secondthought_slider_2_register_scripts', 1);
