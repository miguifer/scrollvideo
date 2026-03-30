<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Scrollvideo_Post_Type {

    public static function register() {
        add_action( 'init', array( __CLASS__, 'register_post_type' ) );
    }

    public static function register_post_type() {
        $labels = array(
            'name'               => __( 'Sleek Scroll Videos', 'scrollvideo' ),
            'singular_name'      => __( 'Sleek Scroll Video', 'scrollvideo' ),
            'add_new'            => __( 'Add New', 'scrollvideo' ),
            'add_new_item'       => __( 'Add New Sleek Scroll Video', 'scrollvideo' ),
            'edit_item'          => __( 'Edit Sleek Scroll Video', 'scrollvideo' ),
            'new_item'           => __( 'New Sleek Scroll Video', 'scrollvideo' ),
            'view_item'          => __( 'View Sleek Scroll Video', 'scrollvideo' ),
            'search_items'       => __( 'Search Sleek Scroll Videos', 'scrollvideo' ),
            'not_found'          => __( 'No sleek scroll videos found.', 'scrollvideo' ),
            'not_found_in_trash' => __( 'No sleek scroll videos found in Trash.', 'scrollvideo' ),
            'all_items'          => __( 'All Sleek Scroll Videos', 'scrollvideo' ),
            'menu_name'          => __( 'Sleek Scroll Video', 'scrollvideo' ),
        );

        $args = array(
            'labels'              => $labels,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 25,
            'menu_icon'           => 'dashicons-video-alt3',
            'capability_type'     => 'post',
            'supports'            => array( 'title' ),
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'rewrite'             => false,
            'show_in_rest'        => false,
        );

        register_post_type( 'scrollvideo', $args );
    }
}
