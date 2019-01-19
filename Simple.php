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

	function activate(){
		$this->custom_post_type();
		flush_rewrite_rules();
	}

	function deactivate(){
		flush_rewrite_rules();
	}

	function uninstall(){

	}

	function custom_post_type(){
		register_post_type( 'book' , ['public' => true , 'label' => 'Books'] );
	}

}

if( class_exists('simplePlugin') ){
	$simple = new simplePlugin();
}

//activation
register_activation_hook( __FILE__ , array($simple,'activate') );

//deactivation
register_deactivation_hook( __FILE__ , array($simple,'deactivate') );

//unistall

?>