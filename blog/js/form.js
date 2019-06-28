const form = document.getElementById('form');

form.addEventListener('submit', event => {
    const { password, repeatPassword } = form;
    repeatPassword.setCustomValidity(password.value !== repeatPassword.value ? 'Passwords do not match.' : '');
    if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
});

