var form = document.querySelector('form');

var validationAlert = document.getElementById('validationAlert');

form.addEventListener('submit', function (event) {
  var usernameInput = document.querySelector('input[name="username"]');
  var passwordInput = document.querySelector('input[name="password"]');
  var emailInput = document.querySelector('input[name="email"]');
  var isEmpty = false;

  if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '' || emailInput.value.trim() === '') {
    isEmpty = true;
  }

  if (usernameInput.value.trim() === '') {
    isEmpty = true;
    usernameInput.classList.add('is-invalid');
  } else {
    usernameInput.classList.remove('is-invalid');
  }

  if (passwordInput.value.trim() === '' || passwordInput.value.length < 8 || passwordInput.value.length > 100) {
    isEmpty = true;
    passwordInput.classList.add('is-invalid');
  } else {
    passwordInput.classList.remove('is-invalid');
  }
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!emailPattern.test(emailInput.value)) {
    isEmpty = true;
    emailInput.classList.add('is-invalid');
  } else {
    emailInput.classList.remove('is-invalid');
  }

  if (isEmpty) {
    event.preventDefault();
    validationAlert.style.display = 'block';

    setTimeout(function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
      validationAlert.focus();
    }, 100);
  }
});