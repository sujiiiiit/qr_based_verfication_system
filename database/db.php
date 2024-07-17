<?php


// Check if email cookie is set
if(isset($_COOKIE['email'])) {
  $email = $_COOKIE['email'];
} else {
  $email = ""; // If email cookie is not set
}


$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$dbotp = $row['code']?? null;;
$dbuserid = $row['id']?? null;;
$dbfullname = $row['fullname']?? null;;
$dbemail = $row['email']?? null;;
$dbpassword = $row['userp']?? null;;
$dbstatus = $row['status']?? null;;
$avatar = $row['avatar']?? null;;
$islogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$isnotlogin = !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true;
