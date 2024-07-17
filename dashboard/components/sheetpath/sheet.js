function createHandsontable(jsonFilePath) {
    // Fetch the data from the JSON file
    fetch(jsonFilePath)
        .then(response => response.json())
        .then(data => {
            // Extract column headers and row data
            const header = Object.keys(data[0]);
            const rows = data.map(row => Object.values(row));
            // Add the first row of the CSV data as the first row of the Handsontable data
            rows.unshift(header.map(col => [col])); // Wrap each column header in an array to make it a single-cell row

            // Create a Handsontable instance with the data
            const container = document.getElementById('sheet_part2');
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
                // height: 320,
                contextMenu: true,
                plugins: ['copyPaste'],
            });


        });
}

// createHandsontable('components/sheet/643a67ba9d9332.08450538.json');