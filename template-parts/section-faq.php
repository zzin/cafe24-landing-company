<section class="section faq" id="section-faq">
  <div class="faq--title">
    <div class="title--wrap">
      <h2 class="title">FAQ</h2>
      <div class="description">
        스튜디오 모임에 대한 궁금하신 내용을 정리 했습니다.<br />
        언제든지 문의 주시면 성실하게 답변 드리겠습니다.
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