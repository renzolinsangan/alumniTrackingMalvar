const passField = document.querySelector('#pass');
const togglePassword = document.querySelector('.toggle-password');

togglePassword.addEventListener('click', function() {
    const type = passField.getAttribute('type') === 'password' ? 'text' : 'password';
    passField.setAttribute('type', type);
    if (type === 'text') {
      togglePassword.classList.remove('bi-eye-slash');
      togglePassword.classList.add('bi-eye');
    } else {
      togglePassword.classList.remove('bi-eye');
      togglePassword.classList.add('bi-eye-slash');
    }
  });
  

passField.addEventListener('input', function() {
  if (this.value !== '') {
    togglePassword.style.display = 'block';
  } else {
    togglePassword.style.display = 'none';
  }
});