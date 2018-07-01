<?php

/**
 * Registers the `title` taxonomy,
 * for use with 'theatre', 'opera', 'composer'.
 */
function title_init() {
	register_taxonomy( 'title', array( 'theatre', 'opera', 'composer' ), array(
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
			'name'                       => __( 'Titles', 'mk' ),
			'singular_name'              => _x( 'Title', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Titles', 'mk' ),
			'popular_items'              => __( 'Popular Titles', 'mk' ),
			'all_items'                  => __( 'All Titles', 'mk' ),
			'parent_item'                => __( 'Parent Title', 'mk' ),
			'parent_item_colon'          => __( 'Parent Title:', 'mk' ),
			'edit_item'                  => __( 'Edit Title', 'mk' ),
			'update_item'                => __( 'Update Title', 'mk' ),
			'view_item'                  => __( 'View Title', 'mk' ),
			'add_new_item'               => __( 'New Title', 'mk' ),
			'new_item_name'              => __( 'New Title', 'mk' ),
			'separate_items_with_commas' => __( 'Separate titles with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove titles', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used titles', 'mk' ),
			'not_found'                  => __( 'No titles found.', 'mk' ),
			'no_terms'                   => __( 'No titles', 'mk' ),
			'menu_name'                  => __( 'Titles', 'mk' ),
			'items_list_navigation'      => __( 'Titles list navigation', 'mk' ),
			'items_list'                 => __( 'Titles list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'title', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Titles', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'title',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'title_init' );

/**
 * Sets the post updated messages for the `title` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `title` taxonomy.
 */
function title_updated_messages( $messages ) {

	$messages['title'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Title added.', 'mk' ),
		2 => __( 'Title deleted.', 'mk' ),
		3 => __( 'Title updated.', 'mk' ),
		4 => __( 'Title not added.', 'mk' ),
		5 => __( 'Title not updated.', 'mk' ),
		6 => __( 'Titles deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'title_updated_messages' );
