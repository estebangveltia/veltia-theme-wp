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
        
        <!-- Logo o título -->
        <div class="header-left">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
        if ( get_theme_mod('mostrar_titulo_sitio', true) ) {
            echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">' . get_bloginfo('name') . '</a>';
        }
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
