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

// Retrieve and sanitize form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$empId = mysqli_real_escape_string($conn, $_POST['empId']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$ticketType = mysqli_real_escape_string($conn, $_POST['ticketType']);
$errorType = mysqli_real_escape_string($conn, $_POST['errorType']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$underAMC = mysqli_real_escape_string($conn, $_POST['underAMC']);
$amcNumber = isset($_POST['amcNumber']) ? mysqli_real_escape_string($conn, $_POST['amcNumber']) : null;

// Prepare and bind the SQL statement to prevent SQL injection
$sql = $conn->prepare("INSERT INTO tickets (name, department, emp_id, email, ticket_type, error_type, message, under_amc, amc_number) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssssss", $name, $department, $empId, $email, $ticketType, $errorType, $message, $underAMC, $amcNumber);

// Execute the statement
if ($sql->execute()) {
    echo "Ticket created successfully";
} else {
    echo "Error: " . $sql->error;
}

// Close the statement and connection
$sql->close();
$conn->close();
?>
