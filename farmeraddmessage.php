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
</head>
<body>

    <!-- Sidebar (Static Section) -->
    <div id="sidebar">
    <img src="execufarm.png" style="height: 11vh; margin-left: 25%; border-radius: 10px;"/><br><br><br><br>
        <a href="./farmerdashboard.php"class="nav-link" >Dashboard</a>
        <a href="./farmermessage.php" class="nav-link">Messages</a>
        <a href="./farmeraddmessage.php" class="nav-link">Add Message</a>
        <a href="Homepage.php" class="nav-link">Logout</a>
        <!-- Add more links for other sections -->

        <!-- Static log section -->
        <br><br><br>
        <div style=" "> 
            <p style="margin-bottom: 0;">Welcome, farmer</p>
        </div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!-- Your form elements here -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        
            <button type="submit">Send Message</button>
        </form>
        <?php
    include('Connector.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare and execute the SQL query to insert data into the contacts table
        $sql = "INSERT INTO contacts (Name, Email, Message)
                VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Insert successful
            echo '<script>alert("Message sent successfully!");</script>';
        } else {
            // Insert failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>



   
</body>
</html>
