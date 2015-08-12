<?php

/*
Widget Name: Inzite Twitter Widget
Description: Add slideshows to any page you want.
Author: Me
Author URI: http://example.com
*/

class secondthought_twitter_widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'secondthought-twitter-widget',
			__('Inzite Twitter Widget', 'secondthought_pagebuilder_bundle'),
			array(
				'description' => __('A simple twitter widget.', 'secondthought_pagebuilder_bundle'),
			),
			array(),
			array(
				'title' => array(
	        'type' => 'text',
	        'label' => __('Title', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'twitter_username' => array(
	        'type' => 'text',
	        'label' => __('Twitter username (Without @)', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'update_count' => array(
	        'type' => 'number',
	        'label' => __('Number of tweets to display', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'oauth_accesstoken' => array(
	        'type' => 'text',
	        'label' => __('OAuth Access Token', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'oauth_access_token_secret' => array(
	        'type' => 'text',
	        'label' => __('OAuth Access Token Secret', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'consumer_key' => array(
	        'type' => 'text',
	        'label' => __('Consumer Key', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
				'consumer_secret' => array(
	        'type' => 'text',
	        'label' => __('Consumer Secret', 'secondthought_pagebuilder_bundle'),
	        'default' => ''
		    ),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'secondthought-twitter-widget-template';
	}

	function get_style_name($instance) {
		return 'secondthought-twitter-widget-style';
	}

	/**
	 * Enqueue the twitter scripts
	 */
	function enqueue_frontend_scripts($scripts){
		wp_enqueue_script('secondthought-twitter-widget');
	}

}

// siteorigin_widget_register('secondthought-twitter-widget', __FILE__, 'Secondthought_twitter_widget');

/**
 * Register all the twitter scripts
 */
function secondthought_twitter_register_scripts(){

	wp_register_script('secondthought-twitter-widget', siteorigin_widget_get_plugin_dir_url('secondthought-twitter-widget').'js/secondthought-twitter-widget.js', array('jquery'), SOW_BUNDLE_VERSION);
}
add_action('wp_enqueue_scripts', 'secondthought_twitter_register_scripts', 1);
