// Initialize partners carousel using Swiper
// Runs after DOM is loaded

document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.partners-swiper', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.partners-next',
            prevEl: '.partners-prev',
        },
        slidesPerView: 2,
        spaceBetween: 30,
        breakpoints: {
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
        },
    });
});
