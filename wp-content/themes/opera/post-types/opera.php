<?php

/**
 * Registers the `opera` post type.
 */
function opera_init() {
	register_post_type( 'opera', array(
		'labels'                => array(
			'name'                  => __( 'Operas', 'mk' ),
			'singular_name'         => __( 'Opera', 'mk' ),
			'all_items'             => __( 'All Operas', 'mk' ),
			'archives'              => __( 'Opera Archives', 'mk' ),
			'attributes'            => __( 'Opera Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into opera', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this opera', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'opera', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'opera', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'opera', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'opera', 'mk' ),
			'filter_items_list'     => __( 'Filter operas list', 'mk' ),
			'items_list_navigation' => __( 'Operas list navigation', 'mk' ),
			'items_list'            => __( 'Operas list', 'mk' ),
			'new_item'              => __( 'New Opera', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Opera', 'mk' ),
			'edit_item'             => __( 'Edit Opera', 'mk' ),
			'view_item'             => __( 'View Opera', 'mk' ),
			'view_items'            => __( 'View Operas', 'mk' ),
			'search_items'          => __( 'Search operas', 'mk' ),
			'not_found'             => __( 'No operas found', 'mk' ),
			'not_found_in_trash'    => __( 'No operas found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Opera:', 'mk' ),
			'menu_name'             => __( 'Operas', 'mk' ),
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
		'rest_base'             => 'opera',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'opera_init' );

/**
 * Sets the post updated messages for the `opera` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `opera` post type.
 */
function opera_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['opera'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Opera updated. <a target="_blank" href="%s">View opera</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Opera updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Opera restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Opera published. <a href="%s">View opera</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Opera saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Opera submitted. <a target="_blank" href="%s">Preview opera</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Opera scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview opera</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Opera draft updated. <a target="_blank" href="%s">Preview opera</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'opera_updated_messages' );
