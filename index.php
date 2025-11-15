<?php
/**
 * The main template file (Blank - no titles, no meta)
 *
 * @package Infinity_2025_Simple
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blank-post' ); ?>>
            <?php the_content(); ?>
        </article>

    <?php endwhile; ?>

</main>

<?php
get_footer();
