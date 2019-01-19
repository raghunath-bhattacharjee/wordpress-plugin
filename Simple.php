<?php
/**
  *@package Simple Plugin
  */
/*
Plugin Name:Simple Plugin
Plugin Url: http://codifycode.co.in
Version:1.0.0
Description:This is just a demo plugin.
Author:Raghunath Bhattacharjee
 */

defined('ABSPATH') or die( 'oops try again!!' );

class simplePlugin{

	function __construct(){
		add_action( 'init' , array($this,'custom_post_type'));
	}

	function register(){
		add_action('admin_enqueue_scripts',array($this,'enqueue'));
	}

	function activate(){
		$this->custom_post_type();
		flush_rewrite_rules();
	}

	function deactivate(){
		flush_rewrite_rules();
	}

	function custom_post_type(){
		register_post_type( 'book' , ['public' => true , 'label' => 'Books'] );
	}

	function enqueue(){
		wp_enqueue_style('mypluginstyle', plugins_url('/assert/mystyle.css',__FILE__));
		wp_enqueue_script('mypluginscript', plugins_url('/assert/myscript.js',__FILE__));
	}
}

if( class_exists('simplePlugin') ){
	$simple = new simplePlugin();
	$simple->register();
}

//activation
register_activation_hook( __FILE__ , array($simple,'activate') );

//deactivation
register_deactivation_hook( __FILE__ , array($simple,'deactivate') );

?>