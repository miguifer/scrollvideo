# Scroll Video

A WordPress plugin that creates scroll-driven video animations using GSAP ScrollTrigger.

## Features

- **Custom Post Type** — Each scroll video is managed as a separate entry.
- **Unique Shortcodes** — Every scroll video generates `[scrollvideo id="123"]`.
- **GSAP ScrollTrigger** — Bundled locally (v3.12.5).
- **Configurable** — Scroll height, scrub speed, pin, start/end triggers.
- **Media Library** — Upload or select videos directly.
- **Lazy Loading** — Assets enqueued only when shortcode is present.

## Installation

1. Upload the `scrollvideo` folder to `/wp-content/plugins/`.
2. Activate in **Plugins**.
3. Go to **Scroll Video → Add New**.

## Usage

1. Create a new Scroll Video from the admin panel.
2. Set the video URL and configure ScrollTrigger options.
3. Publish and copy the shortcode.
4. Paste `[scrollvideo id="123"]` anywhere on your site.

## Third-Party Libraries

GSAP & ScrollTrigger v3.12.5 are bundled locally in `vendor/gsap/`. Unminified source: [github.com/greensock/GSAP](https://github.com/greensock/GSAP)

- [GSAP License](https://gsap.com/community/standard-license/)

## Author

miguifer
