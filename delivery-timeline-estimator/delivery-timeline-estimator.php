<?php
/**
 * Plugin Name:       Delivery Timeline Estimator
 * Plugin URI:        https://example.com/plugins/delivery-timeline-estimator/
 * Description:       Estimates and displays a shipping timeline based on a daily cut-off time.
 * Version:           1.0.0
 * Author:            Jules AI Assistant
 * Author URI:        https://example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       delivery-timeline-estimator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-delivery-timeline-estimator-core.php';

/**
 * Shortcode callback to display the estimated shipping day.
 *
 * @since 1.0.0
 * @return string HTML output for the shortcode.
 */
function display_estimated_shipping_day_shortcode() {
    $shipping_day_string = Delivery_Timeline_Estimator_Core::get_estimated_shipping_day_string();

    // Sanitize the output just in case, though our function returns safe strings.
    $shipping_day_string = esc_html( $shipping_day_string );

    $message = sprintf(
        // Translators: %s will be replaced by "today" or "tomorrow".
        __( 'Order by 5:00 PM to ship: %s.', 'delivery-timeline-estimator' ),
        $shipping_day_string
    );

    return "<span class=\"estimated-shipping-day\">" . $message . "</span>";
}

/**
 * Enqueues front-end stylesheets.
 *
 * @since 1.0.0
 */
function delivery_timeline_estimator_enqueue_styles() {
    wp_enqueue_style(
        'delivery-timeline-estimator-frontend', // Handle
        plugins_url( 'assets/css/delivery-timeline-estimator-frontend.css', __FILE__ ), // Path to CSS file
        array(), // Dependencies
        '1.0.0' // Version
    );
}
add_action( 'wp_enqueue_scripts', 'delivery_timeline_estimator_enqueue_styles' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_delivery_timeline_estimator() {

    // $plugin = new Delivery_Timeline_Estimator();
    // $plugin->run();
    add_shortcode( 'estimated_shipping_day', 'display_estimated_shipping_day_shortcode' );

}
run_delivery_timeline_estimator();
?>
