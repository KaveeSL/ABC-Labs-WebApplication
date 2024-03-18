<?php

// Class definition
class SessionManager {
    
    // Constructor (Object instantiation)
    public function __construct() {
        // Encapsulation: Starting session
        session_start();
    }

    // Method for destroying session
    public function destroySession() {
        // Encapsulation: Clearing session data
        $_SESSION = array();

        // Encapsulation: Checking and removing session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-86400, '/');
        }

        // Encapsulation: Destroying session
        session_destroy();
    }

    // Method for redirecting to login page
    public function redirectToLogin($action = 'logout') {
        // Encapsulation: Redirecting to login page
        header("Location: login.php?action=$action");
        exit;
    }
}

// Object instantiation
$sessionManager = new SessionManager();

// Invoking methods to perform session management tasks
$sessionManager->destroySession();
$sessionManager->redirectToLogin();

?>
