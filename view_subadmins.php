<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Sub-Admin List</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <?php
    // Start session (make sure to call session_start() at the beginning of each PHP file)
    session_start();

    // Check if the Admin is logged in, redirect to the login page if not
    if (!isset($_SESSION['admin_id'])) {
        header("Location: admin_login.php");
        exit();
    }

    echo "<h2>View Sub-Admin List:</h2>";
    echo "<p>Welcome Admin " . htmlspecialchars($_SESSION['admin_name']) . "!</p>";
    ?>

    <a href="add_subadmin.php">Add Sub-Admin</a>

    <?php
    // Establish database connection (replace with your database credentials)
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_dbname";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch sub-admins from the database
    $sql = "SELECT * FROM subadmins";
    $result = $conn->query($sql);

    // Display sub-admin list in a table
    echo "<form id='removeSubAdminsForm' action='remove_subadmins.php' method='post'>";
    echo "<table border='1'>
            <tr>
                <th>Emp-ID</th>
                <th>Name</th>
                <th>Depart</th>
                <th>Email-ID</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['emp_id']) . "</td>
                <td>" . htmlspecialchars($row['subadmin_name']) . "</td>
                <td>" . htmlspecialchars($row['subadmin_department']) . "</td>
                <td>" . htmlspecialchars($row['subadmin_email']) . "</td>
                <td><input type='checkbox' name='selectedSubAdmins[]' value='" . htmlspecialchars($row['subadmin_id']) . "'></td>
              </tr>";
    }

    echo "</table>";

    $conn->close();
    ?>

    <button type="submit">Remove Selected Sub-Admins</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
