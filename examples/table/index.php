<?php

// Input CSV file path
$csv_file = "input.csv";

// Output JSON file path
$json_file = "output.json";

// Read CSV file
$rows = array();
if (($handle = fopen($csv_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $rows[] = $data;
    }
    fclose($handle);
}

// Get column headers from first row of CSV
$header = array_shift($rows);

// Convert CSV to associative array
$json_data = array();
foreach ($rows as $row) {
    $json_data[] = array_combine($header, $row);
}

// Write JSON file
$file = fopen($json_file, "w");
fwrite($file, json_encode($json_data));
fclose($file);

echo "Conversion complete.";

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.min.css">
<script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="spreadsheet"></div>

<script>
    function createHandsontable() {
        // Fetch the data from the JSON file
        fetch('output.json')
            .then(response => response.json())
            .then(data => {
                // Extract column headers and row data
                const header = Object.keys(data[0]);
                const rows = data.map(row => Object.values(row));
                // Add the first row of the CSV data as the first row of the Handsontable data
                rows.unshift(header.map(col => [col])); // Wrap each column header in an array to make it a single-cell row

                // Create a Handsontable instance with the data
                const container = document.getElementById('spreadsheet');
                const hot = new Handsontable(container, {
                    wordWrap: false,
                    data: rows,
                    colHeaders: true,
                    rowHeaders: true,
                    minRows: 100,
                    minCols: 26,
                    allowEmpty: true,
                    licenseKey: 'non-commercial-and-evaluation',
                    colWidths: 100,
                    width: '100%',
                    height: 320,
                    contextMenu: true,
                    plugins: ['copyPaste'],
                });

                // Add a span to show save status
                const saveStatus = document.createElement('span');
                saveStatus.innerText = 'Not Saved';
                container.parentNode.insertBefore(saveStatus, container.nextSibling);

                // Bind to the `afterChange` event to update save status and trigger auto-save
                hot.addHook('afterChange', (changes, source) => {
                    if (source === 'loadData') {
                        return; // Ignore changes made during loading of data
                    }

                    // Check if there are any actual changes
                    const hasChanges = changes.some(change => change[2] !== change[3]);
                    if (!hasChanges) {
                        return; // No changes, so return without triggering saving operation
                    }

                    saveStatus.innerText = 'Not Saved';
                    // Update the `data` variable with the current data from the Handsontable instance
                    const newData = hot.getData().map(row => {
                        const obj = {};
                        row.forEach((cell, index) => {
                            obj[header[index]] = cell;
                        });
                        return obj;
                    });
                    const newJsonData = JSON.stringify(newData); // Include the header row in the data
                    // Save the data to the `output.json` file after a delay of 1 second
                    setTimeout(() => {
                        // Include the header row in the JSON data
                        const newJsonData = JSON.stringify(newData);
                        fetch('save.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: newJsonData
                        }).then(response => {
                            if (response.ok) {
                                saveStatus.innerText = 'Saved';
                            } else {
                                saveStatus.innerText = 'Not Saved';
                            }
                        }).catch(error => {
                            console.log(error);
                            saveStatus.innerText = 'Not Saved';
                        });
                    }, 1000);

                });


                // Bind to the `beforeunload` event to prompt user before leaving page
                window.addEventListener('beforeunload', (event) => {
                    if (saveStatus.innerText === 'Not Saved') {
                        event.preventDefault();
                        event.returnValue = '';
                    }
                });
            });
    }
</script>
<script>
    window.onload = createHandsontable;
</script>