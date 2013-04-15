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
            add_action('init', array(&$this, 'remove_support'));
        }

        public function remove_support() {
            $types = $this->get_all_post_types();
            $supports = array('comments', 'trackbacks');
            foreach($types as $post_type) {
                foreach($supports as $feature) {
                    remove_post_type_support($post_type, $feature);
                }
            }
        }

        public function get_all_post_types() {
            return get_post_types( array(), 'names');
        }
    }

    new SilenceIsGolden();
