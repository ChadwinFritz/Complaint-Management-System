<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Check if the user is logged in, redirect to the login page if not
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database configuration (replace with the path to your configuration file)
include("config.php");

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize form data
$user_id = $_SESSION['user_id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$empId = mysqli_real_escape_string($conn, $_POST['empId']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$ticketType = mysqli_real_escape_string($conn, $_POST['ticketType']);
$errorType = mysqli_real_escape_string($conn, $_POST['errorType']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$underAMC = mysqli_real_escape_string($conn, $_POST['underAMC']);
$amcNumber = mysqli_real_escape_string($conn, $_POST['amcNumber']);

// Generate ticket number (you may use a more sophisticated method)
$ticketNumber = uniqid();

// Get the current date and time
$dateAndTime = date("Y-m-d H:i:s");

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO tickets (user_id, ticket_number, name, department, emp_id, email, ticket_type, error_type, message, under_amc, amc_number, date_time) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssss", $user_id, $ticketNumber, $name, $department, $empId, $email, $ticketType, $errorType, $message, $underAMC, $amcNumber, $dateAndTime);

if ($stmt->execute()) {
    echo "Ticket created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
