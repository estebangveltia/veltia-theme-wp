<?php
/**
 * Footer del tema Veltia
 */
?>
<footer class="site-footer">
    <div class="footer-container">

        <!-- Columna Logo y descripción -->
        <div class="footer-col footer-logo-desc">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h2 class="site-title">' . get_bloginfo('name') . '</h2>';
            }
            ?>
            <?php if (get_theme_mod('footer_description')) : ?>
                <p><?php echo esc_html(get_theme_mod('footer_description')); ?></p>
            <?php endif; ?>

            <!-- Redes sociales -->
            <div class="footer-socials">
                <?php if ($url = get_theme_mod('footer_social_instagram')) : ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if ($url = get_theme_mod('footer_social_linkedin')) : ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                <?php endif; ?>
                <?php if ($url = get_theme_mod('footer_social_facebook')) : ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <?php endif; ?>
                <?php if ($url = get_theme_mod('footer_social_youtube')) : ?>
                    <a href="<?php echo esc_url($url); ?>" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Columnas de widgets -->
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-1')) : dynamic_sidebar('footer-1'); endif; ?>
        </div>
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-2')) : dynamic_sidebar('footer-2'); endif; ?>
        </div>
        <div class="footer-col">
            <?php if (is_active_sidebar('footer-3')) : dynamic_sidebar('footer-3'); endif; ?>
        </div>
    </div>

    <!-- Barra inferior -->
    <div class="footer-bottom">
        <p>
            <?php echo esc_html(get_theme_mod('footer_copy_text', 'Todos los derechos reservados')); ?>
            <?php if ($privacy = get_theme_mod('footer_privacy_url')) : ?>
                · <a href="<?php echo esc_url($privacy); ?>"><?php _e('Política de privacidad', 'veltia-base'); ?></a>
            <?php endif; ?>
            <?php if ($cookies = get_theme_mod('footer_cookies_url')) : ?>
                · <a href="<?php echo esc_url($cookies); ?>"><?php _e('Configuración cookies', 'veltia-base'); ?></a>
            <?php endif; ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
