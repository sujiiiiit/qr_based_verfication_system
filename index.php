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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/nav.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <link rel="stylesheet" href="assets/css/tooltip.css" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
</head>

<body>
    <div class="landingpage">
        <header class="header">
            <div class='container'>
                <nav class='navigation'>
                    <div class='nav_toggle'>
                        <svg class="line" viewBox="0 0 24 24" style="width: 30px;height: 60px;">
                            <g class="h1">
                                <path d="M 3 18 H 14 M 10 6 H 21"></path>
                                <line class="svgC" x1="3" x2="21" y1="12" y2="12"></line>
                            </g>
                        </svg>
                    </div><a href='#!' class='logo'> <svg version='1.2' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'>
                            <g>
                                <path d='m119.5 34.1h-119v34.2h16.6l35.1-68.3h65.7z'></path>
                                <path d='m86.1 85.1h-85.3v34.2h17l33.7-68.3h34.6z'></path>
                            </g>
                        </svg> <span class='underline'>Identify</span> </a>
                    <ul class='nav_menu'>
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
                        <li class='nav_list'> <a href='#contactform' class='nav_link'> <span>Contact us</span> </a> </li>
                    </ul>
                    <div class='nav_action'> <?php

                                                if ($isnotlogin) {
                                                    echo " <a class='actionlink' href='login/'>Log in</a> <a class='actionlink' href='signup/'>Sign up</a>";
                                                }
                                                if ($islogin) {
                                                    echo " <span id='avatar' class='avatar' ><img src='$avatar' alt='avatar'></span> 
                                                <div class='bubble' style='transform-origin:right top'> <a href='/dashboard/'> <div class='MenuItem compact'><i> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'> <g> <path d='M19.25,21h-3c-1.52,0-2.75-1.23-2.75-2.75v-3.5c0-0.14-0.11-0.25-0.25-0.25h-2.5c-0.14,0-0.25,0.11-0.25,0.25 v3.5c0,1.52-1.23,2.75-2.75,2.75h-3C3.79,21,3,20.21,3,19.25V9.77C3,9.2,3.28,8.66,3.75,8.34L11,3.28c0.6-0.42,1.4-0.42,2,0 l7.25,5.05C20.72,8.66,21,9.2,21,9.77v9.48C21,20.21,20.21,21,19.25,21z M10.75,13h2.5c0.96,0,1.75,0.79,1.75,1.75v3.5 c0,0.69,0.56,1.25,1.25,1.25h3c0.14,0,0.25-0.11,0.25-0.25V9.77c0-0.08-0.04-0.16-0.11-0.21l-7.25-5.05c-0.09-0.06-0.2-0.06-0.29,0 L4.61,9.57C4.54,9.61,4.5,9.69,4.5,9.77v9.48c0,0.14,0.11,0.25,0.25,0.25h3C8.44,19.5,9,18.94,9,18.25v-3.5 C9,13.79,9.79,13,10.75,13z'/> </g> </svg> </i><span>Dashboard</span></div></a> <a href='#'> <div class='MenuItem compact'><i> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' x='0px' y='0px' viewBox='0 0 24 24' style='enable-background:new 0 0 24 24;' xml:space='preserve'> <path d='M18.9,4.76C16.96,2.92,14.43,1.94,11.76,2c-2.67,0.07-5.16,1.17-7,3.1C2.92,7.04,1.94,9.57,2,12.24 c0.07,2.67,1.17,5.16,3.1,7c0.08,0.08,0.16,0.15,0.25,0.22C7.19,21.11,9.52,22,11.99,22h0.25c2.39-0.06,4.64-0.95,6.41-2.54 c0.2-0.17,0.4-0.36,0.59-0.56c1.79-1.88,2.76-4.32,2.76-6.91v-0.23C21.93,9.09,20.83,6.6,18.9,4.76z M12.21,20.5 c-2.02,0.04-3.95-0.61-5.5-1.86c0.45-1.26,1.68-2.13,3.04-2.13h4.5c1.36,0,2.59,0.87,3.04,2.13 C15.85,19.81,14.09,20.45,12.21,20.5z M18.44,17.53c-0.81-1.51-2.41-2.52-4.19-2.52h-4.5c-1.78,0-3.39,1.01-4.19,2.53 c-1.29-1.48-2.01-3.34-2.06-5.33C3.45,9.94,4.28,7.78,5.85,6.14c1.56-1.65,3.67-2.58,5.94-2.64h0.22c2.19,0,4.26,0.83,5.85,2.35 c0.82,0.78,1.47,1.7,1.92,2.7c0.44,1.01,0.69,2.11,0.72,3.24C20.55,13.91,19.83,15.94,18.44,17.53z'/> <path d='M14.75,13.5h-3c-1.79,0-3.25-1.46-3.25-3.25v-2C8.5,6.46,9.96,5,11.75,5h0.5c1.79,0,3.25,1.46,3.25,3.25v4.5 C15.5,13.16,15.16,13.5,14.75,13.5z M11.75,6.5C10.79,6.5,10,7.29,10,8.25v2c0,0.96,0.79,1.75,1.75,1.75H14V8.25 c0-0.96-0.79-1.75-1.75-1.75H11.75z'/> </svg> </i><span>Profile</span></div></a> <div class='breakline'></div><a href='index.php?logout'> <div class='MenuItem error compact'><i> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'> <path d='M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256' fill='none' stroke-width='32' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/> </svg> </i><span>Log out </span></div></div></a> ";
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

        <div class="box">
            <div class="infobox">
                <p class="infobox-boldtext">
                    Effortlessly Create, Edit, Generate, and Verify your doc with Identify.
                </p>
                <p class="infobox-slimtext">
                    Try this automation tool to minimize your work load and make it simpler.
                </p>
                <div class="infobox-btnwrapper">
                    <button class="explorebtn">
                        <a href="<?php
                                    if ($islogin) {
                                        echo 'dashboard/';
                                    } else {
                                        echo 'signup/';
                                    }
                                    ?>">Explore ✨ </a>

                    </button>
                </div>
            </div>
            <div class="display">
                <img class="display-nft" src="img.png">

            </div>
        </div>

        <div class="started">
            <p class="started-boldtext">Getting started</p>
            <p class="started-slimtext">creating, editing, generating, and verifying your documents is simple and straightforward.</p>
            <div class="started-items">
                <div class="itemwrapper">
                    <div class="started-items-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="px" viewBox="0 0 36 31">
                            <path style="stroke:none;fill-rule:evenodd;fill:#bdbdbd;fill-opacity:1" d="M2.832 2.9219c-.2148 0-.3867.1758-.3867.3906v24.375c0 .2148.1719.3906.3867.3906h4.9453l13.332-14.1875c1.0548-1.121 2.8165-1.1445 3.8985-.0508l8.5469 8.6407V3.3125c0-.2148-.1719-.3906-.3867-.3906Zm30.336 27.5156H2.832c-1.5039 0-2.7226-1.2305-2.7226-2.75V3.3125c0-1.5195 1.2187-2.75 2.7226-2.75h30.336c1.5039 0 2.7226 1.2305 2.7226 2.75v24.375c0 1.5195-1.2187 2.75-2.7226 2.75ZM22.8008 15.5156 10.996 28.0781H33.168c.2148 0 .3867-.1758.3867-.3906v-1.871L23.3594 15.5077a.388.388 0 0 0-.5586.0078Zm-9.4688-4.3398c0 1.5195-1.2187 2.75-2.7226 2.75-1.5 0-2.7188-1.2305-2.7188-2.75 0-1.5196 1.2188-2.75 2.7188-2.75 1.5039 0 2.7226 1.2304 2.7226 2.75Zm2.336 0c0 2.8242-2.2657 5.1094-5.0586 5.1094-2.789 0-5.0547-2.2852-5.0547-5.1094s2.2656-5.1094 5.0547-5.1094c2.793 0 5.0586 2.2852 5.0586 5.1094Zm0 0" />
                        </svg>
                    </div>
                    <p>Create you document</p>
                </div>

                <div class="itemwrapper">
                    <div class="started-items-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                            <path style="stroke:none;fill-rule:evenodd;fill:#bdbdbd;fill-opacity:1" d="M4.125 3C2.6758 3 1.5 4.1758 1.5 5.625v5.25c0 1.4492 1.1758 2.625 2.625 2.625h27.75c1.4492 0 2.625-1.1758 2.625-2.625v-5.25C34.5 4.1758 33.3242 3 31.875 3Zm27.75 2.25H4.125c-.207 0-.375.168-.375.375v5.25c0 .207.168.375.375.375h27.75c.207 0 .375-.168.375-.375v-5.25c0-.207-.168-.375-.375-.375Zm0 0" />
                            <path style="stroke:none;fill-rule:nonzero;fill:#bdbdbd;fill-opacity:1" d="M4.125 15c.621 0 1.125.504 1.125 1.125v14.25c0 .207.168.375.375.375h24.75c.207 0 .375-.168.375-.375v-14.25c0-.621.504-1.125 1.125-1.125S33 15.504 33 16.125v14.25C33 31.8242 31.8242 33 30.375 33H5.625C4.1758 33 3 31.8242 3 30.375v-14.25C3 15.504 3.504 15 4.125 15Zm0 0" />
                            <path style="stroke:none;fill-rule:nonzero;fill:#bdbdbd;fill-opacity:1" d="M14.625 17.25c-.621 0-1.125.504-1.125 1.125s.504 1.125 1.125 1.125h6.75c.621 0 1.125-.504 1.125-1.125s-.504-1.125-1.125-1.125Zm0 0" />
                        </svg>
                    </div>
                    <p>Edit design / spreadsheet</p>
                </div>

                <div class="itemwrapper">
                    <div class="started-items-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                            <path style="stroke:none;fill-rule:evenodd;fill:#bdbdbd;fill-opacity:1" d="M30.9453.5a16.7245 16.7245 0 0 0-11.4687 4.5508l-2.0274 1.914a35.9135 35.9135 0 0 0-2.3984 2.4805h-7.836c-.957 0-1.8437.5-2.3359 1.3203L.668 17.7891c-.1952.3242-.2226.7226-.0702 1.0664.1523.3476.4609.5976.828.6758l7.1134 1.496c.0586.0782.125.1485.1992.2188l3.1054 2.914 2.9102 3.1016c.0703.0742.1406.1406.2188.1992l1.496 7.1133c.0782.3672.3282.6758.6758.8281a1.158 1.158 0 0 0 1.0664-.0703l7.0235-4.211a2.7222 2.7222 0 0 0 1.3203-2.3358v-7.836a36.8748 36.8748 0 0 0 2.4844-2.3984l1.9101-2.0274A16.7411 16.7411 0 0 0 35.5 5.0508l-.004-1.8281C35.496 1.7187 34.2774.5 32.7774.5Zm-6.7226 22.3398a39.89 39.89 0 0 1-1.582 1.1172l-5.2813 3.5196 1.0547 5.0156 5.621-3.3711c.1172-.0703.1876-.1992.1876-.336ZM8.5234 18.6406l3.5196-5.2812a34.8776 34.8776 0 0 1 1.1172-1.582H7.2148a.3952.3952 0 0 0-.3359.1913L3.508 17.586ZM21.0781 6.75a14.3862 14.3862 0 0 1 9.8672-3.918h1.832c.211 0 .3868.1758.3868.3907v1.828c0 3.672-1.3985 7.2032-3.9141 9.8712l-1.9102 2.0273a34.7388 34.7388 0 0 1-5.996 5.0664l-5.1133 3.4102-2.711-2.8906c-.0195-.0157-.0351-.0352-.0547-.0508l-2.8906-2.7149 3.4102-5.1172c1.457-2.1796 3.1523-4.1914 5.0625-5.9921Zm5.4766 5.0273c0 1.2891-1.043 2.332-2.332 2.332-1.2891 0-2.332-1.0429-2.332-2.332 0-1.289 1.0429-2.332 2.332-2.332 1.289 0 2.332 1.043 2.332 2.332ZM9.4453 32c1.3985-1.3984 1.3985-4.043 0-5.4453-1.4023-1.3985-4.0469-1.3985-5.4453 0-1.879 1.8828-2.246 6.0703-2.3164 7.3789a.3609.3609 0 0 0 .3828.3828C3.375 34.2461 7.5625 33.879 9.4454 32Zm0 0" />
                        </svg>
                    </div>
                    <p>Generate and Send</p>
                </div>
                <div class="itemwrapper">
                    <div class="started-items-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                            <path style="stroke:none;fill-rule:nonzero;fill:#e0e0e0;fill-opacity:1" d="M24.7969 14.6719c.4375-.4414.4375-1.1524 0-1.5938-.4414-.4375-1.1524-.4375-1.5938 0L16.5 19.7851l-2.9531-2.957c-.4414-.4375-1.1524-.4375-1.5938 0-.4375.4414-.4375 1.1524 0 1.5938l3.75 3.75a1.1246 1.1246 0 0 0 1.5938 0Zm0 0" />
                            <path style="stroke:none;fill-rule:evenodd;fill:#e0e0e0;fill-opacity:1" d="M18.8086.957a2.6005 2.6005 0 0 0-1.6172 0L4.8164 4.9688C3.7344 5.3202 3 6.3241 3 7.4648V15c0 9.2852 5.6563 16.0586 14.1016 19.246a2.5853 2.5853 0 0 0 1.7968 0C27.3438 31.0587 33 24.2853 33 15V7.4648a2.6182 2.6182 0 0 0-1.8164-2.496Zm-.9219 2.1368a.3738.3738 0 0 1 .2266 0l12.375 4.0117c.1601.0547.2617.1992.2617.3593V15c0 8.1914-4.9219 14.2227-12.6445 17.1367a.2815.2815 0 0 1-.211 0C10.172 29.2227 5.25 23.1914 5.25 15V7.4648c0-.1601.1016-.3046.2617-.3593Zm0 0" />
                        </svg>
                    </div>
                    <p>Verify Identity</p>
                </div>
            </div>
        </div>

        <div class="footer-basic">
            <footer>
                <p class="copyright">© 2023 All Rights Reserved</p>
            </footer>
        </div>

    </div>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='assets/js/toggle.js'></script>
</body>

</html>