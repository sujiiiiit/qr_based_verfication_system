<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  
}
$islogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$isnotlogin = !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true;

if($isnotlogin){
 header('Location: ../signup/');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/input.css" />
    <link rel="stylesheet" href="assets/font/fonticon.css" />
    <link rel="stylesheet" href="assets/css/dropdown.css" />
    <link rel="stylesheet" href="assets/css/tabs.css" />
    <link rel="stylesheet" href="assets/css/scroll.css" />
    <link rel="stylesheet" href="assets/css/preloader.css" />
    <link rel="stylesheet" href="assets/css/modal.css" />
    <link rel="stylesheet" href="assets/css/text.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>


</head>

<body>
    <div class="mainhome">
        <div class="mainhome2">
            <div class="mainhome3">
                <div class="header">
                    <?php require_once "components/parts/header.php";
                    ?>
                </div>

                <div class="main">
                    <div class="sidebar_container">
                        <div class="subsidebar1">
                            <?php require_once "components/sidebar/subsidebar1.php"; ?>
                        </div>
                        <div class="panel-item-container open "> <!--open-->
                            <div class="insidepic">
                                <?php require_once "components/sidebar/insidepic.php"; ?>
                            </div>
                        </div>
                        <!-- left subconatiner closer  -->
                        <?php require_once "components/sidebar/closer.php"; ?>
                    </div>
                    <div class="right_container">
                        <?php require_once "components/rightbar/index.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require_once "components/modal/modal.php"; ?>

    <script>
        $(document).ready(function() {
            $("#genbtn").click(function() {
                $(".modal-container").addClass("modal-active");
            });
            $("#modal-close").click(function() {
                $(".modal-container").removeClass("modal-active");
            });
        });
    </script>



    <!-- tipppy  -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/svg-arrow.css" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"> </script>


    <!-- main scripts  -->
    <script src="assets/js/main.js"></script>

    <!-- loading fonts  -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />

    <script src="https://unpkg.com/konva@8.4.3/konva.min.js"></script>




    <script src="assets/js/konva/create.js"></script>
    <script src="assets/js/konva/new.js"></script>

    <script>
        // <!-- container close open  -->

        $(document).ready(function() {
            $("#openclose").click(function() {
                $(".panel-item-container").toggleClass("open");
                updateCanvasSize();
            });
        });
    </script>


</body>

</html>