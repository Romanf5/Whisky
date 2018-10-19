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

<div class="query-box query-box--blog" id="q-box">


  <div class="page-container">

    <div class="control-panel d-flex justify-space-between align-center">
      <?php dynamic_sidebar('cat-blog-sidebar') ?>

      <?php dynamic_sidebar('arc-blog-sidebar'); ?>

    </div>

    <div class="query-box__inner">

      <div class="row query-box__row">
        <?php while (have_posts()) :
          the_post(); ?>

          <article class="archive-item query-box__item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="archive-item__bg">
              <div class="archive-item__img"
                   style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

              <div class="archive-item__inner">
                <a href="<?php echo get_permalink(); ?>" class="archive-item__link archive-item__link--blog">
                  <?php the_title('<h2 class="title archive-item__title">', '</h1>'); ?>

                  <span class="archive-item__description">
                  <?php echo content_excerpt(array('maxchar' => 215)); ?>
                  </span>

                  <span class="archive-item__time">
                    <span><?php echo get_the_date('jS F Y');?></span>
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

      <a href="#q-box" class="top top--blog js-scroll-top">
        <i class="icon far fa-angle-double-up"></i> <span>Back to top</span> <i class="icon far fa-angle-double-up"></i>
      </a>
    </div>
  </div>
</div>

<?php get_footer(); ?>
