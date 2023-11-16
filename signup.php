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

// Retrieve form data (use mysqli_real_escape_string to prevent SQL injection)
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$empId = mysqli_real_escape_string($conn, $_POST['empId']);
$division = mysqli_real_escape_string($conn, $_POST['division']);
$designation = mysqli_real_escape_string($conn, $_POST['designation']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$deskNo = mysqli_real_escape_string($conn, $_POST['deskNo']);
$password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT); // Hash the password
$userType = mysqli_real_escape_string($conn, $_POST['userType']);

// Insert data into the database
$sql = "INSERT INTO users (name, email, emp_id, division, designation, phone, desk_no, password, user_type) VALUES ('$name', '$email', '$empId', '$division', '$designation', '$phone', '$deskNo', '$password', '$userType')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
