<?php

/**
 * Registers the `repertuar` taxonomy,
 * for use with 'opera'.
 */
function repertuar_init() {
	register_taxonomy( 'repertuar', array( 'opera' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Repertuars', 'mk' ),
			'singular_name'              => _x( 'Repertuar', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Repertuars', 'mk' ),
			'popular_items'              => __( 'Popular Repertuars', 'mk' ),
			'all_items'                  => __( 'All Repertuars', 'mk' ),
			'parent_item'                => __( 'Parent Repertuar', 'mk' ),
			'parent_item_colon'          => __( 'Parent Repertuar:', 'mk' ),
			'edit_item'                  => __( 'Edit Repertuar', 'mk' ),
			'update_item'                => __( 'Update Repertuar', 'mk' ),
			'view_item'                  => __( 'View Repertuar', 'mk' ),
			'add_new_item'               => __( 'New Repertuar', 'mk' ),
			'new_item_name'              => __( 'New Repertuar', 'mk' ),
			'separate_items_with_commas' => __( 'Separate repertuars with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove repertuars', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used repertuars', 'mk' ),
			'not_found'                  => __( 'No repertuars found.', 'mk' ),
			'no_terms'                   => __( 'No repertuars', 'mk' ),
			'menu_name'                  => __( 'Repertuars', 'mk' ),
			'items_list_navigation'      => __( 'Repertuars list navigation', 'mk' ),
			'items_list'                 => __( 'Repertuars list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'repertuar', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Repertuars', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'repertuar',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'repertuar_init' );

/**
 * Sets the post updated messages for the `repertuar` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `repertuar` taxonomy.
 */
function repertuar_updated_messages( $messages ) {

	$messages['repertuar'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Repertuar added.', 'mk' ),
		2 => __( 'Repertuar deleted.', 'mk' ),
		3 => __( 'Repertuar updated.', 'mk' ),
		4 => __( 'Repertuar not added.', 'mk' ),
		5 => __( 'Repertuar not updated.', 'mk' ),
		6 => __( 'Repertuars deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'repertuar_updated_messages' );
