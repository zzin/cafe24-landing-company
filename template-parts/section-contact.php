<?php
$contact = get_field('contact');
if ($contact['chk']): ?>
<section class="section contact" id="section-contact">
  <div class="title--wrap">
    <h2 class="title"><?= $contact['titleMain'] ?></h2>
    <div class="description">
      <?= $contact['description'] ?>
    </div>
  </div>
  <form id="requestForm">
    <input type="hidden" id="security" name="security" value="<?= wp_create_nonce(
      'moim-save'
    ) ?>" />
    <div class="contact--form">
      <h3 class="title">기본 정보</h3>
      <label class="block">
        <input type="text" placeholder="회사/단체명" id="company" name="company" data-message="회사/단체명을 입력하세요" value="" />
        <span class="error-message"></span>
      </label>
      <label class="block">
        <input type="text" placeholder="성함" id="name" name="name" data-message="성함을 입력하세요" value="" />
        <span class="error-message"></span>
      </label>
      <label class="block">
        <input type="tel" placeholder="연락처" id="tel" name="tel" data-message="연락처를 입력하세요" value="" />
        <span class="error-message"></span>
      </label>
      <label class="block">
        <input type="email" placeholder="이메일" id="email" name="email" data-message="이메일 주소를 입력하세요" value="" />
        <span class="error-message"></span>
      </label>

      <h3 class="title">문의 내용</h3>
      <label class="lg:col-span-2">
        <textarea placeholder="문의 내용을 입력해 주세요." name="comment" id="comment" data-message="문의 내용을 입력하세요"></textarea>
        <span class="error-message"></span>
      </label>
      <h3 class="title">개인정보 수집·이용에 대한 안내(필수 수집·이용 항목)</h3>
      <ul>
        <li>수집항목 : 회사/단체명, 성함, 연락처, 이메일, 문의내용</li>
        <li>수집목적 : 문의에 따른 결과 회신, 상담을 위한 서비스 이용기록 조회</li>
        <li>보유기간 : 위 목적 달성시 까지</li>
      </ul>
      <div class="lg:col-span-2">
        <label class="font-semibold text-black dark:text-white pb-5">
          <input type="checkbox" id="agree" name="agree" data-message="이용목적에 동의하셔야 합니다."> 위의 이용목적에 동의 합니다.
          <span class="error-message"></span>
        </label>
      </div>
      <div class="button--wrap mt-5">
        <button type="submit" class="btn btn--default btn--submit">문의합니다.</button>
      </div>
    </div>
  </form>
</section>
<?php endif; ?>
