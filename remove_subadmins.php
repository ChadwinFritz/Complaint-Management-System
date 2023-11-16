<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Check if the Admin is logged in, redirect to the login page if not
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Retrieve selected Sub-Admins
$selectedSubAdmins = json_decode($_POST['selectedSubAdmins']);

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

// Remove selected Sub-Admins from the database using prepared statements
$sql = "DELETE FROM subadmins WHERE subadmin_id = ?";
$stmt = $conn->prepare($sql);

// Check if the prepared statement is valid
if ($stmt === false) {
    die("Error in prepared statement: " . $conn->error);
}

// Bind parameters and execute the statement for each selected Sub-Admin
foreach ($selectedSubAdmins as $subAdminId) {
    $stmt->bind_param("s", $subAdminId);
    if ($stmt->execute() === false) {
        die("Error in execution: " . $stmt->error);
    }
}

echo "Selected Sub-Admins removed successfully.";

// Close the prepared statement and connection
$stmt->close();
$conn->close();
?>
