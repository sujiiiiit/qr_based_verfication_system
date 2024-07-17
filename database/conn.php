<?php
//  $servername = "localhost";
//  $username = "sujiiitt_sujit";
//  $password = "sujitdwivedii";
//  $dbname = "sujiiitt_mydb";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$timestamp = time();
$code = rand(999999, 111111);
$newcode = rand(999999, 111111);
$subject = 'Your Verfication Code is ' . $code;
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Verification Code</title>
    <style type='text/css'>
      body {
        margin: 0;

      }
      table {
        border-spacing: 0;
        padding: 12px;
        text-align: center;
        width:100%;
        max-width:600px;
        margin:0 auto;
      }
      td {
        padding: 0;
      }
      img {
        border: 0;
      }
      .logo {
        width: 100%;
        max-width: 150px;
        height: auto;
        margin-bottom: 20px;
      }
      h2,
      .code {
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 60px;

      }
     
      .code {
        border: 3px solid #8774e1;
        padding: 7px 12px;
        border-radius: 10px;
      }
      .desc {
        margin-top: 60px;
        font-size: 18px;
        line-height: 30px;
      }
    </style>
  </head>
  <body>
    <table>
      <tbody>
        <tr>
          <td>
            <img
              class='logo'
              src='https://sujiiit.tk/email/media/fulllogo.png'
              alt='logo'
            />
           
          </td>
        </tr>
        <tr>
          <td><h2>Verify your Identify account</h2></td>
        </tr>
        <tr>
          <td>
            <span class='cde'>
            <span class='code'>" . $code . "</span>
          </span>
          </td>
        </tr>
        <tr>
          <td>
            <p class='desc'>
              Please use this code to verify your email and complete your
              account set up. The code will be valid for the next
              <span class='underline'>30 minutes</span>.
            </p>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
";
$newmessage = $message;
$status = "notverified";
