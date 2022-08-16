<?php
	
/*
Plugin Name: Joe Start
Plugin URI: https://github.com/morehawes/Joe-Start
Description: Not a useful plugin... yet.
Version: 1.0
Text Domain: joe-start
Author: Joe Hawes
Author URI: https://www.morehawes.co.uk/
*/

//Joe App
spl_autoload_register(function($class_name) {
	$file_name = substr($class_name, strripos($class_name, '_')+1);
	$file_name .= '.php';

	switch(true) {
		//Joe Build
		case strpos($class_name, 'Joe_v') === 0 :
			require 'Joe/' . $file_name;	
			
			break;
		
		//Joe Development
		case strpos($class_name, 'Joe_') === 0 :
			require 'Joe/inc/' . $file_name;	
			
			break;
		
		//App
		default :
// 		case strpos($class_name, 'JoeStart_') === 0 :
			require 'App/' . $file_name;	
			
			break;
	}
});

add_action('init', function() {
	$plugin_slug = 'joe-start';
	$plugin_name = 'Joe Start';

	$config = [
		'plugin_slug' => $plugin_slug,
		'plugin_text_domain' => $plugin_slug,
		'plugin_name' => $plugin_name,
		'plugin_version' => '1.0',
// 		'settings_id' => 'inmap_settings',
		'settings_default_tab' => 'joe-settings-tab-advanced',
// 		'site_url' => 'https://wordpress.org/plugins/' . $plugin_slug . '/',
// 		'directory_url' => 'https://wordpress.org/plugins/' . $plugin_slug . '/',
// 		'github_url' => 'https://github.com/morehawes/joe-start/',
// 		'plugin_shortcode' => $plugin_slug,
		'plugin_about' => '',
		
		//Setting defaults
		'tab_key' => [
			'section_key' => [
				'option_key' => ''
			]			
		]
	];

	Joe_Config::init($config);
});