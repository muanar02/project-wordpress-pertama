<?php

add_action( 'init', 'custom_taxonomy');

// Custom Taxonomy
function custom_taxonomy() {

    $labels = array(
        'name'              => _x( 'Genres', 'Taxonomy General Name', 'belajar' ),
		'singular_name'     => _x( 'Genre', 'Taxonomy Singular Name', 'belajar' ),
        'menu_name'         => __( 'Genre', 'belajar' ),
		'search_items'		=> __( 'Search Genre', 'belajar' ),
		'all_items'			=> __( 'All Genres', 'belajar' ),
		'parent_item'		=> __( 'Parent Genre', 'belajar' ),
		'parent_item_colon'	=> __( 'Parent Genre:', 'belajar' ),
		'edit_item'			=> __( 'Edit Genre', 'belajar' ),
		'update_item'		=> __( 'Update Genre', 'belajar' ),
		'add_new_item'		=> __( 'Add New Genre', 'belajar' ),
		'new_item_name'		=> __( 'New Genre', 'belajar' ),
    );

    // Register Custom Taxonomy Genre
    register_taxonomy(
        'genre',
        'book',
        array(
            'labels'             => $labels,
            'rewrite'           => array('slug' => 'genre'),
            'hierarchical'      => true, 
            'show_admin_column' => true,
            'query_var'         => true,
        )
    );

    $labels = array(
        'name'              => _x( 'Writers', 'Taxonomy General Name', 'belajar' ),
		'singular_name'     => _x( 'Writer', 'Taxonomy Singular Name', 'belajar' ),
        'menu_name'         => __( 'Writer', 'belajar' ),
		'search_items'		=> __( 'Search Writer', 'belajar' ),
        'popular_items'     => __( 'Popular Genres', 'belajar' ),
		'all_items'			=> __( 'All Writers', 'belajar' ),
		'parent_item'       => null,
		'parent_item_colon' => null,
		'edit_item'			=> __( 'Edit Writer', 'belajar' ),
		'update_item'		=> __( 'Update Writer', 'belajar' ),
		'add_new_item'		=> __( 'Add New Writer', 'belajar' ),
		'new_item_name'		=> __( 'New Writer', 'belajar' ),
        'not_found'         => __( 'No genres found.', 'wimcycle' ),
    );

    // Register Custom Taxonomy Writer
    register_taxonomy(
        'writer',
        'book',
        array(
            'labels'             => $labels,
            'rewrite'           => array('slug' => 'writer'),
            'hierarchical'      => false, 
            'show_admin_column' => true,
            'query_var'         => true,
        )
    );

    $labels = array(
        'name'              => _x( 'Brands', 'Taxonomy General Name', 'belajar' ),
		'singular_name'     => _x( 'Brand', 'Taxonomy Singular Name', 'belajar' ),
        'menu_name'         => __( 'Brand', 'belajar' ),
		'search_items'		=> __( 'Search Brand', 'belajar' ),
		'all_items'			=> __( 'All Brands', 'belajar' ),
		'parent_item'		=> __( 'Parent Brand', 'belajar' ),
		'parent_item_colon'	=> __( 'Parent Brand:', 'belajar' ),
		'edit_item'			=> __( 'Edit Brand', 'belajar' ),
		'update_item'		=> __( 'Update Brand', 'belajar' ),
		'add_new_item'		=> __( 'Add New Brand', 'belajar' ),
		'new_item_name'		=> __( 'New Brand', 'belajar' ),
    );

    // Register Custom Taxonomy Brand
    register_taxonomy(
        'brand',
        'car',
        array(
            'labels'             => $labels,
            'rewrite'           => array('slug' => 'brand'),
            'hierarchical'      => true, 
            'show_admin_column' => true,
            'query_var'         => true,
        )
    );
}


?>