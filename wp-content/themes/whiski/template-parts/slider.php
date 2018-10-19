<?php
$slider = CFS()->get('slider');
?>

<?php if ($slider): ?>
  <section class="slider decor-line decor-line--top decor-line--bottom">
    <div class="slider__wrp">

      <button type="button" class="slider__button slider__button--prev js-prev">
        <img src="<?php echo get_template_directory_uri() . '/src/images/slider-btn-icon.png' ?>" alt="Arrow">
      </button>

      <button type="button" class="slider__button slider__button--next js-next">
        <img src="<?php echo get_template_directory_uri() . '/src/images/slider-btn-icon.png' ?>" alt="Arrow"
             class="rotate-180">
      </button>

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

        <div class="row slider__row" id="<?php echo (is_front_page()) ? 'front-slider' : 'menus-slider'; ?>">

          <?php foreach ($slider

                         as $slide) { ?>

            <div class="slider__item">
              <div class="slider__inner-wrp">
                <div class="slider__img <?php echo (is_page('menus')) ? 'slider__img--menus' : false; ?>"
                     style="background-image: url(<?php echo $slide['image_slider'] ?>);"></div>
                <div class="slider__content d-flex">
                  <div class="d-flex flex-col justify-space-between align-center">
                    <div>
                      <h3 class="title slider__title">
                        <?php echo $slide['slide_title'] ?>
                      </h3>
                      <p
                        class="slider__description <?php if (is_page('menus')): echo 'slider__description--menus'; endif; ?>">
                        <?php echo $slide['slide_description'] ?>
                      </p>
                    </div>
                    <?php
                    $values = $slide['select_type_for_button'];
                    if (is_front_page()) {
                      foreach ($values as $value) {
                        if ($value == 'PDF') { ?>
                          <a href="<?php echo ($slide['pdf_file']) ? $slide['pdf_file'] : '#' ?>"
                             class="btn slider__btn"><?php echo $slide['pdf_button_text'] ?></a>
                        <?php } else { ?>
                          <a href="<?php echo $slide['link']['url'] ?>" class="btn slider__btn"
                             target="<?php echo $slide['link']['target'] ?>"><?php echo $slide['link']['text'] ?></a>
                        <?php }
                      }
                    } else {
                      foreach ($values as $value) {
                        if ($value == 'PDF') { ?>
                          <a href="<?php echo ($slide['pdf_file']) ? $slide['pdf_file'] : '#' ?>"
                             class="btn slider__btn">View menu</a>
                        <?php }
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
    </div>

  </section>
<?php endif; ?>