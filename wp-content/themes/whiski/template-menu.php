<?php
/*
 * Template Name: Menus Template
 */

?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

  <?php get_template_part('template-parts/banner'); ?>

  <?php get_template_part('template-parts/intro'); ?>

  <?php get_template_part('template-parts/slider'); ?>

  <?php get_template_part('template-parts/preview-gallery'); ?>

<?php endwhile; ?>

<?php get_footer(); ?>
