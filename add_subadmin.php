<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sub-Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
        }

        .container label {
            display: block;
            margin-bottom: 10px;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .container button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Sub-Admin</h2>
        <form id="addSubadminForm" action="process_add_subadmin.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" required>

            <label for="department">Department:</label>
            <input type="text" name="department" required>

            <label for="empId">Emp-ID:</label>
            <input type="text" name="empId" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Add Sub-Admin</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>