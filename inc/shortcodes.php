<?php

add_shortcode("wp_auth_login", "wp_auth_login_handler");
add_shortcode("wp_auth_register", "wp_auth_register_handler");

function wp_auth_login_handler ($atts, $content = null) {
    ob_start();
    include WP_AUTH_TPL."frontend/login.php";
    $content = ob_get_clean(); // store buffered output content.

    return $content; // Return the content.
}
function wp_auth_register_handler ($atts, $content = null) {
    ob_start();
    include WP_AUTH_TPL."frontend/register.php";
    $content = ob_get_clean(); // store buffered output content.

    return $content; // Return the content.
}