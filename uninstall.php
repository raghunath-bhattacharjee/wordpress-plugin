<?php
/**
*Trigger this file on uninstall folder
*
*@package Simple Plugin
 */

if( ! defined('WP_UNINSTALL_PLUGIN') ){
	die;
}

//clear databse data
$books = get_posts( array('post_type' => 'book','numberposts' => -1) );

foreach ($books as $book) {
	wp_delete_post( $book->ID, true);
}

//Access the databse via sql and delete

global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE posts_type = 'book'" );

?>