<?php

// Check if this feature is enabled.
if(get_option( 'pn_login_style_login_toggle') === 'active')
    {
        // This injects PageNorth's CSS customisations.
        add_action('login_head', 'pn_login_stylesheet');
        // This injects PageNorth's JavaScript customisations.
        add_action('login_footer', 'pn_login_javascript');
        // This changes the default destination of the H1 Logo link, from wordpress.org, to the site it's hosted on.
        add_filter( 'login_headerurl', 'pn_login_custom_h1_url' );
        // This adds the paths of the images given via the settings page into the login page css.
        add_action( 'login_enqueue_scripts', 'apply_user_defined_styles' );
    }
else
{
    // These modifications are turned off, so do nothing.
    return;
}

// This injects PageNorth's CSS customisations.
function pn_login_stylesheet()
    {
        echo "<link rel=\"stylesheet\" href=\"" . plugin_dir_url( __FILE__ ) . "assets/css/loginscreen.css\">";
    }

// This injects PageNorth's JavaScript customisations.
function pn_login_javascript()
    {
        echo "<script src=\"" . plugin_dir_url( __FILE__ ) . "assets/js/pn_login_scripts.js\"></script>";
    }

// This changes the default destination of the H1 Logo link, from wordpress.org, to the site it's hosted on.
function pn_login_custom_h1_url($url)
    {
        return site_url();
    }

// This adds the paths of the images given via the settings page into the login page css.
function apply_user_defined_styles()
    {
        ?>
        <style type="text/css">
            :root {
                --logo_url: url(<?php echo get_option( 'pn_login_logo_url' ); ?>);
                --bg_url: url(<?php echo get_option( 'pn_login_background_url' ); ?>);
                --button_color: <?php echo get_option( 'pn_login_button_color' ); ?>;
                --button_highlight_color: <?php echo get_option( 'pn_login_button_hover_color' ); ?>;
            }
        </style>
        <?php
    }