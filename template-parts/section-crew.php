<?php
$crew = get_field('crew');
if ($crew['chk']): ?>
<section class="section crew" id="section-crew">
  <div class="crew--wrap">
    <div class="crew--title">
      <div class="title--wrap">
        <h2 class="title"><?= $crew['titleMain'] ?></h2>
        <div class="description">
          <?= $crew['description'] ?>
        </div>
      </div>
    </div>
    <div class="crew--list">
      <?php
      $args = [
        'post_type' => 'page-crew',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      ];
      $query = new WP_Query($args);
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template-parts/split/split', 'crew');
        }
      }
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php endif; ?>
