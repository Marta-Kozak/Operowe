<?php

/**
 * Registers the `event` taxonomy,
 * for use with 'event'.
 */
function event_init() {
	register_taxonomy( 'event', array( 'event' ), array(
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
			'name'                       => __( 'Events', 'mk' ),
			'singular_name'              => _x( 'Event', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Events', 'mk' ),
			'popular_items'              => __( 'Popular Events', 'mk' ),
			'all_items'                  => __( 'All Events', 'mk' ),
			'parent_item'                => __( 'Parent Event', 'mk' ),
			'parent_item_colon'          => __( 'Parent Event:', 'mk' ),
			'edit_item'                  => __( 'Edit Event', 'mk' ),
			'update_item'                => __( 'Update Event', 'mk' ),
			'view_item'                  => __( 'View Event', 'mk' ),
			'add_new_item'               => __( 'New Event', 'mk' ),
			'new_item_name'              => __( 'New Event', 'mk' ),
			'separate_items_with_commas' => __( 'Separate events with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove events', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used events', 'mk' ),
			'not_found'                  => __( 'No events found.', 'mk' ),
			'no_terms'                   => __( 'No events', 'mk' ),
			'menu_name'                  => __( 'Events', 'mk' ),
			'items_list_navigation'      => __( 'Events list navigation', 'mk' ),
			'items_list'                 => __( 'Events list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'event', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Events', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'event',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'event_init' );

/**
 * Sets the post updated messages for the `event` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `event` taxonomy.
 */
function event_updated_messages( $messages ) {

	$messages['event'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Event added.', 'mk' ),
		2 => __( 'Event deleted.', 'mk' ),
		3 => __( 'Event updated.', 'mk' ),
		4 => __( 'Event not added.', 'mk' ),
		5 => __( 'Event not updated.', 'mk' ),
		6 => __( 'Events deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'event_updated_messages' );
