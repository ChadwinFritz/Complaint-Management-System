<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Screen of Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4; /* Add a background color for better readability */
            color: #333; /* Set a default text color */
        }

        h2, h3 {
            color: #007bff; /* Set a header color */
        }

        form {
            max-width: 400px;
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff; /* Add a background color for the form */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
            display: block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Home Screen of Admin</h2>

    <form id="searchForm" action="search_tickets.php" method="post">
        <label for="searchDivision">Search Box Division-wise:</label>
        <input type="text" name="searchDivision" placeholder="Enter keywords or filter options">
        <button type="submit">Search</button>
    </form>

    <?php
    // Start session (make sure to call session_start() at the beginning of each PHP file)
    session_start();

    // Check if the Admin is logged in, redirect to the login page if not
    if (!isset($_SESSION['admin_id'])) {
        header("Location: admin_login.php");
        exit();
    }

    echo "<p>Welcome Admin " . $_SESSION['admin_name'] . "!</p>";
    ?>

    <h3>View Ticket:</h3>
    <!-- Display ticket information from the database -->

    <h3>Report Generation:</h3>
    <!-- Link to a page for generating reports -->

    <h3>View Sub-Admin List:</h3>
    <!-- Link to a page for viewing the list of Sub-Admins -->

    <a href="logout.php">Log-out</a>

    <script src="script.js"></script>
</body>
</html>