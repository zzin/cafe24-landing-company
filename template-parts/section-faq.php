<?php
$faq = get_field('faq');
if ($faq['chk']): ?>
<section class="section faq" id="section-faq">
  <div class="faq--title">
    <div class="title--wrap">
      <h2 class="title"><?= $faq['titleMain'] ?></h2>
      <div class="description">
        <?= $faq['description'] ?>
      </div>
    </div>
  </div>
  <div class="faq--list">
    <ul class="faq--ul">
      <?php
      $args = [
        'post_type' => 'page-faq',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      ];
      $query = new WP_Query($args);
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
          get_template_part('template-parts/split/split', 'faq');
        }
      }
      wp_reset_postdata();
      ?>
    </ul>
  </div>
</section>
<?php endif; ?>
