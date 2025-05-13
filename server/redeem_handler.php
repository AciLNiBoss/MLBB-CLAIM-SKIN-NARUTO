<?php
$kode = $_POST['kode'] ?? '';
file_put_contents('redeemed_codes.txt', $kode . PHP_EOL, FILE_APPEND);
header("Location: ../thanks.html");
exit();
?>
