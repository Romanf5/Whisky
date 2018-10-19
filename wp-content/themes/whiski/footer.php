<footer class="page-footer" role="contentinfo">

  <div class="subscribe">

    <div class="page-container">

    <h2 class="title title--center title--white title--semibold subscribe__title">
      <span>Sign up for the latest news & offers</span> <i class="far fa-info-circle icon icon--footer"></i>
    </h2>

    <div class="subscribe__form">
      <?php echo do_shortcode('[contact-form-7 id="9" title="Subscribe"]')?>
    </div>

    </div>
  </div>

  <div class="navigation-wrp">
    <div class="page-container">
      <div class="page-footer__navigation">
        <nav class="footer-nav">
          <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'nav-list footer-nav__list', 'container' => false)); ?>
        </nav>

        <ul class="footer-social">
          <li class="footer-social__item">
            <a href="<?php echo get_theme_mod('fb')?>"><i class="fab fa-facebook-f"></i></a>
          </li>
          <li class="footer-social__item">
            <a href="<?php echo get_theme_mod('tw')?>"><i class="fab fa-twitter"></i></a>
          </li>
          <li class="footer-social__item">
            <a href="<?php echo get_theme_mod('insta')?>"><i class="fab fa-instagram"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="page-container">
    <div class="page-footer__copyright d-flex justify-space-between align-center">
      <p>&copy; <?php echo date("Y"); ?> Whiski Bar</p>
      <p>Website proudly designed, developed & hosted by <span class="bold">mtc.</span></p>
    </div>
  </div>

</footer>

<div id="overlay"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
