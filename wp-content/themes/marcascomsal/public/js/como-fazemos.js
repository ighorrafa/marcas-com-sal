/*
 *  Como fazemos template functions
 */

(function () {
  // Start initial events
  var initEvents = function () {
    new Swiper(".swiper-phrases", {
      autoHeight: true,
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },

      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1,
          spaceBetween: 16,
        },

        // when window width is >= 1024px
        1024: {
          slidesPerView: 3,
          spaceBetween: 28,
          centeredSlides: true,
        },
      },
    });
  }; // var initEvents = function() {

  document.addEventListener("DOMContentLoaded", function () {
    initEvents();
  });
})();
