<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getASN($ip) {
    // Gunakan API eksternal untuk mendapatkan ASN
    $url = "https://ipapi.co/{$ip}/asn/";
    $response = @file_get_contents($url);
    return $response ?: 'Unknown';
}

function getCity($ip) {
    // Gunakan API eksternal untuk mendapatkan kota
    $url = "https://ipapi.co/{$ip}/city/";
    $response = @file_get_contents($url);
    return $response ?: 'Unknown';
}

function getCountry($ip) {
    // Gunakan API eksternal untuk mendapatkan negara
    $url = "https://ipapi.co/{$ip}/country_name/";
    $response = @file_get_contents($url);
    return $response ?: 'Unknown';
}

function sendToTelegram($message) {
    $botToken = 'YOUR_TELEGRAM_BOT_TOKEN';
    $chatId = 'YOUR_TELEGRAM_CHAT_ID';
    
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    @file_get_contents($url, false, $context);
}
?>
