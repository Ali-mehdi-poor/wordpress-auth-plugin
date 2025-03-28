jQuery.noConflict();

jQuery(document).ready(function ($) {
  $("#loginForm").on("submit", (event) => {
    event.preventDefault();
    let user_email = $("#user_email").val();
    let user_password = $("#user_password").val();
    $(".notif").css({
      display: "flex",
    });
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      dataType: "json",
      type: "post",
      data: {
        action: "wp_auth_login",
        user_email,
        user_password,
      },
      success: (res) => {
        $(".notif").addClass("notif--success");
        $(".notif > .notif__content").text(res.message);
        $(".notif > .notif__close_btn").on("click", (e) => {
          $(".notif").css({
            display: "none",
          });
        });
      },
      error: (error) => {
        if (error) {
          $(".notif").addClass("notif--error");
          $(".notif > .notif__content").text(error.responseJSON.message);
          $(".notif > .notif__close_btn").on("click", (e) => {
            $(".notif").css({
              display: "none",
            });
          });
        }
      },
    });
  });

  $("#registerForm").on("submit", (event) => {
    event.preventDefault();

    let user_first_name = $("#user_first_name").val();
    let user_last_name = $("#user_last_name").val();
    let user_email = $("#user_email").val();
    let user_password = $("#user_password").val();

    $(".notif").css({
      display: "flex",
    });

    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      dataType: "json",
      type: "post",
      data: {
        action: "wp_auth_register",
        user_first_name,
        user_last_name,
        user_email,
        user_password,
      },
      success: (res) => {
        console.log("user register successfully!");

        $(".notif").addClass("notif--success");
        $(".notif > .notif__content").text(res.message);
        $(".notif > .notif__close_btn").on("click", (e) => {
          $(".notif").css({
            display: "none",
          });
        });
      },
      error: (error) => {
        if (error) {
          console.log(new Error("bad request!"));

          $(".notif").addClass("notif--error");
          $(".notif > .notif__content").text(error.responseJSON.message);
          $(".notif > .notif__close_btn").on("click", (e) => {
            $(".notif").css({
              display: "none",
            });
          });
        }
      },
    });
  });
});
