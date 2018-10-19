<?php $groups = CFS()->get('groups')
?>
<section class="groups">


  <?php foreach ($groups as $group) {
    $selects = $group['group_position'];
    foreach ($selects as $select) {
      if ($select == 'Left') { ?>
        <div class="groups__row">
          <div class="groups__col">
            <div class="groups__content">
              <div class="groups__content-inner">
                <h2 class="title title--white groups__title">
                  <?php echo $group['gropu_title']?>
                </h2>
                <div class="groups__description groups__description--white">
                  <?php echo $group['group_content'] ?>
                </div>
              </div>
            </div>
          </div>
          <div class="groups__col">
            <div class="groups__img" style="background-image: url(<?php echo $group['gropu_image']?>);"></div>
          </div>
        </div>
      <?php }else {?>
        <div class="groups__row groups__row--revers">
          <div class="groups__col">
            <div class="groups__content groups__content--revers">
              <div class="groups__content-inner">
                <h2 class="title groups__title">
                  <?php echo $group['gropu_title']?>
                </h2>
                <div class="groups__description">
                  <?php echo $group['group_content'] ?>
                </div>
              </div>
            </div>
          </div>
          <div class="groups__col">
            <div class="groups__img" style="background-image: url(<?php echo $group['gropu_image']?>);"></div>
          </div>
        </div>
      <?php }
    } ?>
  <?php } ?>

  </div>
</section>