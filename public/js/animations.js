/**
 * SellafuGas® Entrance Animation Observer Engine
 * High-performance, lightweight IntersectionObserver for scroll-reveal animations
 */

(function () {
    'use strict';

    // Prevent execution if user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        document.querySelectorAll('[data-animate], [data-stagger]').forEach(el => {
            el.classList.add('is-visible');
        });
        return;
    }

    let observer = null;

    function initAnimationObserver() {
        const elementsToAnimate = document.querySelectorAll('[data-animate]:not(.is-visible), [data-stagger]:not(.is-visible)');
        
        if (!elementsToAnimate.length) return;

        // If IntersectionObserver is supported
        if ('IntersectionObserver' in window) {
            if (observer) {
                observer.disconnect();
            }

            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -40px 0px',
                threshold: 0.08
            };

            observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        target.classList.add('is-visible');
                        obs.unobserve(target); // Unobserve once animated for zero overhead
                    }
                });
            }, observerOptions);

            // Check if element is already in viewport on initial load
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

            elementsToAnimate.forEach(el => {
                const rect = el.getBoundingClientRect();
                // If element is already in or near viewport above the fold
                if (rect.top <= windowHeight * 0.92 && rect.bottom >= 0) {
                    el.classList.add('is-visible');
                } else {
                    observer.observe(el);
                }
            });

        } else {
            // Fallback for older browsers
            elementsToAnimate.forEach(el => el.classList.add('is-visible'));
        }
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimationObserver);
    } else {
        initAnimationObserver();
    }

    // Expose global helper for dynamic Alpine.js or AJAX content
    window.initSellafugasAnimations = initAnimationObserver;
    window.refreshAnimations = initAnimationObserver;

    // Optional: re-check on orientation change or tab focus
    window.addEventListener('orientationchange', () => setTimeout(initAnimationObserver, 150));
})();
