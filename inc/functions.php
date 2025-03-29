<?php

add_action("wp_enqueue_scripts", "wp_auth_load_assets");

function wp_auth_load_assets()
{

    // verify auth.css file for wordpress
    wp_register_style(
        "wp_auth_style",
        WP_AUTH_ASSETS . "styles/auth.css",
        [],
        time()
    );
    wp_enqueue_style("wp_auth_style");

    // verify auth.js file for wordpress
    wp_register_script(
        "wp_auth_script",
        WP_AUTH_ASSETS . "js/auth.js",
        [
            "jquery"
        ],
        time()
    );
    wp_enqueue_script("wp_auth_script");
}

function wp_auth_validation_login($email, $password)
{

    $response = [
        "is_valid" => false,
        "message" => null
    ];
    
    // if you want more filters for validationyou can define another
    // condition for this function
    
    if (empty($email)) {
        $response["message"] = "ایمیل نباید خالی باشد.";
        return $response;
    }

    if (empty($password)) {
        $response["message"] = "پسورد نباید خالی باشد.";
        return $response;
    }

    // first way to validate email

    if (!is_email($email)) {
        $response["message"] = "ایمیل معتبر نمی باشد.";
        return $response;
    }

    // second way to validate email

    /* $pattern_email = "/^(\w)+\@(\w{3,6})\.(com)$/";
    $result = (bool) preg_match($pattern_email, $email);
    $response["is_valid"] = $result;
    if (!$result) {
        $response["message"] = "ایمیل معتبر نمی باشد.";
    }else {
        $response["message"] = "عملیات موفقیت آمیز بود.";
    } */

    $response["message"] = "عملیات موفقیت آمیز بود.";
    $response["is_valid"] = true;
    return $response;

}

function wp_auth_validation_register($user_first_name, $user_last_name, $user_email, $user_password)
{
    $response = [
        "is_valid" => false,
        "message" => null
    ];

    // if you want more filters for validationyou can define another
    // condition for this function
    if (empty($user_first_name)) {
        $response["message"] = "نام نباید خالی باشد.";
        return $response;
    }

    if (empty($user_last_name)) {
        $response["message"] = "نام خانوادگی نباید خالی باشد.";
        return $response;
    }

    if (empty($user_email)) {
        $response["message"] = "ایمیل نباید خالی باشد.";
        return $response;
    }

    if (empty($user_password)) {
        $response["message"] = "پسورد نباید خالی باشد.";
        return $response;
    }

    if (!is_email($user_email)) {
        $response["message"] = "ایمیل معتبر نمیباشد.";
        return $response;
    }

    if (email_exists($user_email)) {
        $response["message"] = "ایمیل قبلا استفاده شده است!";
        return $response;
    }

    if (strlen($user_password) < 4 ) {
        $response["message"] = "پسورد باید بیشتر از 4 رقم باشد.";
        return $response;
    }

    $response["is_valid"] = true;
    $response["message"] = "کاربر با موفقعیت ثبت نام شد.";
    return $response;
}
