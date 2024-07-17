<?php

require_once "../../../database/conn.php";
$id = $_POST['id'];
$sql = "SELECT * FROM sheet_file WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$jsonpath = $row['location'] ?? null;



// Return the value of $jsonpath as the response
echo 'components/' . $jsonpath;
