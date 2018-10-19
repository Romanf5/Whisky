<?php
$bemClass = '';
$tameTable = CFS()->get('timetable');

if (is_page('menus')) {
  $bemClass = 'intro--menus';
}else if (is_page('groups-and-corporate')){
  $bemClass = 'intro--groups';
}
?>

<section class="intro <?php echo $bemClass?>">
  <div class="decor-line decor-line--top  <?php echo(!is_page('groups-and-corporate'))?'decor-line--bottom':'decor-line--no-bottom'?>">
    <div class="page-container">
      <h1 class="title title--center intro__title"><?php echo get_the_title() ?></h1>

      <div class="intro__description">
        <?php the_content()?>
      </div>

      <?php if (is_page('menus') && $tameTable):?>
        <div class="timetable intro__timetable">
          <?php echo $tameTable?>
        </div>
      <?php endif;?>
    </div>
  </div>
</section>
