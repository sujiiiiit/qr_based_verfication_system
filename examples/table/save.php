<?php

// Get the JSON data from the request body
$data = file_get_contents('php://input');

// Decode the JSON data into an array of objects
$rows = json_decode($data, true);

// Get the header row from the first object
$header = array_keys($rows[0]);

// Add the header row to the beginning of the JSON data array
array_unshift($rows, $header);

// Encode the modified JSON data into a JSON string
$json_string = json_encode($rows);

// Write the JSON string to the output file
file_put_contents('output.json', $json_string);

// Send a response to indicate success
http_response_code(200);
echo 'Data saved successfully.';
