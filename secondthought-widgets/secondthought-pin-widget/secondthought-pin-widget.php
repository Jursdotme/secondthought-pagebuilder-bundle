<?php
/*
Widget Name: Inzite Pin Widget
Description: Add pins/markers to any image you want.
Author: Inzite / Johnnie Bertelsen
Author URI: http:/inzte.dk
*/

class Secondthought_pin_widget extends SiteOrigin_Widget {
	function __construct() {
		add_action('wp_enqueue_scripts', array($this ,'secondthought_pin_register_scripts'), 1);
		add_action('admin_enqueue_scripts', array($this ,'secondthought_pin_register_admin_scripts') );
		$posts_array = get_posts( $args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'inz_pin_widget',
			'post_status'      => 'publish'
			)
		);
		$result = array();
		foreach ($posts_array as $v) {
      $result[$v->ID] = $v->post_title;
    }

		parent::__construct(
			'secondthought-pin-widget',
			__('Inzite Pin Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('Add pins/markers to any image you want.', 'secondthought_pagebuilder_bundle'),
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
			'pin_map' => array(
					'type' => 'select',
					'label' => __('Choose map', 'widget-form-fields-text-domain'),
					'prompt' => __( 'Select pin map', 'widget-form-fields-text-domain' ),
					'options' => $result
			),
			'icon_settings' => array(
				'type' => 'section',
				'label' => __( 'Icon settings' , 'widget-form-fields-text-domain' ),
				'hide' => true,
				'fields' => array(
					'pin_icon' => array(
							'type' => 'icon',
							'label' => __('Select an icon', 'widget-form-fields-text-domain'),
					),
					'pin_icon_color' => array(
						'type' => 'color',
						'label' => __( 'Icon color', 'widget-form-fields-text-domain' ),
						'default' => '#000000'
					),
					'pin_icon_size' => array(
						'type' => 'slider',
						'label' => __( 'Pin size', 'widget-form-fields-text-domain' ),
						'default' => 18,
						'min' => 0,
						'max' => 50,
						'integer' => true
					),
					'pin_icon_bg_color' => array(
						'type' => 'color',
						'label' => __( 'Icon background color', 'widget-form-fields-text-domain' ),
						'default' => ''
					),
					'pin_icon_border_color' => array(
						'type' => 'color',
						'label' => __( 'Icon border color', 'widget-form-fields-text-domain' ),
						'default' => ''
					),
					'pin_icon_padding' => array(
						'type' => 'slider',
						'label' => __( 'Icon padding', 'widget-form-fields-text-domain' ),
						'default' => 3,
						'min' => 0,
						'max' => 15,
						'integer' => true
					),
					'pin_icon_border_rounded' => array(
						'type' => 'checkbox',
						'label' => __( 'Rounded icon', 'widget-form-fields-text-domain' ),
						'default' => ''
					),
					'pin_icon_shadow' => array(
						'type' => 'checkbox',
						'label' => __( 'Shadow behind icon', 'widget-form-fields-text-domain' ),
						'default' => ''
					)
				)
			),
			'content_settings' => array(
				'type' => 'section',
				'label' => __( 'Content settings' , 'widget-form-fields-text-domain' ),
				'hide' => true,
				'fields' => array(
					'pin_content_size' => array(
						'type' => 'slider',
						'label' => __( 'Font size', 'widget-form-fields-text-domain' ),
						'default' => 11,
						'min' => 8,
						'max' => 30,
						'integer' => true
					),
					'pin_content_color' => array(
						'type' => 'color',
						'label' => __( 'Content color', 'widget-form-fields-text-domain' ),
						'default' => ''
					),
					'pin_content_bg_color' => array(
						'type' => 'color',
						'label' => __( 'Content background color', 'widget-form-fields-text-domain' ),
						'default' => '#ffffff'
					),
					'pin_content_border_color' => array(
						'type' => 'color',
						'label' => __( 'Content border color', 'widget-form-fields-text-domain' ),
						'default' => '#dddddd'
					),
					'pin_content_padding' => array(
						'type' => 'slider',
						'label' => __( 'Padding', 'widget-form-fields-text-domain' ),
						'default' => 10,
						'min' => 0,
						'max' => 50,
						'integer' => true
					),
					'pin_content_border_rounded' => array(
						'type' => 'slider',
						'label' => __( 'Rounded corners', 'widget-form-fields-text-domain' ),
						'default' => 0,
						'min' => 0,
						'max' => 25,
						'integer' => true
					),
					'pin_content_shadow' => array(
						'type' => 'checkbox',
						'label' => __( 'Shadow behind content', 'widget-form-fields-text-domain' ),
						'default' => ''
					)
				)
			)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-pin-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-pin-widget-style';
	}

	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-pin-widget');
	}



