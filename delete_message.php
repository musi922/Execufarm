<?php
include 'connector.php';

if (isset($_POST['delete_contact_message'])) {
    if (isset($_POST['message_id'])) {
        $messageId = $_POST['message_id'];

        // Perform the deletion based on $messageId
        $sql = "DELETE FROM contacts WHERE ID = $messageId";
        $result = $conn->query($sql);

        // Output a response to indicate success or failure
        if ($result) {
            // Redirect to the dashboard page
            header('Location: dashboard.php');
            exit(); // Make sure to exit after the header redirect
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Deletion failed']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing message_id']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No delete_contact_message in POST']);
}

$conn->close();
?>
