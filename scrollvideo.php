<?php
/**
 * Plugin Name: Sleek Scroll Video
 * Description: Create scroll-driven video animations with your own JavaScript and CSS. Each video is a custom post type with its own shortcode.
 * Version:     1.0.0
 * Author:      miguifer
 * Author URI:  https://profiles.wordpress.org/miguifer/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sleek-scroll-video
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SCROLLVIDEO_VERSION', '1.0.0' );
define( 'SCROLLVIDEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SCROLLVIDEO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SCROLLVIDEO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/* ── Include classes ─────────────────────────────────────── */
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-scrollvideo-post-type.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-scrollvideo-meta-boxes.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-scrollvideo-shortcode.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-scrollvideo-admin.php';

/* ── Boot ────────────────────────────────────────────────── */
function scrollvideo_init() {
    Scrollvideo_Post_Type::register();
    Scrollvideo_Meta_Boxes::register();
    Scrollvideo_Shortcode::register();
    Scrollvideo_Admin::register();
}
add_action( 'plugins_loaded', 'scrollvideo_init' );

/* ── Activation: flush rewrite rules ─────────────────────── */
function scrollvideo_activate() {
    Scrollvideo_Post_Type::register_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'scrollvideo_activate' );

/* ── Deactivation: flush rewrite rules ───────────────────── */
function scrollvideo_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'scrollvideo_deactivate' );
