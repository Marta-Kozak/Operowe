<?php

/**
 * Registers the `wydarzenie` post type.
 */
function wydarzenie_init() {
	register_post_type( 'wydarzenie', array(
		'labels'                => array(
			'name'                  => __( 'Wydarzenies', 'mk' ),
			'singular_name'         => __( 'Wydarzenie', 'mk' ),
			'all_items'             => __( 'All Wydarzenies', 'mk' ),
			'archives'              => __( 'Wydarzenie Archives', 'mk' ),
			'attributes'            => __( 'Wydarzenie Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into wydarzenie', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this wydarzenie', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'wydarzenie', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'wydarzenie', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'wydarzenie', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'wydarzenie', 'mk' ),
			'filter_items_list'     => __( 'Filter wydarzenies list', 'mk' ),
			'items_list_navigation' => __( 'Wydarzenies list navigation', 'mk' ),
			'items_list'            => __( 'Wydarzenies list', 'mk' ),
			'new_item'              => __( 'New Wydarzenie', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Wydarzenie', 'mk' ),
			'edit_item'             => __( 'Edit Wydarzenie', 'mk' ),
			'view_item'             => __( 'View Wydarzenie', 'mk' ),
			'view_items'            => __( 'View Wydarzenies', 'mk' ),
			'search_items'          => __( 'Search wydarzenies', 'mk' ),
			'not_found'             => __( 'No wydarzenies found', 'mk' ),
			'not_found_in_trash'    => __( 'No wydarzenies found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Wydarzenie:', 'mk' ),
			'menu_name'             => __( 'Wydarzenies', 'mk' ),
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
		'rest_base'             => 'wydarzenie',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'wydarzenie_init' );

/**
 * Sets the post updated messages for the `wydarzenie` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `wydarzenie` post type.
 */
function wydarzenie_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['wydarzenie'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Wydarzenie updated. <a target="_blank" href="%s">View wydarzenie</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Wydarzenie updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Wydarzenie restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Wydarzenie published. <a href="%s">View wydarzenie</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Wydarzenie saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Wydarzenie submitted. <a target="_blank" href="%s">Preview wydarzenie</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Wydarzenie scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview wydarzenie</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Wydarzenie draft updated. <a target="_blank" href="%s">Preview wydarzenie</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'wydarzenie_updated_messages' );
