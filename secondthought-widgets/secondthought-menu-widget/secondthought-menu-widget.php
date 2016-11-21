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
				'description' => __('Add a small menu to a page.', 'secondthought-menu-widget-text-domain'),
				'panels_icon' => 'dashicons dashicons-heart',
				'panels_groups' => array('inzite')
			),
			array(),
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
		$usable_nav_menus['page_content'] = __('Page content');

		return array(
			'affix' => array(
					'type' => 'checkbox',
					'label' => __( 'Fix menu', 'widget-form-fields-text-domain' ),
					'default' => true
			),
			'another_selection' => array(
					'type' => 'select',
					'prompt' => __( 'Choose a what the menu shows', 'widget-form-fields-text-domain' ),
					'options' => $usable_nav_menus,
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'another_selection' )
					)
			),
			'internal_link_targets' => array(
        'type' => 'checkboxes',
        'prompt' => __( 'Opret menupunkter ud fra følgende elementer på siden.', 'widget-form-fields-text-domain' ),
				'multiple' => true,
        'options' => array(
            'h1' => __( 'Header 1', 'widget-form-fields-text-domain' ),
            'h2' => __( 'Header 2', 'widget-form-fields-text-domain' ),
            'h3' => __( 'Header 3', 'widget-form-fields-text-domain' ),
						'h4' => __( 'Header 4', 'widget-form-fields-text-domain' ),
            'h5' => __( 'Header 5', 'widget-form-fields-text-domain' ),
            'h6' => __( 'Header 6', 'widget-form-fields-text-domain' ),
        ),
				'state_handler' => array(
					'another_selection[page_content]'     => array( 'show' ),
					'_else[another_selection]'     => array( 'hide' ),
				),
    	),
			'hierarchy' => array(
					'type' => 'checkbox',
					'label' => __( 'Use hierarchy', 'widget-form-fields-text-domain' ),
					'default' => true,
					'state_handler' => array(
						'another_selection[page_content]'     => array( 'show' ),
						'_else[another_selection]'     => array( 'hide' ),
					),
			),
			'type_scale' => array(
	        'type' => 'number',
	        'label' => __('Text scaling', 'widget-form-fields-text-domain'),
	        'default' => '.85',
					'state_handler' => array(
						'another_selection[page_content]'     => array( 'show' ),
						'_else[another_selection]'     => array( 'hide' ),
					),
	    ),
			'hover-color' => array(
				'type' => 'color',
        'label' => __( 'Hover color', 'widget-form-fields-text-domain' ),
        'default' => '#bada55'
			),
			'text-color' => array(
				'type' => 'color',
        'label' => __( 'Text color', 'widget-form-fields-text-domain' ),
        'default' => '#333'
			),
		);

	}

	function get_template_name($instance) {


		return 'secondthought-menu-widget-template';
	}

	function get_style_name($instance) {

		// Localize the script with new data
		$translation_array = array(
			'targets' => implode(', ', $instance['internal_link_targets']),
			'hierarchical' => $instance['hierarchy']
		);
		wp_localize_script( 'secondthought_menu_widget_script', 'secondthought_menu_widget_vars', $translation_array );

		// Return styles
		return 'secondthought-menu-widget';
	}

	function get_less_variables( $instance ) {
	    return array(
	        'hover-color' => $instance['hover-color'],
					'text-color' => $instance['text-color'],
					'text-scale' => $instance['type_scale']
	    );
	}


}
siteorigin_widget_register('secondthought-menu-widget', __FILE__, 'Secondthought_Menu_Widget');

// Add affix styles
function wbe_filter_widget_css( $css, $instance, $widget ){
	$custom_css = "
	.affix {
			position: fixed;
			top: 0;
		}
		@media (max-width: 780px) {
			.affix {
				position: relative;
			}
		}

		.affix-bottom {
			position: absolute;
		}
		@media (max-width: 780px) {
			.affix-bottom {
				position: relative;
			}
		}

		.affix-top {
			-webkit-transition: all 0.4s ease-in-out;
			transition: all 0.4s ease-in-out;
			margin-top: 0;
		}

		.affix {
			-webkit-transition: all 0.4s ease-in-out;
			transition: all 0.4s ease-in-out;
			margin-top: 2rem;
		}";

	$css .= $custom_css;

	return $css;
}
add_filter('siteorigin_widgets_instance_css', 'wbe_filter_widget_css', 10, 3);





/**
 * Register all the device scripts
 */

// Register the script
wp_register_script( 'secondthought_menu_widget_script', siteorigin_widget_get_plugin_dir_url('secondthought-menu-widget').'js/secondthought-menu-widget.js',array('jquery'), SOW_BUNDLE_VERSION, '', 0 );

// Enqueued script with localized data.
wp_enqueue_script( 'secondthought_menu_widget_script' );

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
