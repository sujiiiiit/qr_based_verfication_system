<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            background: #212121;
            font-family: sans-serif;
            color: #fff;
        }

        .verifyicon {
            display: inline-block;
            flex-shrink: 0;
            width: 2.5rem;
            height: 2.5rem;
            --color-fill: rgb(135, 116, 225);
            --color-checkmark: #fff;
        }

        .dmsg {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 90vh;
            color: #fff;
            font-size: 2rem;
            font-family: sans-serif;

        }


        .verifydiv {
            display: flex;
            align-items: center;
            font-size: 2rem;
        }

        .notverify,
        .fullverify {
            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .fullverify {
            align-items: center;
            height: 90vh;
            padding: 12px;
        }



        .notverify {
            font-size: 23px;
        }

        .dmsg svg {
            width: 3rem;
            height: 3rem;
            fill: #ff595a !important;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            font-size: 16px;
            color: #fff;
            display: flex;
            justify-content: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
            padding: 8px;
        }

        td {
            border: 1px solid rgb(255, 255, 255, .1);
            padding: 8px;

        }
    </style>
</head>


<body>
    <?php

    // Check if fileid and qrid are present in the URL
    if (!isset($_GET['fileid']) || !isset($_GET['qrid'])) {
        echo "Data not present in URL";
        echo '<script>
        window.location.href = "/";
        </script>';
        exit;
    }

    $fileid = $_GET['fileid'];
    $qrid = $_GET['qrid'];

    require_once "database/conn.php";

    // Query the database to fetch the file path using the file ID
    $sql = "SELECT id, name, size,location FROM sheet_file WHERE id = $fileid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Fetch the file path
            $filepath = "dashboard/components/" . $row["location"];

            // Read the contents of the JSON file
            $json = file_get_contents($filepath);

            // Decode the JSON data
            $data = json_decode($json, true);

            // Search for a specific qrid value in the JSON data
            $found = false;
            foreach ($data as $item) {
                if (!isset($item["qrid"])) {
                    echo "<span class='dmsg'><svg xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'><path d='M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z' fill='#ff595a' stroke='#ff595a' stroke-miterlimit='10' stroke-width='32'/><path d='M250.26 166.05L256 288l5.73-121.95a5.74 5.74 0 00-5.79-6h0a5.74 5.74 0 00-5.68 6z' fill='#212121' stroke='#212121' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/><path d='M256 367.91a20 20 0 1120-20 20 20 0 01-20 20z' stroke='#212121' fill='#212121' /></svg><span>Not verified</span>";
                    exit;
                }
                if ($item["qrid"] == $qrid) {
                    $found = true;
                    unset($item['qrimg']);
                    echo "<div class='fullverify'><div class='verifydiv'> Verified<svg class='verifyicon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path class='backsvg' d='M12.3 2.9c.1.1.2.1.3.2.7.6 1.3 1.1 2 1.7.3.2.6.4.9.4.9.1 1.7.2 2.6.2.5 0 .6.1.7.7.1.9.1 1.8.2 2.6 0 .4.2.7.4 1 .6.7 1.1 1.3 1.7 2 .3.4.3.5 0 .8-.5.6-1.1 1.3-1.6 1.9-.3.3-.5.7-.5 1.2-.1.8-.2 1.7-.2 2.5 0 .4-.2.5-.6.6-.8 0-1.6.1-2.5.2-.5 0-1 .2-1.4.5-.6.5-1.3 1.1-1.9 1.6-.3.3-.5.3-.8 0-.7-.6-1.4-1.2-2-1.8-.3-.2-.6-.4-.9-.4-.9-.1-1.8-.2-2.7-.2-.4 0-.5-.2-.6-.5 0-.9-.1-1.7-.2-2.6 0-.4-.2-.8-.4-1.1-.6-.6-1.1-1.3-1.6-2-.4-.4-.3-.5 0-1 .6-.6 1.1-1.3 1.7-1.9.3-.3.4-.6.4-1 0-.8.1-1.6.2-2.5 0-.5.1-.6.6-.6.9-.1 1.7-.1 2.6-.2.4 0 .7-.2 1-.4.7-.6 1.4-1.2 2.1-1.7.1-.2.3-.3.5-.2z' style='fill: var(--color-fill)'></path><path class='lol' d='M16.4 10.1l-.2.2-5.4 5.4c-.1.1-.2.2-.4 0l-2.6-2.6c-.2-.2-.1-.3 0-.4.2-.2.5-.6.7-.6.3 0 .5.4.7.6l1.1 1.1c.2.2.3.2.5 0l4.3-4.3c.2-.2.4-.3.6 0 .1.2.3.3.4.5.2 0 .3.1.3.1z' style='fill: var(--color-checkmark)'></path></svg></div>";
                    echo "<table>";
                    foreach ($item as $key => $value) {
                        if ($value !== null) {
                            echo "<tr><td>" . $key . ":</td><td>" . $value . "</td></tr>";
                        }
                    }
                    echo "</table>";
                    echo "</div>";
                    break;
                }
            }
            // If the qrid value was not found in the JSON data
            if (!$found) {
                echo "<span class='dmsg'><svg xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'><path d='M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z' fill='#ff595a' stroke='#ff595a' stroke-miterlimit='10' stroke-width='32'/><path d='M250.26 166.05L256 288l5.73-121.95a5.74 5.74 0 00-5.79-6h0a5.74 5.74 0 00-5.68 6z' fill='#212121' stroke='#212121' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/><path d='M256 367.91a20 20 0 1120-20 20 20 0 01-20 20z' stroke='#212121' fill='#212121' /></svg><span>Not verified</span>";
            }
        }
    } else {
        echo "<span class='dmsg'>File not found</span>";
    }


    $conn->close();

    ?>




</body>

</html>