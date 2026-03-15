(function () {
    'use strict';

    if ( typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' ) {
        return;
    }

    gsap.registerPlugin( ScrollTrigger );

    document.querySelectorAll( '.sv-wrapper' ).forEach( function ( wrapper ) {
        var video = wrapper.querySelector( 'video' );
        if ( ! video ) return;

        var scrub  = parseFloat( wrapper.dataset.svScrub )  || 0.3;
        var pin    = wrapper.dataset.svPin !== '0';
        var start  = wrapper.dataset.svStart || 'top top';
        var end    = wrapper.dataset.svEnd   || 'bottom bottom';

        function init() {
            gsap.to( video, {
                currentTime: video.duration,
                ease: 'none',
                scrollTrigger: {
                    trigger: wrapper,
                    start: start,
                    end: end,
                    scrub: scrub,
                    pin: pin,
                },
            });
        }

        if ( video.readyState >= 1 ) {
            init();
        } else {
            video.addEventListener( 'loadedmetadata', init );
        }
    });
})();
