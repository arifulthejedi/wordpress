<?php 


/*
**Register Custom Post Type Book**
for custom postype name has to replace book to cutom postypename
*/


function create_book_cpt() {

	$labels = array(
		'name' => _x( 'Books', 'Post Type General Name', 'textdomain' ),//name of the postype plural
		'singular_name' => _x( 'Book', 'Post Type Singular Name', 'textdomain' ),//name of the postype singular
		'menu_name' => _x( 'Books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),//show label in manu
		'archives' => __( 'Book Archives', 'textdomain' ),
		'attributes' => __( 'Book Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Book:', 'textdomain' ),
		'all_items' => __( 'All Books', 'textdomain' ),
		'add_new_item' => __( 'Add New Book', 'textdomain' ),
		'add_new' => __( 'Add New Book', 'textdomain' ),//label for add new postype in admin panel
		'new_item' => __( 'New Book', 'textdomain' ),
		'edit_item' => __( 'Edit Book', 'textdomain' ),
		'update_item' => __( 'Update Book', 'textdomain' ),
		'view_item' => __( 'View Book', 'textdomain' ),
		'view_items' => __( 'View Books', 'textdomain' ),
		'search_items' => __( 'Search Book', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Book', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Book', 'textdomain' ),
		'items_list' => __( 'Books list', 'textdomain' ),
		'items_list_navigation' => __( 'Books list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Books list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Book', 'textdomain' ),//name of postype show on manu
		'description' => __( 'Hello this is custom post type for testing purpose', 'textdomain' ),//description for postype
		'labels' => $labels,
		'menu_icon' => 'dashicons-book',//dash icon for the postype https://developer.wordpress.org/resource/dashicons/#controls-play
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => ["post_tag"],//taxonomy slug, the taxonomy included in the post type
		'public' => true, //for public or for admin users
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5, //position in admin
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true, //hierarchical post type
		'exclude_from_search' => false,
		'show_in_rest' => true, //for rest capability
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'book', $args ); //$arg1 = slug

}
add_action( 'init', 'create_book_cpt', 0 );