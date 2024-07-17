<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "session email invalid in changepassword/newpass";
    return false;
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../database/testinput.php";
    $userpassword = test_input($_POST["password"]);
    $email = $_SESSION['email'];
    require_once "../database/functions.php";
    require_once "../database/conn.php";

    if (!email_validate_form_data($email)) {
        echo "invalid";
        exit();
    }


    $valid = true;
    if (empty($userpassword)) {
        $valid = false;
    } elseif (strlen($userpassword) < 6) {
        $valid = false;
        echo"Password min length should be 6";
    } else {
        update_pass($conn, $userpassword, $email);
        $_SESSION['logged_in'] = true;
        echo "changepass";
    }


    $conn->close();
}
