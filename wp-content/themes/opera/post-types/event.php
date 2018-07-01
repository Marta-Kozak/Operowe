<?php

/**
 * Registers the `event` post type.
 */
function event_init() {
	register_post_type( 'event', array(
		'labels'                => array(
			'name'                  => __( 'Events', 'mk' ),
			'singular_name'         => __( 'Event', 'mk' ),
			'all_items'             => __( 'All Events', 'mk' ),
			'archives'              => __( 'Event Archives', 'mk' ),
			'attributes'            => __( 'Event Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into event', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this event', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'event', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'event', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'event', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'event', 'mk' ),
			'filter_items_list'     => __( 'Filter events list', 'mk' ),
			'items_list_navigation' => __( 'Events list navigation', 'mk' ),
			'items_list'            => __( 'Events list', 'mk' ),
			'new_item'              => __( 'New Event', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Event', 'mk' ),
			'edit_item'             => __( 'Edit Event', 'mk' ),
			'view_item'             => __( 'View Event', 'mk' ),
			'view_items'            => __( 'View Events', 'mk' ),
			'search_items'          => __( 'Search events', 'mk' ),
			'not_found'             => __( 'No events found', 'mk' ),
			'not_found_in_trash'    => __( 'No events found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Event:', 'mk' ),
			'menu_name'             => __( 'Events', 'mk' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'event',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'event_init' );

/**
 * Sets the post updated messages for the `event` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `event` post type.
 */
function event_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['event'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Event updated. <a target="_blank" href="%s">View event</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Event updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Event restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Event published. <a href="%s">View event</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Event saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Event submitted. <a target="_blank" href="%s">Preview event</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview event</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Event draft updated. <a target="_blank" href="%s">Preview event</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'event_updated_messages' );
