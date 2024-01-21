<?php
include 'connector.php';  // Include your database connection script

// Fetch data from the "contacts" table
$sqlContacts = "SELECT ID, Name, Message FROM contacts";
$resultContacts = $conn->query($sqlContacts);

// Fetch data from the "farmers" table
$sqlFarmers = "SELECT FirstName, LastName, sector, district FROM farmers";
$resultFarmers = $conn->query($sqlFarmers);

$conn->close();  // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execufarm Dashboard</title>
    <link rel="stylesheet" href="./dashboard.css"/>
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
</head>
<body>

    <!-- Sidebar (Static Section) -->
    <div id="sidebar">
        <img src="execufarm.png" style="height: 11vh; margin-left: 25%; border-radius: 10px;"/><br><br><br><br>
        <a href="./dashboard.php"class="nav-link" >Dashboard</a>
        <a href="./farmers.php" class="nav-link">Farmers</a>
        <a href="#messages" class="nav-link">Messages</a>
        <a href="./updates.php" class="nav-link">Updates</a>
        <a href="./blog.php" class="nav-link">Add Blog</a>
        <a href="./blogs.php" class="nav-link">Blogs</a>
        <br><br>
        <a href="Homepage.php" class="nav-link">Logout</a>
        <!-- Add more links for other sections -->

        <!-- Static log section -->
        <br><br><br>
        <div style=" "> 
            <p style="margin-bottom: 0;">Welcome, Admin</p>
        </div>
    </div>

    <div id="content">
        <h2 style="color: white;">Add a New Blog Post</h2>

        <form action="process_blog.php" method="post" enctype="multipart/form-data">


            <!-- enctype="multipart/form-data" is required for handling file uploads -->

            <label for="blog_title">Title:</label>
            <input type="text" id="blog_title" name="blog_title" required>

            <label for="blog_content">Content:</label>
            <textarea id="blog_content" name="blog_content" required></textarea>

            <label for="blog_image">Image (File Upload):</label>
            <input type="file" id="blog_image" name="blog_image" accept="image/*" required>

            <button type="submit" name="submit_blog">Submit</button>
        </form>
    </div>
</body>
</html>
