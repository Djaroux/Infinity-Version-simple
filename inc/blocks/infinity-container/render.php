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

// Construire les classes (les styles sont dans le fichier CSS généré)
$classes = array( 'container' );

// Si une classe personnalisée est définie, l'utiliser
// Sinon, générer une classe unique basée sur les attributs
if ( ! empty( $custom_class ) ) {
    $classes[] = $custom_class;
} else {
    // Générer une classe unique basée sur un hash des attributs
    $unique_id = 'inf-' . substr( md5( serialize( $attributes ) ), 0, 8 );
    $classes[] = $unique_id;
}

$class_attr = 'class="' . implode( ' ', $classes ) . '"';

?>
<div <?php echo $class_attr; ?>>
    <?php echo $content; ?>
</div>
