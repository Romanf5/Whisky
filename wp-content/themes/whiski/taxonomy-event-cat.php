<?php
global $post;
global $wp_the_query;

$args = array(
  'prev_text' => __('<i class="icon far fa-angle-left"></i>'),
  'next_text' => __('<i class="icon far fa-angle-right"></i>'),
);

?>

<?php get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>

<?php get_template_part('template-parts/inner-menu'); ?>

<div class="archive-description">
  <div class="page-container">
    <p><?php echo get_theme_mod('event-text')?></p>
  </div>
</div>

<div class="query-box" id="q-box">

  <div class="decor-line decor-line--top decor-line--bottom">

    <div class="query-box--events">

      <div class="page-container">

        <div class="line_wrp line_wrp--query-box">

          <div class="line-row">
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
            <div class="line-row__item"></div>
          </div>

          <div class="archive-position">
            <div class="control-panel d-flex justify-space-between align-center">
              <?php dynamic_sidebar('cat-sidebar') ?>

              <div class="archive-pre-title">
                <?php echo $wp_the_query->get('event-cat'); ?>
              </div>

              <?php dynamic_sidebar('arc-sidebar'); ?>

            </div>

            <div class="query-box__inner">

              <div class="row query-box__row">
                <?php while (have_posts()) :
                  the_post(); ?>
                  <?php $date = CFS()->get('date'); ?>
                  <article class="archive-item query-box__item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="archive-item__bg">
                      <div class="archive-item__img"
                           style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

                      <div class="archive-item__inner">
                        <a href="<?php echo get_permalink(); ?>" class="archive-item__link">
                          <?php the_title('<h2 class="title archive-item__title">', '</h1>'); ?>

                          <span class="archive-item__description">
                  <?php echo content_excerpt(array('maxchar' => 160)); ?>
                  </span>

                          <span class="archive-item__time">
                    <span><i class="far fa-calendar-check"></i><?php echo date('D d/m/y', strtotime($date)); ?></span>
                    <span><i class="far fa-clock"></i><?php echo CFS()->get('time') ?></span>
                  </span>
                        </a>
                      </div>
                    </div>
                  </article>


                <?php endwhile; ?>
              </div>
            </div>

            <div class="navigation-control">
              <?php the_posts_pagination($args); ?>

              <a href="#q-box" class="top js-scroll-top">
                <i class="icon far fa-angle-double-up"></i> <span>Back to top</span> <i
                  class="icon far fa-angle-double-up"></i>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('template-parts/preview-gallery'); ?>
<?php get_footer(); ?>
