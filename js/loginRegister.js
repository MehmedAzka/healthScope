function toggleForm(formToShow) {
    const loginForm = document.querySelector('.login');
    const signupForm = document.querySelector('.signup');

    if (formToShow === 'login') {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    } else if (formToShow === 'signup') {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    }
}

// Sembunyikan form registrasi dan tampilkan form login saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.login');
    const signupForm = document.querySelector('.signup');

    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
});