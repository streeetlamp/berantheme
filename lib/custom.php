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

function beran_mobile_tagline_upload( $wp_customize ) {
    $wp_customize->add_section( 'beran_mobile_tagline_section' , array(
    'title'       => __( 'Mobile Tagline Image', 'beran_mobile_tagline_upload' ),
    'priority'    => 40,
    'description' => 'Upload a tagline image for the mobile footer',
    ) );

    $wp_customize->add_setting( 'beran_mobile_tagline_upload' );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'beran_mobile_tagline_upload', array(
    'label'    => __( 'Mobile Tagline Image', 'beran_tagline_upload' ),
    'section'  => 'beran_mobile_tagline_section',
    'settings' => 'beran_mobile_tagline_upload',
    ) ) );
}
add_action('customize_register', 'beran_mobile_tagline_upload');

add_filter( 'wp_nav_menu_items', 'social_menu', 10, 2 );
function social_menu ( $items, $args ) {
    if ($args->theme_location == 'primary_navigation') {
        $items .= '
            <li class="menu-google social-menu"><a href="https://plus.google.com/110639739214280984274/posts"><i class="fa fa-google-plus"></i></a></li>
            <li class="menu-rss social-menu"><a href="feed/"><i class="fa fa-rss"></i></a></li>
            <li class="menu-twitter social-menu"><a href="https://twitter.com/TheBeranGroup"><i class="fa fa-twitter"></i></a></li>
            <li class="menu-pinterest social-menu"><a href="http://www.pinterest.com/theberangroup/"><i class="fa fa-pinterest"></i></a></li>
            <li class="menu-facebook social-menu"><a href="https://www.facebook.com/TheBeranGroup"><i class="fa fa-facebook"></i></a></li>
        ';
    }
    return $items;
}

/************* AUTO SUB MENUS *****************/

class AutoSubmenu {

    /**
     * Constructor
     */
    function __construct() {
        add_action( 'publish_page', array( &$this, 'on_publish_page' ) );
    }

    /**
     * When publishing a new child page, add it to the appropriate custom menu.
     */
    function on_publish_page( $post_id ) {

        // Theme supports custom menus?
        if ( ! current_theme_supports( 'menus' ) ) {
            return;
        }

        // Published page has parent?
        $post = get_post( $post_id );
        if ( ! $post->post_parent ) {
            return;
        }

        // Get menus with auto_add enabled
        $auto_add = get_option( 'nav_menu_options' );
        if ( empty( $auto_add ) || ! is_array( $auto_add ) || ! isset( $auto_add['auto_add'] ) ) {
            return;
        }
        $auto_add = $auto_add['auto_add'];
        if ( empty( $auto_add ) || ! is_array( $auto_add ) ) {
            return;
        }

        // Loop through the menus to find page parent
        foreach ( $auto_add as $menu_id ) {
            $menu_parent = NULL;
            $menu_items = wp_get_nav_menu_items( $menu_id, array( 'post_status' => 'publish,draft' ) );
            if ( ! is_array( $menu_items ) ) {
                continue;
            }
            foreach ( $menu_items as $menu_item ) {
                // Item already in menu?
                if ( $menu_item->object_id == $post->ID ) {
                    continue 2;
                }
                if ( $menu_item->object_id == $post->post_parent ) {
                    $menu_parent = $menu_item;
                }
            }
            // Add new item
            if ( $menu_parent ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-object-id' => $post->ID,
                    'menu-item-object' => $post->post_type,
                    'menu-item-parent-id' => $menu_parent->ID,
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ) );
            }
        }
    }

}

$auto_submenu = new AutoSubmenu();