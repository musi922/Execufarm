<?php
include 'connector.php';

if (isset($_POST['submit_blog'])) {
    $blog_title = $_POST['blog_title'];
    $blog_content = $_POST['blog_content'];

    // File upload handling
    $file_name = $_FILES['blog_image']['name'];
    $file_tmp = $_FILES['blog_image']['tmp_name'];
    $file_destination = 'uploads' . DIRECTORY_SEPARATOR . $file_name;

    // Create the 'uploads' directory if it doesn't exist
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    // Move the uploaded file to the 'uploads' directory
    if (move_uploaded_file($file_tmp, $file_destination)) {
        $sql = "INSERT INTO blog_posts (title, content, image_path) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Check if the statement was prepared successfully
        if ($stmt) {
            $stmt->bind_param("sss", $blog_title, $blog_content, $file_destination);

            // Check if the parameters were bound successfully
            if ($stmt->execute()) {
                echo "Blog post added successfully!";
            } else {
                echo "Error executing the prepared statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing the statement: " . $conn->error;
        }
    } else {
        echo "Error moving the uploaded file.";
    }
}

$conn->close();
?>
