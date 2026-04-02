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
            'name'               => __( 'Sleek Scroll Videos', 'sleek-scroll-video' ),
            'singular_name'      => __( 'Sleek Scroll Video', 'sleek-scroll-video' ),
            'add_new'            => __( 'Add New', 'sleek-scroll-video' ),
            'add_new_item'       => __( 'Add New Sleek Scroll Video', 'sleek-scroll-video' ),
            'edit_item'          => __( 'Edit Sleek Scroll Video', 'sleek-scroll-video' ),
            'new_item'           => __( 'New Sleek Scroll Video', 'sleek-scroll-video' ),
            'view_item'          => __( 'View Sleek Scroll Video', 'sleek-scroll-video' ),
            'search_items'       => __( 'Search Sleek Scroll Videos', 'sleek-scroll-video' ),
            'not_found'          => __( 'No sleek scroll videos found.', 'sleek-scroll-video' ),
            'not_found_in_trash' => __( 'No sleek scroll videos found in Trash.', 'sleek-scroll-video' ),
            'all_items'          => __( 'All Sleek Scroll Videos', 'sleek-scroll-video' ),
            'menu_name'          => __( 'Sleek Scroll Video', 'sleek-scroll-video' ),
        );

        $args = array(
            'labels'              => $labels,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 25,
            'menu_icon'           => SCROLLVIDEO_PLUGIN_URL . 'media/logo.png',
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
