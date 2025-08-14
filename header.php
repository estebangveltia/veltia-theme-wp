<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        
        <!-- Logo (título y descripción ocultos) -->
        <div class="header-left">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                // No se muestra el título del sitio ni la descripción corta.
                // echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
                // echo '<p class="site-description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
            }
            ?>
        </div>

        <!-- Botón toggle menú -->
        <button class="menu-toggle"><span class="hamburger"></span></button>

        <!-- Menú principal + Botón CTA -->
        <nav class="main-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principal',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => false
            ));
            ?>

            <!-- Botón CTA -->
            <?php if ( get_theme_mod('menu_cta_text') && get_theme_mod('menu_cta_url') ) : ?>
                <a href="<?php echo esc_url(get_theme_mod('menu_cta_url')); ?>" class="menu-cta-button">
                    <?php echo esc_html(get_theme_mod('menu_cta_text')); ?>
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>
