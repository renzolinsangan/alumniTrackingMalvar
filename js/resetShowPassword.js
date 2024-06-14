const passField = document.querySelectorAll('.input[type="password"]');
const togglePasswords = document.querySelectorAll('.toggle-password');

togglePasswords.forEach((togglePassword, index) => {
    togglePassword.addEventListener('click', function() {
        const type = passField[index].getAttribute('type') === 'password' ? 'text' : 'password';
        passField[index].setAttribute('type', type);
        if (type === 'text') {
            togglePassword.classList.remove('bi-eye-slash');
            togglePassword.classList.add('bi-eye');
        } else {
            togglePassword.classList.remove('bi-eye');
            togglePassword.classList.add('bi-eye-slash');
        }
    });
});

passField.forEach((passwordField, index) => {
    passwordField.addEventListener('input', function() {
        if (this.value !== '') {
            togglePasswords[index].style.display = 'block';
        } else {
            togglePasswords[index].style.display = 'none';
        }
    });
});
