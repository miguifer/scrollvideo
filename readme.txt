=== Sleek Scroll Video ===
Contributors: miguifer
Tags: video, scroll, animation
Requires at least: 5.8
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create scroll-driven video animations with your own JavaScript and CSS. Each video is a custom post type with its own shortcode.

== Description ==

**Sleek Scroll Video** lets you create beautiful scroll-driven video playback animations on your WordPress site. As the user scrolls, the video plays forward; scroll back, and the video reverses.

Each Sleek Scroll Video is managed as its own custom post type entry, giving you full control over settings and generating a unique shortcode you can embed anywhere.

= Features =

* **Custom Post Type** — Each Sleek Scroll Video is a separate entry in the admin panel.
* **Unique Shortcodes** — Every Sleek Scroll Video generates its own shortcode (`[sleek-scroll-video id="123"]`) for easy embedding.
* **No external dependencies** — All animation logic is handled by the plugin's own JavaScript and CSS.
* **Configurable Settings** — Control scroll height, scrub speed, and scroll start/end points.
* **Media Library Integration** — Upload or select videos directly from the WordPress media library.
* **Performance First** — Assets are only loaded on pages where the shortcode is actually used.

= How It Works =

1. Go to **Sleek Scroll Video → Add New** in your admin panel.
2. Give it a title and configure the video URL plus animation settings.
3. Save/publish the post.

4. Copy the generated shortcode from the sidebar.
5. Paste the shortcode into any page, post, or widget.



== Installation ==

1. Upload the `sleek-scroll-video` folder to `/wp-content/plugins/`.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Navigate to **Sleek Scroll Video** in the admin sidebar to create your first Sleek Scroll Video.

== Frequently Asked Questions ==

= What video formats are supported? =

Any format supported by the browser's `<video>` element — typically MP4 (H.264), WebM, and Ogg.


= Can I use multiple scroll videos on the same page? =

Yes. Each shortcode instance creates an independent scroll video with its own settings.

= Are assets loaded on every page? =

No. Front-end scripts/styles are only enqueued on pages where the `[scrollvideo]` shortcode is present.

== Screenshots ==

1. The Sleek Scroll Video admin listing showing shortcodes for each entry.
2. The edit screen with video settings and shortcode display.
3. A Sleek Scroll Video in action on the front-end.

== Changelog ==

= 1.0.0 =
* Initial release.
* Custom post type for managing Sleek Scroll Videos.
* Unique shortcode per Sleek Scroll Video.
* Configurable scroll height, scrub speed, pin, start/end triggers.

* Media library integration for video uploads.

== Upgrade Notice ==

= 1.0.0 =
Initial release.
