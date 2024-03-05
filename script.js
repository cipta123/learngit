$(document).ready(function() {
    $('#submit-form').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        // Get the input value
        var inputValue = $('#input-text').val();

        // Send AJAX request to compare the input value with the database field
        $.ajax({
            url: 'entri.php', // PHP script to handle the comparison
            method: 'POST',
            data: { inputValue: inputValue }, // Send input value to the PHP script
            dataType: 'json',
            success: function(response) {
                // Handle the response from the PHP script
                if (response.success) {
                    // Comparison successful
                    alert('data berhasil disimpan');
                    $('#input-text').val('');
                } else {
                    // Comparison failed
                    alert('Nim tidak ditemukan');
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });

    });

    function fetchData() {
        $.ajax({
            url: 'fetch_daftar_hadir.php', // PHP script to fetch data from the database
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Call function to populate table with retrieved data
                    updateTable(response.data);
                    //populateTable(response.data);
                } else {
                    console.error('Failed to fetch data');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Function to populate the table with data
    // function populateTable(data) {
    //     var tableBody = $('#table-body');
    
    //     // Iterate over each data row and append it to the table
    //     $.each(data, function(index, row) {
    //         var newRow = '<tr>' +
    //             '<td>' + row.id + '</td>' +
    //             '<td>' + row.Nim + '</td>' +
    //             '<td>' + row.nama_peserta + '</td>' +
    //             '<td>' + row.lokasi + '</td>' +
    //             '<td>' + row.masa + '</td>' +
    //             '</tr>';
    //         tableBody.append(newRow);
      
    //     });
    // }

    function updateTable(data) {
        var tableBody = $('#table-body');
        tableBody.empty(); // Clear existing table rows

        // Iterate over each data row and prepend it to the table
        $.each(data, function(index, row) {
            var newRow = '<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + row.Nim + '</td>' +
                '<td>' + row.nama_peserta + '</td>' +
                '<td>' + row.lokasi + '</td>' +
                '<td>' + row.masa + '</td>' +
                '<td>' + row.kegiatan + '</td>' +
                '</tr>';
            tableBody.prepend(newRow);
        });
    }


    function fetchRecordCount() {
        $.ajax({
            url: 'fetch_record_count_osmb_rangkas.php', // URL of server-side script to fetch count
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Update the content of the span element with the count
                    $('#record-count-rangkas').text(response.count);
                } else {
                    console.error('Failed to fetch record count');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function fetchDataPeriodically() {
        // Fetch data initially
        fetchData();
        fetchRecordCount();
        // Set interval to fetch data every 5 seconds (adjust as needed)
        setInterval(fetchData, 1000); // 5000 milliseconds = 5 seconds
        setInterval(fetchRecordCount, 1000)
    }

    fetchDataPeriodically();
    // Call fetchData function when the page loads
    //fetchData();

    


});