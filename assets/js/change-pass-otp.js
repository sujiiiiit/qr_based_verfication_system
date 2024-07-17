$(document).ready(function () {
    $("#otpcode").on("keyup", function (e) {
      if ($(this).val().length === 6) {
        var otpcode = $("#otpcode").val();
        var otpforminputs = $("#otpform");
        var empty = false;
        otpforminputs.each(function () {
          if (!$(this).val()) {
            $(this).addClass("error");
            empty = true;
            $(this).focus();
            return false;
          } else {
            $(this).removeClass("error");
          }
        });
        if (empty) {
          return;
        }
        var formData = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "../changepassword/otpverify.php",
          data: formData,
          success: function (response) {
            if (response === "otp-error") {
              $("#otpcode").addClass("error");
              $(".otpplaceholder").text("Invalid Code");
              $("#email").focus();
            } else if (response === "newpass") {
                $('.tab2').removeClass('active');
                $('.tab3').addClass('active');
                $("#password").focus();
            } else {
              alert(response);
            }
          },
        });
      }
    });
  
    $("#otpcode").on("keypress", function (e) {
      if (!$.isNumeric(e.key) || e.key == " " || $(this).val().length >= 6) {
        return false;
      }
    });
  
    $("#email").on("input", function () {
      $(".wrongemail").html($(this).val());
    });
  });
  