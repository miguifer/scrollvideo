(function () {
    'use strict';

    // Custom scroll-to-video logic
    document.querySelectorAll('.sv-wrapper').forEach(function (wrapper) {
        var video = wrapper.querySelector('video');
        if (!video) return;

        var scrollHeight = parseInt(wrapper.dataset.svHeight, 10) || 300;
        var scrub = parseFloat(wrapper.dataset.svScrub) || 0.3;
        // pin, start, end are ignored in this simple version

        function updateVideoOnScroll() {
            var rect = wrapper.getBoundingClientRect();
            var windowHeight = window.innerHeight || document.documentElement.clientHeight;
            var scrollStart = rect.top + window.pageYOffset - windowHeight;
            var scrollEnd = rect.top + window.pageYOffset + rect.height;
            var scrollPos = window.pageYOffset;
            var progress = (scrollPos - scrollStart) / (scrollEnd - scrollStart);
            progress = Math.max(0, Math.min(1, progress));
            if (video.duration) {
                video.currentTime = video.duration * progress;
            }
        }

        function onScrollOrResize() {
            updateVideoOnScroll();
        }

        function onLoadedMetadata() {
            updateVideoOnScroll();
        }

        window.addEventListener('scroll', onScrollOrResize);
        window.addEventListener('resize', onScrollOrResize);
        video.addEventListener('loadedmetadata', onLoadedMetadata);

        // Initial update
        if (video.readyState >= 1) {
            updateVideoOnScroll();
        }
    });
})();
