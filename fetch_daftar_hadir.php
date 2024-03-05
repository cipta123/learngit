<?php

include('connect.php');


$sql = "SELECT * FROM daftar_hadir";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Prepare response
    $response = array('success' => true, 'data' => $data);
} else {
    // If no rows were returned
    $response = array('success' => false);
}

// Return the response as JSON
echo json_encode($response);

// Close database connection
mysqli_close($conn);


?>