<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Function to perform ticket search
function searchTickets($conn, $searchDivision)
{
    // Perform search query (adjust the SQL query based on your database structure)
    $sql = "SELECT * FROM tickets WHERE division LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchDivision);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display search results
    while ($row = $result->fetch_assoc()) {
        echo "<p>Ticket No.: " . $row['ticket_number'] . " | Error Type: " . $row['error_type'] . " | Date & Time: " . $row['date_time'] . "</p>";
    }

    $stmt->close();
}

// Check if the Sub-Admin is logged in, redirect to the login page if not
if (!isset($_SESSION['subadmin_id'])) {
    header("Location: subadmin_login.php");
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

// Retrieve search keywords or filter options
$searchDivision = $_POST['searchDivision'];

// Perform search
searchTickets($conn, $searchDivision);

$conn->close();
?>

<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Function to perform ticket search
function searchTickets($conn, $searchDivision)
{
    // Perform search query (adjust the SQL query based on your database structure)
    $sql = "SELECT * FROM tickets WHERE division LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $searchDivision);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display search results
    while ($row = $result->fetch_assoc()) {
        echo "<p>Ticket No.: " . $row['ticket_number'] . " | Error Type: " . $row['error_type'] . " | Date & Time: " . $row['date_time'] . "</p>";
    }

    $stmt->close();
}

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

// Retrieve search keywords or filter options
$searchDivision = $_POST['searchDivision'];

// Perform search
searchTickets($conn, $searchDivision);

$conn->close();
?>
