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
			        'label' => __( 'Add images/slide to slider' , 'secondthought_pagebuilder_bundle' ),
			        'item_name'  => __( 'Slide/image', 'siteorigin-widgets' ),
			        'item_label' => array(
		            'selector'     => "[id*='repeat_text']",
		            'update_event' => 'change',
		            'value_method' => 'val'
			        ),
			        'fields' => array(
								'tinymce_editor' => array(
							        'type' => 'tinymce',
							        'label' => __( 'Visually edit, richly.', 'secondthought_pagebuilder_bundle' ),
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
								    'label' => __( 'Choose a background image', 'secondthought_pagebuilder_bundle' ),
								    'choose' => __( 'Choose image', 'secondthought_pagebuilder_bundle' ),
								    'update' => __( 'Set image', 'secondthought_pagebuilder_bundle' ),
								    'library' => 'image',
								    'fallback' => true
								),

								'icon' => array(
									'type'  => 'icon',
									'label' => __( 'Ikon', 'secondthought_pagebuilder_bundle' ),
								),

								'font_color' => array(
						        'type' => 'color',
						        'label' => __( 'Font Color', 'secondthought_pagebuilder_bundle' ),
						        'default' => ''
								),

								'hide_slide' => array(
							        'type' => 'checkbox',
							        'label' => __( 'Hide this slide', 'secondthought_pagebuilder_bundle' ),
							        'default' => false
							  ),

								'thumbnail_text' => array(
							        'type' => 'text',
							        'label' => __( 'Thumbnail text', 'secondthought_pagebuilder_bundle' ),
							        'default' => ''
							    )
								)
					   ),
				'posts'  => array(
			        'type' => 'section',
			        'label' => __( 'Get post content' , 'secondthought_pagebuilder_bundle' ),
			        'hide' => true,
			        'fields' => array(
								  'posts_visibility' => array(
											'type' => 'checkbox',
											'label' => __( 'Show posts', 'secondthought_pagebuilder_bundle' ),
											'default' => false
									),
									'posts_query' => array(
										'type' => 'posts',
										'label' => __('Posts query', 'secondthought_pagebuilder_bundle'),
									),
									'posts_images' => array(
											'type' => 'checkbox',
											'label' => __( 'Show image above content instead of background', 'secondthought_pagebuilder_bundle' ),
											'default' => false
									),
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
					'slide_settings' => array(
				        'type' => 'section',
				        'label' => __( 'Slide settings' , 'secondthought_pagebuilder_bundle' ),
				        'hide' => true,
				        'fields' => array(
									'slide_count_desktop' => array(
								        'type' => 'slider',
								        'label' => __( 'Slides per row (desktop)', 'secondthought_pagebuilder_bundle' ),
												'min' => 1,
        								'max' => 8,
								        'default' => '1'
								  ),
									'slide_count_tablet' => array(
								        'type' => 'slider',
								        'label' => __( 'Slides per row (tablet)', 'secondthought_pagebuilder_bundle' ),
												'min' => 1,
        								'max' => 5,
								        'default' => '1'
								  ),
									'slide_count_mobile' => array(
								        'type' => 'slider',
								        'label' => __( 'Slides per row (mobile)', 'secondthought_pagebuilder_bundle' ),
												'min' => 1,
        								'max' => 3,
								        'default' => '1'
								  )
				    )
					),

					'icons' => array(
				        'type' => 'section',
				        'label' => __( 'Icons' , 'secondthought_pagebuilder_bundle' ),
				        'hide' => true,
				        'fields' => array(
										'icon_placement' => array(
											'type' => 'select',
											'label' => __( 'Icon placement', 'secondthought_pagebuilder_bundle' ),
											'default' => 'top',
											'options' => array(
												'top' => __( 'Before content', 'secondthought_pagebuilder_bundle' ),
												'bottom' => __( 'After content', 'secondthought_pagebuilder_bundle' )
											)
										),
										'icon_alignment' => array(
											'type' => 'select',
											'label' => __( 'Icon alignment', 'secondthought_pagebuilder_bundle' ),
											'default' => 'center',
											'options' => array(
												'center' => __( 'Center', 'secondthought_pagebuilder_bundle' ),
												'left' => __( 'Left', 'secondthought_pagebuilder_bundle' ),
												'right' => __( 'Right', 'secondthought_pagebuilder_bundle' )
											)
										),
										'icon_size' => array(
											'type' => 'number',
											'label' => __( 'Icon size', 'secondthought_pagebuilder_bundle' ),
											'default' => '60',

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
								        'label' => __( 'Show thumbnails', 'secondthought_pagebuilder_bundle' ),
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
								        'label' => __( 'Show arrows on thumbnail bar', 'secondthought_pagebuilder_bundle' ),
								        'default' => false
								  ),
									'thumbnail_centered' => array(
								        'type' => 'checkbox',
								        'label' => __( 'Center align thumbnails', 'secondthought_pagebuilder_bundle' ),
								        'default' => false
								  ),
				    )
					),
				'minimum_height' => array(
			        'type' => 'text',
			        'label' => __( 'Slider height', 'secondthought_pagebuilder_bundle' ),
			        'default' => '300'
			    ),

			    /*'content_settings' => array(
			        'type' => 'section',
			        'label' => __( 'Tekst/indholds opsætning' , 'secondthought_pagebuilder_bundle' ),
			        'hide' => true,
			        'fields' => array(*/
			        	'content_width' => array(
							'type' => 'slider',
							'label' => __( 'Content width', 'secondthought_pagebuilder_bundle' ),
							'default' => 100,
							'min' => 0,
							'max' => 100,
							'integer' => true
						),
						'horizontal_align_radio' => array(
							'type' => 'select',
							'label' => __( 'Align content', 'secondthought_pagebuilder_bundle' ),
							'default' => 'left',
							'options' => array(
								'left' => __( 'Left', 'secondthought_pagebuilder_bundle' ),
								'right' => __( 'Right', 'secondthought_pagebuilder_bundle' ),
								'middle' => __( 'Middle', 'secondthought_pagebuilder_bundle' )
							)
						),
						'vertical_align_radio' => array(
							'type' => 'select',
							'label' => __( 'Align content', 'secondthought_pagebuilder_bundle' ),
							'default' => 'center',
							'options' => array(
								'top' => __( 'Top', 'secondthought_pagebuilder_bundle' ),
								'center' => __( 'Center', 'secondthought_pagebuilder_bundle' ),
								'bottom' => __( 'Bottom', 'secondthought_pagebuilder_bundle' )
							)
						),
						'background_color' => array(
							'type' => 'color',
							'label' => __( 'Background color', 'secondthought_pagebuilder_bundle' ),
							'default' => ''
						),
						'background_transparency' => array(
							'type' => 'slider',
							'label' => __( 'Opacity', 'secondthought_pagebuilder_bundle' ),
							'default' => 70,
							'min' => 0,
							'max' => 100,
							'integer' => true
						),
						'caption_padding' => array(
							'type' => 'slider',
							'label' => __( 'Padding', 'secondthought_pagebuilder_bundle' ),
							'default' => 0,
							'min' => 0,
							'max' => 60,
							'integer' => true
						),
						'fill_screen' => array(
					        'type' => 'checkbox',
					        'label' => __( 'Fill screen width', 'secondthought_pagebuilder_bundle' ),
					        'default' => false
						),
						'full_height' => array(
					        'type' => 'checkbox',
					        'label' => __( 'Fill screen height', 'secondthought_pagebuilder_bundle' ),
					        'default' => false
						),
		        /*	)
				),*/


			),
			plugin_dir_path(__FILE__)
		);
		add_image_size('secondthought_slider_image', 400, 300, true);
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
