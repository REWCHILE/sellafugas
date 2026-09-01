/**
 * SellafuGas® Entrance Animation Observer Engine
 * High-performance, lightweight IntersectionObserver for scroll-reveal animations
 */
(function () {
    'use strict';

    function initAnimationObserver() {
        if (!('IntersectionObserver' in window)) {
            var all = document.querySelectorAll('[data-animate], [data-stagger]');
            for (var i = 0; i < all.length; i++) {
                all[i].classList.add('is-visible');
            }
            return;
        }

        var observer = new IntersectionObserver(function(entries, obs) {
            for (var i = 0; i < entries.length; i++) {
                var entry = entries[i];
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            }
        }, {
            root: null,
            rootMargin: '100px 0px 100px 0px',
            threshold: 0.01
        });

        var elementsToAnimate = document.querySelectorAll('[data-animate]:not(.is-visible), [data-stagger]:not(.is-visible)');
        for (var j = 0; j < elementsToAnimate.length; j++) {
            observer.observe(elementsToAnimate[j]);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimationObserver, { once: true });
    } else {
        initAnimationObserver();
    }

    window.initSellafugasAnimations = initAnimationObserver;
    window.refreshAnimations = initAnimationObserver;
})();

