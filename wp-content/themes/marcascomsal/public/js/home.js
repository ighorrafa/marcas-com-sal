/*
 * Home functions
 */

(function () {
  // Start initial events
  var initEvents = function () {
    if (document.querySelectorAll(".swiper-cover .swiper-slide").length > 1) {
      new Swiper(".swiper-cover", {
        autoHeight: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          renderBullet: function (index, className) {
            if (index + 1 < 10) {
              numberIdx = "0" + (index + 1);
            } else {
              index + 1;
            }
            return '<span class="' + className + '">' + numberIdx + "</span>";
          },
        },
      });
    }

    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  }; // var initEvents = function() {

  document.addEventListener("DOMContentLoaded", function () {
    initEvents();
  });
})();
