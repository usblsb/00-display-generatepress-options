<?php
/**
 * Plugin Name: 00 Display GeneratePress Options
 * Plugin URI: https://webyblog.es/
 * Description: Muestra las opciones "generate_settings" del theme GeneratePress de manera estilizada utilizando el shortcode [gp-options].
 * Version: 1.0.0
 * Author: Juan Luis Martel
 * Author URI: https://webyblog.es/
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente
}

/**
 * Función para mostrar las opciones del tema GeneratePress.
 */
function jlmr_display_gp_options() {
    $output = '';
    $options = get_option( 'generate_settings' ); // Obtener las opciones de GeneratePress

    if ( ! empty( $options ) ) {
        $output .= '<div class="jlmr-gp-options">';
        foreach ( $options as $key => $value ) {
            $output .= sprintf( '<p><strong>%s:</strong> %s</p>', esc_html( $key ), esc_html( $value ) );
        }
        $output .= '</div>';
    } else {
        $output .= '<p>No se encontraron opciones de GeneratePress.</p>';
    }

    return $output;
}

/**
 * Registrar el shortcode en WordPress.
 */
function jlmr_register_shortcodes() {
    add_shortcode( 'gp-options', 'jlmr_display_gp_options' );
}

add_action( 'init', 'jlmr_register_shortcodes' );
