<?php
$bannerImg = CFS()->get('banner_image');
$bannerTitle = CFS()->get('banner_title');
$bannerDescription = CFS()->get('banner_description');
$bannerImgUrl = '';

($bannerImg) ? $bannerImgUrl = $bannerImg : $bannerImgUrl = get_template_directory_uri() . '/src/images/banner.png';

if(is_archive()){
  $bannerImgUrl = get_theme_mod('bg-banner');
}
?>


<section class="banner <?php echo (is_front_page() && $bannerTitle) ? 'banner--front' : false ?>"
         style="background-image: url(<?php echo $bannerImgUrl ?>);">

  <div class="page-container">

    <?php if ($bannerTitle) { ?>
      <h1 class="title title--large title--white banner__title">
        <?php echo $bannerTitle ?>
      </h1>
    <? } ?>

    <?php if ($bannerDescription) { ?>
      <p class="banner__description">
        <?php echo $bannerDescription ?>
      </p>
    <? } ?>

  </div>
</section>