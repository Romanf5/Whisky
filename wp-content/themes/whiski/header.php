<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php get_template_part('template-parts/head'); ?>
</head>

<body <?php body_class("page-body"); ?>>

<div class="main-wrp">
  <header class="page-header">

    <div class="page-container page-container--large">

      <div class="d-flex align-center page-header__d-flex desktop-header">
        <nav class="main-nav" role="navigation">
          <?php wp_nav_menu(array('theme_location' => 'header', 'menu_class' => 'nav-list main-nav__list', 'container' => false)); ?>
        </nav>

        <div class="logo">
          <a href="<?php echo get_home_url(); ?>" class="logo__wrp">
            <img src="<?php echo get_theme_mod('logo', get_template_directory_uri() . '/src/images/logo.png') ?>"
                 alt="Logo">
          </a>
        </div>

        <div class="additional">
          <div class="additional-menu">
            <ul class="additional-menu__list nav-list">
              <li><i class="fal fa-shopping-cart icon icon--menu"></i><a
                  href="<?php echo get_theme_mod('first-link') ?>"><?php echo get_theme_mod('text-first-link') ?></a>
              </li>
              <li><i class="fal fa-calendar-alt icon icon--menu"></i><a
                  href="<?php echo get_theme_mod('second-link') ?>"><?php echo get_theme_mod('text-second-link') ?></a>
              </li>
              <li><i class="fal fa-mobile icon icon--menu"></i><a
                  href="tel:<?php echo get_theme_mod('phone') ?>"><?php echo get_theme_mod('phone') ?></a></li>
            </ul>
          </div>

          <ul class="social-header">
            <li><a href="<?php echo get_theme_mod('fb') ?>"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="<?php echo get_theme_mod('tw') ?>"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php echo get_theme_mod('insta') ?>"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="mobile-header">
        <div class="d-flex align-center page-header__d-flex  page-header__mobile">

          <div class="logo">
            <a href="<?php echo get_home_url(); ?>" class="logo__wrp">
              <img src="<?php echo get_theme_mod('logo', get_template_directory_uri() . '/src/images/logo.png') ?>"
                   alt="Logo">
            </a>
          </div>

          <div class="hamburger">
            <span class="hamburger__item"></span>
            <span class="hamburger__item"></span>
            <span class="hamburger__item"></span>
          </div>
        </div>

        <div class="mobile-menu">

          <nav class="main-nav" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'header', 'menu_class' => 'nav-list main-nav__list', 'container' => false)); ?>
          </nav>

          <div class="additional">
            <div class="additional-menu">
              <ul class="additional-menu__list nav-list">
                <li><i class="fal fa-shopping-cart icon icon--menu"></i><a
                    href="<?php echo get_theme_mod('first-link') ?>"><?php echo get_theme_mod('text-first-link') ?></a>
                </li>
                <li><i class="fal fa-calendar-alt icon icon--menu"></i><a
                    href="<?php echo get_theme_mod('second-link') ?>"><?php echo get_theme_mod('text-second-link') ?></a>
                </li>
                <li><i class="fal fa-mobile icon icon--menu"></i><a
                    href="tel:<?php echo get_theme_mod('phone') ?>"><?php echo get_theme_mod('phone') ?></a></li>
              </ul>
            </div>

            <ul class="social-header">
              <li><a href="<?php echo get_theme_mod('fb') ?>"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="<?php echo get_theme_mod('tw') ?>"><i class="fab fa-twitter"></i></a></li>
              <li><a href="<?php echo get_theme_mod('insta') ?>"><i class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>

      </div>


    </div>

  </header>
