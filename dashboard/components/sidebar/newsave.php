<?php
if(isset($_POST['data'])) {
    $data = $_POST['data'];
    $filepath='../../'.$_COOKIE['sheetisopen'];
    file_put_contents($filepath, $data);
    echo'success';
}
?>
