# Sleek Scroll Video

A WordPress plugin that creates scroll-driven video animations using GSAP ScrollTrigger.

## Features

- **Custom Post Type** — Each Sleek Scroll Video is managed as a separate entry.
- **Unique Shortcodes** — Every Sleek Scroll Video generates `[sleek-scroll-video id="123"]`.
- **GSAP ScrollTrigger** — Loaded via CDN (v3.12.5).
- **Configurable** — Scroll height, scrub speed, pin, start/end triggers.
- **Media Library** — Upload or select videos directly.
- **Lazy Loading** — Assets enqueued only when shortcode is present.

## Installation

1. Upload the `sleek-scroll-video` folder to `/wp-content/plugins/`.
2. Activate in **Plugins**.
3. Go to **Sleek Scroll Video → Add New**.

## Usage

1. Create a new Sleek Scroll Video from the admin panel.
2. Set the video URL and configure ScrollTrigger options.
3. Publish and copy the shortcode.
4. Paste `[sleek-scroll-video id="123"]` anywhere on your site.

## Third-Party Libraries

GSAP & ScrollTrigger v3.12.5 are loaded via CDN. See: [GSAP CDN](https://cdnjs.com/libraries/gsap)

- [GSAP License](https://gsap.com/community/standard-license/)

## Author

miguifer
