<?php

/**
 * Registers the `kompozytor` post type.
 */
function kompozytor_init() {
	register_post_type( 'kompozytor', array(
		'labels'                => array(
			'name'                  => __( 'Kompozytors', 'mk' ),
			'singular_name'         => __( 'Kompozytor', 'mk' ),
			'all_items'             => __( 'All Kompozytors', 'mk' ),
			'archives'              => __( 'Kompozytor Archives', 'mk' ),
			'attributes'            => __( 'Kompozytor Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into kompozytor', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this kompozytor', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'kompozytor', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'kompozytor', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'kompozytor', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'kompozytor', 'mk' ),
			'filter_items_list'     => __( 'Filter kompozytors list', 'mk' ),
			'items_list_navigation' => __( 'Kompozytors list navigation', 'mk' ),
			'items_list'            => __( 'Kompozytors list', 'mk' ),
			'new_item'              => __( 'New Kompozytor', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Kompozytor', 'mk' ),
			'edit_item'             => __( 'Edit Kompozytor', 'mk' ),
			'view_item'             => __( 'View Kompozytor', 'mk' ),
			'view_items'            => __( 'View Kompozytors', 'mk' ),
			'search_items'          => __( 'Search kompozytors', 'mk' ),
			'not_found'             => __( 'No kompozytors found', 'mk' ),
			'not_found_in_trash'    => __( 'No kompozytors found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Kompozytor:', 'mk' ),
			'menu_name'             => __( 'Kompozytors', 'mk' ),
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
		'rest_base'             => 'kompozytor',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'kompozytor_init' );

/**
 * Sets the post updated messages for the `kompozytor` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `kompozytor` post type.
 */
function kompozytor_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['kompozytor'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Kompozytor updated. <a target="_blank" href="%s">View kompozytor</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Kompozytor updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Kompozytor restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Kompozytor published. <a href="%s">View kompozytor</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Kompozytor saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Kompozytor submitted. <a target="_blank" href="%s">Preview kompozytor</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Kompozytor scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview kompozytor</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Kompozytor draft updated. <a target="_blank" href="%s">Preview kompozytor</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'kompozytor_updated_messages' );
