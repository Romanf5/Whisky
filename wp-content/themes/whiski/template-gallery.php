<?php
/*
 * Template Name: Gallery template
 */

$gallery = CFS()->get('gallery');
$outerTitle = CFS()->get('title_section');
$outerDescription = CFS()->get('description_section');
$outerLink = CFS()->get('button_section');
$reversGallery = array_reverse($gallery);
?>

<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

  <?php get_template_part('template-parts/banner'); ?>

  <?php get_template_part('template-parts/intro'); ?>

  <section class="photo-gallery">

    <div class="page-container overflow">
      <div class="line_wrp">
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

        <div class="row photo-gallery__row">
          <?php foreach ($reversGallery as $item) {
            if (wp_get_attachment_url($item['image'])):
              ?>
              <div class="photo-gallery__col">
                <a rel="gallery" href="<?php echo wp_get_attachment_url($item['image']); ?>" class="swipebox">
                  <?php
                  $img = wp_get_attachment_image_src($item['image'], 'gallery');
                  ?>
                  <img src="<?php echo $img[0]; ?>" alt="img">
                </a>
              </div>
            <?php endif; ?>
          <?php } ?>
        </div>
      </div>

    </div>

  </section>

  <section class="outer decor-line decor-line--top decor-line--no-bottom">
    <div class="page-container">

      <h2 class="title title--center outer__title">
        <?php echo $outerTitle ?>
      </h2>
      <p class="outer__description">
        <?php echo $outerDescription ?>
      </p>

      <a href="<?php echo $outerLink['url'] ?>" class="btn btn--xl outer__btn"><?php echo $outerLink['text'] ?></a>
    </div>
  </section>

<?php endwhile; ?>
<?php get_footer(); ?>
