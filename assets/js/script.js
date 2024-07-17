$(document).ready(function () {
  $(".form input").keyup(function () {
    $(this).removeClass("error");
  });
  $("#email").on("invalid", function () {
    $(this).addClass("error");
    $(".emailplaceholder").text("InvalidEmail");
    $(".spinner").removeClass("visible");
  });
  $("#email").on("keyup", function () {
    $(".emailplaceholder").text("Email (required)");
  });
  $("#show-hide-pass").on("change", function () {
    $("#password").attr("type", this.checked ? "text" : "password");
    $("#password2").attr("type", this.checked ? "text" : "password");
  });
});


$(document).ready(function () {
 
  $("#password").on("keyup", function () {
    $(".passwordplaceholder").text("Password");
  });
  $("#otpcode").on("keyup", function () {
    $(".otpplaceholder").text("Code");
  });

  $(".signbtn").click(function() {
    if ($("#form input").filter(function() { return !this.value; }).length == 0) {
        showSpinner();
    } else {
        // display an error message or do something else
    }
  });

  function showSpinner() {
    $(".spinner").addClass("visible");
  }

  $("#editemail").click(function() {
    $("#forget-pass-form .spinner").removeClass("visible");
    $('.tab2').removeClass('active');
    $('.tab1').addClass('active');
    
    });

   
    
});
function notif(msg) {
  let $toast = $(".toast");
  $toast.html(msg);
  $toast.css("display", "block");
  setTimeout(() => $toast.css("display", "none"), 4000);
}








