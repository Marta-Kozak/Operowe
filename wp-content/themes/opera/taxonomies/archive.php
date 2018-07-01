<?php

/**
 * Registers the `archive` taxonomy,
 * for use with 'opera', 'event'.
 */
function archive_init() {
	register_taxonomy( 'archive', array( 'opera', 'event' ), array(
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
			'name'                       => __( 'Archives', 'mk' ),
			'singular_name'              => _x( 'Archive', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Archives', 'mk' ),
			'popular_items'              => __( 'Popular Archives', 'mk' ),
			'all_items'                  => __( 'All Archives', 'mk' ),
			'parent_item'                => __( 'Parent Archive', 'mk' ),
			'parent_item_colon'          => __( 'Parent Archive:', 'mk' ),
			'edit_item'                  => __( 'Edit Archive', 'mk' ),
			'update_item'                => __( 'Update Archive', 'mk' ),
			'view_item'                  => __( 'View Archive', 'mk' ),
			'add_new_item'               => __( 'New Archive', 'mk' ),
			'new_item_name'              => __( 'New Archive', 'mk' ),
			'separate_items_with_commas' => __( 'Separate archives with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove archives', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used archives', 'mk' ),
			'not_found'                  => __( 'No archives found.', 'mk' ),
			'no_terms'                   => __( 'No archives', 'mk' ),
			'menu_name'                  => __( 'Archives', 'mk' ),
			'items_list_navigation'      => __( 'Archives list navigation', 'mk' ),
			'items_list'                 => __( 'Archives list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'archive', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Archives', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'archive',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'archive_init' );

/**
 * Sets the post updated messages for the `archive` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `archive` taxonomy.
 */
function archive_updated_messages( $messages ) {

	$messages['archive'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Archive added.', 'mk' ),
		2 => __( 'Archive deleted.', 'mk' ),
		3 => __( 'Archive updated.', 'mk' ),
		4 => __( 'Archive not added.', 'mk' ),
		5 => __( 'Archive not updated.', 'mk' ),
		6 => __( 'Archives deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'archive_updated_messages' );
