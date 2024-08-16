<?php
$hero = get_field('hero');
$bg = $hero['bg']['url'];
$bgMobile = @$hero['bgMobile']['url'];
$sayBg =
  '<div class="hero--bg-pc" style="background-image:url(' . $bg . ')"></div>';
if ($bgMobile) {
  $sayBg =
    '
    <div class="hero--bg-pc hidden lg:block" style="background-image:url(' .
    $bg .
    ')"></div>
    <div class="hero--bg-mo block lg:hidden" style="background-image:url(' .
    $bgMobile .
    ')"></div>';
}
?>
<section class="hero bg-black">
  <div class="hero--bg"><?= $sayBg ?></div>
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
