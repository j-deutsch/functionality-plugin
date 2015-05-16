<?php // Register custom taxonomy for genres to the books post type
function jd_register_genres_tax() {
	$jd_genres_labels = array(
		'name'              => _x( 'Genre', 'taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Genre' ),
		'new_item_name'     => __( 'New Book Genre' ),
		'menu_name'         => __( 'Genre' ),
	);

	$jd_genres_args = array(
		'hierarchical'      => true,
		'labels'            => $jd_genres_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre', 'with_front' => false, 'hierarchical' => true ),
	);

	register_taxonomy( 'genre', array( 'book' ), $jd_genres_args );
}
add_action( 'init', 'jd_register_genres_tax', 0 );