<?php
/**
 * Plugin Name: scrollvideo
 * Version: 1.0
 * Description: scrollvideo
 * Author: miguifer
 */

if (!defined('ABSPATH')) exit;

function sv_enqueue_scripts() {

    wp_enqueue_script(
        'scrollvideo-js',
        plugin_dir_url(__FILE__) . 'assets/js/scrollvideo.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_style(
        'scrollvideo-css',
        plugin_dir_url(__FILE__) . 'assets/css/scrollvideo.css'
    );
}

add_action('wp_enqueue_scripts', 'sv_enqueue_scripts');
