<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../database/testinput.php";
    $fullname = test_input($_POST["fullname"]);
    $email = strtolower(test_input($_POST["email"]));
    $userpassword = test_input($_POST["password"]);
    require_once "../database/functions.php";
    require_once "../database/conn.php";
    include('../smtp/PHPMailerAutoload.php');
    if (!signup_validate_form_data($fullname, $email, $userpassword)) {
        echo "invalid";
        exit();
    }

    if (check_duplicate_email($conn, $email)) {
        echo "email-error";
        exit();
    }

    $avatar_folder = "../media/avatar/";
    $avatar_images = array_diff(scandir($avatar_folder), array('.', '..'));

    // Randomly select one of the avatar images
    $rand_avatar = $avatar_folder . $avatar_images[array_rand($avatar_images)];

    if (insert_data_to_db($conn, $fullname, $email, $userpassword, $code, $status, $rand_avatar)) {

        $_SESSION['email'] = $email;
        setcookie("email", $email, time() + (86400 * 30), "/"); // Expires in 30 days


        smtp_mailer($email, $subject, $message);
    } else {
        echo "An error occurred while processing your request. Please try again later.";
        exit();
    }
    $conn->close();
}
