<?php

add_action("wp_enqueue_scripts", "wp_auth_load_assets");

function wp_auth_load_assets() {

    // verify auth.css file for wordpress
    wp_register_style(
        "wp_auth_style",
        WP_AUTH_ASSETS."styles/auth.css",
        [],
        false
    );
    wp_enqueue_style("wp_auth_style");

    // verify auth.js file for wordpress
    wp_register_script(
        "wp_auth_script",
        WP_AUTH_ASSETS."js/auth.js",
        [
            "jquery"
        ],
        false
    );
    wp_enqueue_script("wp_auth_script");
}
