<?php

/**
 * Registers the `composer` post type.
 */
function composer_init() {
	register_post_type( 'composer', array(
		'labels'                => array(
			'name'                  => __( 'Composers', 'mk' ),
			'singular_name'         => __( 'Composer', 'mk' ),
			'all_items'             => __( 'All Composers', 'mk' ),
			'archives'              => __( 'Composer Archives', 'mk' ),
			'attributes'            => __( 'Composer Attributes', 'mk' ),
			'insert_into_item'      => __( 'Insert into composer', 'mk' ),
			'uploaded_to_this_item' => __( 'Uploaded to this composer', 'mk' ),
			'featured_image'        => _x( 'Featured Image', 'composer', 'mk' ),
			'set_featured_image'    => _x( 'Set featured image', 'composer', 'mk' ),
			'remove_featured_image' => _x( 'Remove featured image', 'composer', 'mk' ),
			'use_featured_image'    => _x( 'Use as featured image', 'composer', 'mk' ),
			'filter_items_list'     => __( 'Filter composers list', 'mk' ),
			'items_list_navigation' => __( 'Composers list navigation', 'mk' ),
			'items_list'            => __( 'Composers list', 'mk' ),
			'new_item'              => __( 'New Composer', 'mk' ),
			'add_new'               => __( 'Add New', 'mk' ),
			'add_new_item'          => __( 'Add New Composer', 'mk' ),
			'edit_item'             => __( 'Edit Composer', 'mk' ),
			'view_item'             => __( 'View Composer', 'mk' ),
			'view_items'            => __( 'View Composers', 'mk' ),
			'search_items'          => __( 'Search composers', 'mk' ),
			'not_found'             => __( 'No composers found', 'mk' ),
			'not_found_in_trash'    => __( 'No composers found in trash', 'mk' ),
			'parent_item_colon'     => __( 'Parent Composer:', 'mk' ),
			'menu_name'             => __( 'Composers', 'mk' ),
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
		'rest_base'             => 'composer',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'composer_init' );

/**
 * Sets the post updated messages for the `composer` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `composer` post type.
 */
function composer_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['composer'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Composer updated. <a target="_blank" href="%s">View composer</a>', 'mk' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'mk' ),
		3  => __( 'Custom field deleted.', 'mk' ),
		4  => __( 'Composer updated.', 'mk' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Composer restored to revision from %s', 'mk' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Composer published. <a href="%s">View composer</a>', 'mk' ), esc_url( $permalink ) ),
		7  => __( 'Composer saved.', 'mk' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Composer submitted. <a target="_blank" href="%s">Preview composer</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Composer scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview composer</a>', 'mk' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Composer draft updated. <a target="_blank" href="%s">Preview composer</a>', 'mk' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'composer_updated_messages' );
