<!DOCTYPE html>
<html>
    <head>
        <title> ExecuFarmRwanda</title>
        <link rel="icon" href="execufarm.png"/>

        <link rel="stylesheet" href="./register.css"/>
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
        <div class="next" style="background-image: url('sava.jpg'); height: 60vh; width: 100%; background-size: cover; background-repeat: no-repeat; background-position: 0ch;">

            <div class="overlay"></div>
            <div>
                <div class="heading" style="width: 71%;">
                    <h1 class="head"><span style="color: #29fd53;">Register here </span></h1>
          <p class="para"> Registered users can receive personalized updates, newsletters, and announcements, fostering a stronger connection between your organization and the farming community.</p>
         
                </div>
            </div>
        </div>
        <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="sign-in-form">
                <h1 style="color: #29fd53;">Register</h1>
                <label for="username">Firstname</label>
                <input type="text" id="Firstname" name="Firstname" required>
                <label for="username">Lastname</label>
                <input type="text" id="Lastname" name="Lastname" required>
                <label for="username">Username</label>
                <input type="text" id="username" name="Username" required>
                <label for="username">email</label>
                <input type="text" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="username">district</label>
                <input type="text" id="district" name="district" required>
                <label for="username">sector</label>
                <input type="text" id="sector" name="sector" required>
                
                
                <button type="submit">Sign In</button>
                <p class="footer">You have an account? <a href="./sign.php">Log in</a></p>
            </form>
            
        </div>

        <?php
    include('Connector.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['Firstname'];
    $last_name = $_POST['Lastname'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Hash the password for security
    $district = $_POST['district'];
    $sector = $_POST['sector'];

    // Prepare and execute the SQL query to insert data into the farmers table
    $sql = "INSERT INTO farmers (FirstName, LastName, Username, email, Pin, district, sector)
            VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$district', '$sector')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
    ?>

            
            
            
   
    </body>
</html>