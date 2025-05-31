<?php
// functions.php

// Theme setup
function islamic_news_setup() {
    // Title tag support
    add_theme_support('title-tag');

    // Featured images
    add_theme_support('post-thumbnails');

    // HTML5 markup support
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    // Responsive embeds
    add_theme_support('responsive-embeds');

    // Register primary menu
    register_nav_menus([
        'primary' => __('Primary Menu', 'islamic-news'),
    ]);

    // Register sidebar
    register_sidebar([
        'name' => __('Main Sidebar', 'islamic-news'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will appear on the main sidebar.', 'islamic-news'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('after_setup_theme', 'islamic_news_setup');

// Enqueue styles and scripts
function islamic_news_enqueue_scripts() {
    $posts = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
      ));

    wp_enqueue_style('islamic-news-style',  get_theme_file_uri('/build/index.css'), [], '1.0.0', 'all');
    wp_enqueue_script('islamic-news-script', get_theme_file_uri('/src/index.js'), [], '1.0.0', true);

    wp_localize_script('islamic-news-script', 'ourData', array(
        'root_url' => get_site_url(),
        'posts' => json_encode($posts),
      ));
}
add_action('wp_enqueue_scripts', 'islamic_news_enqueue_scripts');

function get_svg_icon($name, $id, $class = '') {
  $path = get_template_directory() . '/assets/icons/' . $name . '.svg';

  if (file_exists($path)) {
      $version = filemtime($path);
      $icon_content = file_get_contents($path);
      $icon_content .= '<!-- SVG Icon version: ' . $version . ' -->';

      // Add ID to the SVG tag
      $icon_content = preg_replace('/<svg /', '<svg id="' . esc_attr($id) . '" ', $icon_content, 1);

      // Add class to the SVG tag
      $icon_content = preg_replace('/<svg /', '<svg class="' . esc_attr($class) . '" ', $icon_content, 1);
      return $icon_content;
  } else {
      return '<!-- SVG Icon not found: ' . esc_html($name) . ' -->';
  }
}