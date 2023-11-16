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

// Retrieve form data
$empId = $_POST['empId'];
$password = $_POST['password'];

// Prepare and execute the query using prepared statements to prevent SQL injection
$sql = "SELECT * FROM subadmins WHERE emp_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $empId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password using password_verify
    if (password_verify($password, $row['password'])) {
        // Store sub-admin information in the session
        $_SESSION['subadmin_id'] = $row['subadmin_id'];
        $_SESSION['subadmin_name'] = $row['subadmin_name'];
        echo "Login successful as Sub-Admin";
        // You can redirect to the sub-admin's dashboard or perform other actions here
    } else {
        echo "Incorrect password";
    }
} else {
    echo "Sub-Admin not found";
}

$stmt->close();
$conn->close();
?>
