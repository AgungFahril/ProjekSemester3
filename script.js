// Ambil elemen ikon dan input password dari HTML
const togglePassword = document.querySelector('#togglePassword');
const passwordInput = document.querySelector('#password');

// Jalankan kode hanya jika kedua elemen ditemukan di halaman
if (togglePassword && passwordInput) {
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
}

// --- SCRIPT UNTUK MEMBUAT MENU NAVIGASI AKTIF SECARA OTOMATIS (VERSI FINAL) ---
document.addEventListener("DOMContentLoaded", function() {
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.nav-menu a');

    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        if (linkPage.toLowerCase() === currentPage.toLowerCase()) {
            link.parentElement.classList.add('active');
        }
        if (currentPage === '' && linkPage === 'index.html') {
            link.parentElement.classList.add('active');
        }
    });
});