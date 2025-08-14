document.addEventListener('DOMContentLoaded', function () {
    if (typeof heroData === 'undefined') {
        console.error('heroData no está definido');
        return;
    }
    console.log('heroData cargado:', heroData);

    const slides = document.querySelectorAll('.hero-slide');

    slides.forEach((slide) => {
        let bgImage = slide.style.backgroundImage.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
        if (!bgImage || bgImage === 'none') {
            bgImage = heroData.themeUrl + '/assets/images/hero-default.jpg';
            slide.style.backgroundImage = `url('${bgImage}')`;
        }
    });

    new Swiper('.hero-slider', {
        loop: true,
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        autoplay: { delay: 5000 },
        effect: 'fade',
        fadeEffect: { crossFade: true },
    });
});