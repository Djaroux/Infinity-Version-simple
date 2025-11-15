<?php
/**
 * Template Name: Blank Canvas (No Header/Footer)
 * Template Post Type: page
 *
 * Completely blank template for page builders like Elementor, Gutenberg, etc.
 * No header, no footer, just the content.
 *
 * @package Infinity_2025_Simple
 * @since 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'blank-canvas' ); ?>>
<?php wp_body_open(); ?>

<?php
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
?>

<?php wp_footer(); ?>
</body>
</html>
