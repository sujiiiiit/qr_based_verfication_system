<div style=" position: relative; overflow: hidden;width: 100%;height: 100%;">
    <div style="position: absolute; inset: 0px; margin-right: -17px;margin-bottom: -17px;">
        <div class="subsidebar2">
            <!-- design tab  -->
            <div class="subsidebartabs activesubsidebartabs" fortab="designstab">
                <!-- search bar  -->
                <label for="input" class="searchlabel" id="search-label">
                    <button class="disabled btn-icon tgico tgico-search"></button>
                    <input class="search-input" id="searchinput" type="text" placeholder="Search" />
                    <button data-tippy-content="Clear" id="clear-search" class="btn-icon tgico tgico-close clear-search"></button>
                    <button data-tippy-content="Filter" id="filtersearch" class="btn-icon tgico tgico-tools"></button>
                </label>
                <!-- search dropdown -->
                <div class="select-wrapper select-wrapper1">
                    <div class="scrollable">
                        <div class="searchitems">
                            <ul>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>
                                <li>Filter items</li>


                            </ul>
                        </div>
                    </div>
                </div>
                <!-- filter dropdown -->
                <div class="select-wrapper select-wrapper2">
                    <div class="scrollable">
                        <div class="filteritems">
                            <ul>
                                <li>Sujit</li>
                                <li>Sujit</li>
                                <li>Sujit</li>
                                <li>Sujit</li>
                                <li>Sujit</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- tabs -->
                <div class="left_subconatiner_tab">
                    <div class="tabs_header">
                        <nav>
                            <div class="tab tab_reel1 active">
                                <div class="block">Templates</div>
                            </div>
                            <div class="tab tab_reel2">
                                <div class="block">Texts</div>
                            </div>
                            <div class="tab tab_reel3">
                                <div class="block">Saved</div>
                            </div>
                            <div class="indicator"></div>
                        </nav>
                    </div>
                    <div class="tab_main">
                        <main>
                            <!-- tab 1 Templates  -->

                            <div class=" scrollable tab_content tab_content1 active">
                                <!-- tags_wrapper -->
                                <div class="tags_wrapper">
                                    <div data-tippy-content="Scroll left" class="scrolldiv_icon"><i id="left" class=" btn-icon tgico-previous"></i>
                                    </div>
                                    <ul class="tags_box_cont">
                                        <li class="tag">Coding</li>
                                        <li class="tag">JavaScript</li>
                                        <li class="tag">Podcasts</li>
                                        <li class="tag">Databases</li>
                                        <li class="tag">Web Development</li>
                                        <li class="tag">Unboxing</li>
                                        <li class="tag">History</li>
                                        <li class="tag">Programming</li>
                                        <li class="tag">Gadgets</li>
                                        <li class="tag">Algorithms</li>
                                        <li class="tag">Comedy</li>
                                        <li class="tag">Gaming</li>
                                        <li class="tag">Share Market</li>
                                        <li class="tag">Smartphones</li>
                                        <li class="tag">Data Structure</li>
                                    </ul>
                                    <div data-tippy-content="Scroll right" class="scrolldiv_icon"><i id="right" class="btn-icon tgico-next"></i></div>
                                </div>

                                <!-- skeleton  -->

                                <div class="main_tab_content preloader preloadergrid">
                                    <div class="items rect pre1"></div>
                                    <div class="items rect pre2"></div>
                                    <div class="items rect pre3"></div>
                                    <div class="items rect pre4"></div>
                                    <div class="items rect pre5"></div>
                                    <div class="items rect pre6"></div>
                                    <div class="items rect pre7"></div>
                                    <div class="items rect pre8"></div>
                                    <div class="items rect pre9"></div>
                                    <div class="items rect pre10"></div>
                                </div>

                            </div>
                            <!-- tab 2 Text  -->
                            <!-- add text button  -->
                            <div class="scrollable tab_content tab_content2">
                                <div class="btndiv">
                                    <button id="add_txt" class=" btn" type="button">Add a text box
                                    </button>
                                </div>

                                <div class="hori_break"></div>

                                <div class="add_text_box">
                                    <button>
                                        Add a heading
                                    </button>
                                    <button>
                                        Add a heading
                                    </button>
                                    <button>
                                        Add a heading
                                    </button>

                                </div>


                                <div class="add_font_combination">
                                    <span class="specific_label">Font
                                        combinations</span>
                                    <!-- skeleton  -->
                                    <div class="main_tab_content top-margin preloader preloadergrid">
                                        <div class="items rect pre1"></div>
                                        <div class="items rect pre2"></div>
                                        <div class="items rect pre3"></div>
                                        <div class="items rect pre4"></div>

                                    </div>
                                </div>

                            </div>

                            <!-- tab 3 Saved  -->
                            <div class="tab_content tab_content3">
                                <div class="main_tab_content top-margin preloader preloadergrid">
                                    <div class="items rect pre1"></div>
                                    <div class="items rect pre2"></div>

                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <!-- tab ends here -->
            </div>
            <!-- Elements tab  -->
            <div class="subsidebartabs" fortab="elementstab">
                <!-- search bar  -->
                <h1>thsi is kajsd</h1>

            </div>
            <script>
                $(document).ready(function() {
                    // Your code to execute on page load or refresh goes here
                    refreshDiv();
                    refreshDiv2();

                });


                function refreshDiv() {
                    $('#sheetdiv').load('components/sidebar/reloadcontent.php');
                }

                function refreshDiv2() {
                    $('#imgdiv').load('components/sidebar/reloadimg.php');
                }
            </script>
            <!-- Uploads tab -->
            <div class="subsidebartabs" fortab="uploadstab">
                <label for="input" class="searchlabel" id="search-label">
                    <button class="disabled btn-icon tgico tgico-search"></button>
                    <input class="search-input" id="searchinput" type="text" placeholder="Search">
                    <button data-tippy-content="Clear" id="clear-search" class="btn-icon tgico tgico-close clear-search" style="display: none;"></button>
                </label>
                <form id="img-form" action="" method="post" enctype="multipart/form-data">
                    <input style="width:0;height:0;position:absolute;" type="file" name="img_file" id="choose_img">
                    <button style="margin-top: 10px;" id="upload_img" class=" btn" type="button">Upload
                    </button>
                </form>
                <script>
                    $(document).ready(function() {
                        // Trigger file input dialog when Upload button is clicked
                        $("#upload_img").click(function() {
                            $("#choose_img").trigger("click");
                        });

                        // Upload CSV file via Ajax when file input is changed
                        $("#choose_img").change(function() {
                            var formData = new FormData($("#img-form")[0]);
                            $.ajax({
                                url: "components/uploadimg.php",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    // alert(response);
                                    refreshDiv2();

                                }
                            });
                        });
                    });
                </script>

                <div id="imgdiv" class="imgdiv sheetdiv sheetul">

                </div>

            </div>

            <!-- Sheets tab  -->
            <div class="subsidebartabs" fortab="sheetstab">
                <label for="input" class="searchlabel" id="search-label">
                    <button class="disabled btn-icon tgico tgico-search"></button>
                    <input class="search-input" id="searchinput" type="text" placeholder="Search">
                    <button data-tippy-content="Clear" id="clear-search" class="btn-icon tgico tgico-close clear-search" style="display: none;"></button>
                </label>
                <form id="csv-form" action="" method="post" enctype="multipart/form-data">
                    <input accept="csv" style="width:0;height:0;position:absolute;" type="file" name="csv_file" id="sheet_ud">
                    <button style="margin-top: 10px;" id="upload_media" class=" btn" type="button">Upload .CSV
                    </button>
                </form>

                <script>
                    $(document).ready(function() {
                        // Trigger file input dialog when Upload button is clicked
                        $("#upload_media").click(function() {
                            $("#sheet_ud").trigger("click");
                        });

                        // Upload CSV file via Ajax when file input is changed
                        $("#sheet_ud").change(function() {
                            var formData = new FormData($("#csv-form")[0]);
                            $.ajax({
                                url: "components/convert.php",
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                dataType: "text", // specify the expected data type
                                success: function(response) {
                                    // alert(response);
                                    if (response === 'onlycsv') {
                                        alert("only csv file acceptable");
                                    }
                                    refreshDiv();
                                },
                                error: function(xhr, status, error) {
                                    console.log("Error: " + error); // log the error message
                                    alert("An error occurred while uploading the file."); // display an error message to the user
                                }
                            });
                        });
                    });
                </script>


                <!-- sheet list display -->

                <div id="sheetdiv" class="sheetdiv">
                    <!-- <li id="2fasdad">
                        <div class="sheetli">
                            <div class="sheetindiv">
                                <i class="tgico-document"></i>
                                <div class="sheetinfo">
                                    <span class="sheetname">Filename.csv</span>
                                    <span class="sheetsize">223.0 KB</span>
                                </div>
                                <span class="del">
                                    <i class="tgico-delete"></i>

                                </span>
                            </div>
                        </div>
                    </li> -->
                </div>
            </div>
            <!-- end of sheet tab  -->

            <script>


            </script>

            <!-- Projects tab  -->
            <div class="subsidebartabs" fortab="projectstab">
                <h1>This is projectstab</h1>

            </div>
            <!-- QR tab  -->
            <div class=" scrollable subsidebartabs qrtab" fortab="qrtab">
                <div class="qrtabinner">
                    <div class="qrtabitems">
                        <p class="qrheading">QR Code</p>
                        <p class="qrdesc">Add a URL and we'll create a QR code for you
                            to add to your design. People can scan the QR code to reach
                            the URL</p>

                        <div class="qrinputcont">
                            <label><span class="qrlabels">Text</span></label>
                            <label for="input" class="searchlabel">
                                <input class="search-input" id="qrtext" type="text" placeholder="Enter Text" />
                                <button data-tippy-content="Clear" class="btn-icon tgico tgico-close clear-search"></button>
                            </label>
                        </div>
                        <div class="qrcodecont">
                            <label><span class="qrlabels">Preview</span></label>
                            <div id="qrcodegenerated"></div>

                        </div>
                        <div class="qrcodecont">
                            <span class="specific_label">QR Designs</span>
                            <!-- skeleton  -->
                            <div class="top-margin preloader preloadergrid">
                                <div class="items rect pre1"></div>
                                <div class="items rect pre2"></div>
                                <div class="items rect pre3"></div>
                                <div class="items rect pre4"></div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Projects tab  -->
            <div class="subsidebartabs" fortab="resize_tab">
                <br>
                <label class="qrlabels" for="width-input">Width:</label>
                <input type="number" id="width-input">
                <br>
                <label class="qrlabels" for="height-input">Height:</label>
                <input type="number" id="height-input">


            </div>
            <!-- File tab  -->
            <div class="subsidebartabs" fortab="file_tab">
                <input type="file" id="file-input">
            </div>

        </div>
    </div>
    <div style="position: absolute;height: 6px;transition: opacity 200ms ease 0s;opacity: 0;right: 2px;bottom: 2px;left: 2px;border-radius: 3px;">
        <div style="position: relative;display: block;height: 100%;cursor: pointer;border-radius: inherit;background-color: rgba(0, 0, 0, 0.2);width: 0px;transform: translateX(0px);"></div>
    </div>
    <div style="position: absolute;width: 6px;transition: opacity 200ms ease 0s;opacity: 0;right: 2px;bottom: 2px;top: 2px;border-radius: 3px;">
        <div style="background: rgba(255, 255, 255, 0.3);height: 0px;"></div>
    </div>
</div>