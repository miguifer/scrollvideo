<?php
/**
 * Plugin Name: Scroll Video
 * Description: Create scroll-driven video animations using GSAP ScrollTrigger. Each video is a custom post type with its own shortcode.
 * Version:     1.0.0
 * Author:      miguifer
 * Author URI:  https://profiles.wordpress.org/miguifer/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: scrollvideo
 * Domain Path: /languages
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
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-sv-post-type.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-sv-meta-boxes.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-sv-shortcode.php';
require_once SCROLLVIDEO_PLUGIN_DIR . 'includes/class-sv-admin.php';

/* ── Boot ────────────────────────────────────────────────── */
function sv_init() {
    SV_Post_Type::register();
    SV_Meta_Boxes::register();
    SV_Shortcode::register();
    SV_Admin::register();
}
add_action( 'plugins_loaded', 'sv_init' );

/* ── Activation: flush rewrite rules ─────────────────────── */
function sv_activate() {
    SV_Post_Type::register_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'sv_activate' );

/* ── Deactivation: flush rewrite rules ───────────────────── */
function sv_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'sv_deactivate' );
