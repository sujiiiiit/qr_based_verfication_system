<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo "session email invalid in changepassword/otpverify";
    return false;
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../database/testinput.php";
    $otpcode = test_input($_POST["otpcode"]);
    require_once "../database/functions.php";
    require_once "../database/conn.php";

   
    //otp validation
    if (!otp_validate_form_data($otpcode)) {
        echo 'invalid otp';
        exit();
    }
    
    require_once "../database/db.php";

    // Password match, login success
    if ($otpcode === $dbotp) {
        echo "newpass";
        update_code_0($conn, $email);
        $_SESSION['fullname'] = $dbfullname;
        update_status_verified($conn, $email);
    } else {
        // password is incorrect
        echo "otp-error";
    }
    $conn->close();
}
