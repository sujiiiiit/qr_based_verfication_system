        <?php

        require_once "../../../database/conn.php";


        // Get the email from the cookie
        $email = $_COOKIE['email'];


        // Select all sheet names uploaded by the logged-in user
        $sql = "SELECT id,name,size FROM sheet_file WHERE user_id = (SELECT id FROM users WHERE email = '$email')";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo " <ul id='sheetul' class='sheetul'>";
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<li id='" . $row["id"] . "'>";
                echo "<div class='sheetli'>";
                echo "<div class='sheetindiv'>";
                echo "<i class='tgico-document'></i>";
                echo "<div class='sheetinfo'>";
                echo " <span class='sheetname'>" .  $row["name"]  . "</span>";
                echo "<span class='sheetsize'>" . $row["size"] . "</span>";
                echo "</div>";
                echo "<span class='del'>";
                echo "<i  id='del" . $row["id"] . "' class='tgico-delete'></i>";
                echo " </span></div></div></li>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No sheets uploaded by the logged-in user.";
        }

        // Close database connection
        $conn->close();

        ?>
        <script>
            $(document).ready(function() {
                var tableCreated = false;
                let hot;
                $('.sheetul li').click(function() {
                    var listItemID = $(this).attr('id');

                    $.ajax({
                        url: 'components/sheetpath/getpath.php',
                        type: 'POST',
                        data: {
                            id: listItemID
                        },
                        success: function(filepath) {
                            function maincont(filepath) {
                                // Reset the tableCreated variable to false
                                tableCreated = false;

                                if (tableCreated) {
                                    $('#sheet_part2').empty();
                                    hot.destroy();
                                }

                                // Calculate the remaining height after subtracting the header and footer heights
                                var remainingHeight = $(window).height() - ($('.header').innerHeight(true) + $('.footer-part').innerHeight(true));



                                function container(filepath) {
                                    fetch(filepath)
                                        .then(response => response.json())
                                        .then(data => {
                                            const header = Object.keys(data[0]);
                                            const rows = data.map(row => Object.values(row));
                                            rows.unshift(header.map(col => [col]));

                                            hot = new Handsontable(document.getElementById('sheet_part2'), {
                                                wordWrap: false,
                                                data: rows,
                                                colHeaders: true,
                                                rowHeaders: true,
                                                minRows: 40,
                                                minCols: 26,
                                                allowEmpty: true,
                                                licenseKey: 'non-commercial-and-evaluation',
                                                colWidths: 100,
                                                width: '100%',
                                                contextMenu: true,
                                                height: 'calc(100vh - 100px)',
                                                afterChange: function(changes, source) {
                                                    if (source !== 'loadData') {
                                                        saveData();
                                                    }
                                                }
                                            });
                                        }).catch(error => console.error(error));
                                }

                                container(filepath);

                                function saveData() {
                                    const data = hot.getData();
                                    const header = data.shift();
                                    const jsonData = [];

                                    for (let i = 0; i < data.length; i++) {
                                        const obj = {};
                                        for (let j = 0; j < header.length; j++) {
                                            obj[header[j]] = data[i][j];
                                        }
                                        jsonData.push(obj);
                                    }

                                    const xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'components/sidebar/save.php', true);
                                    xhr.setRequestHeader('Content-Type', 'application/json');
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                            console.log('Data saved successfully.');
                                        }
                                    };
                                    xhr.send(JSON.stringify(jsonData));
                                }

                                $.cookie('sheetisopen', filepath, {
                                    expires: 365
                                });
                                $.cookie('fileid', listItemID, {
                                    expires: 365
                                });

                                $(".header_part").hide();
                                $(".footer_tab2").addClass("activet");
                                $(".sheet_part").addClass("activefottab");
                                $(".footer_tab1").removeClass("activet");
                                $(".footer_part2").removeClass("activefottab")
                                $(".canvas_part").removeClass("activefottab");

                                // Set the tableCreated variable to true after creating the table
                                tableCreated = true;

                            }
                            maincont(filepath);

                            $(document).ready(function() {
                                $('#btntogen').click(function() {
                                    $.getJSON(filepath, function(data) {
                                        // Loop through each object in the data array
                                        $.each(data, function(index, obj) {
                                            // Generate a random 6-digit alphanumeric value
                                            var qrid = Math.random().toString(36).substring(2, 8);
                                            // Add the new "qrid" key with the generated value to the object
                                            obj.qrid = qrid;
                                            // Get the fileid value from the cookie
                                            const fileid = $.cookie('fileid');

                                            // Construct the URL with query parameters
                                            var url = window.location.origin + '/verify.php?fileid=' + fileid + '&qrid=' + qrid;
                                            obj.url = url;

                                            // Generate the QR code
                                            var qrcode = new QRCode(document.createElement("div"), {
                                                width: 100,
                                                height: 100
                                            }); 
                                            qrcode.makeCode(obj.url);

                                            // Get the data URI of the QR code
                                            var dataURI = qrcode._el.firstChild.toDataURL();

                                            // Add the QR code data URI to the object
                                            obj.qrimg = dataURI;
                                        });
                                        // Send the updated data to the server using AJAX
                                        $.ajax({
                                            type: "POST",
                                            url: "components/sidebar/newsave.php",
                                            data: {
                                                data: JSON.stringify(data)
                                            },
                                            success: function(output) {
                                                console.log(output);
                                                // hot.loadData(data);       
                                                maincont(filepath);
                                            },
                                            error: function() {
                                                console.log("Error saving data!");
                                                exit;
                                            }
                                        });
                                    });

                                });
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error response here
                        }
                    });
                });
            });
        </script>