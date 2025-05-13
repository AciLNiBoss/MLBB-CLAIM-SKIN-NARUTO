<?php
// Konfigurasi bot Telegram
$botToken = 'YOUR_TELEGRAM_BOT_TOKEN';
$website = "https://api.telegram.org/bot{$botToken}";

// Fungsi untuk mengirim pesan
function sendMessage($chatId, $message) {
    global $website;
    $url = "{$website}/sendMessage?chat_id={$chatId}&parse_mode=HTML&text=".urlencode($message);
    file_get_contents($url);
}

// Tangani update dari Telegram
$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];
    
    if ($text == '/start') {
        sendMessage($chatId, "Hai! Saya bot untuk monitoring redeem code MLBB x Naruto. Saya akan mengirimkan notifikasi ketika ada yang mencoba redeem.");
    } else {
        sendMessage($chatId, "Maaf, saya hanya bisa menerima notifikasi dari sistem.");
    }
}
?>
