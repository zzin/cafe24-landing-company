<?php
$product = get_field('portfolio');
if ($product['chk']): ?>
<section class="section products" id="section-products">
  <div class="products--list">
    <?php
    $args = [
      'post_type' => 'page-product',
      'post_status' => 'publish',
      'posts_per_page' => -1,
    ];
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('template-parts/split/split', 'product');
      }
    }
    wp_reset_postdata();
    ?>
  </div>
  <div class="products--title">
    <div class="title--wrap">
      <h2 class="title"><?= $product['titleMain'] ?></h2>
      <div class="description">
        <?= $product['description'] ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
