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
define("WP_AUTH_URI", plugin_dir_url(__FILE__));

const WP_AUTH_INC = WP_AUTH_DIR . "\\inc\\";
const WP_AUTH_TPL = WP_AUTH_DIR . "\\templates\\";
const WP_AUTH_ASSETS = WP_AUTH_DIR . "\\assets\\";

function wp_auth_active()
{

}

function wp_auth_deactive()
{

}

register_activation_hook(__FILE__, "wp_auth_active");
register_deactivation_hook(__FILE__, "wp_auth_deactive");
