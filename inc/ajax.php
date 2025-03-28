<?php

add_action("wp_ajax_nopriv_wp_auth_login", "wp_auth_ajax_login_handler");

function wp_auth_ajax_login_handler() {
   $user_email = sanitize_text_field($_POST["user_email"]);
   $user_password = sanitize_text_field($_POST["user_password"]);
   $validation_result = wp_auth_validation_login($user_email, $user_password);
 
   if(!$validation_result["is_valid"]){
      wp_send_json([
         "success" => false,
         "message" => $validation_result["message"]
      ], 403);
   }else {
      wp_send_json([
         "success" => true,
         "message" => $validation_result["message"]
      ], 200);
   }
}