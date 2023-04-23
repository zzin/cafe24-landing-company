<div class="card card--testimonial">
  <div class="card--testimonial-info">
    <div class="card--testimonial-quot">
      <svg width="100%" height="100%" viewBox="0 0 32 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" class="fill-[var(--primaryColor)]">
        <path d="M25.523,24c-2.256,0 -4.125,-0.736 -5.608,-2.208c-1.418,-1.472 -2.127,-3.584 -2.127,-6.336c0,-2.944 0.838,-5.856 2.514,-8.736c1.74,-2.88 4.157,-5.12 7.251,-6.72l2.223,3.36c-3.351,2.304 -5.349,5.216 -5.994,8.736c0.581,-0.256 1.257,-0.384 2.031,-0.384c1.804,-0 3.287,0.576 4.447,1.728c1.16,1.152 1.74,2.624 1.74,4.416c0,1.792 -0.612,3.264 -1.837,4.416c-1.224,1.152 -2.771,1.728 -4.64,1.728Zm-17.789,-0c-2.256,-0 -4.125,-0.736 -5.607,-2.208c-1.418,-1.472 -2.127,-3.584 -2.127,-6.336c0,-2.944 0.838,-5.856 2.514,-8.736c1.74,-2.88 4.157,-5.12 7.25,-6.72l2.224,3.36c-3.352,2.304 -5.35,5.216 -5.994,8.736c0.58,-0.256 1.257,-0.384 2.03,-0.384c1.805,-0 3.287,0.576 4.447,1.728c1.16,1.152 1.741,2.624 1.741,4.416c-0,1.792 -0.613,3.264 -1.837,4.416c-1.225,1.152 -2.772,1.728 -4.641,1.728Z" style="fill-rule:nonzero;" />
      </svg>
    </div>
    <div class="card--testimonial-desc">
      <?php the_content(); ?>
    </div>
  </div>
  <div class="card--testimonial-ppl">
    <?= get_the_post_thumbnail(get_the_ID(), 'full', [
    	'class' => 'photo',
    	'alt' => esc_html(get_the_title()),
    ]) ?>
    <div class="card--testimonial-who">
      <div class="title"><?= get_the_title() ?></div>
      <div class="name"><?= get_field('writer') ?></div>
    </div>
  </div>
</div>