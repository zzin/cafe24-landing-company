<?php
$photo = get_the_post_thumbnail(get_the_ID(), 'full'); ?>
<div class="card card--product">
  <figure>
    <?= $photo ?>
  </figure>
  <div class="card--body">
    <h5 class="card--title"><?= get_the_title() ?></h5>
    <div class="card--text"><?= get_the_content() ?></div>
  </div>
</div>