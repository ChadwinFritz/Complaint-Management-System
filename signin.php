<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

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

// Validate and sanitize form data
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$userType = mysqli_real_escape_string($conn, $_POST['userType']);

if (!$email) {
    echo "Invalid email address";
    exit();
}

// Retrieve user information from the database (use prepared statements to prevent SQL injection)
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND user_type = ?");
$stmt->bind_param("ss", $email, $userType);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password
    if (password_verify($password, $row['password'])) {
        // Set user information in session if needed
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['name'];

        echo "Login successful as $userType";
        // You can redirect to the user's dashboard or perform other actions here
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$stmt->close();
$conn->close();
?>
