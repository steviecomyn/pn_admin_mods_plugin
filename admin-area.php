<?php

// Check if this feature is enabled.
if(get_option( 'pn_login_style_admin_area_toggle') === 'active')
    {
        // This injects PageNorth's Admin area CSS customisations (+ FontAwesome 4.7).
        add_action('admin_head', 'pn_admin_area_customisations');
        // This changes the footer message on the admin area.
        add_filter('admin_footer_text', 'pn_remove_footer_admin');
        // Modifies the nodes featured in the WP Admin bar.
        add_action('admin_bar_menu', 'pn_modify_toolbar_items', 999);
        // Add's the custom logo to the admin-bar.
        add_action( 'admin_bar_menu', 'pn_add_custom_logo_to_admin_bar', 15 );
    }
else
    {
        // These modifications are turned off, so do nothing.
        return;
    }


// This loads in our customisations for the admin/backend area.
function pn_admin_area_customisations()
    {
        echo '<link rel="stylesheet" href="'.  plugin_dir_url( __FILE__ ) . 'assets/css/adminarea.css">';

        echo "<link rel=\"stylesheet\" href=\"".FONTAWESOME_CDN."\">";
    }

// Admin footer modification
function pn_remove_footer_admin()
    {
        echo '<span id="footer-thankyou">Designed and Powered by <a href="http://www.pagenorth.co.uk" target="_blank">PageNorth ltd</a></span>';
    }

// Modifies the nodes featured in the WP Admin bar.
function pn_modify_toolbar_items($wp_adminbar)
    {
        $wp_adminbar->remove_node('wp-logo');
        $wp_adminbar->remove_node('comments');
        $wp_adminbar->remove_node('updates');
    }

// Add's the custom logo to the admin-bar.
function pn_add_custom_logo_to_admin_bar( $meta = TRUE )
    {
        // Pull in the site url.
        $site_url = site_url();

        $custom_logo_url = plugin_dir_url( __FILE__ ).'assets/img/pn-delta.svg';

        global $wp_admin_bar;  
            if ( !is_user_logged_in() ) { return; }
            if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }

        // Adds the custom logo to the wp_admin_bar.
        $wp_admin_bar->add_menu( array(
            'id' => 'pn_custom_logo',
            'title' => '<img src="'.$custom_logo_url.'" width="25" height="25" id="wpadminbar-logo" style="width: 20px; height: 20px; margin-top: 6px; margin-left: auto; margin-right: auto;"/>',
            'href' => $site_url,
            'meta'  => array( 'target' => '_blank' ) )
        );
    }