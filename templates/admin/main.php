<div class="wrap">
    <h1> تنظیمات پلاگین احراز هویت </h1>
    <form method="post">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">فعال بودن بخش ورود</th>
                <td> <input
                        type="checkbox"
                        name="is_login_active"
                        <?php echo $wp_auth_options["is_login_active"] ? "checked" : ""; ?>></td>
            </tr>

            <tr valign="top">
                <th scope="row">فعال بودن بخش ثبت نام</th>
                <td> <input
                        type="checkbox"
                        name="is_register_active"
                        <?php echo $wp_auth_options["is_register_active"] ? "checked" : ""; ?>></td>
            </tr>

            <tr valign="top">
                <th scope="row">عنوان فرم ورود</th>
                <td> <input
                        type="text"
                        name="login_form_title"
                        value="<?php echo isset($wp_auth_options["login_form_title"]) ?
                                    $wp_auth_options["login_form_title"] :
                                    ""; ?>"></td>
            </tr>

            <tr valign="top">
                <th scope="row">عنوان فرم ثبت نام</th>
                <td> <input
                        type="text"
                        name="register_form_title"
                        value="<?php echo isset($wp_auth_options["register_form_title"]) ?
                                    $wp_auth_options["register_form_title"] :
                                    ""; ?>"></td>
            </tr>

            <tr valign="top">
                <td>
                    <button class="button button-primary" type="submit" name="save_settings">ذخیره سازی</button>
                </td>
            </tr>
        </table>
    </form>
</div>