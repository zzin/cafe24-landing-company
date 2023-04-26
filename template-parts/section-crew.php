<section class="section crew" id="section-crew">
  <div class="crew--wrap">
    <div class="crew--title">
      <div class="title--wrap">
        <h2 class="title">CREW</h2>
        <div class="description">
          디자인 모임은 워드프레스 사이트 제작 경력 10년 이상의 전문가들로 구성되어 있습니다.<br />
          고민하지 마시고 함께 하세요.
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