<?php
/**
 * Plugin Name: Scroll Video
 * Version: 1.0
 * Description: Plays a video synchronized with scroll using GSAP ScrollTrigger.
 * Author: miguifer
 */

if (!defined('ABSPATH')) exit;

function sv_enqueue_scripts() {
    wp_enqueue_script(
        'gsap-core',
        plugin_dir_url(__FILE__) . 'gsap/gsap.min.js',
        array(),
        '3.14.2',
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        plugin_dir_url(__FILE__) . 'gsap/ScrollTrigger.min.js',
        array('gsap-core'),
        '3.14.2',
        true
    );

    wp_enqueue_script(
        'sv-front',
        plugin_dir_url(__FILE__) . 'js/scrollvideo-front.js',
        array('gsap-core', 'gsap-scrolltrigger'),
        '1.0',
        true
    );

    wp_enqueue_style(
        'sv-style',
        plugin_dir_url(__FILE__) . 'css/scrollvideo.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'sv_enqueue_scripts');


/**
 * [scrollvideo src="https://example.com/video.mp4"]
 */
function sv_shortcode($atts) {
    $atts = shortcode_atts(array(
        'src' => '',
    ), $atts, 'scrollvideo');

    if (empty($atts['src'])) {
        return;
    }

    $id  = 'sv-' . wp_unique_id();
    $src = esc_url($atts['src']);

    ob_start(); ?>
    <div class="sv-wrapper" id="<?php echo esc_attr($id); ?>">
        <video src="<?php echo esc_attr($src); ?>"
               muted playsinline preload="auto"></video>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('scrollvideo', 'sv_shortcode');
