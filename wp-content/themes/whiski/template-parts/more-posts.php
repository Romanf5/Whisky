<?php
global $post;
$postType = $post->post_type;

$args = array(
  'post_type' => $postType,
  'posts_per_page' => 4,
  'post__not_in' => array($post->ID)
);

$singleQuery = new WP_Query($args);
?>

<section class="more-posts ">

  <div class="query-box--events">

    <div class="page-container">

      <div class="line_wrp line_wrp--more-post">

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

        <div class="archive-position">
          <div class="d-flex justify-space-between align-center more-posts__pre-query">
            <div class="title more-posts__title">
              <?php echo ($postType == 'events') ? 'MORE UPCOMING EVENTS' : 'MORE ARTICLES' ?>
            </div>

            <a href="<?php echo ($postType == 'events') ? '/the-latest/events' : '/the-latest/blog' ?>"
               class="back-link">
              <?php echo ($postType == 'events') ? 'VIEW ALL EVENTS' : 'VIEW ALL BLOG POSTS' ?>
            </a>
          </div>

          <div class="row more-posts__row">

            <?php if ($singleQuery->have_posts()):
              while ($singleQuery->have_posts()):
                $singleQuery->the_post();
                ?>
                <article class="archive-item query-box__item archive-item--more"
                         id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <div class="archive-item__bg">
                    <div class="archive-item__img"
                         style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

                    <div class="archive-item__inner">
                      <a href="<?php echo get_permalink(); ?>" class="archive-item__link">
                        <?php the_title('<h2 class="title archive-item__title">', '</h1>'); ?>

                        <span class="archive-item__description">
                  <?php echo content_excerpt(array('maxchar' => 160)); ?>
                  </span>
                        <span class="archive-item__time">
                      <?php if ($postType == 'events') { ?>
                        <span><i
                            class="far fa-calendar-check"></i><?php echo date('D d/m/y', strtotime($date)); ?></span>
                        <span><i class="far fa-clock"></i><?php echo CFS()->get('time') ?></span>
                      <?php } elseif ($postType == 'blog') { ?>
                        <span><?php echo get_the_date('jS F Y') ?></span>
                      <?php } ?>
                  </span>
                      </a>
                    </div>
                  </div>
                </article>

              <?php endwhile;
              wp_reset_postdata();
            endif; ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
