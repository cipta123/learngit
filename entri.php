<?php

include('connect.php');

// Get the input value from the AJAX request
$inputValue = $_POST['inputValue'];

// Perform comparison with the database field (change 'database_field' to the actual field name)
$sql = "SELECT Nim, nama_mahasiswa FROM daftar_mhs_s1 WHERE Nim = '$inputValue'";
$result = mysqli_query($conn, $sql);

// Check if a matching record was found
if (mysqli_num_rows($result) > 0) {

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    
    // Retrieve the value of nama_mahasiswa from the result
    $namaMahasiswa = $row['nama_mahasiswa'];


    $response = array('success' => true, 'nama_mahasiswa' => $namaMahasiswa);


    // Insert values into the table daftar_hadir
    $nim = $inputValue; // Use $inputValue for Nim
    $namaMahasiswa = $row['nama_mahasiswa']; // Use $namaMahasiswa for nama_mahasiswa
    $lokasi = 'rangkasbitung';
    $masa = 20241 ;
    $kegiatan = 'osmb';
    // Prepare SQL statement for insertion
    $sqlInsert = "INSERT INTO daftar_hadir (Nim, nama_peserta,lokasi,masa,kegiatan) VALUES ('$nim', '$namaMahasiswa','$lokasi','$masa','$kegiatan')";
    
    // Execute the SQL statement
    if (mysqli_query($conn, $sqlInsert)) {
        // Insertion successful
        $response['inserted'] = true;
    } else {
        // Insertion failed
        $response['inserted'] = false;
    }



} else {
    $response = array('success' => false);
}

// Return the response as JSON
echo json_encode($response);

// Close database connection
mysqli_close($conn);