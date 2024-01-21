<?php
session_start();  // Start the session

include('Connector.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['Username'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $adminQuery = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $adminResult = $conn->query($adminQuery);

    if ($adminResult->num_rows > 0) {
        // Admin is authenticated
        $_SESSION['admin_username'] = $username;
        echo '<script>alert("Admin login successful!");</script>';
        // Redirect the admin to the admin dashboard
        echo '<script>window.location.href = "dashboard.php";</script>';
        exit;
    }

    // Check if the user is a farmer
    $farmerQuery = "SELECT * FROM farmers WHERE Username='$username' AND Pin='$password'";
    $farmerResult = $conn->query($farmerQuery);

    if ($farmerResult->num_rows > 0) {
        // Farmer is authenticated
        $rowFarmer = $farmerResult->fetch_assoc();
        $_SESSION['farmer_name'] = $rowFarmer['FirstName'];
        $_SESSION['farmer_email'] = $rowFarmer['Username'];

        echo '<script>alert("Farmer login successful!");</script>';
        // Redirect the farmer to the farmer dashboard
        echo '<script>window.location.href = "farmerdashboard.php";</script>';
        exit;
    }

    // Invalid credentials
    echo "Invalid username or password";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ExecuFarmRwanda</title>
    <link rel="icon" href="execufarm.png"/>

    <link rel="stylesheet" href="./sign.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
</head>
<body>
    <header>
        <img src="execufarm.png" style="height: 11vh; margin-left: 1px; border-radius: 10px;"/>
        <ul class="navbar">
            <li><a href="Homepage.php" class="active">HOME</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="./news.php">Blog</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <div class="main">
            <a href="./sign.php" class="user"><i class="fa-solid fa-user-tie"></i>Log in</a>
            <a href="./register.php">Register</a>
            <a href="#" class="user"><i class="fa-solid fa-bars"></i></a>
        </div>
    </header>
    <div class="next" style="background-image: url('saved.jpg'); height: 60vh; width: 100%; background-size: cover; background-repeat: no-repeat;  background-position: 0ch;">
        <div class="overlay"></div>
        <div>
            <div class="heading" style="width: 71%;">
                <h1 class="head"><span style="color: #29fd53;">Log in here </span></h1>
                <p class="para"> Log in here so as to help you in enabling you to personalize your experience based on Your preferences, location, and farming needs, as well as receive trainings and guidance basing on your special problem</p>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="#" method="post" class="sign-in-form">
            <h1 style="color: #29fd53;">Log In</h1>
            <label for="username">Username</label>
            <input type="text" id="username" name="Username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" >Sign In</button>
            <p class="footer">Don't have an account? <a href="./index.html">Register</a></p>
        </form>
    </div>
</body>
</html>
