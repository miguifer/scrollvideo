=== Scroll Video ===
Contributors: miguifer
Tags: video, scroll, animation, gsap, scrolltrigger
Requires at least: 5.8
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create scroll-driven video animations powered by GSAP ScrollTrigger. Each video is a custom post type with its own shortcode.

== Description ==

**Scroll Video** lets you create beautiful scroll-driven video playback animations on your WordPress site. As the user scrolls, the video plays forward; scroll back, and the video reverses.

Each scroll video is managed as its own custom post type entry, giving you full control over settings and generating a unique shortcode you can embed anywhere.

= Features =

* **Custom Post Type** — Each scroll video is a separate entry in the admin panel.
* **Unique Shortcodes** — Every scroll video generates its own shortcode (`[scrollvideo id="123"]`) for easy embedding.
* **GSAP ScrollTrigger** — Powered by the industry-leading GSAP animation library bundled locally.
* **Configurable Settings** — Control scroll height, scrub speed, pin behavior, and ScrollTrigger start/end points.
* **Media Library Integration** — Upload or select videos directly from the WordPress media library.
* **Performance First** — Assets are only loaded on pages where the shortcode is actually used.

= How It Works =

1. Go to **Scroll Video → Add New** in your admin panel.
2. Give it a title and configure the video URL plus animation settings.
3. Save/publish the post.
4. Copy the generated shortcode from the sidebar.
5. Paste the shortcode into any page, post, or widget.

= Third-Party Libraries =

This plugin includes the GSAP (GreenSock Animation Platform) library v3.12.5 to provide scroll-driven video playback. GSAP is developed by GreenSock Inc. The minified files are bundled locally inside the `vendor/gsap/` folder. The unminified source code is available at:

* **GSAP source:** [https://github.com/greensock/GSAP](https://github.com/greensock/GSAP)
* **GSAP on npm:** [https://www.npmjs.com/package/gsap](https://www.npmjs.com/package/gsap)
* **GreenSock website:** [https://gsap.com/](https://gsap.com/)
* **GSAP Standard License:** [https://gsap.com/community/standard-license/](https://gsap.com/community/standard-license/)

GSAP's Standard License ("No Charge") permits free use in products that are themselves free. This plugin is distributed under GPLv2 or later.

== Installation ==

1. Upload the `scrollvideo` folder to `/wp-content/plugins/`.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Navigate to **Scroll Video** in the admin sidebar to create your first scroll video.

== Frequently Asked Questions ==

= What video formats are supported? =

Any format supported by the browser's `<video>` element — typically MP4 (H.264), WebM, and Ogg.

= Do I need a GSAP license? =

No. GSAP's standard license permits free use on public websites. The library is bundled locally with this plugin.

= Can I use multiple scroll videos on the same page? =

Yes. Each shortcode instance creates an independent scroll video with its own settings.

= Are assets loaded on every page? =

No. GSAP and the front-end scripts/styles are only enqueued on pages where the `[scrollvideo]` shortcode is present.

== Screenshots ==

1. The Scroll Video admin listing showing shortcodes for each entry.
2. The edit screen with video settings and shortcode display.
3. A scroll video in action on the front-end.

== Changelog ==

= 1.0.0 =
* Initial release.
* Custom post type for managing scroll videos.
* Unique shortcode per scroll video.
* Configurable scroll height, scrub speed, pin, start/end triggers.
* GSAP & ScrollTrigger bundled locally.
* Media library integration for video uploads.

== Upgrade Notice ==

= 1.0.0 =
Initial release.
