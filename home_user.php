<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home Screen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            color: #333;
        }

        h2, h3 {
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

        select, input[type="text"] {
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

    // Check if the user is logged in, redirect to the login page if not
    if (!isset($_SESSION['user_name'])) {
        header("Location: login.php");
        exit();
    }

    $userName = $_SESSION['user_name'];
    echo "<h2>Welcome, $userName</h2>";
    ?>

    <h3>Create Ticket:</h3>
    <form id="createTicketForm" action="create_ticket.php" method="post">
        <label for="errorType">Error Type:</label>
        <select name="errorType" required>
            <option value="bug">Bug</option>
            <option value="feature_request">Feature Request</option>
            <option value="other">Other</option>
        </select>

        <label for="actionTaken">Action Taken:</label>
        <input type="text" name="actionTaken" required>

        <label for="assignedPerson">Assigned person:</label>
        <input type="text" name="assignedPerson" required>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="not_done">NOT DONE</option>
            <option value="partially_done">PARTIALLY DONE</option>
            <option value="done">DONE</option>
        </select>

        <button type="submit">Submit Ticket</button>
    </form>

    <a href="logout.php">Log-out</a>

    <script src="script.js"></script>
</body>
</html>