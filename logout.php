<?php
// Start session (make sure to call session_start() at the beginning of each PHP file)
session_start();

// Function to destroy session and redirect to login page
function logoutAndRedirect($loginPage) {
    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: $loginPage");
    exit();
}

// Logout and redirect for different user types
if (isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];

    switch ($userType) {
        case 'admin':
            logoutAndRedirect("admin_login.php");
            break;
        case 'subadmin':
            logoutAndRedirect("subadmin_login.php");
            break;
        default:
            logoutAndRedirect("login.php");
            break;
    }
} else {
    // Default redirect if user type is not set
    logoutAndRedirect("login.php");
}
?>
