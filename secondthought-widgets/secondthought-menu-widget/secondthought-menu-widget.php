<?php
/*
Widget Name: Inzite Menu Widget
Description: An example widget which displays 'Hello world!'.
Author: Inzite
Author URI: http://inzite.dk
*/

class Secondthought_Menu_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'secondthought-menu-widget',
			__('Inzite Menu Widget', 'secondthought-menu-widget-text-domain'),
			array(
				'description' => __('A hello world widget.', 'secondthought-menu-widget-text-domain'),
			),
			array(
			),
			false,
			get_template_directory_uri().'/widgets/secondthought-menu-widget/'
		);
	}

	function get_widget_form() {
		$menus = get_terms('nav_menu');
		$usable_nav_menus = array();
		foreach($menus as $menu => $value ){

			$name = $value->name;
			$slug = $value->slug;
		 	$usable_nav_menus[$slug] = $name;

		}

		$usable_nav_menus['subpages'] = __('Subpages');

		return array(
			'affix' => array(
					'type' => 'checkbox',
					'label' => __( 'Fix menu', 'widget-form-fields-text-domain' ),
					'default' => true
			),
			'another_selection' => array(
					'type' => 'select',
					'prompt' => __( 'Choose a what the menu shows', 'widget-form-fields-text-domain' ),
					'options' => $usable_nav_menus
			)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-menu-widget-template';
	}
	function get_style_name($instance) {
		return 'secondthought-menu-widget-style';
	}
}
siteorigin_widget_register('secondthought-menu-widget', __FILE__, 'Secondthought_Menu_Widget');

/**
 * Register all the device scripts
 */
function secondthought_menu_register_scripts(){

	wp_enqueue_script('secondthought_menu_widget_script', siteorigin_widget_get_plugin_dir_url('secondthought-menu-widget').'js/secondthought-menu-widget.js',array('jquery'), SOW_BUNDLE_VERSION, '', 0);
}
add_action('wp_enqueue_scripts', 'secondthought_menu_register_scripts', 1);


function pages_menu() {

    if( !is_page() ) {
        return false;
    }

    $page_id = get_queried_object_id();
    $ancestors = get_post_ancestors($page_id);
    $ancestors_count = count($ancestors);
    if( $ancestors_count > 1 ) {

        //the last item in $ancestors will be the top parent page, that is "Services"
        //but we want the before top parent ("Service One", "Service Two", etc)
        $top_menu_page = $ancestors[$ancestors_count - 2];

    } else {
        //We are actually on one of our top menu pages ("Service One", "Service Two", etc)
        $top_menu_page = $page_id;
    }

    $args = array(
        'child_of'    => $top_menu_page,
        'link_before' => '',
        'link_after'  => '',
				'title_li' => '',
    );
     wp_list_pages( $args );

}
