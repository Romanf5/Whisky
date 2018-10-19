<?php
global $post;

$postType = $post->post_type;

if($postType == 'events'){
?>

<?php
  $dateEvent = CFS()->get('date');
  $timeEvent = CFS()->get('time');
  $priceEvent = CFS()->get('price_evetn');
  $menuEvent = CFS()->get('menu_event');
  $btnText = CFS()->get('button_event_text');

?>
<div class="post-info d-flex justify-space-between align-center">

  <ul class="post-info__list">
    <li class="post-info__item"><i class="icon fal fa-calendar-check"></i> <?php echo date('l jS F Y')?></li>
    <li class="post-info__item"><i class="icon fal fa-clock"></i> From <?php echo $timeEvent; ?></li>
    <li class="post-info__item">Price <?php echo $priceEvent; ?></li>
  </ul>

  <a href="<?php echo ($menuEvent)? $menuEvent : '#';?>" class="btn btn--single-post" target="_blank"><?php echo $btnText; ?></a>

</div>

<?php } elseif ($postType == 'blog'){ ?>

  <div class="post-info d-flex justify-space-between align-center">

    <ul class="post-info__list">
      <li class="post-info__item post-info__item--blog"><?php echo get_the_date('jS F Y') ?></li>
    </ul>

    <div class="share-box share-box--blog">
      <div class="share-box__title share-box__title--blog">Share Blog</div>
      <div class="share-btns a2a_kit">
        <a class="share-btn share-btn--blog share-btn-fb a2a_button_facebook"><i class="fab fa-facebook-f"></i></a>
        <a class="share-btn share-btn--blog share-btn-twitter a2a_button_twitter"><i class="fab fa-twitter"></i></a>
      </div>

    </div>

  </div>

<?php } ?>
