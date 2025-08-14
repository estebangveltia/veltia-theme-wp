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
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => false
            ));
            ?>

            <!-- Botón CTA -->
            <?php if ( get_theme_mod( 'cta_enable' ) && get_theme_mod( 'cta_text' ) && get_theme_mod( 'cta_url' ) ) : ?>
                <?php
                $cta_classes = array( 'btn-cta' );
                $cta_variant = get_theme_mod( 'cta_style_variant', 'filled' );
                $cta_classes[] = 'is-' . $cta_variant;
                $cta_classes[] = 'is-' . get_theme_mod( 'cta_shape', 'pill' );
                $cta_classes[] = 'is-' . get_theme_mod( 'cta_size', 'md' );
                $cta_classes = array_map( 'sanitize_html_class', $cta_classes );
                $cta_class_attr = implode( ' ', $cta_classes );

                $cta_style = '';
                $cta_bg = sanitize_hex_color( get_theme_mod( 'cta_color_bg' ) );
                $cta_text_color = sanitize_hex_color( get_theme_mod( 'cta_color_text' ) );

                switch ( $cta_variant ) {
                    case 'outline':
                        if ( $cta_bg ) {
                            $cta_style .= 'border-color:' . esc_attr( $cta_bg ) . ';';
                        }
                        if ( $cta_text_color ) {
                            $cta_style .= 'color:' . esc_attr( $cta_text_color ) . ';';
                        }
                        $cta_style .= 'background-color:transparent;';
                        break;
                    case 'ghost':
                        if ( $cta_text_color ) {
                            $cta_style .= 'color:' . esc_attr( $cta_text_color ) . ';';
                        }
                        break;
                    case 'filled':
                    default:
                        if ( $cta_bg ) {
                            $cta_style .= 'background-color:' . esc_attr( $cta_bg ) . ';border-color:' . esc_attr( $cta_bg ) . ';';
                        }
                        if ( $cta_text_color ) {
                            $cta_style .= 'color:' . esc_attr( $cta_text_color ) . ';';
                        }
                        break;
                }

                $cta_style_attr = $cta_style ? ' style="' . esc_attr( $cta_style ) . '"' : '';

                $cta_target = get_theme_mod( 'cta_target', '_self' );
                $cta_target_attr = '_blank' === $cta_target ? ' target="_blank" rel="noopener"' : '';
                ?>
                <a href="<?php echo esc_url( get_theme_mod( 'cta_url' ) ); ?>" class="<?php echo esc_attr( $cta_class_attr ); ?>"<?php echo $cta_target_attr; ?><?php echo $cta_style_attr; ?> aria-label="<?php echo esc_attr( get_theme_mod( 'cta_text' ) ); ?>">
                    <?php echo esc_html( get_theme_mod( 'cta_text' ) ); ?>
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>
