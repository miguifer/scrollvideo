(function () {
  "use strict";

  gsap.registerPlugin(ScrollTrigger);

  document.querySelectorAll(".sv-wrapper").forEach(function (wrapper) {
    var video = wrapper.querySelector("video");
    if (!video) return;

    function init() {
      var duration = video.duration;

      gsap.to(video, {
        currentTime: duration,
        ease: "none",
        scrollTrigger: {
          trigger: wrapper,
          start: "top top",
          end: "bottom bottom",
          scrub: 0.3,
          pin: true,
        },
      });
    }

    if (video.readyState >= 1) {
      init();
    } else {
      video.addEventListener("loadedmetadata", init);
    }
  });
})();