	function secondthought_pin_register_scripts(){
		wp_register_script('secondthought-pin-widget', siteorigin_widget_get_plugin_dir_url('secondthought-pin-widget').'js/secondthought-pin-widget.js', array('jquery'), SOW_BUNDLE_VERSION, false);
	}

	function secondthought_pin_register_admin_scripts($prefix) {
		wp_enqueue_script('secondthought-pin-widget-admin', siteorigin_widget_get_plugin_dir_url('secondthought-pin-widget').'js/secondthought-pin-widget-admin.js', array('jquery-core'), SOW_BUNDLE_VERSION);
		wp_enqueue_style( 'secondthought-pin-widget-admin-style', siteorigin_widget_get_plugin_dir_url('secondthought-pin-widget').'styles/secondthought-pin-widget-admin.css', false, '1.0.0' );
	}


	// Register Custom Post Type
	function register_inz_pin_widget() {

		$labels = array(
		  'name'                => _x( 'Billede maps', 'Post Type General Name', 'text_domain' ),
		  'singular_name'       => _x( 'Billede map', 'Post Type Singular Name', 'text_domain' ),
		  'menu_name'           => __( 'Billede maps', 'text_domain' ),
		  'name_admin_bar'      => __( 'Billede maps', 'text_domain' ),
		  'parent_item_colon'   => __( 'Billede maps', 'text_domain' ),
		  'all_items'           => __( 'Alle billede maps', 'text_domain' ),
		  'add_new_item'        => __( 'Tilføj billede map', 'text_domain' ),
		  'add_new'             => __( 'Tilføj nyt map', 'text_domain' ),
		  'new_item'            => __( 'Nyt billede map', 'text_domain' ),
		  'edit_item'           => __( 'Rediger billede map', 'text_domain' ),
		  'update_item'         => __( 'Opdater billede map', 'text_domain' ),
		  'view_item'           => __( 'Vis billede map', 'text_domain' ),
		  'search_items'        => __( 'Find billede maps', 'text_domain' ),
		  'not_found'           => __( 'Ikke fundet', 'text_domain' ),
		  'not_found_in_trash'  => __( 'Ikke fundet i papirkurv', 'text_domain' ),
		);
		$rewrite = array(
		  'slug'                => 'pins',
		  'with_front'          => true,
		  'pages'               => true,
		  'feeds'               => true,
		);
		$args = array(
		  'label'               => __( 'Billede maps', 'text_domain' ),
		  'description'         => __( 'Billede maps', 'text_domain' ),
		  'labels'              => $labels,
		  'supports'            => array( 'title' ),
		  'taxonomies'          => array( ),
		  'hierarchical'        => false,
		  'public'              => true,
		  'show_ui'             => true,
		  'show_in_menu'        => true,
		  'menu_position'       => 21,
		  'menu_icon'           => 'dashicons-location-alt',
		  'show_in_admin_bar'   => true,
		  'show_in_nav_menus'   => true,
		  'can_export'          => true,
		  'has_archive'         => true,
		  'exclude_from_search' => false,
		  'publicly_queryable'  => true,
		  'rewrite'             => $rewrite,
		  'capability_type'     => 'post',
		);
		register_post_type( 'inz_pin_widget', $args );
	}

}

add_action( 'init', array('Secondthought_pin_widget','register_inz_pin_widget'), 0 );
siteorigin_widget_register('secondthought-pin-widget', __FILE__, 'Secondthought_pin_widget');

if( function_exists('acf_add_local_field_group')  ):

acf_add_local_field_group(array (
	'key' => 'group_5742eedd31618',
	'title' => 'Billede maps',
	'fields' => array (
		array (
			'key' => 'field_5742ef1e27ea7',
			'label' => 'Billede',
			'name' => 'image',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '100%',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'full',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_5742f7e139f78',
			'label' => 'Pins',
			'name' => 'pins',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => 'add_pin',
				'id' => '',
			),
			'collapsed' => '',
			'min' => '',
			'max' => '',
			'layout' => 'block',
			'button_label' => 'Tilføj pin',
			'sub_fields' => array (
				array (
					'key' => 'field_5743002e13d68',
					'label' => 'Pin',
					'name' => 'pin',
					'type' => 'tab',
					'instructions' => '',
					'required' => '',
					'conditional_logic' => '',
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 1,
				),
				array (
					'key' => 'field_5742f7f439f79',
					'label' => 'Titel',
					'name' => 'pin_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5742f80839f7a',
					'label' => 'Beskrivelse',
					'name' => 'pin_description',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array (
					'key' => 'field_5742f82639f7b',
					'label' => 'Placering fra venstre',
					'name' => 'pin_placement_x',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => 'placement_x',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => 100,
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5742f86239f7c',
					'label' => 'Placering fra toppen',
					'name' => 'pin_placement_y',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => 'placement_y',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 0,
					'max' => 100,
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'inz_pin_widget',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
