<?php
$about = get_field('about');
if ($about['chk']): ?>
<section class="section about" data-component="flickity" id="section-about">
  <div class="container--full">
    <div class="title--wrap">
      <div class="flex justify-between items-center">
        <h2 class="title"><?= $about['titleMain'] ?></h2>
        <div class="control mb-5">
          <button type="button" class="btn btn--oval left">left</button>
          <button type="button" class="btn btn--oval right">right</button>
        </div>
      </div>
      <div class="description">
        <?= nl2br($about['description']) ?>
      </div>
    </div>
    <div class="flickity">
      <?php
      $args = [
        'post_type' => 'page-about',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      ];
      $query = new WP_Query($args);
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template-parts/split/split', 'about');
        }
      }
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php endif; ?>
