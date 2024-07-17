<?php

// Get the JSON data from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

// Save the data to the input.json file
if (isset($_COOKIE['sheetisopen'])) {
    $currentfile = $_COOKIE['sheetisopen'];
    $filename = basename(($currentfile));
    file_put_contents('../sheet/' . $filename, json_encode($data, JSON_UNESCAPED_UNICODE));

    // Send a response back to the client
    echo 'Data saved successfully.';
}
