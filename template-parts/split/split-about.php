<?php
$bg = get_the_post_thumbnail(get_the_ID(), 'full'); ?>
<div class="carousel-cell">
  <figure>
    <?= $bg ?>
    <figcaption>
      <h3><?= get_the_title() ?></h3>
      <div class="desc"><?= get_the_content() ?></div>
    </figcaption>
  </figure>
</div>