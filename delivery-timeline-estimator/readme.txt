=== Delivery Timeline Estimator ===
Contributors: julesai
Donate link: https://example.com/donate
Tags: delivery, shipping, timeline, estimate, cutoff, shortcode
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Estimates and displays a shipping timeline based on a daily cut-off time.

== Description ==

This plugin provides a shortcode, `[estimated_shipping_day]`, to display an estimated shipping day (e.g., "today" or "tomorrow") based on a 5:00 PM cut-off time (according to your WordPress timezone settings). This helps customers understand when their order is likely to ship.

== Installation ==

1. Upload the `delivery-timeline-estimator` folder to the `/wp-content/plugins/` directory. Alternatively, install the plugin by uploading the `delivery-timeline-estimator.zip` file through the 'Plugins' > 'Add New' > 'Upload Plugin' screen in your WordPress admin area.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode `[estimated_shipping_day]` on your product pages, posts, widgets, or other content areas where you want the shipping estimate to be displayed. For direct integration into your theme's template files, you can use: `<?php echo do_shortcode('[estimated_shipping_day]'); ?>`.

== Frequently Asked Questions ==

= How do I use the shortcode? =
Simply add the shortcode `[estimated_shipping_day]` to any page, post, widget, or directly into your theme's template files where you want the estimate to appear. For theme integration, you can use `<?php echo do_shortcode('[estimated_shipping_day]'); ?>` in your PHP template files.

= What does the output look like? =
It will display a message similar to "Order by 5:00 PM to ship: today." or "Order by 5:00 PM to ship: tomorrow." The specific word ("today" or "tomorrow") depends on the current time relative to the 5:00 PM cut-off in your WordPress site's configured timezone.

= Can I change the cut-off time? =
Currently, the cut-off time is fixed at 5:00 PM (based on your WordPress timezone setting). Future versions may include settings to customize this.

= Is the plugin compatible with caching? =
The output of this shortcode is dynamic as it changes based on the time of day. If you are using caching plugins (e.g., page caching), ensure that pages displaying this shortcode are either excluded from caching, have their cache refreshed frequently, or consider using JavaScript to load this dynamic information (note: JavaScript loading is not a feature of this current plugin version). This is important to avoid showing stale shipping estimates to your users.

== Screenshots ==
<!-- 1. A screenshot of the output on a product page. -->

== Changelog ==

= 1.0.0 =
* Initial release. Provides the `[estimated_shipping_day]` shortcode for displaying shipping estimates based on a 5 PM cut-off.

== Upgrade Notice ==

= 1.0.0 =
Initial release.
