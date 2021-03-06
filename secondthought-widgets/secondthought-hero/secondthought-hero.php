<?php
/*
Widget Name: Inzite Hero
Description: A big hero image with a few settings to make it your own.
Author: SiteOrigin
Author URI: https://siteorigin.com
*/

if( !class_exists( 'SiteOrigin_Widget_Base_Slider' ) ) include_once plugin_dir_path(SOW_BUNDLE_BASE_FILE) . '/base/inc/widgets/base-slider.class.php';

class Secondthought_Hero_Widget extends SiteOrigin_Widget_Base_Slider {

	protected $buttons = array();

	function __construct() {
		parent::__construct(
			'secondthought-hero',
			__('Inzite Hero', 'secondthought-hero'),
			array(
				'description' => __('A big hero image with a few settings to make it your own.', 'secondthought-hero'),
				'help' => 'https://siteorigin.com/widgets-bundle/hero-image-widget/',
				'panels_title' => false,
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(
			'frames' => array(
				'type' => 'repeater',
				'label' => __('Hero frames', 'secondthought-hero'),
				'item_name' => __('Frame', 'secondthought-hero'),
				'item_label' => array(
					'selector' => "[id*='frames-title']",
					'update_event' => 'change',
					'value_method' => 'val'
				),

				'fields' => array(

					'content' => array(
						'type' => 'tinymce',
						'label' => __( 'Content', 'secondthought-hero' ),
					),

					'buttons' => array(
						'type' => 'repeater',
						'label' => __('Buttons', 'secondthought-hero'),
						'item_name' => __('Button', 'secondthought-hero'),
						'description' => __('Add [buttons] shortcode to the content to insert these buttons.', 'secondthought-hero'),

						'item_label' => array(
							'selector' => "[id*='buttons-button-text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(
							'button' => array(
								'type' => 'widget',
								'class' => 'SiteOrigin_Widget_Button_Widget',
								'label' => __('Button', 'secondthought-hero'),
								'collapsible' => false,
							)
						)
					),

					'background' => array(
						'type' => 'section',
						'label' => __('Background', 'secondthought-hero'),
						'fields' => array(
							'image' => array(
								'type' => 'media',
								'label' => __( 'Background image', 'secondthought-hero' ),
								'library' => 'image',
								'fallback' => true,
							),

							'opacity' => array(
								'label' => __( 'Background image opacity', 'secondthought-hero' ),
								'type' => 'slider',
								'min' => 0,
								'max' => 100,
								'default' => 100,
							),

							'color' => array(
								'type' => 'color',
								'label' => __( 'Background color', 'secondthought-hero' ),
								'default' => '#333333',
							),

							'url' => array(
								'type' => 'link',
								'label' => __( 'Destination URL', 'secondthought-hero' ),
							),

							'new_window' => array(
								'type' => 'checkbox',
								'label' => __( 'Open URL in a new window', 'secondthought-hero' ),
							),

							'videos' => array(
								'type' => 'repeater',
								'item_name' => __('Video', 'secondthought-hero'),
								'label' => __('Background videos', 'secondthought-hero'),
								'item_label' => array(
									'selector' => "[id*='frames-background_videos-url']",
									'update_event' => 'change',
									'value_method' => 'val'
								),
								'fields' => $this->video_form_fields(),
							),
						)
					),
				),
			),

			'controls' => array(
				'type' => 'section',
				'label' => __('Slider Controls', 'secondthought-hero'),
				'fields' => $this->control_form_fields()
			),

			'design' => array(
				'type' => 'section',
				'label' => __('Design and Layout', 'secondthought-hero'),
				'fields' => array(

					'height' => array(
						'type' => 'measurement',
						'label' => __( 'Height', 'secondthought-hero' ),
						'default' => 'default',
					),

					'padding' => array(
						'type' => 'measurement',
						'label' => __('Top and bottom padding', 'secondthought-hero'),
						'default' => '50px',
					),

					'extra_top_padding' => array(
						'type' => 'measurement',
						'label' => __('Extra top padding', 'secondthought-hero'),
						'description' => __('Additional padding added to the top of the slider', 'secondthought-hero'),
						'default' => '0px',
					),

					'padding_sides' => array(
						'type' => 'measurement',
						'label' => __('Side padding', 'secondthought-hero'),
						'default' => '15px',
					),

					'width' => array(
						'type' => 'measurement',
						'label' => __('Maximum container width', 'secondthought-hero'),
						'default' => '1088px',
					),

					'heading_font' => array(
						'type' => 'font',
						'label' => __('Heading font', 'secondthought-hero'),
						'default' => '',
					),

					'heading_size' => array(
						'type' => 'measurement',
						'label' => __('Heading size', 'secondthought-hero'),
						'default' => '38px',
					),

					'heading_shadow' => array(
						'type' => 'slider',
						'label' => __('Heading shadow intensity', 'secondthought-hero'),
						'max' => 100,
						'min' => 0,
						'default' => 50,
					),

					'text_size' => array(
						'type' => 'measurement',
						'label' => __('Text size', 'secondthought-hero'),
						'default' => '16px',
					),

				)
			)
		);
	}

	function render_template_part( $part, $controls, $frames ) {
		switch( $part ) {
			case 'before_slider':
				?><div class="secondthought-slider-base <?php if( wp_is_mobile() ) echo 'secondthought-slider-is-mobile' ?>" style="display: none"><?php
				break;
			case 'before_slides':
				$settings = $this->slider_settings( $controls );
				?><ul class="secondthought-slider-images" data-settings="<?php echo esc_attr( json_encode($settings) ) ?>"><?php
				break;
			case 'after_slides':
				?></ul><?php
				break;
			case 'navigation':
				?>
				<ol class="secondthought-slider-pagination">
					<?php foreach($frames as $i => $frame) : ?>
						<li><a href="#" data-goto="<?php echo $i ?>"><?php echo $i+1 ?></a></li>
					<?php endforeach; ?>
				</ol>

				<div class="secondthought-slide-nav secondthought-slide-nav-next">
					<a href="#" data-goto="next" data-action="next">
						<em class="secondthought-sld-icon-<?php echo sanitize_html_class( $controls['nav_style'] ) ?>-right"></em>
					</a>
				</div>

				<div class="secondthought-slide-nav secondthought-slide-nav-prev">
					<a href="#" data-goto="previous" data-action="prev">
						<em class="secondthought-sld-icon-<?php echo sanitize_html_class( $controls['nav_style'] ) ?>-left"></em>
					</a>
				</div>
				<?php
				break;
			case 'after_slider':
				?></div><?php
				break;
		}
	}

	function initialize(){
		// This widget requires the button widget
		if( !class_exists('SiteOrigin_Widget_Button_Widget') ) {
			SiteOrigin_Widgets_Bundle::single()->include_widget( 'button' );
		}

		// Let the slider base class do its initialization
		parent::initialize();

		$frontend_scripts = array();
		$frontend_scripts[] = array(
			'secondthought-slider-slider-cycle2',
			plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'js/jquery.cycle' . SOW_BUNDLE_JS_SUFFIX . '.js',
			array( 'jquery' ),
			SOW_BUNDLE_VERSION
		);
		if( function_exists('wp_is_mobile') && wp_is_mobile() ) {
			$frontend_scripts[] = array(
				'secondthought-slider-slider-cycle2-swipe',
				plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'js/jquery.cycle.swipe' . SOW_BUNDLE_JS_SUFFIX . '.js',
				array( 'jquery' ),
				SOW_BUNDLE_VERSION
			);
		}
		$frontend_scripts[] = array(
			'secondthought-slider-slider',
			plugin_dir_url( __FILE__ ) . 'js/secondthought-hero.js',
			array( 'jquery' ),
			SOW_BUNDLE_VERSION
		);

		$this->register_frontend_scripts( $frontend_scripts );
		$this->register_frontend_styles(
			array(
				array(
					'secondthought-slider-slider',
					plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'css/slider/slider.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	/**
	 * This is mainly for rendering the frame wrapper
	 *
	 * @param $i
	 * @param $frame
	 */
	function render_frame( $i, $frame ){
		$background = $this->get_frame_background( $i, $frame );
		$background = wp_parse_args($background, array(
			'color' => false,
			'image' => false,
			'opacity' => 1,
			'url' => false,
			'new_window' => false,
			'image-sizing' => 'cover',              // options for image sizing are cover and contain
			'videos' => false,
			'videos-sizing' => 'background',        // options for video sizing are background or full
		) );

		$background_style = array();
		if( !empty($background['color']) ) $background_style[] = 'background-color: ' . esc_attr($background['color']);

		if( $background['opacity'] >= 1 ) {
			if( !empty($background['image']) ) $background_style[] = 'background-image: url(' . esc_url($background['image']) . ')';
		}

		if( ! empty( $background['url'] ) ) {
			$background_style[] = 'cursor: pointer;';
		}

		?>
		<li
			class="secondthought-slider-image <?php if( !empty($background['image']) && !empty($background['image-sizing']) ) echo 'secondthought-slider-image-' . $background['image-sizing'] ?>"
			<?php if( !empty( $background['url'] ) ) echo 'data-url=\'' . json_encode(array( 'url' => sow_esc_url($background['url']), 'new_window' => !empty( $background['new_window'] ) ) ) . '\'' ; ?>
			<?php if( !empty($background_style) ) echo 'style="' . implode(';', $background_style) . '"' ?>>
			<?php
			$this->render_frame_contents( $i, $frame );
			if( !empty( $background['videos'] ) ) {
				$this->video_code( $background['videos'], array('sow-' . $background['video-sizing'] . '-element') );
			}

			if( $background['opacity'] < 1 && !empty($background['image']) ) {
				?><div class="secondthought-slider-image-overlay <?php echo 'secondthought-slider-image-' . $background['image-sizing'] ?>" style="background-image: url(<?php echo esc_url( $background['image'] ) ?>); opacity: <?php echo floatval( $background['opacity'] ) ?>;" ></div><?php
			}

			?>
		</li>
		<?php

	}

	/**
	 * Get everything necessary for the background image.
	 *
	 * @param $i
	 * @param $frame
	 *
	 * @return array
	 */
	function get_frame_background( $i, $frame ){
		$background_image = siteorigin_widgets_get_attachment_image_src(
			$frame['background']['image'],
			'full',
			!empty( $frame['background']['image_fallback'] ) ? $frame['background']['image_fallback'] : ''
		);

		return array(
			'color' => !empty( $frame['background']['color'] ) ? $frame['background']['color'] : false,
			'image' => !empty( $background_image ) ? $background_image[0] : false,
			'image-sizing' => 'cover',
			'url' => !empty( $frame['background']['url'] ) ? $frame['background']['url'] : false,
			'new_window' => !empty( $frame['background']['new_window'] ),
			'videos' => $frame['background']['videos'],
			'video-sizing' => 'background',
			'opacity' => intval($frame['background']['opacity'])/100,
		);
	}

	/**
	 * Render the actual content of the frame
	 *
	 * @param $i
	 * @param $frame
	 */
	function render_frame_contents($i, $frame) {
		?>
		<div class="secondthought-slider-image-container">
			<div class="secondthought-slider-image-wrapper">
				<?php echo $this->process_content( $frame['content'], $frame ); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Process the content. Most importantly add the buttons by replacing [buttons] in the content
	 *
	 * @param $content
	 * @param $frame
	 *
	 * @return string
	 */
	function process_content( $content, $frame ) {
		ob_start();
		foreach( $frame['buttons'] as $button ) {
			$this->sub_widget('SiteOrigin_Widget_Button_Widget', array(), $button['button']);
		}
		$button_code = ob_get_clean();

		// Add in the button code
		$san_content = wp_kses_post($content);
		$content = preg_replace('/(?:<(?:p|h\d|em|strong|li|blockquote) *([^>]*)> *)?\[ *buttons *\](:? *<\/(?:p|h\d|em|strong|li|blockquote)>)?/i', '<div class="sow-hero-buttons" $1>' . $button_code . '</div>', $san_content );
		return $content;
	}

	/**
	 * The less variables to control the design of the slider
	 *
	 * @param $instance
	 *
	 * @return array
	 */
	function get_less_variables($instance) {
		$less = array();

		// Slider navigation controls
		$less['nav_color_hex'] = $instance['controls']['nav_color_hex'];
		$less['nav_size'] = $instance['controls']['nav_size'];

		// Hero specific design
		//Measurement field type options
		$meas_options = array();
		$meas_options['slide_padding'] = $instance['design']['padding'];
		$meas_options['slide_padding_extra_top'] = $instance['design']['extra_top_padding'];
		$meas_options['slide_padding_sides'] = $instance['design']['padding_sides'];
		$meas_options['slide_width'] = $instance['design']['width'];
		$meas_options['slide_height'] = $instance['design']['height'];

		$meas_options['heading_size'] = $instance['design']['heading_size'];
		$meas_options['text_size'] = $instance['design']['text_size'];

		foreach ( $meas_options as $key => $val ) {
			$less[ $key ] = $this->add_default_measurement_unit( $val );
		}

		$less['heading_shadow'] = intval( $instance['design']['heading_shadow'] );

		$font = siteorigin_widget_get_font( $instance['design']['heading_font'] );
		$less['heading_font'] = $font['family'];
		if ( ! empty( $font['weight'] ) ) {
			$less['heading_font_weight'] = $font['weight'];
		}

		return $less;
	}

	function add_default_measurement_unit($val) {
		if (!empty($val)) {
			if (!preg_match('/\d+([a-zA-Z%]+)/', $val)) {
				$val .= 'px';
			}
		}
		return $val;
	}

	/**
	 * Less function for importing Google web fonts.
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return string
	 */
	function less_import_google_font($instance, $args) {
		if( empty( $instance ) ) return;

		$font_import = siteorigin_widget_get_font( $instance['design']['heading_font'] );
		if( !empty( $font_import['css_import'] ) ) {
			return  $font_import['css_import'];
		}
	}

	function get_style_name($instance) {
		return 'secondthought-hero';
	}

}

// siteorigin_widget_register('secondthought-hero', __FILE__, 'Secondthought_Hero_Widget');
