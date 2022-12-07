/*
 *  Como fazemos template functions
 */

(function () {
  // Start initial events
  var initEvents = function () {
    new Swiper(".swiper-phrases", {
      autoHeight: true,
      loop: true,
      centeredSlides: true,

      breakpoints: {
        // when window width is >= 120px
        120: {
          slidesPerView: 1.5,
          spaceBetween: 16,
        },

        // when window width is >= 1024px
        1024: {
          slidesPerView: 3,
          spaceBetween: 28,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        },
      },
    });
  }; // var initEvents = function() {

  document.addEventListener("DOMContentLoaded", function () {
    initEvents();
  });
})();
