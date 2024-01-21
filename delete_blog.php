<?php
// delete_blog.php

// Include your database connection script
include 'connector.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_blog"])) {
    // Get the blog ID from the form
    $blog_id = $_POST["blog_id"];

    // Prepare the delete query
    $sqlDeleteBlog = "DELETE FROM blog_posts WHERE id = $blog_id";

    // Execute the delete query
    if ($conn->query($sqlDeleteBlog) === TRUE) {
        echo "Blog deleted successfully";
    } else {
        echo "Error deleting blog: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
