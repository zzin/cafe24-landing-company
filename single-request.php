<?php
if (!is_user_logged_in()) {
  wp_redirect(home_url());
  exit();
}
get_header();
?>
<main id="primary" class="site-main">
  <section class="section">
    <div class="title--wrap">
      <h2 class="title">Request</h2>
      <div class="description">
        고객님께서 의뢰하신 글을 확인 합니다.
      </div>
    </div>
    <div class="content--wrap">
      <ul class="ul--request">
        <li>
          <strong>회사/단체명</strong>
          <span><?= get_field('company') ?></span>
        </li>
        <li>
          <strong>성함</strong>
          <span><?= get_field('name') ?></span>
        </li>
        <li>
          <strong>연락처</strong>
          <span><?= get_field('tel') ?></span>
        </li>
        <li>
          <strong>이메일</strong>
          <span><?= get_field('email') ?></span>
        </li>
      </ul>
      <div class="message">
        <?= get_the_content() ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
