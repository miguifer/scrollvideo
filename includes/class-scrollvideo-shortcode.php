<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Scrollvideo_Shortcode {

    public static function register() {
        add_shortcode( 'sleek-scroll-video', array( __CLASS__, 'render' ) );
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'register_assets' ) );
        // Register the shortcode with a translatable name
        add_shortcode( __( 'sleek-scroll-video', 'scrollvideo' ), array( __CLASS__, 'render' ) );
    }

    /**
     * Register (but don't enqueue) front-end assets.
     * They will be enqueued only when the shortcode is actually used.
     */
    public static function register_assets() {
        wp_register_script(
            'sleek-scroll-video-front',
            SCROLLVIDEO_PLUGIN_URL . 'js/scrollvideo-front.js',
            array(),
            SCROLLVIDEO_VERSION,
            true
        );
        wp_register_style(
            'sleek-scroll-video-front-css',
            SCROLLVIDEO_PLUGIN_URL . 'css/scrollvideo.css',
            array(),
            SCROLLVIDEO_VERSION
        );
    }

    /**
    * Shortcode: [sleek-scroll-video id="123"]
     */
    public static function render( $atts ) {
        $atts = shortcode_atts( array(
            'id' => 0,
        ), $atts, 'sleek-scroll-video' );

        $post_id = absint( $atts['id'] );
        if ( ! $post_id ) {
            return '';
        }
        $post = get_post( $post_id );
        if ( ! $post || 'scrollvideo' !== $post->post_type || 'publish' !== $post->post_status ) {
            return '';
        }
        $video_url     = get_post_meta( $post_id, '_sv_video_url', true );
        $scroll_height = get_post_meta( $post_id, '_sv_scroll_height', true );
        $scrub_speed   = get_post_meta( $post_id, '_sv_scrub_speed', true );
        $pin_video     = get_post_meta( $post_id, '_sv_pin_video', true );
        $start_point   = get_post_meta( $post_id, '_sv_start_point', true );
        $end_point     = get_post_meta( $post_id, '_sv_end_point', true );
        if ( empty( $video_url ) ) {
            return '';
        }
        // Defaults.
        $scroll_height = $scroll_height ? absint( $scroll_height ) : 300;
        $scrub_speed   = '' !== $scrub_speed ? floatval( $scrub_speed ) : 0.3;
        $pin_video     = '1' === $pin_video ? true : false;
        $start_point   = $start_point ? $start_point : 'top top';
        $end_point     = $end_point ? $end_point : 'bottom bottom';
        // Enqueue assets only when shortcode is used.
        wp_enqueue_script( 'sleek-scroll-video-front' );
        wp_enqueue_style( 'sleek-scroll-video-front-css' );
        // Only local script is enqueued
        $wrapper_id = 'sv-' . $post_id;
        ob_start();
        ?>
        <div class="sv-wrapper"
             id="<?php echo esc_attr( $wrapper_id ); ?>"
             data-sv-height="<?php echo esc_attr( $scroll_height ); ?>"
             data-sv-scrub="<?php echo esc_attr( $scrub_speed ); ?>"
             data-sv-pin="<?php echo esc_attr( $pin_video ? '1' : '0' ); ?>"
             data-sv-start="<?php echo esc_attr( $start_point ); ?>"
             data-sv-end="<?php echo esc_attr( $end_point ); ?>"
             style="height:<?php echo esc_attr( $scroll_height ); ?>vh;">
            <video src="<?php echo esc_url( $video_url ); ?>"
                   muted playsinline preload="auto"></video>
        </div>
        <?php
        return ob_get_clean();
    }
}
