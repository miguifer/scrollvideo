<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SV_Post_Type {

    public static function register() {
        add_action( 'init', array( __CLASS__, 'register_post_type' ) );
    }

    public static function register_post_type() {
        $labels = array(
            'name'               => __( 'Scroll Videos', 'scrollvideo' ),
            'singular_name'      => __( 'Scroll Video', 'scrollvideo' ),
            'add_new'            => __( 'Add New', 'scrollvideo' ),
            'add_new_item'       => __( 'Add New Scroll Video', 'scrollvideo' ),
            'edit_item'          => __( 'Edit Scroll Video', 'scrollvideo' ),
            'new_item'           => __( 'New Scroll Video', 'scrollvideo' ),
            'view_item'          => __( 'View Scroll Video', 'scrollvideo' ),
            'search_items'       => __( 'Search Scroll Videos', 'scrollvideo' ),
            'not_found'          => __( 'No scroll videos found.', 'scrollvideo' ),
            'not_found_in_trash' => __( 'No scroll videos found in Trash.', 'scrollvideo' ),
            'all_items'          => __( 'All Scroll Videos', 'scrollvideo' ),
            'menu_name'          => __( 'Scroll Video', 'scrollvideo' ),
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
