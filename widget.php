<?php

// Check if this feature is enabled.
if(get_option( 'pn_login_widget_toggle') === 'active')
    {
        // Registers the PageNorth Widget.
		add_action('wp_dashboard_setup', 'pn_register_widget');

		// Removes that welcome panel from the dashboard.
		remove_action('welcome_panel', 'wp_welcome_panel');
    }
else
    {
        // These modifications are turned off, so do nothing.
        return;
    }

// Registers the PageNorth Widget.
function pn_register_widget()
    {
        global $wp_meta_boxes;
        
        wp_add_dashboard_widget('pagenorth_news_feed', 'PageNorth Help Widget', 'pn_rss_feed_widget_render');
    }

function pn_rss_feed_widget_render()
    {
	
        // Get RSS Feed(s)
        include_once(ABSPATH . WPINC . '/feed.php');
    
        // Define the URL of the feed to display.
        $feed = PAGENORTH_RSS_FEED;
        
        // Get a SimplePie feed object from the specified feed source.
        $rss = fetch_feed( $feed );
        
            if (!is_wp_error( $rss )) // Checks that the object is created correctly 
                {
                    // Figure out how many total items there are, and choose a limit 
                    $maxitems = $rss->get_item_quantity( 4 ); 
    
                    // Build an array of all the items, starting with element 0 (first element).
                    $rss_items = $rss->get_items( 0, $maxitems );
                }
        
            // Display the container
            echo '<div class="pn-rss-widget">';
            echo '<div class="pn-rss-header" style="background-image: url('. plugin_dir_url( __FILE__ ) . 'assets/img/pagenorth-rss-header.svg);">
                    <div class="pn-rss-header-wrapper">
                        <a class="help-btn" href="'.PN_HELPDESK_URL.'" target="_blank">Get Help</a>
                        <p>Need a little help? Create a support ticket on our Help Desk, and a specialist will assist you.</p>
                        <img src="'. plugin_dir_url( __FILE__ ) . 'assets/img/pagenorth-recent-news.svg" alt="PageNorth Digital" style="width: 130px; height: auto; padding: 8px 0;">
                    </div>
                </div>';
            
            // Starts items listing within <ul> tag
            echo '<ul>';
            
            // Check items
            if ( $maxitems == 0 )
                {
                    echo '<li>'.__( 'No item', 'rc_mdm').'.</li>';
                }
            else 
                {
                    // Loop through each feed item and display each item as a hyperlink.
                    foreach ( $rss_items as $item )
                        {
                            // Get human date (comment if you want to use non human date)
                            $item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
                            
                            // Start displaying item content within a <li> tag
                            echo '<li>';
                            // create item link
                            echo '<a href="'.esc_url( $item->get_permalink() ).'" title="'.$item_date.'" target="_blank">';
                            // Get item title
                            echo esc_html( $item->get_title() );
                            echo '</a>';
                            // Display date
                            echo '<div class="rss-date"><i class="fa fa-calendar" aria-hidden="true" style="margin-right: 4px;"></i>'.$item_date.'</div>';
                            // Get item content
                            $content = $item->get_content();
                            // Shorten content
                            $content = wp_html_excerpt($content, 120) . '...';
                            // Display content
                            echo $content;
                            // End <li> tag
                            echo '</li>';
                        }
                }
            // End <ul> tag
            echo '</ul></div>';
    }