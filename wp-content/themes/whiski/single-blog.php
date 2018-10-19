<?php get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>
<?php get_template_part('template-parts/inner-menu'); ?>

<?php while (have_posts()) : the_post(); ?>
  <div class="post-content">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="page-container">
        <div class="article-wrp">
          <?php the_title('<h1 class="title title--single-post title--center">', '</h1>'); ?>

          <?php get_template_part('template-parts/post-info'); ?>

          <div class="content-decor">
            <div class="content-single-post">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
    </article>

    <div class="page-container">
      <div class="article-wrp">
        <?php get_template_part('template-parts/post-info'); ?>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/more-posts'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
