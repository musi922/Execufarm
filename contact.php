<!DOCTYPE html>
<html>
    <head>
        <title> ExecuFarmRwanda</title>
        <link rel="icon" href="execufarm.png"/>

        <link rel="stylesheet" href="./contact.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    </head>
<body>
    <header>
            
        <img src="execufarm.png" style="height: 11vh; margin-left: 1px; border-radius: 10px;"/>
        <ul class="navbar">
            <li><a href="Homepage.php" >HOME</a></li>
            <li><a href="./about.html">About</a></li>
           
            <li><a href="./news.php">Blog</a></li>
            <li><a href="./contact.php" class="active">Contact</a></li>
            
        </ul>
        <div class="main">
            <a href="./sign.php" class="user"><i class="fa-solid fa-user-tie"></i>Log in</a>
            <a href="./register.php">Register</a>
            <a href="#" class="user"><i class="fa-solid fa-bars"></i></a>
        </div>
    
</header>
<div class="next" style="background-image: url('mon2.jpg'); height: 90vh; width: 100%; background-size: cover; background-repeat: no-repeat;  background-position: 0ch;">
    <div class="overlay"></div>
    <div>
        <div class="heading" style="width: 71%;">
            <h1 class="head"><span style="color: #29fd53;">contact us here </span></h1>
          <p class="para"> In case you have questions about our services, need clarification on certain topics, or seek assistance. This contact page allows you to reach out directly to our personalized support.</p>
          <button type="submit" class="btn" ><a href="#" style="color: white;">Read more</a></button>

        </div>
    </div>
</div>
    <div class="container">
        <div class="contact-header">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you. Reach out to us with any questions or feedback.</p>
        </div>
        
        <div class="contact-info">
            <div class="info-item">
                <a href="#" class="user"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                <p>123 Main Street, Cityville</p>
            </div>
            <div class="info-item">
                <a href="#" class="user"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                <p>info@example.com</p>
            </div>
            <div class="info-item">
                <a href="#" class="user"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                
                <p>(123) 456-7890</p>
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
        
    </div>

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
