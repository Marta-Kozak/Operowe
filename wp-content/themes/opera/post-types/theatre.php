<?php

/**
 * Registers the `theatre` post type.
 */
function theatre_init() {
	register_post_type( 'theatre', array(
		'labels'                => array(
			'name'                  => __( 'Theatres', 'mk' ),
			'singular_name'         => __( 'Theatre', 'mk' ),
			'all_items'             => __( 'All Theatres', 'mk' ),
			'archives'              => __( 'Theatre Archives', 'mk' ),
			'attributes'            => __( 'Theatre Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into theatre', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this theatre', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'theatre', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'theatre', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'theatre', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'theatre', 'mk' ),
			'filter_items_list'     => __( 'Filter theatres list', 'mk' ),
			'items_list_navigation' => __( 'Theatres list navigation', 'mk' ),
			'items_list'            => __( 'Theatres list', 'mk' ),
			'new_item'              => __( 'New Theatre', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Theatre', 'mk' ),
			'edit_item'             => __( 'Edit Theatre', 'mk' ),
			'view_item'             => __( 'View Theatre', 'mk' ),
			'view_items'            => __( 'View Theatres', 'mk' ),
			'search_items'          => __( 'Search theatres', 'mk' ),
			'not_found'             => __( 'No theatres found', 'mk' ),
			'not_found_in_trash'    => __( 'No theatres found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Theatre:', 'mk' ),
			'menu_name'             => __( 'Theatres', 'mk' ),
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
		'rest_base'             => 'theatre',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'theatre_init' );

/**
 * Sets the post updated messages for the `theatre` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `theatre` post type.
 */
function theatre_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['theatre'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Theatre updated. <a target="_blank" href="%s">View theatre</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Theatre updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Theatre restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Theatre published. <a href="%s">View theatre</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Theatre saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Theatre submitted. <a target="_blank" href="%s">Preview theatre</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Theatre scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview theatre</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Theatre draft updated. <a target="_blank" href="%s">Preview theatre</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'theatre_updated_messages' );
