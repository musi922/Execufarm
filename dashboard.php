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
        <a href="./farmers.php" class="nav-link">Farmers</a>
        <a href="./messages.php" class="nav-link">Messages</a>
        <a href="./updates.php" class="nav-link">Updates</a>
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

    <div id="content">
        <div class="main-content">
           
            <section class="service-section">
                <h2>Farmer messages</h2>
                <div class="service-section-header">
                    <div class="search-field">
                        <i class="ph-magnifying-glass"></i>
                        <input type="text" placeholder="Farmer name">
                    </div>
                    <div class="dropdown-field">
                        <select>
                            <option>Email</option>
                        </select>
                        <i class="ph-caret-down"></i>
                    </div>
                    <button class="flat-button">
                        Search
                    </button>
                </div>
            </section>
            
<!-- ... (rest of your HTML) ... -->
    <div class="farmer-messages-container">
        <?php
        if ($resultContacts->num_rows > 0) {
            // Output data of each row for contacts
            while ($rowContacts = $resultContacts->fetch_assoc()) {
                echo '<div class="farmer-message-box">';
                echo '<h3>' . $rowContacts["Name"] . '</h3>';
                echo '<p>' . $rowContacts["Message"] . '</p>';

                // Add the delete button
                echo '<form method="post" action="delete_message.php">';
                if (isset($rowContacts["ID"])) {
                    echo '<input type="hidden" name="message_id" value="' . $rowContacts["ID"] . '"/>';
                }
                echo '<button type="submit" name="delete_contact_message">Delete</button>';
                echo '</form>';

                echo '</div>';
            }
        } else {
            echo "No contact messages available";
        }
        ?>
    </div>

            
<br><br>

            <!-- Service Section -->




       <!-- Assuming this is the part of the code where you display farmer information -->
       <?php
include 'connector.php';

$sqlFarmers = "SELECT id, FirstName, LastName, sector, district FROM farmers";
$resultFarmers = $conn->query($sqlFarmers);

?>

<table class="farmer-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Sector</th>
            <th>District</th>
            <th>Action</th> <!-- New column for the delete button -->
        </tr>
    </thead>
    <tbody>
        <?php
        if ($resultFarmers->num_rows > 0) {
            // Output data of each row for farmers
            while ($rowFarmers = $resultFarmers->fetch_assoc()) {
                echo "<tr>
                        <td>" . $rowFarmers["id"] . "</td>
                        <td>" . $rowFarmers["FirstName"] . "</td>
                        <td>" . $rowFarmers["LastName"] . "</td>
                        <td>" . $rowFarmers["sector"] . "</td>
                        <td>" . $rowFarmers["district"] . "</td>
                        <td>
                            <form method='post' action='delete_farmer.php'>
                                <input type='hidden' name='farmer_id' value='" . $rowFarmers["id"] . "'/>
                                <button type='submit' name='delete_farmer'>Delete</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No farmer data available</td></tr>";
        }
        ?>
    </tbody>
</table>


</body>
</html>
