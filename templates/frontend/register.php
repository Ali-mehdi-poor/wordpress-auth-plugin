<div class="auth-wrapper">

    <div class="notif">
        <div class="notif__content"> </div>
        <div class="notif__close_btn">&times;</div>
    </div>
    
    <div class="register-wrapper" >
        <?php if (isset($wp_auth_options["register_form_title"])): ?>
            <h1> <?php $wp_auth_options["register_form_title"];  ?></h1>
        <?php endif; ?>
        <form action="" class="auth-form" id="registerForm" method="post">

            <div class="form-row">
                <label for="user_first_name">نام </label>
                <input
                    type="text"
                    name="user_first_name"
                    id="user_first_name"
                    placeholder="نام خود را وارد کنید ...">
            </div>

            <div class="form-row">
                <label for="user_last_name"> نام خانوادگی </label>
                <input
                    type="text"
                    name="user_last_name"
                    id="user_last_name"
                    placeholder="نام خانوادگی خود را وارد کنید ...">
            </div>

            <div class="form-row">
                <label for="user_email">ایمیل </label>
                <input
                    type="text"
                    name="user_email"
                    id="user_email"
                    placeholder="ایمیل خود را وارد کنید ...">
            </div>

            <div class="form-row">
                <label for="user_password">پسورد </label>
                <input
                    type="password"
                    name="user_password"
                    id="user_password"
                    placeholder="پسورد خود را تعیین کنید ...">
            </div>

            <div class="form-row">
                <button type="submit" name="registerBtn" id="registerBtn"> ثبت نام </button>
            </div>

        </form>
    </div>
</div>