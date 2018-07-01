<?php

/**
 * Registers the `opera_narodowa` taxonomy,
 * for use with 'opera', 'composer', 'event', 'city', 'post'.
 */
function opera_narodowa_init() {
	register_taxonomy( 'opera-narodowa', array( 'opera', 'composer', 'event', 'city', 'post' ), array(
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
			'name'                       => __( 'Opera narodowas', 'mk' ),
			'singular_name'              => _x( 'Opera narodowa', 'taxonomy general name', 'mk' ),
			'search_items'               => __( 'Search Opera narodowas', 'mk' ),
			'popular_items'              => __( 'Popular Opera narodowas', 'mk' ),
			'all_items'                  => __( 'All Opera narodowas', 'mk' ),
			'parent_item'                => __( 'Parent Opera narodowa', 'mk' ),
			'parent_item_colon'          => __( 'Parent Opera narodowa:', 'mk' ),
			'edit_item'                  => __( 'Edit Opera narodowa', 'mk' ),
			'update_item'                => __( 'Update Opera narodowa', 'mk' ),
			'view_item'                  => __( 'View Opera narodowa', 'mk' ),
			'add_new_item'               => __( 'New Opera narodowa', 'mk' ),
			'new_item_name'              => __( 'New Opera narodowa', 'mk' ),
			'separate_items_with_commas' => __( 'Separate opera narodowas with commas', 'mk' ),
			'add_or_remove_items'        => __( 'Add or remove opera narodowas', 'mk' ),
			'choose_from_most_used'      => __( 'Choose from the most used opera narodowas', 'mk' ),
			'not_found'                  => __( 'No opera narodowas found.', 'mk' ),
			'no_terms'                   => __( 'No opera narodowas', 'mk' ),
			'menu_name'                  => __( 'Opera narodowas', 'mk' ),
			'items_list_navigation'      => __( 'Opera narodowas list navigation', 'mk' ),
			'items_list'                 => __( 'Opera narodowas list', 'mk' ),
			'most_used'                  => _x( 'Most Used', 'opera-narodowa', 'mk' ),
			'back_to_items'              => __( '&larr; Back to Opera narodowas', 'mk' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'opera-narodowa',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'opera_narodowa_init' );

/**
 * Sets the post updated messages for the `opera_narodowa` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `opera_narodowa` taxonomy.
 */
function opera_narodowa_updated_messages( $messages ) {

	$messages['opera-narodowa'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Opera narodowa added.', 'mk' ),
		2 => __( 'Opera narodowa deleted.', 'mk' ),
		3 => __( 'Opera narodowa updated.', 'mk' ),
		4 => __( 'Opera narodowa not added.', 'mk' ),
		5 => __( 'Opera narodowa not updated.', 'mk' ),
		6 => __( 'Opera narodowas deleted.', 'mk' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'opera_narodowa_updated_messages' );
