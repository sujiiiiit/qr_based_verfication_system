<?php
session_start();

require_once "../../database/conn.php";

// Check if a file has been uploaded
if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0) {
    $allowed_types = array('csv');
    $file_type = pathinfo($_FILES["csv_file"]["name"], PATHINFO_EXTENSION);
    if (!in_array($file_type, $allowed_types)) {
        echo "onlycsv";
        exit();
    }
    $csv_file = $_FILES["csv_file"]["tmp_name"];

    // Generate unique JSON file name
    $json_file = "sheet/" . uniqid('', true) . ".json";

    // Move uploaded CSV file to "sheet" folder and rename to unique JSON file name
    move_uploaded_file($csv_file, $json_file);

    // Get file name, size, and location
    $filename = basename($_FILES["csv_file"]["name"]);
    $filesize = $_FILES["csv_file"]["size"];
    $filelocation = $json_file;

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
    $sql = "INSERT INTO sheet_file (name, size, location, user_id) VALUES ('$filename', '$filesize', '$filelocation', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "File uploaded and data inserted into database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Read CSV file
    $rows = array();
    if (($handle = fopen($json_file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $rows[] = $data;
        }
        fclose($handle);
    }

    // Get column headers from first row of CSV
    $header = array_shift($rows);

    // Convert CSV to associative array
    $json_data = array();
    foreach ($rows as $row) {
        $json_data[] = array_combine($header, $row);
    }
    // Write JSON file
    $file = fopen($json_file, "w");
    fwrite($file, json_encode($json_data));
    fclose($file);
} else {
    echo "Error uploading file.";
}


// Close database connection
$conn->close();
