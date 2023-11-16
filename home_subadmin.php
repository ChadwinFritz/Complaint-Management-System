<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Screen of Sub-Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            color: #333;
        }

        h2, p, h3 {
            text-align: center;
            color: #0066cc;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #0066cc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #005bb5;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0066cc;
            text-decoration: none;
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

    // Check if the Sub-Admin is logged in, redirect to the login page if not
    if (!isset($_SESSION['subadmin_id'])) {
        header("Location: subadmin_login.php");
        exit();
    }

    echo "<h2>Home Screen of Sub-Admin:</h2>";
    echo "<p>Welcome Sub Admin " . $_SESSION['subadmin_name'] . "!</p>";
    ?>

    <form id="searchForm" action="search_tickets.php" method="post">
        <label for="searchDivision">Search Box Division-Wise:</label>
        <input type="text" name="searchDivision" placeholder="Enter keywords or filter options">
        <button type="submit">Search</button>
    </form>

    <h3>View Ticket:</h3>
    <!-- Display ticket information from the database -->

    <form id="updateTicketForm" action="update_ticket.php" method="post">
        <label for="ticketNo">Ticket no.:</label>
        <input type="text" name="ticketNo" readonly>

        <label for="errorType">Error Type:</label>
        <input type="text" name="errorType" readonly>

        <label for="dateTime">Date & Time:</label>
        <input type="text" name="dateTime" readonly>

        <label for="actionTaken">Action Taken:</label>
        <input type="text" name="actionTaken">

        <label for="status">Status:</label>
        <input type="text" name="status">

        <label for="assignedPerson">Assigned person:</label>
        <input type="text" name="assignedPerson">

        <label for="assignmentDateTime">Assignment Date & Time:</label>
        <input type="text" name="assignmentDateTime">

        <button type="submit">Submit Updates</button>
    </form>

    <h3>Report Generation:</h3>
    <!-- Link to a page for generating reports -->

    <h3>Add Error Type:</h3>
    <!-- Link to a page for adding new error types -->

    <a href="logout.php">Log-out</a>

    <script src="script.js"></script>
</body>
</html>