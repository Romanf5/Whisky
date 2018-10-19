<?php
/**
 * Create custom post types and custom taxonomy .
 */
add_action('init', 'create_posttype');

function create_posttype()
{

  register_post_type('events',
    array(
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
      'labels' => array(
        'name' => __('Events'),
        'singular_name' => __('Event')
      ),
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-calendar-alt',
      'has_archive'=>true,
      'rewrite' => array('slug' => 'the-latest/events'),
    )
  );

  register_post_type('Blog',
    array(
      'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
      'labels' => array(
        'name' => __('Blog'),
        'singular_name' => __('Post')
      ),
      'public' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-format-aside',
      'has_archive'=>true,
      'rewrite' => array('slug' => 'the-latest/blog'),
    )
  );
}

add_action('init', 'create_taxonomy');

function create_taxonomy()
{
  register_taxonomy('event-cat', array('events'), array(
    'labels' => array(
      'name' => 'Event category',
      'singular_name' => 'Event category',
    ),
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'events/event-cat'),
  ));

  register_taxonomy('blog-cat', array('blog'), array(
    'labels' => array(
      'name' => 'Blog category',
      'singular_name' => 'Blog category',
    ),
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'blog/blog-cat'),
  ));
}
