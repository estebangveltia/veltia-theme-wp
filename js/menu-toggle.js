document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.main-nav');
    btn.addEventListener('click', () => {
        nav.classList.toggle('open');
    });
});
