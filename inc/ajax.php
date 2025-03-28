<?php

add_action("wp_ajax_nopriv_wp_auth_login", "wp_auth_ajax_login_handler");

function wp_auth_ajax_login_handler()
{
   $user_email = sanitize_text_field($_POST["user_email"]);
   $user_password = sanitize_text_field($_POST["user_password"]);
   $validation_result = wp_auth_validation_login($user_email, $user_password);

   if (!$validation_result["is_valid"]) {
      wp_send_json([
         "success" => false,
         "message" => $validation_result["message"]
      ], 403);
   } else {


      $user = wp_authenticate_email_password(null, $user_email, $user_password);

      if (is_wp_error($user)) {
         wp_send_json([
            "success" => false,
            "message" => "کاربری با این مشخصات وجود ندارد."
         ], 403);
      }
      $login_result = wp_signon([
         "user_login" => $user->user_login,
         "user_password" => $user_password,
         "remember" => false
      ]);
      if (is_wp_error($login_result)) {
         wp_send_json([
            "success" => false,
            "message" => "خطا رخ داد دوباره امتحان کنید."
         ], 403);
      }
      wp_send_json([
         "success" => true,
         "message" => $validation_result["message"]
      ], 200);
   }
}
