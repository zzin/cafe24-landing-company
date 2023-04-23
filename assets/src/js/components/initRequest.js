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
		const formData = new FormData(document.querySelector('#requestForm'));
		const serialized = serialize(formData);
		const data = {
			action: 'saveRequest',
			security: document.getElementById('security').value,
			data: serialized,
		};
		$.ajax({
			url: frontendAjaxObject.ajaxurl,
			type: 'POST',
			data,
			beforeSend: (xhr) => {
				const changeBtn = document.querySelector('#requestForm .btn--submit');
				changeBtn.type = 'button';
				changeBtn.innerHTML = 'Saving';
			},
			success: (rtn) => {
				console.log(rtn);
				if (rtn === 'success') {
					let url = window.location.href;
					if (url.indexOf('?') > -1) {
						url += '&mode=saved';
					} else {
						url += '?mode=saved';
					}
					window.location.href = url;
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
