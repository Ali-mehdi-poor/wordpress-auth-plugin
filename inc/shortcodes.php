<?php

add_shortcode("wp_auth_login", "wp_auth_login_handler");
add_shortcode("wp_auth_register", "wp_auth_register_handler");

function wp_auth_login_handler ($atts, $content = null) {
    include WP_AUTH_TPL."frontend/login.php";
    return;
}
function wp_auth_register_handler ($atts, $content = null) {
    include WP_AUTH_TPL."frontend/register.php";
    return;
}