<?php
session_start();

require_once "../../database/conn.php";

// Check if a file has been uploaded
if (isset($_FILES["img_file"]) && $_FILES["img_file"]["error"] == 0) {
    $allowed_types = array('png', 'jpeg', 'jpg', 'svg');
    $file_type = pathinfo($_FILES["img_file"]["name"], PATHINFO_EXTENSION);
    if (!in_array($file_type, $allowed_types)) {
        echo "Only image files are allowed.";
        exit();
    }
    $img_file = $_FILES["img_file"]["tmp_name"];

    // Generate unique file name
    $file_location = "img/" . uniqid('', true) . "." . $file_type;

    // Move uploaded file to "img" folder and rename to unique file name
    move_uploaded_file($img_file, $file_location);

    // Get file name, size, and location
    $filename = basename($_FILES["img_file"]["name"]);
    $filesize = $_FILES["img_file"]["size"];

    // Convert file size to KB or MB
    if ($filesize >= 1024 * 1024) {
        $filesize = round($filesize / (1024 * 1024), 2) . " MB";
    } elseif ($filesize >= 1024) {
        $filesize = round($filesize / 1024, 2) . " KB";
    } else {
        $filesize = $filesize . " bytes";
    }

    // Insert user ID along with file details
    require_once "../../database/db.php";
    $user_id = $dbuserid;

    // Insert file name, size, location, and user ID into database
    $sql = "INSERT INTO img_file (name, size, location, user_id) VALUES ('$filename', '$filesize', '$file_location', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "File uploaded and data inserted into database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    echo "Error: No file was uploaded.";
}
