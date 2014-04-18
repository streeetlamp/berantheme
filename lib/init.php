<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  // set_post_thumbnail_size(150, 150, false);
  // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)

  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

  /* TinyMCE additional buttons -source: http://alisothegeek.com/2011/05/tinymce-styles-dropdown-wordpress-visual-editor/ */
  add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

  function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
  }

  add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

  function my_mce_before_init( $settings ) {

    $style_formats = array(
      array(
        'title' => 'Navy Text',
        'classes' => 'navy-text', // add this class to it
        'block' => 'div',
        'wrapper' => true,
      ),
      array(
        'title' => 'Gray Italic Subhead',
        'classes' => 'gray-em', // add this class to it
        'block' => 'div',
        'wrapper' => true,
      ),
      array(
        'title' => 'Gray Script',
        'classes' => 'gray-scripty', // add this class to it
        'block' => 'div',
        'wrapper' => true,
      ),
      array(
        'title' => 'Red Button',
        'selector' => 'a',
        'classes' => 'red-button',
      )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

  }
  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');
