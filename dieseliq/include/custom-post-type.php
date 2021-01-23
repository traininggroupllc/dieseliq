<?php
function stroke_parts_posttype() {
register_post_type( 'stroke-parts',

          array(

            'labels' => array(
                'name' => __( 'Stroke Parts' ),
                'singular_name' => __( 'Stroke Part' ),
                'all_items' => __( 'All Stroke Parts'),
                'view_item' => __( 'View Stroke Parts'), 
                'add_new_item' => __( 'Add Stroke Parts '),
                'add_new' => __( 'Add Stroke Parts'),
                'edit_item' => __( 'Edit Stroke Parts'),
                'update_item' => __( 'Update Stroke Parts'),              
            ),

            'public' => true,
            'has_archive' => true,
            'publicly_queryable'  => true,
            'menu_icon' => 'dashicons-admin-generic',
            'rewrite' => array('slug' => 'stroke-parts'),
            'supports' => array( 'title', 'editor', 'excerpt','thumbnail')
        )
    );
}
flush_rewrite_rules();
add_action('init', 'stroke_parts_posttype');

function engine_taxonomy() {
    $labels = array(
        'name'              => 'Engine',
        'singular_name'     => 'Engine',
        'search_items'      => 'Search Engine',
        'all_items'         => 'All Engine',
        'parent_item'       => 'Parent Engine',
        'parent_item_colon' => 'Parent Engine',
        'edit_item'         => 'Edit Engine',
        'update_item'       => 'Update Engine',
        'add_new_item'      => 'Add New Engine',
        'new_item_name'     => 'New Engine Name',
        'menu_name'         => 'Engine Type'
    );
    
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'rewrite'           => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
     
    register_taxonomy( 'engine-cat', 'stroke-parts', $args );
}
add_action('init', 'engine_taxonomy');

function part_taxonomy() {
    $labels = array(
        'name'              => 'Part',
        'singular_name'     => 'Part',
        'search_items'      => 'Search Part',
        'all_items'         => 'All Part',
        'parent_item'       => 'Parent Part',
        'parent_item_colon' => 'Parent Part',
        'edit_item'         => 'Edit Part',
        'update_item'       => 'Update Part',
        'add_new_item'      => 'Add New Part',
        'new_item_name'     => 'New Part Name',
        'menu_name'         => 'Part Type'
    );
    
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'rewrite'           => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
     
    register_taxonomy( 'part-cat', 'stroke-parts', $args );
}
add_action('init', 'part_taxonomy');