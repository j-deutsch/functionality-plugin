<?php
/**
 * Plugin Name: JD Functionality Plugin
 * Plugin URI: https://github.com/j-deutsch/functionality-plugin
 * Description: An example functionality plugin that adds Books CPT.
 * Version: 1.0.0
 * Author: Jason Deutscher
 * Author URI: http://jason-d.com
 * Text Domain: jdfunctionality
 * Domain Path: /locale/
 * Network: true
 * License: GPL2
 */

// Add custom post type for books
include( 'includes/books-cpt.php' );

// Add custom taxonomy for genres to the books taxonomy
include( 'includes/genres-tax.php' );

// Adds function to load list of books from CPT
function jd_books_list( $genres='' ) {
	include( 'includes/books-list.php' );
}

/* To load the books list, add this line to your theme:
	<?php if(function_exists('jd_books_list')) { jd_books_list(); } ?>
*/

// Adds shortcode to load robots list in content
function jd_books_list_shortcode( $jd_books_atts ) {

	$jd_books_atts = shortcode_atts( array(
		'genres' => ''
	), $jd_books_atts, 'jd_books' );

	ob_start();

	jd_books_list( $jd_books_atts['genres'] );

	$jd_books_list_content = ob_get_clean();

	return $jd_books_list_content;

}
add_shortcode( 'jd_books', 'jd_books_list_shortcode' );

/* To load the books list, add this line to your page or post:
	[jd_books genres=""]
*/