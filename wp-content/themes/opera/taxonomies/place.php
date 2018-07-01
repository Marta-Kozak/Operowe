<?php

/**
 * Registers the `place` taxonomy,
 * for use with 'opera', 'theatre', 'city'.
 */
function place_init() {
	register_taxonomy( 'place', array( 'opera', 'theatre', 'city' ), array(
		'hierarchical'      => false,
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
			'name'                       => __( 'Places', 'mk' ),
			'singular_name'              => _x( 'Place', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Places', 'mk' ),
			'popular_items'              => __( 'Popular Places', 'mk' ),
			'all_items'                  => __( 'All Places', 'mk' ),
			'parent_item'                => __( 'Parent Place', 'mk' ),
			'parent_item_colon'          => __( 'Parent Place:', 'mk' ),
			'edit_item'                  => __( 'Edit Place', 'mk' ),
			'update_item'                => __( 'Update Place', 'mk' ),
			'view_item'                  => __( 'View Place', 'mk' ),
			'add_new_item'               => __( 'New Place', 'mk' ),
			'new_item_name'              => __( 'New Place', 'mk' ),
			'separate_items_with_commas' => __( 'Separate places with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove places', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used places', 'mk' ),
			'not_found'                  => __( 'No places found.', 'mk' ),
			'no_terms'                   => __( 'No places', 'mk' ),
			'menu_name'                  => __( 'Places', 'mk' ),
			'items_list_navigation'      => __( 'Places list navigation', 'mk' ),
			'items_list'                 => __( 'Places list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'place', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Places', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'place',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'place_init' );

/**
 * Sets the post updated messages for the `place` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `place` taxonomy.
 */
function place_updated_messages( $messages ) {

	$messages['place'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Place added.', 'mk' ),
		2 => __( 'Place deleted.', 'mk' ),
		3 => __( 'Place updated.', 'mk' ),
		4 => __( 'Place not added.', 'mk' ),
		5 => __( 'Place not updated.', 'mk' ),
		6 => __( 'Places deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'place_updated_messages' );
