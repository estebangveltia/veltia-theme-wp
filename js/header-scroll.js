document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.site-header');

    function adjustOffset() {
        const height = header ? header.offsetHeight : 0;
        document.body.style.paddingTop = height + 'px';
    }

    adjustOffset();
    window.addEventListener('resize', adjustOffset);

    window.addEventListener('scroll', function () {
        if (window.scrollY > 20) {
            if (!document.body.classList.contains('scrolled')) {
                document.body.classList.add('scrolled');
                adjustOffset();
            }
        } else {
            if (document.body.classList.contains('scrolled')) {
                document.body.classList.remove('scrolled');
                adjustOffset();
            }
        }
    });
});
