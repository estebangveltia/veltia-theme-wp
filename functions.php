<?php
function veltia_theme_scripts() {
    wp_enqueue_style('veltia-style', get_stylesheet_uri(), [], '1.0');
    wp_enqueue_script('veltia-menu', get_template_directory_uri() . '/js/menu-toggle.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'veltia_theme_scripts');

function veltia_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'menu-principal' => __('Menú Principal', 'veltia'),
    ]);
}
add_action('after_setup_theme', 'veltia_theme_setup');

function veltia_theme_customize_register($wp_customize) {
    $wp_customize->add_section('veltia_header', [
        'title'    => __('Header', 'veltia'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('cta_text', [
        'default'           => __('Contáctanos', 'veltia'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_text', [
        'label'   => __('Texto del botón CTA', 'veltia'),
        'section' => 'veltia_header',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('cta_link', [
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_link', [
        'label'   => __('Enlace del botón CTA', 'veltia'),
        'section' => 'veltia_header',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('display_site_title', [
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ]);
    $wp_customize->add_control('display_site_title', [
        'label'   => __('Mostrar título del sitio si no hay logo', 'veltia'),
        'section' => 'title_tagline',
        'type'    => 'checkbox',
    ]);
}
add_action('customize_register', 'veltia_theme_customize_register');
