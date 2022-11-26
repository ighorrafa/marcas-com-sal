/*
 * Global functions
 */

(function() {

    // Start initial events
    var initEvents = function() {

        document.querySelector('.btn-toggle-menu-mobile').addEventListener('click', toggle_menu_mobile);

        var mcs_CheckWindowSizeTimer;
        var sl_menu_item_created = false;
        function mcs_check_window_size() {
            document.documentElement.style.setProperty( '--site-body-h', window.innerHeight + 'px' );
            document.documentElement.style.setProperty( '--site-header-h', document.querySelector('.site-header').offsetHeight + 'px' );
        }

        window.onresize = function() {
            clearTimeout(mcs_CheckWindowSizeTimer);
            mcs_CheckWindowSizeTimer = setTimeout(mcs_check_window_size, 250);
        };
        mcs_check_window_size();

        let mcs_is_scrolling = false;
        document.addEventListener('scroll', (evt) => {
            mcs_is_scrolling = true;
            }, { capture: true, passive: true }
        );
        setInterval( function() {
            if ( mcs_is_scrolling ) {
                mcs_is_scrolling = false;
                if ( document.documentElement.scrollTop > getComputedStyle(document.documentElement).getPropertyValue('--site-header-h').replace('px', '') ) {
                    document.querySelector('html').classList.add('header-background');
                } else {
                    document.querySelector('html').classList.remove('header-background');
                }
            }
        }, 250 );


    }; // var initEvents = function() {

    const toggle_menu_mobile = function() {

        document.querySelector('html').classList.toggle('menu-mobile-open');
        document.querySelector('body').classList.toggle('menu-mobile-open');

    };

    document.addEventListener('DOMContentLoaded', function() {
        initEvents();
    });

})();