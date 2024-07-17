<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../database/testinput.php";
    $email = strtolower(test_input($_POST["email"]));
    require_once "../database/functions.php";
    require_once "../database/conn.php";
    include("../smtp/PHPMailerAutoload.php");
   

    if (!email_validate_form_data($email)) {
        echo "invalid";
        exit();
    }


    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    //Email present in db or not
    if (email_not_found($conn, $email)) {
        echo "emailnotfound-error";
        $conn->close();
        exit();
    } else {
        smtp_mailer($email, 'Email Verification Code', $newcode);
        update_code_random($conn, $newcode, $email);
        $_SESSION['email']= $email ;
    }

    $conn->close();
}
