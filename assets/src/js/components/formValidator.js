class FormValidator {
	constructor(form, fields, btn, action) {
		this.form = form;
		this.fields = fields;
		this.action = action;
		this.submit = btn;
		this.chkValid = 0;
	}
	initialize() {
		this.validateOnEntry();
		this.validateOnSubmit();
	}

	validateOnSubmit() {
		const self = this;
		this.form.addEventListener('submit', (e) => {
			e.preventDefault();
			self.fields.forEach((field) => {
				const input = document.querySelector(`#${field}`);
				self.validateFields(input);
			});
			if (this.chkValid <= 0) {
				this.action();
			}
		});
	}

	validateOnEntry() {
		const self = this;
		this.fields.forEach((field) => {
			const input = document.querySelector(`#${field}`);
			input.addEventListener('input', (event) => {
				self.validateFields(input);
			});
		});
	}

	validateFields(field) {
		this.chkValid = 0;
		// check presence of values
		if (field.value.trim() === '') {
			this.chkValid++;
			if (field.dataset.message) {
				this.setStatus(field, field.dataset.message, 'error');
			} else {
				this.setStatus(
					field,
					`${field.previousElementSibling.innerText} cannot be blank`,
					'error'
				);
			}
		} else {
			this.setStatus(field, null, 'success');
		}

		// check for a valid email address
		if (field.type === 'email' && field.value.trim() !== '') {
			const re = /\S+@\S+\.\S+/;
			if (re.test(field.value)) {
				this.setStatus(field, null, 'success');
			} else {
				this.chkValid++;
				this.setStatus(field, '이메일 주소를 확인해 주세요', 'error');
				// if (document.documentElement.lang === 'ko-KR') {
				// 	this.setStatus(field, '이메일 주소를 입력하세요', 'error');
				// } else {
				// 	this.setStatus(field, 'Please enter valide email address', 'error');
				// }
			}
		}

		if (field.type === 'tel' && field.value.trim() !== '') {
			const re =
				/^\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;
			if (re.test(field.value)) {
				this.setStatus(field, null, 'success');
			} else {
				this.chkValid++;
				this.setStatus(field, '연락처가 정확한지 확인해 주세요', 'error');
			}
		}

		if (field.type === 'number') {
			const re = /^\d+$/;
			if (re.test(field.value)) {
				this.setStatus(field, null, 'success');
			} else {
				this.chkValid++;
				this.setStatus(field, 'Please enter only number', 'error');
			}
		}

		if (field.type === 'select-one') {
			if (field.value) {
				this.setStatus(field, null, 'success');
			} else {
				this.chkValid++;
				this.setStatus(field, 'Please select some option', 'error');
			}
		}

		this.checkAllInput();
	}

	checkAllInput() {
		this.fields.forEach((field) => {
			const input = document.querySelector(`#${field}`);
			if (input.value.trim() === '') {
				this.chkValid++;
			}
			if (input.type === 'checkbox' && !input.checked) {
				this.chkValid++;
				this.setStatus(input, input.dataset.message, 'error');
			}
		});
		// console.log(this.chkValid);
		if (this.chkValid > 0) {
			this.submit.classList.add('btn--submit-disabled');
		} else {
			this.submit.classList.remove('btn--submit-disabled');
		}
	}

	setStatus(field, message, status) {
		const errorMessage = field.parentElement.querySelector('.error-message');

		if (status === 'success') {
			if (errorMessage) {
				errorMessage.innerText = '';
			}
			field.classList.remove('input-error');
		}

		if (status === 'error') {
			field.classList.add('input-error');
			errorMessage.innerText = message;
		}
	}
}
export default FormValidator;
