/**
 * SellafuGas® Entrance Animation Observer Engine
 * High-performance, lightweight IntersectionObserver for scroll-reveal animations
 */
(function () {
    'use strict';

    function initAnimationObserver() {
        var elementsToAnimate = document.querySelectorAll('[data-animate]:not(.is-visible), [data-stagger]:not(.is-visible)');
        if (!elementsToAnimate.length) return;

        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '50px 0px 50px 0px',
                threshold: 0.05
            });

            elementsToAnimate.forEach(el => observer.observe(el));
        } else {
            elementsToAnimate.forEach(el => el.classList.add('is-visible'));
        }
    }

    // Safety fallback: reveal all hidden elements after 1.2s to prevent stuck invisible content
    function safetyRevealAll() {
        document.querySelectorAll('[data-animate], [data-stagger]').forEach(el => {
            el.classList.add('is-visible');
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimationObserver);
    } else {
        initAnimationObserver();
    }

    // Fallback timer
    setTimeout(safetyRevealAll, 1200);

    window.initSellafugasAnimations = initAnimationObserver;
    window.refreshAnimations = initAnimationObserver;
})();

