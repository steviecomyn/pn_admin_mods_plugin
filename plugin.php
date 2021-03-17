<?php
/*
Plugin Name:	0_PageNorth - Login screen/Admin area Customisation
Plugin URI:		https://www.pagenorth.co.uk
Description:	Adds customisations to the Login screen and admin area.
Version:		2.0
Author:			PageNorth ltd
Author URI:		https://www.pagenorth.co.uk
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

//============================================================================================================ INCLUDES //

// This code adds in the settings(constants).
include('assets/constants.php');
// This brings in the settings page code.
include('settings-page.php');
// This brings in the login screen customisation code.
include('login-screen.php');
// This brings in the admin area customisation code.
include('admin-area.php');
// This includes the PageNorth Widget code.
include('widget.php');

//============================================================================================================ WP_HOOKS //