<?php // Register custom post type for robots
function jd_register_books_cpt() {
	$jd_book_labels = array(
		'name'               => _x( 'Books', 'post type general name', 'jdfunctionality' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'jdfunctionality' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'jdfunctionality' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'jdfunctionality' ),
		'add_new'            => _x( 'Add New', 'book', 'jdfunctionality' ),
		'add_new_item'       => __( 'Add New Book', 'jdfunctionality' ),
		'new_item'           => __( 'New Book', 'jdfunctionality' ),
		'edit_item'          => __( 'Edit Book', 'jdfunctionality' ),
		'view_item'          => __( 'View Book', 'jdfunctionality' ),
		'all_items'          => __( 'All Books', 'jdfunctionality' ),
		'search_items'       => __( 'Search Books', 'jdfunctionality' ),
		'parent_item_colon'  => __( 'Parent Books:', 'jdfunctionality' ),
		'not_found'          => __( 'No books found.', 'jdfunctionality' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'jdfunctionality' )
	);

	$jd_book_args = array(
		'labels'             => $jd_book_labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'book', $jd_book_args );
}
add_action( 'init', 'jd_register_books_cpt' );