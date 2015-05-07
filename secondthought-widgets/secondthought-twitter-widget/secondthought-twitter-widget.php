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
			__('Inzite Twitter Widget', 'hello-world-widget-text-domain'),
			array(
				'description' => __('A simple twitter widget.', 'hello-world-widget-text-domain'),
			),
			array(),
			array(
				'title' => array(
	        'type' => 'text',
	        'label' => __('Title', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'twitter_username' => array(
	        'type' => 'text',
	        'label' => __('Twitter username (Without @)', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'update_count' => array(
	        'type' => 'number',
	        'label' => __('Number of tweets to display', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'oauth_accesstoken' => array(
	        'type' => 'text',
	        'label' => __('OAuth Access Token', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'oauth_access_token_secret' => array(
	        'type' => 'text',
	        'label' => __('OAuth Access Token Secret', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'consumer_key' => array(
	        'type' => 'text',
	        'label' => __('Consumer Key', 'widget-form-fields-text-domain'),
	        'default' => ''
		    ),
				'consumer_secret' => array(
	        'type' => 'text',
	        'label' => __('Consumer Secret', 'widget-form-fields-text-domain'),
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
