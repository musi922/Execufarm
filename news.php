<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Execufarm News</title>
    <link rel="icon" href="execufarm.png"/>
    <link rel="stylesheet" href="./blog.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        /* Add your custom styles here */
        /* ... */
    </style>
</head>
<body>
    <header>
        <img src="execufarm.png" style="height: 11vh; margin-left: 1px; border-radius: 10px;"/>
        <ul class="navbar">
            <li><a href="Homepage.php">HOME</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="./blog.php" class="active">Blog</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <div class="main">
            <a href="./sign.php" class="user"><i class="fa-solid fa-user-tie"></i>Log in</a>
            <a href="./register.php">Register</a>
            <a href="#" class="user"><i class="fa-solid fa-bars"></i></a>
        </div>
    </header>

    <div class="next" style="background-image: url('tec.jpg'); height: 90vh; width: 100%; background-size: cover; background-repeat: no-repeat;  background-position: center;">
        <div class="overlay"></div>
        <div>
            <div class="heading" style="width: 71%;">
                <h1 class="head"><span style="color: #29fd53;">Our Updates</span></h1>
                <p class="para">In the blog section, we share company updates, announcements, and any new services or features we're introducing. This keeps you informed about the latest developments within ExecuFarm Solutions.</p>
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

  
</body>
</html>
