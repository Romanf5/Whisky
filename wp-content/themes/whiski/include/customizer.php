<?php
/**
 * theme Theme Customizer
 *
 * @package theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


  //LOGO

  $wp_customize->add_section('header', array(
    'title' => __('Header', 'whiski'),
    'priority' => 100,
  ));

  $wp_customize->add_setting('logo', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'logo',
      array(
        'label'      => __( 'Download Logo image', 'theme_name' ),
        'section'    => 'header',
        'settings'   => 'logo',
      )
    )
  );

  //phones

  $wp_customize->add_section('additional', array(
    'title' => __('Additional', 'whiski'),
    'priority' => 100,
  ));

  $wp_customize->add_setting('text-first-link', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'text-first-link-text',
    array(
      'label' => __('Link text 1', 'whiski'),
      'section' => 'additional',
      'settings' => 'text-first-link',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting('first-link', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'first-link-url',
    array(
      'label' => __('Link 1', 'whiski'),
      'section' => 'additional',
      'settings' => 'first-link',
      'type' => 'text',
    )
  );

  /**/
  $wp_customize->add_setting('text-second-link', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'text-second-link-text',
    array(
      'label' => __('Link text 2', 'whiski'),
      'section' => 'additional',
      'settings' => 'text-second-link',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting('second-link', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'second-link-url',
    array(
      'label' => __('Link 2', 'whiski'),
      'section' => 'additional',
      'settings' => 'second-link',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting('phone', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'phone',
    array(
      'label' => __('Phone', 'mytheme'),
      'section' => 'additional',
      'settings' => 'phone',
      'type' => 'text',
    )
  );

  $wp_customize->add_section('social', array(
    'title' => __('Social links', 'whiski'),
    'priority' => 100,
  ));

  $wp_customize->add_setting('fb', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'fb_link',
    array(
      'label' => __('Facebook', 'whiski'),
      'section' => 'social',
      'settings' => 'fb',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting('tw', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'tw_link',
    array(
      'label' => __('Twitter', 'whiski'),
      'section' => 'social',
      'settings' => 'tw',
      'type' => 'text',
    )
  );

  $wp_customize->add_setting('insta', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'insta_link',
    array(
      'label' => __('Instagram', 'whiski'),
      'section' => 'social',
      'settings' => 'insta',
      'type' => 'text',
    )
  );

  $wp_customize->add_section('archive', array(
    'title' => __('Archive page', 'whiski'),
    'priority' => 100,
  ));

  $wp_customize->add_setting('bg-banner', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
    'bg-banner',
    array(
      'label' => __('Archive banner', 'whiski'),
      'section' => 'archive',
      'settings' => 'bg-banner',
    ))
  );

  $wp_customize->add_setting('event-text', array(
    'default' => '',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control(
    'event',
    array(
      'label' => __('Events text', 'whiski'),
      'section' => 'archive',
      'settings' => 'event-text',
      'type' => 'textarea',
    )
  );

}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function theme_customize_preview_js() {
	wp_enqueue_script( 'theme_customizer', get_template_directory_uri() . '/assets/scripts/customizer.js', array( 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', 'theme_customize_preview_js' );
