<?php
include "./server.php";

# Upis u bazu
session_start();
$kon = OtvoriKonekciju("localhost", "root", "", "chat_app");
$sql = "INSERT INTO `Messages`(`SenderID`, `Content`) VALUES ('" . $_SESSION['id'] . "', '" . $_POST['poruka'] . "');";
$kon->query($sql);
ZatvoriKonekciju($kon);

# Upis u log
$log_fajl = fopen("../chat.log", 'a') or die("Neuspelo otvaranje fajla");
$data = date("Y/m/d H:i:s") . " - " . $_SESSION['id'] . "\n" . $_POST['poruka'] . "\n-------------------\n";
fwrite($log_fajl, $data);
echo $data;
fclose($log_fajl);

?>