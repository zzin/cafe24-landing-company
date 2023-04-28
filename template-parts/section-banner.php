<?php
$banner = get_field('banner');
if ($banner['chk']):

  $image = $banner['bg'];
  $size = 'full';
  ?>
<section class="section banner" data-aos="banner-eff" data-aos-anchor-placement="top-bottom" data-aos-delay="200" data-aos-offset="100" id="section-banner">
  <div class="relative">
    <figure class="figure-banner">
      <?= wp_get_attachment_image($image, $size) ?>
    </figure>
    <div class="massage">
      <h3 class="title"><?= $banner['titleMain'] ?></h3>
      <p class="lead">
        <?= nl2br($banner['description']) ?>
      </p>
      <a href="<?= $banner['link'] ?>" class="btn btn--default" target="_blank">
        <?= $banner['linkTitle'] ?>
      </a>
    </div>
  </div>
</section>
<?php
endif; ?>
