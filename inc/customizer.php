<?php
/**
 * Customizer options for header CTA and logo sizes.
 *
 * @package veltia-base
 */

/**
 * Register customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
 */
function veltia_customize_register( $wp_customize ) {
    // Header section.
    $wp_customize->add_section(
        'veltia_header_section',
        array(
            'title'    => __( 'Header', 'veltia-base' ),
            'priority' => 30,
        )
    );

    // CTA enable.
    $wp_customize->add_setting(
        'cta_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'wp_validate_boolean',
        )
    );
    $wp_customize->add_control(
        'cta_enable',
        array(
            'label'   => __( 'Enable CTA', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'checkbox',
        )
    );

    // CTA text.
    $wp_customize->add_setting(
        'cta_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'cta_text',
        array(
            'label'   => __( 'CTA Text', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'text',
        )
    );

    // CTA URL.
    $wp_customize->add_setting(
        'cta_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'cta_url',
        array(
            'label'   => __( 'CTA URL', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'url',
        )
    );

    // CTA target.
    $wp_customize->add_setting(
        'cta_target',
        array(
            'default'           => '_self',
            'sanitize_callback' => 'veltia_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'cta_target',
        array(
            'label'   => __( 'Open link in', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'select',
            'choices' => array(
                '_self'  => __( 'Same tab', 'veltia-base' ),
                '_blank' => __( 'New tab', 'veltia-base' ),
            ),
        )
    );

    // CTA style variant.
    $wp_customize->add_setting(
        'cta_style_variant',
        array(
            'default'           => 'filled',
            'sanitize_callback' => 'veltia_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'cta_style_variant',
        array(
            'label'   => __( 'Style Variant', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'select',
            'choices' => array(
                'filled'  => __( 'Filled', 'veltia-base' ),
                'outline' => __( 'Outline', 'veltia-base' ),
                'ghost'   => __( 'Ghost', 'veltia-base' ),
            ),
        )
    );

    // CTA shape.
    $wp_customize->add_setting(
        'cta_shape',
        array(
            'default'           => 'pill',
            'sanitize_callback' => 'veltia_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'cta_shape',
        array(
            'label'   => __( 'Shape', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'select',
            'choices' => array(
                'pill'    => __( 'Pill', 'veltia-base' ),
                'rounded' => __( 'Rounded', 'veltia-base' ),
                'square'  => __( 'Square', 'veltia-base' ),
            ),
        )
    );

    // CTA size.
    $wp_customize->add_setting(
        'cta_size',
        array(
            'default'           => 'md',
            'sanitize_callback' => 'veltia_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'cta_size',
        array(
            'label'   => __( 'Size', 'veltia-base' ),
            'section' => 'veltia_header_section',
            'type'    => 'select',
            'choices' => array(
                'sm' => __( 'Small', 'veltia-base' ),
                'md' => __( 'Medium', 'veltia-base' ),
                'lg' => __( 'Large', 'veltia-base' ),
            ),
        )
    );

    // CTA background color.
    $wp_customize->add_setting(
        'cta_color_bg',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cta_color_bg',
            array(
                'label'   => __( 'CTA Background', 'veltia-base' ),
                'section' => 'veltia_header_section',
            )
        )
    );

    // CTA text color.
    $wp_customize->add_setting(
        'cta_color_text',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cta_color_text',
            array(
                'label'   => __( 'CTA Text Color', 'veltia-base' ),
                'section' => 'veltia_header_section',
            )
        )
    );

    // Logo section.
    $wp_customize->add_section(
        'veltia_logo_section',
        array(
            'title'    => __( 'Logo', 'veltia-base' ),
            'priority' => 31,
        )
    );

    $wp_customize->add_setting(
        'logo_max_height_header_desktop',
        array(
            'default'           => 56,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logo_max_height_header_desktop',
        array(
            'label'   => __( 'Header Logo Max Height (Desktop, px)', 'veltia-base' ),
            'section' => 'veltia_logo_section',
            'type'    => 'number',
        )
    );

    $wp_customize->add_setting(
        'logo_max_height_header_mobile',
        array(
            'default'           => 40,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logo_max_height_header_mobile',
        array(
            'label'   => __( 'Header Logo Max Height (Mobile, px)', 'veltia-base' ),
            'section' => 'veltia_logo_section',
            'type'    => 'number',
        )
    );

    $wp_customize->add_setting(
        'logo_max_width_header',
        array(
            'default'           => 200,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logo_max_width_header',
        array(
            'label'   => __( 'Header Logo Max Width (px)', 'veltia-base' ),
            'section' => 'veltia_logo_section',
            'type'    => 'number',
        )
    );

    $wp_customize->add_setting(
        'logo_max_height_slider',
        array(
            'default'           => 120,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logo_max_height_slider',
        array(
            'label'   => __( 'Slider Logo Max Height (px)', 'veltia-base' ),
            'section' => 'veltia_logo_section',
            'type'    => 'number',
        )
    );

    $wp_customize->add_setting(
        'logo_max_width_slider',
        array(
            'default'           => 300,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'logo_max_width_slider',
        array(
            'label'   => __( 'Slider Logo Max Width (px)', 'veltia-base' ),
            'section' => 'veltia_logo_section',
            'type'    => 'number',
        )
    );
}

/**
 * Sanitize select fields.
 *
 * @param string               $input   Selected option.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string               Sanitized value.
 */
function veltia_sanitize_select( $input, $setting ) {
    $input   = sanitize_text_field( $input );
    $choices = array_keys( $setting->manager->get_control( $setting->id )->choices );
    return in_array( $input, $choices, true ) ? $input : $setting->default;
}

add_action( 'customize_register', 'veltia_customize_register' );

/*
 * Example of using logo sizes in a slider template:
 *
 * <img class="slider-logo" src="<?php echo esc_url( $logo_url ); ?>" style="max-height:<?php echo esc_attr( get_theme_mod( 'logo_max_height_slider', 120 ) ); ?>px; max-width:<?php echo esc_attr( get_theme_mod( 'logo_max_width_slider', 300 ) ); ?>px;" alt="<?php esc_attr_e( 'Site logo', 'veltia-base' ); ?>">
 */
