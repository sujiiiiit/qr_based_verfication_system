<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/page.css">
</head>

<body>
    <div class="tab">
        <div class="auth-placeholder"></div>
        <div class="tabs-container" data-animation='tabs'>
            <div class="tabs-tab tab1 active">
                <div class="container">
                    <div class="auth-image">
                        <svg version="1.2" class="sign-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120">
                            <g>
                                <path d="m119.5 34.1h-119v34.2h16.6l35.1-68.3h65.7z" />
                                <path d="m86.1 85.1h-85.3v34.2h17l33.7-68.3h34.6z" />
                            </g>
                        </svg>
                    </div>
                    <h4 class="headtxt">Sign up to Identify</h4>
                    <p class="subtitle">Please enter your registered edmail id and your password.</p>
                    <div class="input-wrapper">
                        <form id="form" class="form " method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <br>
                            <div class='input-field'>
                                <label for="email" class="label">
                                    <input id='email' type="email" placeholder=" " name="email" autocomplete="off" />
                                    <span class="placeholder emailplaceholder">Email (required)</span>
                                </label>

                                <label for="password" class="label">
                                    <input id='password' type="password" placeholder=" " name="password" autocomplete="off" />
                                    <span class="placeholder passwordplaceholder">Password</span>
                                </label>
                            </div>
                            <input id='show-hide-pass' type='checkbox' />
                            <label for='show-hide-pass'>
                                <span class='sqr'></span>
                                <span class='checktext'> Show Password</span>
                            </label>
                            <button data-ripple='rgb(0,0,0,.4)' class="btn signbtn" type='submit'>Login
                                <svg class="spinner" viewBox="0 0 50 50">
                                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="2"></circle>
                                </svg>
                            </button>
                            <br>
                            <div class="more-links center">
                                <a class="link " href="../signup/">Create new account</a><span class="break"></span>
                                <a class="link " href="../changepassword/">forgot password ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="tabs-tab tab2">
                <div class="container">
                    <div class="auth-image">
                        <svg version="1.2" class="sign-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120">
                            <g>
                                <path d="m119.5 34.1h-119v34.2h16.6l35.1-68.3h65.7z" />
                                <path d="m86.1 85.1h-85.3v34.2h17l33.7-68.3h34.6z" />
                            </g>
                        </svg>
                    </div>

                    <div class="wrongemaildiv"> <span class="wrongemail"></span><svg title="wrong email ?" id="editemail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                        </svg></div>
                    <p class="subtitle">We have sent you a email in above email id
                        with the code.</p>

                    <form id="otp-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class='input-field field2'>
                            <label for="otpcode" class="label">
                                <input id='otpcode' type="text" placeholder=" " name="otpcode" autocomplete="off" />
                                <span class="placeholder otpplaceholder">Code</span>
                            </label>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="toast"></div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        document.getElementById("email").focus();

        $(document).ready(function() {
            $("#form").submit(function(e) {
                e.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();
                var forminputs = $('#form input');
                var empty = false;

                forminputs.each(function() {
                    if (!$(this).val()) {
                        $(this).addClass('error');
                        empty = true;
                        $(this).focus();
                        return false;
                    } else {
                        $(this).removeClass('error');
                    }
                });

                if (empty) {
                    return;
                }
                if (password.length < 6) {
                    $('#password').addClass('error');
                    $('#password').focus();
                    $(".spinner").removeClass("visible");
                    notif('Password min. length should be 6');

                    return;
                }
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "submit.php",
                    data: formData,
                    success: function(response) {
                        if (response === 'emailnotfound-error') {
                            $('#email').addClass('error');
                            $(".emailplaceholder").text("Email Not Found");
                            $('#email').focus();
                            $(".spinner").removeClass("visible");
                        } else if (response === 'password-error') {
                            $('#password').addClass('error');
                            $(".passwordplaceholder").text("Incorect Password");
                            $('#password').focus();
                            $(".spinner").removeClass("visible");
                        } else if (response === 'verify') {
                            $('.tab1').removeClass('active');
                            $('.tab2').addClass('active');
                            $("#otpcode").focus();
                        } else if (response === 'successlog') {
                            window.location.href = '../'
                        } else {
                            alert(response);
                        }
                    }
                });
            });
        });
    </script>
    <script src="../assets/js/otpsubmit.js"></script>
</body>

</html>