<?php

add_action( 'init', 'custom_post_type' );

// Custom Post Type
function custom_post_type() {
    $labels = array(
        'name'               => _x( 'Books', 'Post Type General Name', 'belajar' ),
		'singular_name'      => _x( 'Book', 'Post Type Singular Name', 'belajar' ),
        'menu_name'          => __( 'Books', 'belajar' ),
        'name_admin_bar'     => __( 'Book', 'belajar' ),
        'add_new'            => __( 'Add New', 'belajar' ),
        'add_new_item'       => __( 'Add New Book', 'belajar' ),
        'new_item'           => __( 'New Book', 'belajar' ),
        'edit_item'          => __( 'Edit Book', 'belajar' ),
        'view_item'          => __( 'View Book', 'belajar' ),
        'all_items'          => __( 'All Books', 'belajar' ),
        'search_items'       => __( 'Search Books', 'belajar' ),
        'parent_item_colon'  => __( 'Parent Books:', 'belajar' ),
        'not_found'          => __( 'No books found.', 'belajar' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'belajar' )
    );

    // Register Custom Post Type Book
    register_post_type( 
        'book',  
        array(
            'labels'        => $labels,
            'rewrite'       => array( 'slug' => 'book' ),
            'public'        => true,
            'menu_position' => 5,
            'menu_icon'	    => 'dashicons-book',
            'has_archive'   => true,
            'taxonomies'    => array('genre', 'writer'),
            'supports'      => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
        )
    );

    $labels = array(
        'name'               => _x( 'Cars', 'Post Type General Name', 'belajar' ),
		'singular_name'      => _x( 'Car', 'Post Type Singular Name', 'belajar' ),
        'menu_name'          => __( 'Cars', 'belajar' ),
        'name_admin_bar'     => __( 'Car', 'belajar' ),
        'add_new'            => __( 'Add New', 'belajar' ),
        'add_new_item'       => __( 'Add New Car', 'belajar' ),
        'new_item'           => __( 'New Car', 'belajar' ),
        'edit_item'          => __( 'Edit Car', 'belajar' ),
        'view_item'          => __( 'View Car', 'belajar' ),
        'all_items'          => __( 'All Cars', 'belajar' ),
        'search_items'       => __( 'Search Cars', 'belajar' ),
        'parent_item_colon'  => __( 'Parent Cars:', 'belajar' ),
        'not_found'          => __( 'No Cars found.', 'belajar' ),
        'not_found_in_trash' => __( 'No Cars found in Trash.', 'belajar' )
    );

    // Register Custom Post Type Book
    register_post_type( 
        'car',  
        array(
            'labels'        => $labels,
            'rewrite'       => array( 'slug' => 'car' ),
            'public'        => true,
            'menu_position' => 5,
            'menu_icon'	    => 'dashicons-car',
            'has_archive'   => true,
            'taxonomies'    => array('Brand'),
            'supports'      => array('title', 'editor', 'thumbnail', 'comments', 'excerpt'),
        )
    );
}

?>