<?php
include('connect.php');


$query = "SELECT COUNT(*) AS total_records FROM daftar_hadir where lokasi = 'rangkasbitung' ";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch the count from the result set
    $row = mysqli_fetch_assoc($result);
    $totalRecords = $row['total_records'];

    // Return JSON response with the count
    $response = array(
        'success' => true,
        'count' => $totalRecords
    );
    echo json_encode($response);
} else {
    // If the query fails, return an error response
    $response = array(
        'success' => false,
        'message' => 'Failed to fetch record count'
    );
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);

?>