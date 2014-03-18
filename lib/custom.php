<?php
/**
 * Custom functions
 */
/************* BERAN LOGO AND TAGLINE UPLOAD *****************/

function beran_logo_upload( $wp_customize ) {
    $wp_customize->add_section( 'beran_logo_section' , array(
    'title'       => __( 'Logo Image', 'beran_logo_upload' ),
    'priority'    => 30,
    'description' => 'Upload a logo',
    ) );

    $wp_customize->add_setting( 'beran_logo_upload' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'beran_logo_upload', array(
    'label'    => __( 'Logo Image', 'beran_logo_upload' ),
    'section'  => 'beran_logo_section',
    'settings' => 'beran_logo_upload',
    ) ) );
}
add_action('customize_register', 'beran_logo_upload');

function beran_tagline_upload( $wp_customize ) {
    $wp_customize->add_section( 'beran_tagline_section' , array(
    'title'       => __( 'Tagline Image', 'beran_tagline_upload' ),
    'priority'    => 35,
    'description' => 'Upload a tagline image',
    ) );

    $wp_customize->add_setting( 'beran_tagline_upload' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'beran_tagline_upload', array(
    'label'    => __( 'Tagline Image', 'beran_tagline_upload' ),
    'section'  => 'beran_tagline_section',
    'settings' => 'beran_tagline_upload',
    ) ) );
}
add_action('customize_register', 'beran_tagline_upload');