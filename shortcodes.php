<?php

function pn_add_stylesheet_to_head()
    {
        echo '<link href="' . plugin_dir_url( __FILE__ ) . 'assets/css/shortcodes.css" rel="stylesheet" type="text/css">';
    }
// Inserts site-wide frontend css.
add_action( 'wp_head', 'pn_add_stylesheet_to_head' );

function pn_return_dark_pn_link()
    {
        echo '<a href="https://pagenorth.co.uk" class="powered_by_pn pn_link_dark" target="_blank">Designed and Powered by PageNorth<img src="' . plugin_dir_url( __FILE__ ).'assets/img/pn-delta.svg"></a>';
    }
function pn_return_light_pn_link()
    {
        echo '<a href="https://pagenorth.co.uk" class="powered_by_pn pn_link_light" target="_blank">Designed and Powered by PageNorth<img src="' . plugin_dir_url( __FILE__ ).'assets/img/pn-delta.svg"></a>';
    }
// Handles the PN Link Shortcode.
add_shortcode('powered_by_pn_light', 'pn_return_light_pn_link');
add_shortcode('powered_by_pn_dark', 'pn_return_dark_pn_link');