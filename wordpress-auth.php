<?php
/*
Plugin Name: wordpress authentication plugin
Plugin URI: https://github.com/Ali-mehdi-poor/wordpress-auth-plugin
Description: A simple authentication plugin to understand the structure of a WordPress plugin.
Author: Ali Mehdi poor
Author URI: https://github.com/Ali-mehdi-poor/
Domain Path: /
Version: 1.0.0
*/

define("WP_AUTH_DIR", plugin_dir_path(__FILE__));
define("WP_AUTH_URL", plugin_dir_url(__FILE__));

const WP_AUTH_INC = WP_AUTH_DIR . "/inc/";
const WP_AUTH_TPL = WP_AUTH_DIR . "/templates/";
const WP_AUTH_ASSETS = WP_AUTH_URL . "/assets/";

register_activation_hook(__FILE__, "wp_auth_active");
register_deactivation_hook(__FILE__, "wp_auth_deactive");

// includes for admin
if (is_admin()) {
    include WP_AUTH_INC."admin/menus.php";
}

// includes for front-end
include WP_AUTH_INC."functions.php";
include WP_AUTH_INC."shortcodes.php";
include WP_AUTH_INC."ajax.php";


function wp_auth_active()
{

}

function wp_auth_deactive()
{

}

