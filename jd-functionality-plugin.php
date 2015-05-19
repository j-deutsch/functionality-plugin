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


add_action('admin_head', 'jd_add_my_tc_button');

function jd_add_my_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'jd_add_tinymce_plugin');
        add_filter('mce_buttons', 'jd_register_my_tc_button');
    }
}

function jd_add_tinymce_plugin($plugin_array) {
    $plugin_array['jd_tc_button'] = plugins_url( 'js/text-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function jd_register_my_tc_button($buttons) {
   array_push($buttons, 'jd_tc_button');
   return $buttons;
}

//Enque custom styles for TinyMCE Button
function jd_tc_css() {
    wp_enqueue_style('jd-tc', plugins_url('css/styles.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'jd_tc_css');