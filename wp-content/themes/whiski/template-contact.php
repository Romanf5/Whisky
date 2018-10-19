<?php
/*
 * Template Name: Contact Us Template
 */
?>

<?php get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>

<?php while (have_posts()) : the_post(); ?>

  <section class="contact-page">
    <div class="decor-line decor-line--top decor-line--no-bottom">
      <div class="page-container">

        <div class="contact-page__intro">
          <h1 class="title title--center"><?php echo get_the_title(); ?></h1>
          <div class="contact-page__description">
            <?php the_content(); ?>
          </div>
        </div>

        <div class="contact-page__inner overflow">
          <div class="row contact-page__row">

            <div class="contact-page__item">
              <div class="contact-page__form">
                <?php echo do_shortcode(CFS()->get('contact_form_shortcode')) ?>
              </div>
            </div>

            <div class="contact-page__item">

              <div class="contact-page__map">
                <?php echo do_shortcode(CFS()->get('contact_map_shortcode')) ?>
              </div>

              <div class="contact-page__info">

                <div class="title contact-page__info-title">
                  Whiski Bar & Restaurant
                </div>

                <div class="d-flex justify-space-between contact-page__info-row">
                  <div class="contact-page__info-address">
                    <?php echo CFS()->get('address')?>
                  </div>
                  <ul class="contact-page__contacts">
                    <li><a href="tel:<?php echo get_theme_mod('phone')?>"><i class="icon fal fa-phone"></i><?php echo get_theme_mod('phone')?></a></li>
                    <li><a href="mailto:<?php echo CFS()->get('email')?>"><i class="icon fa-envelope"></i><?php echo CFS()->get('email')?></a></li>
                  </ul>
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>
