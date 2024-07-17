$(document).ready(function () {
  $("#change-pass-form").submit(function (e) {
    e.preventDefault();

    var password = $("#password2").val();
    var forminputs = $("#change-pass-form input");
    var empty = false;

    forminputs.each(function () {
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
      url: "../changepassword/newpass.php",
      data: formData,
      success: function (response) {
        if (response === "changepass") {
          window.location.href = "../index.php";
        } else {
          alert(response);
        }
      },
    });
  });
});
