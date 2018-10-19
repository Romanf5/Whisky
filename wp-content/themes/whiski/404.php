<?php get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>

<section class="error-404 not-found" id="#error-section">

  <div class="decor-line decor-line--top decor-line--no-bottom">

    <div class="page-container page-container--404">
      <h1 class="title-404">404</h1>
      <p class="description-404">Page not found</p>

      <a href="<?php echo get_home_url()?>" class="btn btn--404"><i class="fas fa-arrow-left"></i> BACK TO HOME</a>
    </div>
  </div>

</section>


<?php get_footer(); ?>
