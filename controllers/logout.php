<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session
if (session_id()) {
    session_destroy();
}

// Unset cookies if "Remember Me" functionality was used
if (isset($_COOKIE['userName'])) {
    setcookie('userName', '', time() - 3600, '/', '', isset($_SERVER["HTTPS"]), true);
}

// Redirect to the login page
header("Location: ../login.php");
exit();
?>