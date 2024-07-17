<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    require_once "database/conn.php";
    require_once "database/db.php";
}
$islogin = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$isnotlogin = !isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/nav.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <link rel="stylesheet" href="assets/css/tooltip.css" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

</head>

<body>
    <header class="header">
        <div class='container'>
            <nav class='navigation'>
                <div class='nav_toggle'>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" style="width:30px !important;height:30px !important;">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg>
                </div><a href='#!' class='logo'> <svg version='1.2' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'>
                        <g>
                            <path d='m119.5 34.1h-119v34.2h16.6l35.1-68.3h65.7z'></path>
                            <path d='m86.1 85.1h-85.3v34.2h17l33.7-68.3h34.6z'></path>
                        </g>
                    </svg> <span class='underline'>Identify</span> </a>
                <ul class='nav_menu'>
                    <li class='nav_list'> <a href='#!' class='nav_link'> <span>Resources</span> </a> </li>
                    <li class='nav_list nav_list_menu'> <a id='drop1' href='#!' class='nav_link'> <span>How to use</span> <svg xmlns='http://www.w3.org/2000/svg' style='width: 20px; height: 20px' viewBox='0 0 512 512'>
                                <title>Chevron Down</title>
                                <path fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='48' d='M112 184l144 144 144-144' />
                            </svg> </a>
                        <div class='dropdown' style='transform-origin:left top'>
                            <div class='dropdown-inner'>
                                <div class='dropdown-item'> <span class='item-heading'>Products</span>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 17V7M13 17V1M1 17V13" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Team dashboard</span>
                                            <p>Monitor your metrics.</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 19H15M11 15V19M3 1H19C20.1046 1 21 1.89543 21 3V13C21 14.1046 20.1046 15 19 15H3C1.89543 15 1 14.1046 1 13V3C1 1.89543 1.89543 1 3 1Z" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Limitless segmentation</span>
                                            <p>Surface hidden trends.</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="22" height="22" viewBox="0 0 22 22" fill="none " xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.21 14.89C19.5738 16.3945 18.5788 17.7202 17.3119 18.7513C16.045 19.7824 14.5448 20.4874 12.9424 20.8048C11.3401 21.1221 9.68442 21.0421 8.12015 20.5718C6.55587 20.1014 5.13062 19.2551 3.96902 18.1067C2.80741 16.9582 1.94481 15.5428 1.45663 13.9839C0.968455 12.4251 0.86956 10.7705 1.1686 9.16463C1.46763 7.55878 2.15549 6.05063 3.17204 4.77203C4.18859 3.49343 5.50288 2.48332 7 1.83M21 11C21 9.68678 20.7413 8.38642 20.2388 7.17317C19.7362 5.95991 18.9997 4.85752 18.0711 3.92893C17.1425 3.00035 16.0401 2.26375 14.8268 1.7612C13.6136 1.25866 12.3132 1 11 1V11H21Z" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Group analytics</span>
                                            <p>Learn about your users</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23 1L13.5 10.5L8.5 5.5L1 13M23 1H17M23 1V7" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Interactive reports</span>
                                            <p>Measure B2B account health.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='dropdown-item'> <span class='item-heading'>Use cases</span>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 11.0799V11.9999C20.9988 14.1563 20.3005 16.2545 19.0093 17.9817C17.7182 19.7088 15.9033 20.9723 13.8354 21.5838C11.7674 22.1952 9.55726 22.1218 7.53447 21.3744C5.51168 20.6271 3.78465 19.246 2.61096 17.4369C1.43727 15.6279 0.879791 13.4879 1.02168 11.3362C1.16356 9.18443 1.99721 7.13619 3.39828 5.49694C4.79935 3.85768 6.69279 2.71525 8.79619 2.24001C10.8996 1.76477 13.1003 1.9822 15.07 2.85986M21 3.99986L11 14.0099L8.00001 11.0099" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Convert</span>
                                            <p>Analyze conversion rates.</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 19V17C16 15.9391 15.5786 14.9217 14.8284 14.1716C14.0783 13.4214 13.0609 13 12 13H5C3.93913 13 2.92172 13.4214 2.17157 14.1716C1.42143 14.9217 1 15.9391 1 17V19M17 9L19 11L23 7M12.5 5C12.5 7.20914 10.7091 9 8.5 9C6.29086 9 4.5 7.20914 4.5 5C4.5 2.79086 6.29086 1 8.5 1C10.7091 1 12.5 2.79086 12.5 5Z" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Engage</span>
                                            <p>Measure active usage.</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 13C7 13 8.5 15 11 15C13.5 15 15 13 15 13M8 8H8.01M14 8H14.01M21 11C21 16.5228 16.5228 21 11 21C5.47715 21 1 16.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Retain</span>
                                            <p>Find retention drivers.</p>
                                        </div>
                                    </div>
                                    <div class='item-list'>
                                        <div class='item-img'> <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 16L11 21L21 16M1 11L11 16L21 11M11 1L1 6L11 11L21 6L11 1Z" stroke="#7F56D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> </div>
                                        <div class='item-list-info'> <span>Grow</span>
                                            <p>Grow your user base faster.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class='nav_list'> <a href='#!' class='nav_link'> <span>Pricing</span> </a> </li>
                </ul>
                <div class='nav_action'> <?php

                                            if ($isnotlogin) {
                                                echo " <a class='actionlink' href='login/'>Log in</a> <a class='actionlink' href='signup/'>Sign up</a>";
                                            }
                                            if ($islogin) {
                                                echo " <span id='avatar' class='avatar' ><img src='$avatar' alt='avatar'></span> 
                                                <div class='bubble' style='transform-origin:right top'> <a href='/dashboard/'> <div class='MenuItem compact'><i> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'> <g> <path d='M19.25,21h-3c-1.52,0-2.75-1.23-2.75-2.75v-3.5c0-0.14-0.11-0.25-0.25-0.25h-2.5c-0.14,0-0.25,0.11-0.25,0.25 v3.5c0,1.52-1.23,2.75-2.75,2.75h-3C3.79,21,3,20.21,3,19.25V9.77C3,9.2,3.28,8.66,3.75,8.34L11,3.28c0.6-0.42,1.4-0.42,2,0 l7.25,5.05C20.72,8.66,21,9.2,21,9.77v9.48C21,20.21,20.21,21,19.25,21z M10.75,13h2.5c0.96,0,1.75,0.79,1.75,1.75v3.5 c0,0.69,0.56,1.25,1.25,1.25h3c0.14,0,0.25-0.11,0.25-0.25V9.77c0-0.08-0.04-0.16-0.11-0.21l-7.25-5.05c-0.09-0.06-0.2-0.06-0.29,0 L4.61,9.57C4.54,9.61,4.5,9.69,4.5,9.77v9.48c0,0.14,0.11,0.25,0.25,0.25h3C8.44,19.5,9,18.94,9,18.25v-3.5 C9,13.79,9.79,13,10.75,13z'/> </g> </svg> </i>Dashboard</div></a> <a href='#'> <div class='MenuItem compact'><i> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'> <path d='M18.9,4.76C16.96,2.92,14.43,1.94,11.76,2c-2.67,0.07-5.16,1.17-7,3.1C2.92,7.04,1.94,9.57,2,12.24 c0.07,2.67,1.17,5.16,3.1,7c0.08,0.08,0.16,0.15,0.25,0.22C7.19,21.11,9.52,22,11.99,22h0.25c2.39-0.06,4.64-0.95,6.41-2.54 c0.2-0.17,0.4-0.36,0.59-0.56c1.79-1.88,2.76-4.32,2.76-6.91v-0.23C21.93,9.09,20.83,6.6,18.9,4.76z M12.21,20.5 c-2.02,0.04-3.95-0.61-5.5-1.86c0.45-1.26,1.68-2.13,3.04-2.13h4.5c1.36,0,2.59,0.87,3.04,2.13 C15.85,19.81,14.09,20.45,12.21,20.5z M18.44,17.53c-0.81-1.51-2.41-2.52-4.19-2.52h-4.5c-1.78,0-3.39,1.01-4.19,2.53 c-1.29-1.48-2.01-3.34-2.06-5.33C3.45,9.94,4.28,7.78,5.85,6.14c1.56-1.65,3.67-2.58,5.94-2.64h0.22c2.19,0,4.26,0.83,5.85,2.35 c0.82,0.78,1.47,1.7,1.92,2.7c0.44,1.01,0.69,2.11,0.72,3.24C20.55,13.91,19.83,15.94,18.44,17.53z'/> <path d='M14.75,13.5h-3c-1.79,0-3.25-1.46-3.25-3.25v-2C8.5,6.46,9.96,5,11.75,5h0.5c1.79,0,3.25,1.46,3.25,3.25v4.5 C15.5,13.16,15.16,13.5,14.75,13.5z M11.75,6.5C10.79,6.5,10,7.29,10,8.25v2c0,0.96,0.79,1.75,1.75,1.75H14V8.25 c0-0.96-0.79-1.75-1.75-1.75H11.75z'/> </svg> </i>Profile</div></a> <div class='breakline'></div><a href='index.php?logout'> <div class='MenuItem error compact'><i> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'> <path d='M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256' fill='none' stroke-width='32' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/> </svg> </i>Log out </div></div></a> ";
                                            }
                                            if (isset($_GET['logout'])) {
                                                session_destroy();
                                                echo "<script>window.location.href='index.php '</script>";
                                                exit();
                                            }
                                            ?>
                    <script>
                        tippy("#avatar", {
                            content: '<?php echo $dbfullname ?><br><?php echo $dbemail ?>',
                            allowHTML: true,
                            placement: "bottom",
                            arrow: false,
                            arrowType: "round",
                            delay: [500, 0],
                        });
                    </script>
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        <?php
        if ($islogin) {
            echo "
        <br>
        <h4 style='text-align:center'>Welcome " . $dbfullname . "</h4>
        ";
        }
        ?>

    </main>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='assets/js/toggle.js'></script>
    <script>
        $(document).ready(function() {
            $('body').css('background-image', 'url(media/bg.jpg)');
        });
    </script>

</body>

</html>