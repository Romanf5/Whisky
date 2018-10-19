<?php
$gallery = CFS()->get('gallery', 18);
$reversGallery = '';
if ($gallery) {
  $reversGallery = array_reverse($gallery);
}
$iterator = 0;
?>

<?php if ($gallery) : ?>
  <section class="preview-gallery overflow">

    <div class="page-container">

      <div class="row preview-gallery__row">

        <?php foreach ($reversGallery as $item) {
          if ($iterator <= 5) {
            if (wp_get_attachment_url($item['image'])):?>
              <div class="preview-gallery__col">
                <?php if ($iterator != 5) { ?>
                  <a rel="gallery" href="<?php echo wp_get_attachment_url($item['image']); ?>"
                     class="swipebox">
                    <?php
                    $img = wp_get_attachment_image_src($item['image'], 'preview-gallery');
                    ?>
                    <img src="<?php echo $img[0]; ?>" alt="img">
                  </a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink(18); ?>"
                     class="preview-gallery__link">
                    <?php
                    $img = wp_get_attachment_image_src($item['image'], 'preview-gallery');
                    ?>
                    <img src="<?php echo $img[0]; ?>" alt="img">

                    <span class="preview-gallery__overlay">
                      <span class="preview-gallery__overlay-inner">
                        <span>View our</span>
                        <span>Gallery</span>
                      </span>
                    </span>
                  </a>
                <?php } ?>
              </div>
              <?php $iterator++; ?>
            <?php endif; ?>
          <?php }
        } ?>

      </div>

    </div>

  </section>
<?php endif; ?>