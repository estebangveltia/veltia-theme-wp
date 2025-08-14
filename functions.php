<?php
function mi_tema_setup() {
    // Soporte para <title> dinámico
    add_theme_support('title-tag');

    // Soporte para miniaturas
    add_theme_support('post-thumbnails');

    // Menú principal
    register_nav_menus(array(
        'menu-principal' => __('Menú Principal', 'mi-tema'),
    ));

    // Logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Soporte para refresco selectivo en widgets
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'mi_tema_setup');


// ============================
// Customizer: HERO DE INICIO
// ============================
function mi_tema_customize_hero($wp_customize) {
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero de Inicio', 'mi-tema'),
        'priority' => 30,
    ));

    // Cantidad de slides
    $wp_customize->add_setting('hero_slide_count', array(
        'default' => 1,
        'transport' => 'refresh'
    ));
    $wp_customize->add_control('hero_slide_count', array(
        'label' => __('Cantidad de diapositivas', 'mi-tema'),
        'section' => 'hero_section',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 5)
    ));

    // Altura del Hero
    $wp_customize->add_setting('hero_height', array('default' => 500));
    $wp_customize->add_control('hero_height', array(
        'label' => __('Altura del Hero (px)', 'mi-tema'),
        'section' => 'hero_section',
        'type' => 'number',
    ));

    // Colores de degradado
    $wp_customize->add_setting('hero_gradient_color1', array('default' => 'rgba(0,0,0,0.5)'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_gradient_color1_control', array(
        'label'    => __('Degradado - Color superior', 'mi-tema'),
        'section'  => 'hero_section',
        'settings' => 'hero_gradient_color1',
    )));
    $wp_customize->add_setting('hero_gradient_color2', array('default' => 'rgba(0,0,0,0.3)'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_gradient_color2_control', array(
        'label'    => __('Degradado - Color central', 'mi-tema'),
        'section'  => 'hero_section',
        'settings' => 'hero_gradient_color2',
    )));
    $wp_customize->add_setting('hero_gradient_color3', array('default' => 'rgba(0,0,0,0.6)'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_gradient_color3_control', array(
        'label'    => __('Degradado - Color inferior', 'mi-tema'),
        'section'  => 'hero_section',
        'settings' => 'hero_gradient_color3',
    )));

    // Colores del botón CTA
    $wp_customize->add_setting('hero_cta_bg_color', array('default' => '#0073e6'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_cta_bg_color_control', array(
        'label'    => __('Color de fondo del botón CTA', 'mi-tema'),
        'section'  => 'hero_section',
        'settings' => 'hero_cta_bg_color',
    )));
    $wp_customize->add_setting('hero_cta_bg_hover_color', array('default' => '#005bb5'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_cta_bg_hover_color_control', array(
        'label'    => __('Color de fondo del botón CTA (hover)', 'mi-tema'),
        'section'  => 'hero_section',
        'settings' => 'hero_cta_bg_hover_color',
    )));

    // Slides dinámicos
    $slide_count = get_theme_mod('hero_slide_count', 1);
    for ($i = 1; $i <= $slide_count; $i++) {
        // Imagen
        $wp_customize->add_setting("hero_image_$i");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_image_{$i}_control", array(
            'label' => __("Imagen Slide $i", 'mi-tema'),
            'section' => 'hero_section',
            'settings' => "hero_image_$i"
        )));

        // Título
        $wp_customize->add_setting("hero_title_$i", array('default' => "Título Slide $i"));
        $wp_customize->add_control("hero_title_$i", array(
            'label' => __("Título Slide $i", 'mi-tema'),
            'section' => 'hero_section',
            'type' => 'text',
        ));

        // Subtítulo
        $wp_customize->add_setting("hero_subtitle_$i", array('default' => "Subtítulo Slide $i"));
        $wp_customize->add_control("hero_subtitle_$i", array(
            'label' => __("Subtítulo Slide $i", 'mi-tema'),
            'section' => 'hero_section',
            'type' => 'text',
        ));

        // Botón CTA - Texto
        $wp_customize->add_setting("hero_cta_text_$i", array('default' => "Contáctanos"));
        $wp_customize->add_control("hero_cta_text_$i", array(
            'label' => __("Texto CTA Slide $i", 'mi-tema'),
            'section' => 'hero_section',
            'type' => 'text',
        ));

        // Botón CTA - URL
        $wp_customize->add_setting("hero_cta_url_$i", array('default' => "#"));
        $wp_customize->add_control("hero_cta_url_$i", array(
            'label' => __("Enlace CTA Slide $i", 'mi-tema'),
            'section' => 'hero_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'mi_tema_customize_hero');


// ============================
// CSS dinámico desde Customizer
// ============================
function mi_tema_customizer_css() {
    $hero_grad1 = get_theme_mod('hero_gradient_color1', 'rgba(0,0,0,0.5)');
    $hero_grad2 = get_theme_mod('hero_gradient_color2', 'rgba(0,0,0,0.3)');
    $hero_grad3 = get_theme_mod('hero_gradient_color3', 'rgba(0,0,0,0.6)');
    $hero_cta_bg = get_theme_mod('hero_cta_bg_color', '#0073e6');
    $hero_cta_bg_hover = get_theme_mod('hero_cta_bg_hover_color', '#005bb5');
    ?>
    <style type="text/css">
        .hero-slide::before {
            background: linear-gradient(180deg, <?php echo esc_attr($hero_grad1); ?> 0%, <?php echo esc_attr($hero_grad2); ?> 50%, <?php echo esc_attr($hero_grad3); ?> 100%);
        }
        .hero-cta {
            background: <?php echo esc_attr($hero_cta_bg); ?>;
        }
        .hero-cta:hover {
            background: <?php echo esc_attr($hero_cta_bg_hover); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'mi_tema_customizer_css');


// ============================
// Cargar estilos y scripts
// ============================
function mi_tema_estilos() {
    wp_enqueue_style('mi-tema-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('mi-tema-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap', array(), null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'mi_tema_estilos');

function mi_tema_scripts() {
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('menu-toggle', get_template_directory_uri() . '/js/menu-toggle.js', array(), null, true);
    wp_enqueue_script('hero-js', get_template_directory_uri() . '/js/hero.js', array('swiper-js'), null, true);
    wp_localize_script('hero-js', 'heroData', ['themeUrl' => get_template_directory_uri()]);
}
add_action('wp_enqueue_scripts', 'mi_tema_scripts');


/**
 * Mostrar / Ocultar título del sitio desde el Customizer
 */
function mi_tema_customize_site_title($wp_customize) {
    $wp_customize->add_setting('mostrar_titulo_sitio', array(
        'default'   => true,
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('mostrar_titulo_sitio_control', array(
        'label'    => __('Mostrar título del sitio', 'mi-tema'),
        'section'  => 'title_tagline',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'mi_tema_customize_site_title');
