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
        $(".notif > .notif__content").text(res.message);
        $(".notif").removeClass("notif--error");
        $(".notif").addClass("notif--success");
        $(".notif > .notif__close_btn").on("click", (e) => {
          $(".notif").css({
            display: "none",
          });
        });

        setTimeout(() => {
          window.location.href = "/";
        }, 2000);
      },
      error: (error) => {
        if (error) {
          $(".notif > .notif__content").text(error.responseJSON.message);
          $(".notif").removeClass("notif--success");
          $(".notif").addClass("notif--error");
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
        $(".notif > .notif__content").text(res.message);
        $(".notif").removeClass("notif--error");
        $(".notif").addClass("notif--success");
        $(".notif > .notif__close_btn").on("click", (e) => {
          $(".notif").css({
            display: "none",
          });
        });

        setTimeout(() => {
          window.location.href = "/login";
        }, 2000);
      },
      error: (error) => {
        if (error) {
          $(".notif > .notif__content").text(error.responseJSON.message);
          $(".notif").removeClass("notif--success");
          $(".notif").addClass("notif--error");
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
