<?php
/**
 * theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme
 */

if (!function_exists('theme_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function theme_setup()
  {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'header' => esc_html__('Primary', 'theme'),
      'footer' => esc_html__('Footer', 'theme'),
      'theLatest' => esc_html__('Latest', 'theme'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'theme_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Category event sidebar', 'theme'),
    'id' => 'cat-sidebar',
    'description' => esc_html__('Add widgets here.', 'theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title hidden-content">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => esc_html__('Archive event sidebar', 'theme'),
    'id' => 'arc-sidebar',
    'description' => esc_html__('Add widgets here.', 'theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title hidden-content">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => esc_html__('Category blog sidebar', 'theme'),
    'id' => 'cat-blog-sidebar',
    'description' => esc_html__('Add widgets here.', 'theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title hidden-content">',
    'after_title' => '</h2>',
  ));

  register_sidebar(array(
    'name' => esc_html__('Archive blog sidebar', 'theme'),
    'id' => 'arc-blog-sidebar',
    'description' => esc_html__('Add widgets here.', 'theme'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title hidden-content">',
    'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_scripts()
{
  // Styles
  //wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
  wp_enqueue_style('fontawesom', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css');
  wp_enqueue_style('libs-css', get_template_directory_uri() . '/app/css/libs.min.css');
  wp_enqueue_style('theme-main-style', get_template_directory_uri() . '/app/css/main.css');
  wp_enqueue_style('theme-custom-style', get_template_directory_uri() . '/src/custom.css');

  // Scripts
  wp_enqueue_script('add-to', 'https://static.addtoany.com/menu/page.js', array('jquery'), false, true);
  wp_enqueue_script('lib-js', get_template_directory_uri() . '/app/script/libs.min.js', array('jquery'), false, true);
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/app/script/main.js', array('jquery'), false, true);



}

add_action('wp_enqueue_scripts', 'theme_scripts');

/**
 * Clear WP HEAD
 */
require get_template_directory() . '/include/clear-wp-head.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/include/customizer.php';

/**
 * Create custom post types.
 */
require get_template_directory() . '/include/custom-post-type.php';

add_image_size('gallery', 323, 242, array('left', 'top'));
add_image_size('preview-gallery', 220, 300, array('center', 'center'));


function content_excerpt($args = '')
{
  global $post;

  $default = array(
    'maxchar' => 350,
    'text' => '',

    'autop' => true,
    'save_tags' => '',
    'more_text' => '...',
  );

  if (is_array($args)) $_args = $args;
  else                  parse_str($args, $_args);

  $rg = (object)array_merge($default, $_args);
  if (!$rg->text) $rg->text = $post->post_excerpt ?: $post->post_content;
  $rg = apply_filters('kama_excerpt_args', $rg);

  $text = $rg->text;
  $text = preg_replace('~\[/?.*?\](?!\()~', '', $text);
  $text = trim($text);


  if (strpos($text, '<!--more-->')) {
    preg_match('/(.*)<!--more-->/s', $text, $mm);

    $text = trim($mm[1]);

    $text_append = ' <a href="' . get_permalink($post->ID) . '#more-' . $post->ID . '">' . $rg->more_text . '</a>';
  } else {
    $text = trim(strip_tags($text, $rg->save_tags));

    // Обрезаем
    if (mb_strlen($text) > $rg->maxchar) {
      $text = mb_substr($text, 0, $rg->maxchar);
      $text = preg_replace('~(.*)\s[^\s]*$~s', '\\1 ...', $text);
    }
  }

  if ($rg->autop) {
    $text = preg_replace(
      array("~\r~", "~\n{2,}~", "~\n~", '~</p><br ?/>~'),
      array('', '</p><p>', '<br />', '</p>'),
      $text
    );
  }

  $text = apply_filters('kama_excerpt', $text, $rg);

  if (isset($text_append)) $text .= $text_append;

  return ($rg->autop && $text) ? "<p>$text</p>" : $text;
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{

  return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

add_action('pre_get_posts', 'set_posts_per_page');
function set_posts_per_page($query)
{

  global $wp_the_query;

  if (($query === $wp_the_query) && ($query->is_archive()) && ($query->get('paged') > 0)) {
    $query->set('posts_per_page', 12);
  } elseif (($query->is_archive()) && $query->get('year') > 0) {
    $query->set('posts_per_page', 12);
  } elseif ($query->get('event-cat')!=''){
    $query->set('posts_per_page', 12);
  } elseif ($query->get('blog-cat')!='') {
    $query->set('posts_per_page', 12);
  }
  return $query;
}