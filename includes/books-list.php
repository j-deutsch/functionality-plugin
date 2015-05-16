<?php // Loop template for the robots list

// Arguments for robots query
$jd_books_args = array(
	'post_type'      => 'book',
	'genres'         => $genres,
	'posts_per_page' => -1
);
$jd_books_query = new WP_Query( $jd_books_args );

// The Loop
if ( $jd_books_query->have_posts() ) {
	echo '<h4>Books</h4>';
	echo '<ul>';
	while ( $jd_books_query->have_posts() ) {
		$jd_books_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
} else {
	// no books found
}
/* Restore original Post Data */
wp_reset_postdata();