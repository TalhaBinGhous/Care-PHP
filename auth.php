<?php 

// Start the session if it hasn't been started already
if (!session_id()) {
    session_start([
        'cookie_lifetime' => 86400, // Cookie will expire in 1 day
        'cookie_secure' => true, // Only send cookies over HTTPS
        'cookie_httponly' => true, // Prevent JavaScript access to session cookies
        'cookie_samesite' => 'Strict' // Helps protect against CSRF
    ]);
}

// Check for session timeout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // Last activity was more than 30 minutes ago
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: login.php?error=Session expired. Please log in again.");
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=Please log in to access this page.");
    exit();
}

// Your protected content goes here
?>
