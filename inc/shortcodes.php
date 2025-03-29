<?php

add_shortcode("wp_auth_login", "wp_auth_login_handler");
add_shortcode("wp_auth_register", "wp_auth_register_handler");

function wp_auth_login_handler ($atts, $content = null) {
    
    $wp_auth_options = get_option("wp_auth_options", []);

    if ( isset($wp_auth_options["is_login_active"]) && !$wp_auth_options["is_login_active"]) {
        return "<h2>در حال حاضر امکان ورود به سایت وجود ندارد ....</h2>";
    }
    ob_start();
    
    include WP_AUTH_TPL."frontend/login.php";
    $content = ob_get_clean(); // store buffered output content.

    return $content; // Return the content.
}
function wp_auth_register_handler ($atts, $content = null) {
    
    $wp_auth_options = get_option("wp_auth_options", []);
    
    if ( isset($wp_auth_options["is_register_active"]) && !$wp_auth_options["is_register_active"]) {
        return "<h2>در حال حاضر امکان ثبت نام در سایت وجود ندارد ....</h2>";
    }

    ob_start();
    include WP_AUTH_TPL."frontend/register.php";
    $content = ob_get_clean(); // store buffered output content.

    return $content; // Return the content.
}