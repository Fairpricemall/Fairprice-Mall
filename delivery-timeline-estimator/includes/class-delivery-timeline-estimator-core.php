<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Delivery_Timeline_Estimator_Core {

    /**
     * Calculates the estimated shipping day string based on a 5 PM cut-off.
     *
     * @since 1.0.0
     * @return string "today" or "tomorrow".
     */
    public static function get_estimated_shipping_day_string() {
        // Get the WordPress timezone
        $timezone = wp_timezone(); // WP 5.3+
        if ( ! $timezone ) {
            // Fallback for older WordPress versions or if timezone is not set
            // get_option( 'timezone_string' ) will return an empty string if 'gmt_offset' is used.
            // get_option( 'gmt_offset' ) is a float, e.g. -7.5
            // A correct DateTimeZone string can be like 'America/Los_Angeles' or 'UTC' or 'GMT+5'
            $timezone_string = get_option( 'timezone_string' );
            if ( ! empty( $timezone_string ) ) {
                $timezone = new DateTimeZone( $timezone_string );
            } else {
                // Fallback to UTC if no timezone string is set
                $timezone = new DateTimeZone( 'UTC' );
            }
        }

        // Get current time in WordPress timezone
        $now = new DateTime( 'now', $timezone );
        $current_hour = (int) $now->format( 'H' ); // 24-hour format

        // Define cut-off hour (5 PM = 17)
        $cutoff_hour = 17;

        if ( $current_hour < $cutoff_hour ) {
            return __( 'today', 'delivery-timeline-estimator' );
        } else {
            return __( 'tomorrow', 'delivery-timeline-estimator' );
        }
    }
}
?>
