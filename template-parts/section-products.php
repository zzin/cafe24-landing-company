<section class="section products">
  <div class="products--list">
    <?php for ($i = 0; $i < 7; $i++) {
    	get_template_part('template-parts/split/split', 'product', [
    		'$num' => $i,
    	]);
    } ?>
  </div>
  <div class="products--title">
    <div class="title--wrap">
      <h2 class="title">NEW ARRIVALS</h2>
      <div class="description">
        스튜디오 모임에서는 최신 트렌드와 기능을 반영한 다양한 테마를 제공하고 있습니다.<br />
        단순히 테마를 설치하고 판매하는 것이 아닌 고객님의 디자인 파트너로써 성장하고자 합니다.
      </div>
    </div>
  </div>
</section>