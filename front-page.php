<?php
/**
 * Template Name: Página de Inicio
 */
get_header();
?>

<!-- Hero Slider -->
<div class="swiper hero-slider" style="height: <?php echo esc_attr(get_theme_mod('hero_height', 500)); ?>px;">
    <div class="swiper-wrapper">
        <?php
        $slide_count = get_theme_mod('hero_slide_count', 1);
        if ($slide_count < 1) { $slide_count = 1; }

        for ($i = 1; $i <= $slide_count; $i++):
            $img = get_theme_mod("hero_image_$i");
            $title = get_theme_mod("hero_title_$i");
            $subtitle = get_theme_mod("hero_subtitle_$i");
            $cta_text = get_theme_mod("hero_cta_text_$i");
            $cta_url = get_theme_mod("hero_cta_url_$i");

            if (!$img) {
                $img = get_template_directory_uri() . '/assets/images/hero-default.jpg';
            }
            if (!$title) {
                $title = __('Bienvenido a Veltia', 'veltia-base');
            }
            if (!$subtitle) {
                $subtitle = __('Creamos soluciones digitales innovadoras.', 'veltia-base');
            }
            if (!$cta_text) {
                $cta_text = __('Contáctanos', 'veltia-base');
            }
            if (!$cta_url) {
                $cta_url = home_url('/contacto');
            }
        ?>
        <div class="swiper-slide hero-slide" style="background-image:url('<?php echo esc_url($img); ?>');">
            <div class="hero-content">
                <?php if ( has_custom_logo() ) :
                    $logo_id  = get_theme_mod( 'custom_logo' );
                    $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
                ?>
                    <img class="slider-logo" src="<?php echo esc_url( $logo_url ); ?>" style="max-height:<?php echo esc_attr( get_theme_mod( 'logo_max_height_slider', 120 ) ); ?>px; max-width:<?php echo esc_attr( get_theme_mod( 'logo_max_width_slider', 300 ) ); ?>px;" alt="<?php esc_attr_e( 'Site logo', 'veltia-base' ); ?>">
                <?php endif; ?>
                <?php if ($title): ?><h1><?php echo esc_html($title); ?></h1><?php endif; ?>
                <?php if ($subtitle): ?><p><?php echo esc_html($subtitle); ?></p><?php endif; ?>
                <?php if ($cta_text && $cta_url): ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="hero-cta"><?php echo esc_html($cta_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<?php
// Include partners carousel section
get_template_part( 'template-parts/partners' );
?>

<div class="homepage-content">
    <?php
    while (have_posts()) : the_post();
        the_content();
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
