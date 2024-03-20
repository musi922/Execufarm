<!DOCTYPE html>
<html>
    <head>
        <title> ExecuFarmRwanda</title>
        <link rel="icon" href="execufarm.png"/>

        <link rel="stylesheet" href="./homepage.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    </head>
    <body>
        <header>
            
                <img src="execufarm.png" style="height: 11vh; margin-left: 1px; border-radius: 10px;"/>
                <ul class="navbar">
                    <li><a href="/index.php" class="active">HOME</a></li>
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
        <div class="next" style="background-image: url('mon.jpg'); height: 90vh; width: 100%; background-size: cover; background-repeat: no-repeat;  background-position: 0ch;">
            <div class="overlay"></div>
            <div>
                <div class="heading" style="width: 71%;">
                    <h1 class="head" style="color: white;">Connect with <span style="color: #29fd53;">ExecFarm </span>Rwanda</h1>
          <p class="para" style="color: #f0eded;"> ExecFarm Rwanda is company that focuses on providing innovative & <span style="margin-left: 30%; margin-top: 20%;"> expert solutions for agriculture.</span></p>
          <button type="submit" class="btn" ><a href="#" style="color: white;">Read more</a></button>
         
                </div>
            </div>
        </div>
        <div class="mission" style="height: 50vh; color: black;">
            <h1 class="yaa">Our Mission, Vision and Values</h1>
            <p class="yoo">
                The execufarm envisions a future in which the agricultural sector is prosperous, sustainable, and technology-driven, resulting in thriving farmers, prosperous communities, and a flourishing environment. Their mission is to empower the agricultural community with innovative technology and expertise, ultimately enhancing sustainability, productivity, and livelihoods in Rwanda and beyond. They place a strong emphasis on values that promote pioneering sustainable practices and collaborating with integrity to foster growth and prosperity</p>

        </div>
    <div class="content-container" style="margin-top: 5%;">
        <div class="image-box">
            <img src="R.jpg" alt="Your Image" style="height: 74.5vh;">
            <div class="over">
                <h2 style="color: #29fd53;">OUR SERVICES</h2>
                <p style="color: white;">we address crop cultivation, weather forecasts, market prices, and best farming practices</p>
            </div>
        </div>
       
        <div class="text-container">
            <div class="row">
                <div class="text-box">
                    <h2>Climate-Resilient Farming Practices</h2>
                    <p>Educate farmers on climate change adaptation strategies, such as drought-resistant crops and sustainable practices for unpredictable weather patterns.</p>
                </div>
                <div class="text-box">
                    <h2>Pest and Disease Management</h2>
                    <p>we Provide information and resources for identifying, preventing, and managing common pests and diseases affecting crops in the region.</p>
                </div>
            </div>
            <div class="row">
                <div class="text-box">
                    <h2>Financial Services</h2>
                    <p>Facilitate access to microloans or financial institutions that specialize in agricultural funding to help farmers secure capital for their operations.</p>
                </div>
                <div class="text-box">
                    <h2>Supply Chain Support:</h2>
                    <p>We Assist farmers in connecting with reliable suppliers of seeds, fertilizers, and farming equipment at competitive prices.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-container">
        <h1 class="yaa">Our Latest News</h1>
        
        <?php
        // Include your database connection script
        include 'connector.php';

        // Fetch data from the "blog_posts" table
        $sqlBlogPosts = "SELECT title, content, image_path FROM blog_posts";
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
    <section id="contact">
        <h2>Contact Us</h2><br>
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

    </section>

  
    <footer class="new_footer_area bg_color" style="height: 90vh;">
        <div class="new_footer_top" style="margin-left: 9%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Don’t miss any updates of our Execufarm!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email">
                                <button class="btn btn_get btn_get_two" type="submit">Subscribe</button>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Pages</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Homepage</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">moreinfo</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-linkedin"></a>
                                <a href="#" class="fab fa-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="footer_bottom" style="margin-top: -15%; margin-left: 15%;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400">© execufarm.. 2023 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <p>Made <i class="icon_heart"></i> by <a href="#" target="_blank">Musimerichard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

   





    </body>
</html>