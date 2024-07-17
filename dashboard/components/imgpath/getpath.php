<?php

require_once "../../../database/conn.php";
$id = $_POST['id'];
$sql = "SELECT * FROM img_file  WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$imgpath = $row['location'] ?? null;

// Return the value of $jsonpath as the response
echo 'components/'.$imgpath;
