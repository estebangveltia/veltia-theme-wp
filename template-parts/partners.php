<?php
/**
 * Partners carousel section
 *
 * @package veltia-base
 */

// Array of partners: name and logo file located in /assets/img/partners/
$partners = array(
    array(
        'name' => 'Partner 1',
        'file' => 'partner1.png',
    ),
    array(
        'name' => 'Partner 2',
        'file' => 'partner2.png',
    ),
    array(
        'name' => 'Partner 3',
        'file' => 'partner3.png',
    ),
);
?>

<section class="partners-section">
    <h2 class="partners-title"><?php esc_html_e( 'Nuestros partners', 'veltia-base' ); ?></h2>

    <div class="swiper partners-swiper">
        <div class="swiper-wrapper">
            <?php foreach ( $partners as $partner ) :
                $logo = get_template_directory_uri() . '/assets/img/partners/' . $partner['file'];
            ?>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>" />
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Navigation arrows -->
        <div class="partners-prev"></div>
        <div class="partners-next"></div>
    </div>
</section>
