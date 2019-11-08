<?php
/*
* Plugin Name: WP Book
* Description: Add, Update, Delete and Display
* Plugin URI: https://sankalphasija.wordpress.com/
* Author: Sankalp Hasija
* Author URI: https://sankalphasija.wordpress.com/
* Version: 1.0.0
*/
//**Function for Creating Post Type**//

add_action('init','create_posttype');
function create_posttype() {
    register_post_type( 'Book',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Book' ),
                'singular_name' => __( 'Book' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Book'),
        )
    );
}

//**Function for Custom Post Type**//
 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Book', 'Post Type General Name', 'twentynineteen' ),
            'singular_name'       => _x( 'Book', 'Post Type Singular Name', 'twentynineteen' ),
            'menu_name'           => __( 'Book', 'twentynineteen' ),
            'parent_item_colon'   => __( 'Parent Book', 'twentynineteen' ),
            'all_items'           => __( 'All Books', 'twentynineteen' ),
            'view_item'           => __( 'View Book', 'twentynineteen' ),
            'add_new_item'        => __( 'Add New Book', 'twentynineteen' ),
            'add_new'             => __( 'Add New', 'twentynineteen' ),
            'edit_item'           => __( 'Edit Book', 'twentynineteen' ),
            'update_item'         => __( 'Update Book', 'twentynineteen' ),
            'search_items'        => __( 'Search Book', 'twentynineteen' ),
            'not_found'           => __( 'Not Found', 'twentynineteen' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentynineteen' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'Book', 'twentynineteen' ),
            'description'         => __( 'Book news and reviews', 'twentynineteen' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );
         
        // Registering your Custom Post Type
        register_post_type( 'Book', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type');
?>