<?php
/*
 * Template Name: Home template
 */

$advantages = CFS()->get('advantage');
$welcomeTitle = CFS()->get('welcome_title_section');
$welcomeDescription = CFS()->get('welcome_description_text');
$pinkBtn = CFS()->get('pink_button');
$smallBtn = CFS()->get('small_button');
$welcomeImage = CFS()->get('welcome_images')
?>

<?php get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>

<?php if ($advantages) { ?>
  <section class="advantage">
    <div class="decor-line decor-line--top decor-line--bottom">
      <div class="page-container page-container--advantage">
        <ul class="advantage__list d-flex justify-space-between">
          <?php foreach ($advantages as $advantage) { ?>
            <li class="advantage__list-item"><?php echo $advantage['advantage_label'] ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </section>

<?php } ?>

<section class="welcome">
  <div class="page-container">

    <div class="d-flex welcome__d-flex">

      <div class="welcome__content">
        <h2 class="title title--medium welcome__title">
          <?php echo $welcomeTitle; ?>
        </h2>

        <div class="welcome__description">
          <?php echo $welcomeDescription; ?>
        </div>

        <div class="welcome__btns">
          <a href="<?php echo $pinkBtn['url']; ?>" class="btn btn--large btn--pink"
             target="<?php echo $pinkBtn['target']; ?>"><?php echo $pinkBtn['text']; ?></a>
          <a href="<?php echo $smallBtn['url']; ?>" class="btn"
             target="<?php echo $smallBtn['target']; ?>"><?php echo $smallBtn['text']; ?></a>
        </div>
      </div>

      <div class="welcome__image">
        <div class="wrap-image">
          <img src="<?php echo $welcomeImage ?>" alt="Welcome">
        </div>
      </div>

    </div>

  </div>
</section>

<?php get_template_part('template-parts/slider'); ?>
<?php get_template_part('template-parts/preview-gallery'); ?>

<?php get_footer(); ?>
