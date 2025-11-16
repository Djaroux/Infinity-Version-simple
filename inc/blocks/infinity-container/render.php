<?php
/**
 * Infinity Container Block Render Template
 *
 * @package Infinity_2025_Simple
 *
 * @var array $attributes Block attributes
 * @var string $content Block content
 * @var WP_Block $block Block instance
 */

// Récupérer les attributs
$custom_class           = isset( $attributes['customClass'] ) ? esc_attr( $attributes['customClass'] ) : '';
$width                  = isset( $attributes['width'] ) ? esc_attr( $attributes['width'] ) : '';
$height                 = isset( $attributes['height'] ) ? esc_attr( $attributes['height'] ) : '';
$display                = isset( $attributes['display'] ) ? esc_attr( $attributes['display'] ) : '';
$flex_direction         = isset( $attributes['flexDirection'] ) ? esc_attr( $attributes['flexDirection'] ) : '';
$justify_content        = isset( $attributes['justifyContent'] ) ? esc_attr( $attributes['justifyContent'] ) : '';
$align_items            = isset( $attributes['alignItems'] ) ? esc_attr( $attributes['alignItems'] ) : '';
$gap                    = isset( $attributes['gap'] ) ? esc_attr( $attributes['gap'] ) : '';
$grid_template_columns  = isset( $attributes['gridTemplateColumns'] ) ? esc_attr( $attributes['gridTemplateColumns'] ) : '';
$padding_top       = isset( $attributes['paddingTop'] ) ? esc_attr( $attributes['paddingTop'] ) : '';
$padding_right     = isset( $attributes['paddingRight'] ) ? esc_attr( $attributes['paddingRight'] ) : '';
$padding_bottom    = isset( $attributes['paddingBottom'] ) ? esc_attr( $attributes['paddingBottom'] ) : '';
$padding_left      = isset( $attributes['paddingLeft'] ) ? esc_attr( $attributes['paddingLeft'] ) : '';
$margin_top        = isset( $attributes['marginTop'] ) ? esc_attr( $attributes['marginTop'] ) : '';
$margin_right      = isset( $attributes['marginRight'] ) ? esc_attr( $attributes['marginRight'] ) : '';
$margin_bottom     = isset( $attributes['marginBottom'] ) ? esc_attr( $attributes['marginBottom'] ) : '';
$margin_left       = isset( $attributes['marginLeft'] ) ? esc_attr( $attributes['marginLeft'] ) : '';
$background_color  = isset( $attributes['backgroundColor'] ) ? esc_attr( $attributes['backgroundColor'] ) : '';
$background_image  = isset( $attributes['backgroundImage'] ) ? esc_url( $attributes['backgroundImage'] ) : '';
$border_color      = isset( $attributes['borderColor'] ) ? esc_attr( $attributes['borderColor'] ) : '';
$border_width      = isset( $attributes['borderWidth'] ) ? esc_attr( $attributes['borderWidth'] ) : '';
$border_radius     = isset( $attributes['borderRadius'] ) ? esc_attr( $attributes['borderRadius'] ) : '';
$border_style      = isset( $attributes['borderStyle'] ) ? esc_attr( $attributes['borderStyle'] ) : 'solid';

// Construire les styles inline (Background, Dimensions, Container Layout uniquement)
$inline_styles = array();

// Dimensions
if ( ! empty( $width ) ) {
    $inline_styles[] = 'width:' . $width;
}
if ( ! empty( $height ) ) {
    $inline_styles[] = 'height:' . $height;
}

// Container Layout
if ( ! empty( $display ) ) {
    $inline_styles[] = 'display:' . $display;
}
if ( ! empty( $flex_direction ) ) {
    $inline_styles[] = 'flex-direction:' . $flex_direction;
}
if ( ! empty( $justify_content ) ) {
    $inline_styles[] = 'justify-content:' . $justify_content;
}
if ( ! empty( $align_items ) ) {
    $inline_styles[] = 'align-items:' . $align_items;
}
if ( ! empty( $gap ) ) {
    $inline_styles[] = 'gap:' . $gap;
}
if ( ! empty( $grid_template_columns ) ) {
    $inline_styles[] = 'grid-template-columns:' . $grid_template_columns;
}

// Background
if ( ! empty( $background_color ) ) {
    $inline_styles[] = 'background-color:' . $background_color;
}
if ( ! empty( $background_image ) ) {
    $inline_styles[] = 'background-image:url(' . $background_image . ')';
    $inline_styles[] = 'background-size:cover';
    $inline_styles[] = 'background-position:center';
}

// CSS Custom Properties pour padding, margin, border (géré via CSS)
if ( ! empty( $padding_top ) ) {
    $inline_styles[] = '--padding-top:' . $padding_top;
}
if ( ! empty( $padding_right ) ) {
    $inline_styles[] = '--padding-right:' . $padding_right;
}
if ( ! empty( $padding_bottom ) ) {
    $inline_styles[] = '--padding-bottom:' . $padding_bottom;
}
if ( ! empty( $padding_left ) ) {
    $inline_styles[] = '--padding-left:' . $padding_left;
}

if ( ! empty( $margin_top ) ) {
    $inline_styles[] = '--margin-top:' . $margin_top;
}
if ( ! empty( $margin_right ) ) {
    $inline_styles[] = '--margin-right:' . $margin_right;
}
if ( ! empty( $margin_bottom ) ) {
    $inline_styles[] = '--margin-bottom:' . $margin_bottom;
}
if ( ! empty( $margin_left ) ) {
    $inline_styles[] = '--margin-left:' . $margin_left;
}

if ( ! empty( $border_width ) ) {
    $inline_styles[] = '--border-width:' . $border_width;
}
if ( ! empty( $border_color ) ) {
    $inline_styles[] = '--border-color:' . $border_color;
}
if ( ! empty( $border_radius ) ) {
    $inline_styles[] = '--border-radius:' . $border_radius;
}
if ( ! empty( $border_style ) ) {
    $inline_styles[] = '--border-style:' . $border_style;
}

// Générer l'attribut style
$style_attr = ! empty( $inline_styles ) ? ' style="' . implode( ';', $inline_styles ) . '"' : '';

// Construire les classes
$classes = array( 'container' );
if ( ! empty( $custom_class ) ) {
    $classes[] = $custom_class;
}
$class_attr = 'class="' . implode( ' ', $classes ) . '"';

?>
<div <?php echo $class_attr . $style_attr; ?>>
    <?php echo $content; ?>
</div>
