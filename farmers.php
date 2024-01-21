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
    </style>
</head>
<body>

    <!-- Sidebar (Static Section) -->
    <div id="sidebar">
        <img src="execufarm.png" style="height: 11vh; margin-left: 25%; border-radius: 10px;"/><br><br><br><br>
        <a href="./dashboard.php"class="nav-link" >Dashboard</a>
        <a href="#farmers" class="nav-link">Farmers</a>
        <a href="./messages.php" class="nav-link">Messages</a>
        <a href="#farmers" class="nav-link">Updates</a>
        <a href="./blog.php" class="nav-link">Add Blog</a>
        <a href="./blogs.php" class="nav-link">Blogs</a><br><br>
        <a href="Homepage.php" class="nav-link">Logout</a>
        <!-- Add more links for other sections -->

        <!-- Static log section -->
        <br><br><br>
        <div style=" "> 
            <p style="margin-bottom: 0;">Welcome, Admin</p>
        </div>
    </div>

   
        
           
            


            <!-- Service Section -->




        <table class="farmer-table" style="width: 70%;margin-left: 20%; margin-top: 3%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sector</th>
                    <th>District</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultFarmers->num_rows > 0) {
                    // Output data of each row for farmers
                    while ($rowFarmers = $resultFarmers->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $rowFarmers["FirstName"] . "</td>
                                <td>" . $rowFarmers["LastName"] . "</td>
                                <td>" . $rowFarmers["sector"] . "</td>
                                <td>" . $rowFarmers["district"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "No farmer data available";
                }
                ?>
            </tbody>
        </table>
  

</body>
</html>
