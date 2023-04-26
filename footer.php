<?php
$site = get_field('site', 6);
$company = $site['company'];
$tel = $site['tel'];
$address = $site['address'];
$ceo = $site['ceo'];
$business = $site['business'];
$email = $site['email'];
$privacy = $site['privacy'];
$copyright = $site['copyright'];
?>
<footer id="colophon" class="site-footer">
  <address>
    <ul>
      <?php
      if ($company) {
        echo '<li><strong>회사명</strong><span>' . $company . '</span></li>';
      }
      if ($tel) {
        echo '<li><strong>연락처</strong><span>' . $tel . '</span></li>';
      }
      if ($address) {
        echo '<li><strong>주소</strong><span>' . $address . '</span></li>';
      }
      if ($ceo) {
        echo '<li><strong>대표이사</strong><span>' . $ceo . '</span></li>';
      }
      if ($business) {
        echo '<li><strong>사업자등록번호</strong><span>' .
          $business .
          '</span></li>';
      }
      if ($email) {
        echo '<li><strong>이메일</strong><span><a href="mailto:' .
          $email .
          '">' .
          $email .
          '</a></span></li>';
      }
      if ($privacy) {
        echo '<li><strong>개인정보책임</strong><span>' .
          $privacy .
          '</span></li>';
      }
      ?>
    </ul>
  </address>
  <div class="site-info">
    <?= $site['copyright'] ?>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
<div id="scroll-top">
  <button type="button">
    <i class="btn btn--up"></i>
  </button>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>