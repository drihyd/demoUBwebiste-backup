<?php
/**
 * Plugin Name: Source Tracking for Contact Form 7
 * Description: This plugin adds source tracking information (using UTM and other custom parameters), stores its values in cookies, then inject the visitor's source information (with campaign, keyword and medium info) in Contact Form 7 hidden fields.
 * Version: 0.1
 * Author: Mathieu Lalonde
 * Author URI: http://www.strategieko.com
 */

 
 /**
 * adding script to catch utm and store them to cookies
 */
	wp_enqueue_script('utm_contact_form7_scripts', plugin_dir_url(__FILE__) . 'js/ucf7_scripts.js',  array(), 'version', true);
	
