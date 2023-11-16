<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Check if the Admin is logged in, redirect to the login page if not
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

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

// Retrieve and sanitize form data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$empId = mysqli_real_escape_string($conn, $_POST['empId']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Hash the password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind the SQL statement to prevent SQL injection
$sql = $conn->prepare("INSERT INTO subadmins (subadmin_name, subadmin_email, subadmin_department, emp_id, password) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $name, $email, $department, $empId, $hashedPassword);

// Execute the statement
if ($sql->execute()) {
    echo "Sub-Admin added successfully";
} else {
    echo "Error: " . $sql->error;
}

// Close the statement and connection
$sql->close();
$conn->close();
?>
