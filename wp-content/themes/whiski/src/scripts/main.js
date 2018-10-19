jQuery(function ($) {
  var _window = $(window);
  var frontSlider = $('#front-slider');
  var menusSlider = $('#menus-slider');
  var $prevArrow = $('.js-prev');
  var $nextArrow = $('.js-next');
  var $swipebox = $('.swipebox');
  var $sliderInitCount = $('.slider__item').length;
  var $eventCat = $('.postform');
  var $archSelect = $('select[name="archive-dropdown"]');
  var _body = $('body');
  var hamburger = $('.hamburger');
  var overlay = $('#overlay');

  function scrollTop() {
    $('.js-scroll-top').click(function (event) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: $($(this).attr('href')).offset().top - 160
      }, 400);
    });
  }

  if (!_body.hasClass('home') && $sliderInitCount >= 5) {
    $sliderInitCount = 5;
  } else {
    $sliderInitCount = 4;
  }

  function autoHeight() {
    var maxHeightSliderItem;
    var $sliderItem = $('.slider__item');
    maxHeightSliderItem = $($sliderItem[1]).height();
    $sliderItem.each(function (index, item) {
      if ($(item).height() > maxHeightSliderItem) {
        maxHeightSliderItem = $(item).height();
      }
    });

    $sliderItem.css('min-height', maxHeightSliderItem + 'px');
  }

  function autoHeightBlog() {
    var maxHeightSliderItem = 0;
    var $sliderItemBlog = $('.archive-item.slick-slide');
    // maxHeightSliderItem = $($sliderItemBlog[1]).height();

      $sliderItemBlog.each(function (index, item) {
        if ($(item).outerHeight() > maxHeightSliderItem) {
          maxHeightSliderItem = $(item).outerHeight();
        }
      });




    $sliderItemBlog.css('min-height', maxHeightSliderItem + 'px');
  }

  _window.on('resize', function () {
    autoHeight();
    autoHeightBlog()
  });

  frontSlider.on('init', function (event, slick) {
    setTimeout(function () {
      autoHeight();
    }, 200);
  });

  frontSlider.slick({
    slidesToShow: $sliderInitCount - 1,
    arrows: true,
    prevArrow: $prevArrow,
    nextArrow: $nextArrow,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          dots: true,
        }
      },

      {
        breakpoint: 680,
        settings: {
          slidesToShow: 2,
          arrows: false,
          dots: true,
        }
      },

      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true,
        }
      },
    ]
  });

  menusSlider.on('init', function (event, slick) {
    setTimeout(function () {
      autoHeight();
    }, 300);

  });

  menusSlider.slick({
    slidesToShow: $sliderInitCount - 1,
    arrows: true,
    prevArrow: $prevArrow,
    nextArrow: $nextArrow,
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 3,
        }
      },

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          arrows: false,
          dots: true,
        }
      },

      {
        breakpoint: 680,
        settings: {
          slidesToShow: 2,
          arrows: false,
          dots: true,
        }
      },

      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true,

        }
      },
    ]
  });

  _window.on('load resize', function () {

      if(_window.width()<1024){

        $('.more-posts__row').on('init', function (event, slick) {
          setTimeout(function () {
            autoHeightBlog();
          }, 1000);

        });

        $('.more-posts__row').slick({
          slidesToShow: 3,
          arrows: false,
          dots: true,
          responsive: [
            {
              breakpoint: 680,
              settings: {
                slidesToShow: 2,
              }
            },

            {
              breakpoint: 575,
              settings: {
                slidesToShow: 1,
              }
            },
          ]
        });
      }else{
        $('.more-posts__row').slick('unslick');
      }
  });

  $swipebox.swipebox();

  $eventCat.niceSelect();
  $archSelect.niceSelect();

  scrollTop();

  var innerLink = $('.latest-nav__list li a');
  if (_body.hasClass('single-events') || _body.hasClass('tax-event-cat') || _body.hasClass('post-type-archive-events')) {
    innerLink.each(function (index, item) {
      var test = $(item).text().toLowerCase();
      if (test.indexOf('events') !== -1) {
        $(item).parent().addClass('current-menu-item');
      }
    })
  } else if (_body.hasClass('single-blog') || _body.hasClass('tax-blog-cat') || _body.hasClass('post-type-archive-blog')) {
    innerLink.each(function (index, item) {
      var test = $(item).text().toLowerCase();
      if (test.indexOf('blog') !== -1) {
        $(item).parent().addClass('current-menu-item');
      }
    })
  }

  $(".wpcf7").on('wpcf7submit', function () {
    setTimeout(function () {
      $('.wpcf7-mail-sent-ok').slideUp();
    }, 1500)
  });

  $('.wpcf7-form-control').on('focus', function () {
    if ($(this).hasClass('wpcf7-not-valid')) {
      $(this).removeClass('wpcf7-not-valid');
    }
  });

  hamburger.on('click', function () {
    $('.mobile-header').toggleClass('open');
    $('body, html').toggleClass('overflow');
    overlay.fadeToggle(400);
  });

  _window.on('resize', function () {
    if($(this).width() >= 1026){
      $('.mobile-header').removeClass('open');
      $('body, html').removeClass('overflow');
      overlay.fadeOut(400)
    }
  });

  overlay.on('click', function () {
    $('.mobile-header').removeClass('open');
    $('body, html').removeClass('overflow');
    $(this).fadeOut(400);
  });

});
