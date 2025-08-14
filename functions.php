<?php
function veltia_theme_scripts() {
    wp_enqueue_style('veltia-style', get_stylesheet_uri(), [], '1.0');
}
add_action('wp_enqueue_scripts', 'veltia_theme_scripts');

function veltia_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'veltia_theme_setup');
