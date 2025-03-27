jQuery.noConflict();

jQuery(document).ready(function ($) {
    
    $("#loginForm").on("submit", (event) => {
        event.preventDefault();
        let userEmail = $("#userEmail").val();
        let userPassword = $("#userPassword").val();
        $.ajax({
            url: "wp-admin/admin-ajax.php",
            dataType: "json",
            type: "post",
            data: {
                action: "wp_auth_login",
                email: userEmail,
                password: userPassword
            },
            success: () => {
                console.log("user login successfully!");
                
            },
            error: (error) => {
                if (error) {
                    console.log(new Error("bad request!"))
                }
            }
        });
    });

    $("#registerForm").on("submit", (event) => {
        event.preventDefault();
        let userFullName = $("#userFullName").val();
        let userEmail = $("#userEmail").val();
        let userPassword = $("#userPassword").val();
        $.ajax({
            url: "wp-admin/admin-ajax.php",
            dataType: "json",
            type: "post",
            data: {
                action: "wp_auth_register",
                fullName: userFullName,
                email: userEmail,
                password: userPassword
            },
            success: () => {
                console.log("user register successfully!");
                
            },
            error: (error) => {
                if (error) {
                    console.log(new Error("bad request!"))
                }
            }
        });
    });


});