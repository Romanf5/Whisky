<?php
$eventDate = CFS()->get('date_event')
?>

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

        <div class="share-box">
          <div class="share-box__title">SHARE WITH FRIENDS</div>
          <div class="share-btns a2a_kit">
            <a class="share-btn share-btn-fb a2a_button_facebook"><i class="fab fa-facebook-f"></i></a>
            <a class="share-btn share-btn-twitter a2a_button_twitter"><i class="fab fa-twitter"></i></a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php get_template_part('template-parts/more-posts'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
