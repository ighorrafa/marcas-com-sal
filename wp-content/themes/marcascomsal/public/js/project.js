/*
 * Project CPT single functions
 */

(function() {

    // Start initial events
    var initEvents = function() {

        if ( document.querySelectorAll('.swiper-cover .swiper-slide').length > 1 ) {

            new Swiper('.swiper-cover', {
                autoHeight: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

        }

        if ( document.querySelectorAll('.swiper-full').length ) {

            document.querySelectorAll('.swiper-full').forEach( el_swiper => {
                
                if ( el_swiper.querySelectorAll('.swiper-slide').length > 1 ) {

                    new Swiper( el_swiper , {
                        autoHeight: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                    
                }

            });

        }

        if ( document.querySelectorAll('.swiper-cols').length ) {

            document.querySelectorAll('.swiper-cols').forEach( el_swiper => {
                
                if ( el_swiper.querySelectorAll('.swiper-slide').length > 1 ) {

                    new Swiper( el_swiper, {
                        
                        autoHeight: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },

                        breakpoints: {
                          
                            // when window width is >= 320px
                          320: {
                            slidesPerView: 1.2,
                            spaceBetween: 16
                          },

                          
                          // when window width is >= 640px
                          1024: {
                            slidesPerView: 3,
                            spaceBetween: 28
                          }
                        }
                    });
                    
                }

            });

        }

    }; // var initEvents = function() {

    document.addEventListener('DOMContentLoaded', function() {
        initEvents();
    });

})();