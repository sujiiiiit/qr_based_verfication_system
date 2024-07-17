$(document).ready(function () {
  $("#otpcode").on("keyup", function (e) {
    if ($(this).val().length === 6) {
      var otpcode = $("#otpcode").val();
      var otpforminputs = $("#otp-form input");
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
        url: "../otpverify.php",
        data: formData,
        success: function (response) {
          if (response === "otp-error") {
            $("#otpcode").addClass("error");
            $(".otpplaceholder").text("Invalid Code");
            $("#email").focus();
          } else if (response === "success") {
            window.location.href = "../";
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
