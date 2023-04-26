<section class="section about" data-component="flickity" id="section-about">
  <div class="container--full">
    <div class="title--wrap">
      <div class="flex justify-between items-center">
        <h2 class="title">ABOUT US</h2>
        <div class="control mb-5">
          <button type="button" class="btn btn--oval left">left</button>
          <button type="button" class="btn btn--oval right">right</button>
        </div>
      </div>
      <div class="description">
        스튜디오 모임은 워드프레스 테마 제작 전문 모임입니다.<br />
        기존의 유/무료 테마와는 차별화 되는 기업의 브랜드 아이덴티티에 맞도록 맞춤 제작하고 있는 모임과 함께 맞춤형 사이트를 제작 해 보세요.
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