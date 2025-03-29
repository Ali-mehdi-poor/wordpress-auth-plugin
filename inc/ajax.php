<?php

add_action("wp_ajax_nopriv_wp_auth_login", "wp_auth_ajax_login_handler");
add_action("wp_ajax_nopriv_wp_auth_register", "wp_auth_ajax_register_handler");

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

function wp_auth_ajax_register_handler()
{

   $user_first_name = sanitize_text_field($_POST["user_first_name"]);
   $user_last_name = sanitize_text_field($_POST["user_last_name"]);
   $user_email = sanitize_text_field($_POST["user_email"]);
   $user_password = sanitize_text_field($_POST["user_password"]);

   $validation_result = wp_auth_validation_register(
      $user_first_name,
      $user_last_name,
      $user_email,
      $user_password
   );

   if (!$validation_result["is_valid"]) {
      wp_send_json([
         "success" => false,
         "message" => $validation_result["message"]
      ], 403);
   } else {
      $user_email_parts = explode("@", $user_email);
      $new_user = wp_insert_user([
         "user_login" => apply_filters("pre_user_login", $user_email_parts[0] . rand(1000, 9999)),
         "user_pass" => apply_filters("pre_user_pass", $user_password),
         "user_email" => apply_filters("pre_user_email", $user_email),
         "first_name" => apply_filters("pre_user_first_name", $user_first_name),
         "last_name" => apply_filters("pre_user_last_name", $user_last_name),
         "display_name" => apply_filters("pre_user_display_name", "{$user_first_name} {$user_last_name}"),
      ]);

      if (is_wp_error($new_user)) {
         wp_send_json([
            "success" => false,
            "message" => "عملیات با خطا مواجه شد دوباره امتحان کنید!"
         ], 500);
      }else{
         wp_send_json([
            "success" => true,
            "message" => $validation_result["message"]
         ], 200);
      }
   }
}
