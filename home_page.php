<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Management System Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            color: #333;
        }

        h2, p {
            text-align: center;
            color: #0066cc;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
        }

        li {
            display: inline-block;
            margin: 0 10px;
        }

        a {
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }

        a:hover {
            color: #005bb5;
        }
    </style>
</head>
<body>
    <?php
    // Start session (make sure to call session_start() at the beginning of each PHP file)
    session_start();

    // Check if the user is logged in, redirect to the login page if not
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    echo "<h2>Complaint Management System Home Page:</h2>";
    echo "<p>Welcome " . $_SESSION['user_name'] . " (" . $_SESSION['user_role'] . ")!</p>";
    ?>

    <ul>
        <li><a href="view_tickets.php">View Tickets</a></li>
        <li><a href="create_ticket.php">Create Ticket</a></li>
        <li><a href="generate_reports.php">Reports</a></li>
        <li><a href="add_error_type.php">Add Error Type</a></li>

        <?php
        // Display additional options based on user role
        if ($_SESSION['user_role'] == 'Admin') {
            echo "<li><a href='manage_users.php'>Manage Users</a></li>";
        }
        ?>

        <li><a href="logout.php">Log-out</a></li>
    </ul>

    <script src="script.js"></script>
</body>
</html>
