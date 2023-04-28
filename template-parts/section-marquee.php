<?php
$marquee = get_field('marquee');
if ($marquee['chk']): ?>
<section class="marquee" id="section-marquee">
  <div class="marquee--wrap" duration="20" data-component="marquee">
    <div class="marquee-content">
      <div class="text"><?= $marquee['marqueeText'] ?></div>
      <div class="text"><?= $marquee['marqueeText'] ?></div>
      <div class="text"><?= $marquee['marqueeText'] ?></div>
    </div>
  </div>
</section>
<?php endif; ?>
