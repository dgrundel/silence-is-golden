<?php /*
    Plugin Name: Silence is Golden
    Plugin URI: http://webpresencepartners.com
    Description: Quiet down WordPress
    Version: 1
    Author: Daniel Grundel, Web Presence Partners
    Author URI: http://webpresencepartners.com
*/

    class SilenceIsGolden {
        public function __construct() {
            //bring the noise. Err, no, don't do that.
            register_activation_hook( __FILE__, array( &$this, 'end_of_discussion' ) );
        }

        public function end_of_discussion() {
            global $wpdb;

            //close discussion on all existing posts
            $wpdb->query("UPDATE $wpdb->posts SET comment_status = 'closed', ping_status = 'closed'");

            //default new posts to no discussion
            update_option('default_comment_status', 'closed');
            update_option('default_ping_status', 'closed');
        }
    }

    new SilenceIsGolden();
