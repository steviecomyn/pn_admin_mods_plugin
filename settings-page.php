<?php

/*
 * @url	https://rudrastyh.com/wordpress/creating-options-pages.html
 */

add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );
// Ensures the wp-color-picker scripts have been loaded before my js.
function wp_enqueue_color_picker( $hook_suffix )
    {
        wp_enqueue_script( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker-script-handle', plugin_dir_url(__FILE__) . 'assets/js/pn_admin_scripts.js', array( 'wp-color-picker' ), false, true );
    }


add_action( 'admin_menu', 'pn_login_settings_page' );
// Initiate the settings page.
function pn_login_settings_page()
	{
		// Creates the settings page.
		add_options_page(
			'PageNorth - Login/Admin Customisations', // page <title>Title</title>
			'PN - Login/Admin', // menu link text
			'manage_options', // capability to access the page
			'pn-login-settings-page', // page URL slug
			'pn_login_settings_init', // callback function with content
			2 // priority
		);

	}

function pn_login_settings_init()
	{
		// This sets up the settings form.
		echo '<div class="wrap">
		<div style="display: flex; align-content: center; margin-top: 2rem">
		<img src="'.plugin_dir_url( __FILE__ ).'assets/img/pn-delta.svg" width="28" height="28" style="margin-right: 10px;">
		<h1 style="display: inline-block; padding: 0; margin-right: 20px;">PageNorth - Login & Admin Area Customisations</h1></div><br>';

		echo '<form method="post" action="options.php">';

			settings_fields( 'pn_login_settings' ); // settings group name
			do_settings_sections( 'pn-login-settings-page' ); // just a page slug
			submit_button();

		echo '</form></div>';

	}


add_action( 'admin_init',  'pn_login_register_setting' );
// Here we initiate the setting fields.
function pn_login_register_setting()
	{
		// Define Login Settings //======================================================================================================= LOGIN SETTINGS.
		add_settings_section(
			'pn_login_login_settings', // section ID
			'Login Screen Customisations', // title (if needed)
			'', // callback function (if needed)
			'pn-login-settings-page' // page slug
		);
		
		// Style Login Toggle
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_style_login_toggle' // option name
		);
		add_settings_field(
			'pn_login_style_login_toggle', // UID
			'Enable/Disable Login Screen Customisations', // Label
			'pn_login_style_login_toggle_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_login_settings', // section ID
			array( 
				'label_for' => 'pn_login_style_login_toggle',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Custom Login Logo
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_logo_url' // option name
		);
		add_settings_field(
			'pn_login_logo_url', // UID
			'Custom Logo URL', // Label
			'pn_login_logo_url_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_login_settings', // section ID
			array( 
				'label_for' => 'pn_login_logo_url',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Custom Login Background
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_background_url' // option name
		);
		add_settings_field(
			'pn_login_background_url', // UID
			'Custom Background URL', // Label
			'pn_login_background_url_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_login_settings', // section ID
			array( 
				'label_for' => 'pn_login_background_url',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Custom Login Button Color
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_button_color' // option name
		);
		add_settings_field(
			'pn_login_button_color', // UID
			'Custom Button Colour', // Label
			'pn_login_button_color_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_login_settings', // section ID
			array( 
				'label_for' => 'pn_login_button_color',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Custom Login Button Hover Color
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_button_hover_color' // option name
		);
		add_settings_field(
			'pn_login_button_hover_color', // UID
			'Custom Button Hover Colour', // Label
			'pn_login_button_hover_color_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_login_settings', // section ID
			array( 
				'label_for' => 'pn_login_button_hover_color',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Define Admin Area Settings //================================================================================================== ADMIN AREA SETTINGS.
		add_settings_section(
			'pn_login_admin_area_settings', // section ID
			'Admin Area Customisations', // title (if needed)
			'', // callback function (if needed)
			'pn-login-settings-page' // page slug
		);
		
		// Style Admin Area Toggle
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_style_admin_area_toggle' // option name
		);
		add_settings_field(
			'pn_login_style_admin_area_toggle', // UID
			'Enable/Disable Admin Area Customisations', // Label
			'pn_login_style_admin_area_toggle_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_admin_area_settings', // section ID
			array( 
				'label_for' => 'pn_login_style_admin_area_toggle',
				'class' => 'pn-login-class', // for <tr> element
			)
		);

		// Style Admin Area Toggle
		register_setting(
			'pn_login_settings', // settings group name
			'pn_login_widget_toggle' // option name
		);
		add_settings_field(
			'pn_login_widget_toggle', // UID
			'Enable/Disable PageNorth Dashboard Widget', // Label
			'pn_login_widget_toggle_render', // function which prints the field
			'pn-login-settings-page', // page slug
			'pn_login_admin_area_settings', // section ID
			array( 
				'label_for' => 'pn_login_widget_toggle',
				'class' => 'pn-login-class', // for <tr> element
			)
		);


	}

//=============================================================================================================================================== SETTINGS FEILDS CODE (LOGINSCREEN)

// This renders the toggle switch to activate/deactive the login screen customisations.
function pn_login_style_login_toggle_render()
	{

		$option = get_option( 'pn_login_style_login_toggle', 'inactive');

		$active_checked = '';
        $inactive_checked = '';

        if($option === 'active')
            {
                $active_checked = 'checked';
				// Required to register new page being added.
				flush_rewrite_rules();

            }
        else
            {
                $inactive_checked = 'checked';
            }
		
	?>
			<input type="radio" id="pn_login_style_login_toggle" name="pn_login_style_login_toggle" value="active" <?php echo $active_checked; ?>>
			<label for="widget-on">Enabled</label><br>
			<input type="radio" id="pn_login_style_login_toggle" name="pn_login_style_login_toggle" value="inactive" <?php echo $inactive_checked; ?>>
			<label for="widget-off">Disabled</label><br>
			<p class="description">This Enables/Disables the login screen customisations.</p>
	<?php
		
	}

// Creates the UI for loginscreen logo image.
function pn_login_logo_url_render()
    {
        $default_url = plugin_dir_url( __FILE__ ).'assets/img/pn-delta.svg';

        ?>
        <input type='text' class="regular-text" id="pn_login_logo_url" name="pn_login_logo_url" value='<?php echo get_option( 'pn_login_logo_url', $default_url ); ?>'>
        <p class="description">Logo images should be 200px by 200px,<br>(Upload images to your <a href="/wp-admin/upload.php">Media Library</a>, then copy the URL here).</p>

        <?php
    }

// Creates the UI for loginscreen logo image.
function pn_login_background_url_render()
    {
        $default_url = plugin_dir_url( __FILE__ ).'assets/img/background.jpg';

        ?>
        <input type='text' class="regular-text" id="pn_login_background_url" name="pn_login_background_url" value='<?php echo get_option( 'pn_login_background_url', $default_url ); ?>'>
        <p class="description">Background images should be atleast 1200px wide.</p>
        <?php
    }

// Creates the UI for the button color
function pn_login_button_color_render()
    {
        $default_hex = '#34495e';
        ?>
        <input type='text' class="regular-text color-picker" id="pn_login_button_color" name="pn_login_button_color" value='<?php echo get_option( 'pn_login_button_color', $default_hex ); ?>'>
        <?php
    }

// Creates the UI for the button color
function pn_login_button_hover_color_render()
    {
        $default_hex = '#2c3e50';
        ?>
        <input type='text' class="regular-text color-picker" id="pn_login_button_hover_color" name="pn_login_button_hover_color" value='<?php echo get_option( 'pn_login_button_hover_color', $default_hex ); ?>'>
        <?php
    }

//=============================================================================================================================================== SETTINGS FEILDS CODE (ADMIN AREA)

// This renders the toggle switch to activate/deactive the first custom page.
function pn_login_style_admin_area_toggle_render()
	{

		$option = get_option( 'pn_login_style_admin_area_toggle', 'inactive');

		$active_checked = '';
        $inactive_checked = '';

        if($option === 'active')
            {
                $active_checked = 'checked';
				// Required to register new page being added.
				flush_rewrite_rules();

            }
        else
            {
                $inactive_checked = 'checked';
            }
		
	?>
			<input type="radio" id="pn_login_style_admin_area_toggle" name="pn_login_style_admin_area_toggle" value="active" <?php echo $active_checked; ?>>
			<label for="widget-on">Enabled</label><br>
			<input type="radio" id="pn_login_style_admin_area_toggle" name="pn_login_style_admin_area_toggle" value="inactive" <?php echo $inactive_checked; ?>>
			<label for="widget-off">Disabled</label><br>
			<p class="description">This Enables/Disables the admin area customisations.</p>
	<?php
		
	}

// This renders the toggle switch to activate/deactive the first custom page.
function pn_login_widget_toggle_render()
	{

		$option = get_option( 'pn_login_widget_toggle', 'inactive');

		$active_checked = '';
        $inactive_checked = '';

        if($option === 'active')
            {
                $active_checked = 'checked';
				// Required to register new page being added.
				flush_rewrite_rules();

            }
        else
            {
                $inactive_checked = 'checked';
            }
		
	?>
			<input type="radio" id="pn_login_widget_toggle" name="pn_login_widget_toggle" value="active" <?php echo $active_checked; ?>>
			<label for="widget-on">Enabled</label><br>
			<input type="radio" id="pn_login_widget_toggle" name="pn_login_widget_toggle" value="inactive" <?php echo $inactive_checked; ?>>
			<label for="widget-off">Disabled</label><br>
			<p class="description">This Enables/Disables the PageNorth dashboard widget.</p>
	<?php
		
	}