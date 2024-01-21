<?php
include 'connector.php';

if (isset($_POST['delete_farmer'])) {
    $farmerId = $_POST['farmer_id'];

    // Perform the deletion based on $farmerId
    $sql = "DELETE FROM farmers WHERE id = $farmerId";
    $result = $conn->query($sql);

    // Output a response to indicate success or failure
    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}

$conn->close();
header("Location: dashboard.php"); // Redirect to your dashboard page
?>
