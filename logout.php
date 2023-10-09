<?php
session_start();

// Check if the user is logged in (you can replace this condition with your own)
if (isset($_SESSION['user_id'])) {
    // Unset and destroy the session data to log the user out
    session_unset();
    session_destroy();
}

// Redirect the user to the login page or any other page after logging out
header("Location: login.php");
exit();
?>
