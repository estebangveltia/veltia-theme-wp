document.addEventListener('DOMContentLoaded', function () {
    function updateHeaderOnScroll() {
        if (window.scrollY > 20) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }

    updateHeaderOnScroll();
    window.addEventListener('scroll', updateHeaderOnScroll);
});
