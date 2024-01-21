<?php
session_start();  // Start the session

// Check if a farmer is logged in
if (!isset($_SESSION['farmer_email'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: sign.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execufarm Dashboard</title>
    <link rel="stylesheet" href="./dashboard.css"/>
    <link rel="stylesheet" href="./blog.css"/>
    <link rel="icon" href="execufarm.png"/>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #1f1f1f;
        }

        #sidebar {
            width: 200px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
            position: fixed;
        }

        #content {
            margin-left: 200px;
            padding: 20px;
        }

        .nav-link {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid #555;
        }

        .nav-link:hover {
            background-color: #555;
        }

        .main-content {
            /* Styles for the dynamic content section */
        }

        /* Styles for the form */
        form {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    </style>
</head>
<body>

    <!-- Sidebar (Static Section) -->
    <div id="sidebar">
        <img src="execufarm.png" style="height: 11vh; margin-left: 25%; border-radius: 10px;"/><br><br><br><br>
        <a href="./farmerdashboard.php" class="nav-link">Dashboard</a>
        <a href="./farmermessage.php" class="nav-link">Messages</a>
        <a href="./farmeraddmessage.php" class="nav-link">Add Message</a>
        <a href="Homepage.php" class="nav-link">Logout</a>
        <!-- Add more links for other sections -->

        <!-- Static log section -->
        <br><br><br>
        <div style=" ">
            <p style="margin-bottom: 0;">Welcome, <?php echo $_SESSION['farmer_name']; ?></p>
        </div>
    </div>
    <div id="content">
        <div class="main-content">
        <div class="blog-container">
        <h1 class="yaa">Our Latest News</h1>
        
        <?php
        // Include your database connection script
        include 'connector.php';

        // Fetch data from the "blog_posts" table
        $sqlBlogPosts = "SELECT id, title, content, image_path FROM blog_posts";
        $resultBlogPosts = $conn->query($sqlBlogPosts);

        // Check for errors in the query
        if (!$resultBlogPosts) {
            echo "Error in SQL query: " . $conn->error;
        } else {
            // Check if there are rows in the result
            if ($resultBlogPosts->num_rows > 0) {
                // Counter to keep track of the number of iterations
                $counter = 0;

                // Loop through each row and display the blog post
                while ($row = $resultBlogPosts->fetch_assoc()) {
                    // Check if a new row container should be started
                    if ($counter % 3 == 0) {
                        echo '<div class="row">';
                    }

                    echo '<div class="blog-box">
                            <img src="' . $row['image_path'] . '" alt="' . $row['title'] . '">
                            <h3>' . $row['title'] . '</h3>
                            <p>' . $row['content'] . '</p>
                            
                            
                        </div>';

                    // Check if the row container should be closed
                    if ($counter % 3 == 2 || $counter == $resultBlogPosts->num_rows - 1) {
                        echo '</div>';
                    }

                    // Increment the counter
                    $counter++;
                }
            } else {
                echo "No blog posts found.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        
    </div>
    </div>
    </div>

    <div class="farmer-messages-container" style="margin-left: 20%;">
       

    <br><br>

    <!-- Service Section -->
    <!-- Assuming this is the part of the code where you display farmer information -->
    
</body>
</html>
