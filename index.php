<?php get_header(); ?>

<main>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title('<h2>', '</h2>');
            the_content();
        endwhile;
    else :
        echo '<p>No hay contenido disponible.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
