<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php
            if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } elseif (get_theme_mod('display_site_title', true)) {
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title"><?php bloginfo('name'); ?></a>
                <?php
            }
            ?>
        </div>

        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776;</button>

        <?php
        wp_nav_menu([
            'theme_location' => 'menu-principal',
            'menu_id'        => 'primary-menu',
            'container'      => 'nav',
            'container_class'=> 'main-nav',
        ]);
        ?>

        <?php
        $cta_text = get_theme_mod('cta_text', '');
        $cta_link = get_theme_mod('cta_link', '#');
        if ($cta_text && $cta_link) {
            ?>
            <a class="menu-cta-button" href="<?php echo esc_url($cta_link); ?>"><?php echo esc_html($cta_text); ?></a>
            <?php
        }
        ?>
    </div>
</header>
