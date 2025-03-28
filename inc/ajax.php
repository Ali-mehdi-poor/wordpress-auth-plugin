<?php

add_action("wp_ajax_nopriv_wp_auth_login", "wp_auth_ajax_login_handler");

function wp_auth_ajax_login_handler() {
   $user_email = sanitize_text_field($_POST["user_email"]);
   $user_password = sanitize_text_field($_POST["user_password"]);
   var_dump($user_email);
   var_dump($user_password);
}