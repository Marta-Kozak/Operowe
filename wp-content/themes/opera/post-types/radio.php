<?php

/**
 * Registers the `radio` post type.
 */
function radio_init() {
	register_post_type( 'radio', array(
		'labels'                => array(
			'name'                  => __( 'Radios', 'mk' ),
			'singular_name'         => __( 'Radio', 'mk' ),
			'all_items'             => __( 'All Radios', 'mk' ),
			'archives'              => __( 'Radio Archives', 'mk' ),
			'attributes'            => __( 'Radio Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into radio', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this radio', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'radio', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'radio', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'radio', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'radio', 'mk' ),
			'filter_items_list'     => __( 'Filter radios list', 'mk' ),
			'items_list_navigation' => __( 'Radios list navigation', 'mk' ),
			'items_list'            => __( 'Radios list', 'mk' ),
			'new_item'              => __( 'New Radio', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Radio', 'mk' ),
			'edit_item'             => __( 'Edit Radio', 'mk' ),
			'view_item'             => __( 'View Radio', 'mk' ),
			'view_items'            => __( 'View Radios', 'mk' ),
			'search_items'          => __( 'Search radios', 'mk' ),
			'not_found'             => __( 'No radios found', 'mk' ),
			'not_found_in_trash'    => __( 'No radios found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Radio:', 'mk' ),
			'menu_name'             => __( 'Radios', 'mk' ),
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
		'rest_base'             => 'radio',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'radio_init' );

/**
 * Sets the post updated messages for the `radio` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `radio` post type.
 */
function radio_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['radio'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Radio updated. <a target="_blank" href="%s">View radio</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Radio updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Radio restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Radio published. <a href="%s">View radio</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Radio saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Radio submitted. <a target="_blank" href="%s">Preview radio</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Radio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview radio</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Radio draft updated. <a target="_blank" href="%s">Preview radio</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'radio_updated_messages' );
