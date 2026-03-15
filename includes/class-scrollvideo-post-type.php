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
            'name'               => __( 'Scroll Videos', 'scroll-video' ),
            'singular_name'      => __( 'Scroll Video', 'scroll-video' ),
            'add_new'            => __( 'Add New', 'scroll-video' ),
            'add_new_item'       => __( 'Add New Scroll Video', 'scroll-video' ),
            'edit_item'          => __( 'Edit Scroll Video', 'scroll-video' ),
            'new_item'           => __( 'New Scroll Video', 'scroll-video' ),
            'view_item'          => __( 'View Scroll Video', 'scroll-video' ),
            'search_items'       => __( 'Search Scroll Videos', 'scroll-video' ),
            'not_found'          => __( 'No scroll videos found.', 'scroll-video' ),
            'not_found_in_trash' => __( 'No scroll videos found in Trash.', 'scroll-video' ),
            'all_items'          => __( 'All Scroll Videos', 'scroll-video' ),
            'menu_name'          => __( 'Scroll Video', 'scroll-video' ),
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
