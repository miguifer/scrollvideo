<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class SV_Meta_Boxes {

    const NONCE_ACTION = 'sv_save_meta';
    const NONCE_NAME   = 'sv_meta_nonce';

    public static function register() {
        add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
        add_action( 'save_post_scrollvideo', array( __CLASS__, 'save' ), 10, 2 );
        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_admin_assets' ) );
    }

    public static function add_meta_boxes() {
        add_meta_box(
            'sv_video_settings',
            __( 'Video Settings', 'scrollvideo' ),
            array( __CLASS__, 'render_settings_box' ),
            'scrollvideo',
            'normal',
            'high'
        );

        add_meta_box(
            'sv_shortcode_box',
            __( 'Shortcode', 'scrollvideo' ),
            array( __CLASS__, 'render_shortcode_box' ),
            'scrollvideo',
            'side',
            'high'
        );
    }

    public static function render_settings_box( $post ) {
        wp_nonce_field( self::NONCE_ACTION, self::NONCE_NAME );

        $video_url    = get_post_meta( $post->ID, '_sv_video_url', true );
        $scroll_height = get_post_meta( $post->ID, '_sv_scroll_height', true );
        $scrub_speed  = get_post_meta( $post->ID, '_sv_scrub_speed', true );
        $pin_video    = get_post_meta( $post->ID, '_sv_pin_video', true );
        $start_point  = get_post_meta( $post->ID, '_sv_start_point', true );
        $end_point    = get_post_meta( $post->ID, '_sv_end_point', true );

        // Defaults.
        if ( '' === $scroll_height ) $scroll_height = 300;
        if ( '' === $scrub_speed )   $scrub_speed   = 0.3;
        if ( '' === $pin_video )     $pin_video     = '1';
        if ( '' === $start_point )   $start_point   = 'top top';
        if ( '' === $end_point )     $end_point     = 'bottom bottom';
        ?>
        <table class="form-table sv-meta-table">
            <tr>
                <th><label for="sv_video_url"><?php esc_html_e( 'Video URL', 'scrollvideo' ); ?></label></th>
                <td>
                    <input type="url" id="sv_video_url" name="sv_video_url"
                           value="<?php echo esc_attr( $video_url ); ?>"
                           class="regular-text" placeholder="https://example.com/video.mp4" />
                    <button type="button" class="button sv-upload-btn" data-target="sv_video_url">
                        <?php esc_html_e( 'Upload / Select Video', 'scrollvideo' ); ?>
                    </button>
                    <p class="description"><?php esc_html_e( 'Enter the URL of the video or upload one from the media library.', 'scrollvideo' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="sv_scroll_height"><?php esc_html_e( 'Scroll Height (vh)', 'scrollvideo' ); ?></label></th>
                <td>
                    <input type="number" id="sv_scroll_height" name="sv_scroll_height"
                           value="<?php echo esc_attr( $scroll_height ); ?>"
                           min="100" max="2000" step="10" class="small-text" />
                    <p class="description"><?php esc_html_e( 'Height of the scroll area in viewport-height units. Larger = slower playback.', 'scrollvideo' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="sv_scrub_speed"><?php esc_html_e( 'Scrub Speed', 'scrollvideo' ); ?></label></th>
                <td>
                    <input type="number" id="sv_scrub_speed" name="sv_scrub_speed"
                           value="<?php echo esc_attr( $scrub_speed ); ?>"
                           min="0" max="5" step="0.1" class="small-text" />
                    <p class="description"><?php esc_html_e( 'Smoothness of the scrub. 0 = instant, higher = smoother.', 'scrollvideo' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="sv_pin_video"><?php esc_html_e( 'Pin Video', 'scrollvideo' ); ?></label></th>
                <td>
                    <label>
                        <input type="checkbox" id="sv_pin_video" name="sv_pin_video" value="1"
                            <?php checked( $pin_video, '1' ); ?> />
                        <?php esc_html_e( 'Pin the video to the viewport while scrolling.', 'scrollvideo' ); ?>
                    </label>
                </td>
            </tr>
            <tr>
                <th><label for="sv_start_point"><?php esc_html_e( 'ScrollTrigger Start', 'scrollvideo' ); ?></label></th>
                <td>
                    <input type="text" id="sv_start_point" name="sv_start_point"
                           value="<?php echo esc_attr( $start_point ); ?>"
                           class="regular-text" />
                    <p class="description"><?php esc_html_e( 'GSAP ScrollTrigger start value, e.g. "top top", "top center".', 'scrollvideo' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="sv_end_point"><?php esc_html_e( 'ScrollTrigger End', 'scrollvideo' ); ?></label></th>
                <td>
                    <input type="text" id="sv_end_point" name="sv_end_point"
                           value="<?php echo esc_attr( $end_point ); ?>"
                           class="regular-text" />
                    <p class="description"><?php esc_html_e( 'GSAP ScrollTrigger end value, e.g. "bottom bottom", "bottom center".', 'scrollvideo' ); ?></p>
                </td>
            </tr>
        </table>
        <?php
    }

    public static function render_shortcode_box( $post ) {
        if ( 'auto-draft' === $post->post_status ) {
            echo '<p>' . esc_html__( 'Save the post first to generate the shortcode.', 'scrollvideo' ) . '</p>';
            return;
        }

        $shortcode = '[scrollvideo id="' . $post->ID . '"]';
        ?>
        <div class="sv-shortcode-display">
            <input type="text" readonly value="<?php echo esc_attr( $shortcode ); ?>"
                   id="sv_shortcode_field" class="widefat" />
            <button type="button" class="button button-small sv-copy-shortcode" style="margin-top:8px;">
                <?php esc_html_e( 'Copy Shortcode', 'scrollvideo' ); ?>
            </button>
        </div>
        <?php
    }

    public static function save( $post_id, $post ) {
        // Verify nonce.
        if ( ! isset( $_POST[ self::NONCE_NAME ] ) ||
             ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ self::NONCE_NAME ] ) ), self::NONCE_ACTION ) ) {
            return;
        }

        // Check autosave.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        // Check permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        // Sanitize & save.
        $scroll_height_val = isset( $_POST['sv_scroll_height'] ) ? absint( wp_unslash( $_POST['sv_scroll_height'] ) ) : 300;
        $scrub_speed_val   = isset( $_POST['sv_scrub_speed'] )   ? floatval( wp_unslash( $_POST['sv_scrub_speed'] ) )   : 0.3;

        // Clamp numeric values to valid ranges.
        $scroll_height_val = max( 100, min( 2000, $scroll_height_val ) );
        $scrub_speed_val   = max( 0, min( 5, $scrub_speed_val ) );

        $fields = array(
            '_sv_video_url'     => isset( $_POST['sv_video_url'] )     ? esc_url_raw( wp_unslash( $_POST['sv_video_url'] ) )          : '',
            '_sv_scroll_height' => $scroll_height_val,
            '_sv_scrub_speed'   => $scrub_speed_val,
            '_sv_pin_video'     => isset( $_POST['sv_pin_video'] )     ? '1'                                                            : '0',
            '_sv_start_point'   => isset( $_POST['sv_start_point'] )   ? sanitize_text_field( wp_unslash( $_POST['sv_start_point'] ) ) : 'top top',
            '_sv_end_point'     => isset( $_POST['sv_end_point'] )     ? sanitize_text_field( wp_unslash( $_POST['sv_end_point'] ) )   : 'bottom bottom',
        );

        foreach ( $fields as $key => $value ) {
            update_post_meta( $post_id, $key, $value );
        }
    }

    public static function enqueue_admin_assets( $hook ) {
        $screen = get_current_screen();
        if ( ! $screen || 'scrollvideo' !== $screen->post_type ) {
            return;
        }

        wp_enqueue_media();

        wp_enqueue_style(
            'scrollvideo-admin-css',
            SCROLLVIDEO_PLUGIN_URL . 'css/scrollvideo-admin.css',
            array(),
            SCROLLVIDEO_VERSION
        );

        wp_enqueue_script(
            'scrollvideo-admin-js',
            SCROLLVIDEO_PLUGIN_URL . 'js/scrollvideo-admin.js',
            array( 'jquery' ),
            SCROLLVIDEO_VERSION,
            true
        );

        wp_localize_script( 'scrollvideo-admin-js', 'scrollvideoAdmin', array(
            'mediaTitle' => __( 'Select or Upload Video', 'scrollvideo' ),
            'copied'     => __( 'Copied!', 'scrollvideo' ),
            'copyLabel'  => __( 'Copy Shortcode', 'scrollvideo' ),
        ) );
    }
}
