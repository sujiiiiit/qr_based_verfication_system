<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../database/testinput.php";
    $email = strtolower(test_input($_POST["email"]));
    $userpassword = test_input($_POST["password"]);
    require_once "../database/functions.php";
    require_once "../database/conn.php";
    include('../smtp/PHPMailerAutoload.php');

    //form validation
    if (!login_validate_form_data($email, $userpassword)) {
        $conn->close();
        exit();
    }

    require_once "../database/db.php";

    //Email present in db or not
    if (email_not_found($conn, $email)) {
        echo "emailnotfound-error";
        $conn->close();
        exit();
    }

    if ($userpassword === $dbpassword) {
        if ($dbstatus == 'verified') {
            echo "successlog";
            $_SESSION['logged_in'] = true;
            // $_SESSION['fullname'] = $dbfullname;
            $_SESSION['email'] = $email;
            setcookie("email", $email, time() + (86400 * 30), "/"); // Expires in 30 days
        } else {
            $_SESSION['email'] = $email;
            setcookie("email", $email, time() + (86400 * 30), "/"); // Expires in 30 days
            update_code_random($conn, $newcode, $email);
            smtp_mailer($email, 'Email Verification Code', $newmessage);
        }
    } else {
        // password is incorrect
        echo "password-error";
    }
    $conn->close();
}

?>
