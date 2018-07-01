<?php

/**
 * Registers the `city` post type.
 */
function city_init() {
	register_post_type( 'city', array(
		'labels'                => array(
			'name'                  => __( 'Cities', 'mk' ),
			'singular_name'         => __( 'City', 'mk' ),
			'all_items'             => __( 'All Cities', 'mk' ),
			'archives'              => __( 'City Archives', 'mk' ),
			'attributes'            => __( 'City Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into city', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this city', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'city', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'city', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'city', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'city', 'mk' ),
			'filter_items_list'     => __( 'Filter cities list', 'mk' ),
			'items_list_navigation' => __( 'Cities list navigation', 'mk' ),
			'items_list'            => __( 'Cities list', 'mk' ),
			'new_item'              => __( 'New City', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New City', 'mk' ),
			'edit_item'             => __( 'Edit City', 'mk' ),
			'view_item'             => __( 'View City', 'mk' ),
			'view_items'            => __( 'View Cities', 'mk' ),
			'search_items'          => __( 'Search cities', 'mk' ),
			'not_found'             => __( 'No cities found', 'mk' ),
			'not_found_in_trash'    => __( 'No cities found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent City:', 'mk' ),
			'menu_name'             => __( 'Cities', 'mk' ),
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
		'rest_base'             => 'city',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'city_init' );

/**
 * Sets the post updated messages for the `city` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `city` post type.
 */
function city_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['city'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'City updated. <a target="_blank" href="%s">View city</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'City updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'City restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'City published. <a href="%s">View city</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'City saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'City submitted. <a target="_blank" href="%s">Preview city</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'City scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview city</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'City draft updated. <a target="_blank" href="%s">Preview city</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'city_updated_messages' );
