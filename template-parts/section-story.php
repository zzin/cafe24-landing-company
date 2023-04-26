<?php
$story = get_field('story');
if ($story['chk']): ?>

<section class="section story" id="section-story">
  <div class="story--wrap">
    <div class="title--wrap">
      <h2 class="title"><?= $story['titleMain'] ?></h2>
      <div class="description">
        <?= $story['description'] ?>
      </div>
    </div>
    <div class="story--desc mt-8">
      <div class="story--list">
        <?php
        $args = [
          'post_type' => 'page-story',
          'post_status' => 'publish',
          'posts_per_page' => -1,
        ];
        $query = new WP_Query($args);
        if ($query->have_posts()) {
          echo '<ul class="ul--story">';
          while ($query->have_posts()) {
            $query->the_post();
            echo '<li>';
            get_template_part('template-parts/split/split', 'story');
            echo '</li>';
          }
          echo '</ul>';
        }
        wp_reset_postdata();
        ?>
      </div>
      <div class="story--bg">
        <div class="bg" style="background-image: url('<?php bloginfo(
          'template_url'
        ); ?>/assets/public/images/story/story-bg.jpg');"></div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
