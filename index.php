<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
            color: #333;
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        select {
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

        script {
            display: block;
        }
    </style>
</head>
<body>
    <form id="signupForm" action="signup.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required>

        <label for="empId">Emp-id:</label>
        <input type="text" name="empId" required>

        <label for="division">Division:</label>
        <input type="text" name="division" required>

        <label for="designation">Design.:</label>
        <input type="text" name="designation" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="deskNo">Desk No:</label>
        <input type="text" name="deskNo" required>

        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required>

        <label for="userType">Sign-up as:</label>
        <select name="userType" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

        <button type="submit">Sign-up</button>
    </form>

    <script src="script.js"></script>
    <script>
        // Password strength validation
        document.getElementById("password").addEventListener("input", function () {
            const password = this.value;
            const strengthText = document.getElementById("password-strength");

            // Define your password strength criteria here
            const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            const mediumRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/;

            if (strongRegex.test(password)) {
                strengthText.innerHTML = "Strong";
                strengthText.style.color = "green";
            } else if (mediumRegex.test(password)) {
                strengthText.innerHTML = "Medium";
                strengthText.style.color = "orange";
            } else {
                strengthText.innerHTML = "Weak";
                strengthText.style.color = "red";
            }
        });

        // Password confirmation matching
        document.getElementById("confirmPassword").addEventListener("input", function () {
            const confirmPassword = this.value;
            const password = document.getElementById("password").value;
            const confirmMsg = document.getElementById("confirm-message");

            if (password === confirmPassword) {
                confirmMsg.innerHTML = "Passwords match";
                confirmMsg.style.color = "green";
            } else {
                confirmMsg.innerHTML = "Passwords do not match";
                confirmMsg.style.color = "red";
            }
        });
    </script>
</body>
</html>
