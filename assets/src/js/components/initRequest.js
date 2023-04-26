/* eslint-disable no-undef */
import FormValidator from './formValidator';
import { serialize } from './initGlobal';
class InitRequest {
  constructor() {
    this.requestForm = document.getElementById('requestForm');
    if (this.requestForm !== null) {
      this.requestFormSubmit = document.querySelector(
        '#requestForm .btn--submit'
      );
      this.events();
    }
  }
  events() {
    const fields = ['company', 'name', 'tel', 'email', 'comment', 'agree'];
    const validator = new FormValidator(
      this.requestForm,
      fields,
      this.requestFormSubmit,
      this.saveRequest
    );
    validator.initialize();
  }
  saveRequest() {
    const requersForm = document.querySelector('#requestForm');
    const formData = new FormData(requersForm);
    const serialized = serialize(formData);
    const changeBtn = document.querySelector('#requestForm .btn--submit');
    const data = {
      action: 'saveRequest',
      security: document.getElementById('security').value,
      data: serialized,
    };
    let orgBtnValue;
    $.ajax({
      url: frontendAjaxObject.ajaxurl,
      type: 'POST',
      data,
      beforeSend: (xhr) => {
        changeBtn.type = 'button';
        orgBtnValue = changeBtn.innerHTML;
        changeBtn.innerHTML = '저장중입니다.';
      },
      success: (rtn) => {
        console.log(rtn);
        if (rtn === 'saved') {
          requersForm.reset();
          changeBtn.innerHTML = '정상적으로 저장되었습니다.';
          setTimeout(() => {
            changeBtn.innerHTML = orgBtnValue;
            changeBtn.type = 'submit';
          }, 2000);
        } else {
          alert('오류로 인해 저장되지 않았습니다. 관리자에게 문의 하세요.');
        }
      },
      error: (request, status, error) => {
        console.log(
          'code = ' +
            request.status +
            ' message = ' +
            request.responseText +
            ' error = ' +
            error
        ); // 실패 시 처리
      },
    });
  }
}
export default InitRequest;
