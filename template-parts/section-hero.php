<?php
$hero = get_field('hero');
$bg = $hero['bg']['url'];
?>
<section class="hero bg-black">
  <div class="hero--bg" style="background-image: url('<?= $bg ?>');"></div>
  <div class="hero--slogan">
    <div class="title">
      <div class="title-up"><?= $hero['titleHeader'] ?></div>
      <h2 class="title-h2"><?= $hero['titleMain'] ?></h2>
      <div class="title-down">
        <?= nl2br($hero['description']) ?>
      </div>
    </div>
  </div>
</section>