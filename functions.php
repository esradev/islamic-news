<?php
require get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'http://wpstorm.ir/update-server/?action=get_metadata&slug=islamic-news',
    __FILE__, //Full path to the main plugin file or functions.php.
    'islamic-news',
);

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

    $theme = wp_get_theme();
    $version = $theme->get('Version');
    wp_enqueue_style('islamic-news-style', get_theme_file_uri('/build/index.css'), [], $version, 'all');
    wp_enqueue_script('islamic-news-script', get_theme_file_uri('/src/index.js'), [], $version, true);

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

// hide admin bar for non-admin users
function hide_admin_bar_for_non_admins() {
    if (!current_user_can('administrator')) {
        show_admin_bar(false);
    }
}

// Add default image for posts without featured image
function set_default_post_thumbnail($post_id) {
    if (has_post_thumbnail($post_id)) {
        return;
    }

    $default_image = get_theme_file_uri('/assets/images/post-image-callback.jpg'); // Path to your default image
    set_post_thumbnail($post_id, $default_image);
}

// Helper: Get translated "Read More" and "Read Article" button text
function islamic_news_read_more_text() {
    $locale = get_locale();
    switch ($locale) {
        case 'ar':
            return 'اقرأ المزيد';
        case 'fa_IR':
            return 'بیشتر بخوانید';
        // Add more languages as needed
        default:
            return 'Read More';
    }
}
function islamic_news_read_article_text() {
    $locale = get_locale();
    switch ($locale) {
        case 'ar':
            return 'اقرأ المقال';
        case 'fa_IR':
            return 'مطالعه مقاله';
        // Add more languages as needed
        default:
            return 'Read Article';
    }
}

// Helper: Translate static words based on language
function islamic_news_translate($key) {
    $locale = get_locale();
    $translations = [
        'All Posts' => [
            'ar' => 'جميع المقالات',
            'fa_IR' => 'همه پست‌ها',
        ],
        'Featured' => [
            'ar' => 'مميز',
            'fa_IR' => 'ویژه',
        ],
        'Popular Posts' => [
            'ar' => 'المشاركات الشائعة',
            'fa_IR' => 'پست‌های محبوب',
        ],
        'Categories' => [
            'ar' => 'التصنيفات',
            'fa_IR' => 'دسته‌بندی‌ها',
        ],
        'No posts found.' => [
            'ar' => 'لم يتم العثور على مقالات.',
            'fa_IR' => 'هیچ پستی یافت نشد.',
        ],
        // Add more static words and languages as needed
    ];
    if (isset($translations[$key][$locale])) {
        return $translations[$key][$locale];
    }
    return $key;
}
