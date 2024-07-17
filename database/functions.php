<?php
//form validation
function signup_validate_form_data($fullname, $email, $userpassword)
{
    $valid = true;

    if (empty($fullname)) {
        $valid = false;
    }

    if (empty($email)) {
        $valid = false;
    } else {
        // check if email is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
    }

    if (empty($userpassword)) {
        $valid = false;
    } elseif (strlen($userpassword) < 6) {
        $valid = false;
    }

    return $valid;
}
function otp_validate_form_data($otp)
{
    $valid = true;

    if (empty($otp) || strlen($otp) != 6) {
        $valid = false;
    }

    return $valid;
}
function email_validate_form_data($email)
{
    $valid = true;

    if (empty($email)) {
        $valid = false;
    }

    return $valid;
}



function login_validate_form_data($email, $userpassword)
{
    $valid = true;

    if (empty($email)) {
        $valid = false;
    } else {
        // check if email is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
        }
    }

    if (empty($userpassword)) {
        $valid = false;
    } elseif (strlen($userpassword) < 6) {
        $valid = false;
    }

    return $valid;
}

//email duplication validation
function check_duplicate_email($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

//email not found in db
function email_not_found($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    return $result->num_rows == 0;
}

//data insertion during signup
function insert_data_to_db($conn, $fullname, $email, $userpassword, $code, $status, $rand_avatar)
{
    $sql = "INSERT INTO users (fullname, email, userp,code,status,avatar) VALUES ('$fullname', '$email', '$userpassword','$code','$status','$rand_avatar')";
    return $conn->query($sql) === TRUE;
}

function update_status_verified($conn, $email)
{
    $sql = "UPDATE users SET status='verified' WHERE email='$email'";
    return $conn->query($sql) === TRUE;
}

function update_code_0($conn, $email)
{
    $sql = "UPDATE users SET code='0' WHERE email='$email'";
    return $conn->query($sql) === TRUE;
}

function update_code_random($conn, $newcode, $email)
{
    $sql = "UPDATE users SET code='$newcode' WHERE email='$email'";
    return $conn->query($sql) === TRUE;
}


function update_pass($conn, $userpassword, $email)
{
    $sql = "UPDATE users SET userp='$userpassword' WHERE email='$email'";
    return $conn->query($sql) === TRUE;
}

function update_timestamp($conn, $timestamp, $email)
{
    $sql = "UPDATE users SET timestamp='$timestamp' WHERE email='$email'";
    return $conn->query($sql) === TRUE;
}

function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    // $mail->SMTPDebug=3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "mail.sujiiit.tk";
    $mail->Port = "465";
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "code@sujiiit.tk";
    $mail->Password = 'sujitdwivedii';
    $mail->SetFrom("code@sujiiit.tk");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;

        exit();
    } else {
        echo 'verify';
    }
}


