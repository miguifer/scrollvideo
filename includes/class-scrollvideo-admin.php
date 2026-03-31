<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Scrollvideo_Admin {

    public static function register() {
        add_filter( 'manage_scrollvideo_posts_columns', array( __CLASS__, 'add_columns' ) );
        add_action( 'manage_scrollvideo_posts_custom_column', array( __CLASS__, 'render_columns' ), 10, 2 );
        add_filter( 'plugin_action_links_' . SCROLLVIDEO_PLUGIN_BASENAME, array( __CLASS__, 'plugin_action_links' ) );
    }

    /**
     * Add custom columns to the CPT listing.
     */
    public static function add_columns( $columns ) {
        $new_columns = array();
        foreach ( $columns as $key => $label ) {
            $new_columns[ $key ] = $label;
            if ( 'title' === $key ) {
                $new_columns['sv_shortcode'] = __( 'Shortcode', 'sleek-scroll-video' );
                $new_columns['sv_video']     = __( 'Video URL', 'sleek-scroll-video' );
            }
        }
        return $new_columns;
    }

    /**
     * Render custom column content.
     */
    public static function render_columns( $column, $post_id ) {
        switch ( $column ) {
            case 'sv_shortcode':
                echo '<code>[sleek-scroll-video id="' . esc_html( $post_id ) . '"]</code>';
                break;
            case 'sv_video':
                $url = get_post_meta( $post_id, '_sv_video_url', true );
                if ( $url ) {
                    echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer">'
                         . esc_html( wp_basename( $url ) )
                         . '</a>';
                } else {
                    echo '—';
                }
                break;
        }
    }

    /**
     * Add "Manage" link on Plugins page.
     */
    public static function plugin_action_links( $links ) {
        $manage_link = '<a href="' . esc_url( admin_url( 'edit.php?post_type=scrollvideo' ) ) . '"'
             . esc_html__( 'Manage', 'sleek-scroll-video' )
             . '</a>';
        array_unshift( $links, $manage_link );
        return $links;
    }
}
