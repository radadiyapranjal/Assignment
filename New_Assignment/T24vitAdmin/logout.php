<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page (or another page)
header("Location: index?Logout-Successfull");
exit();
