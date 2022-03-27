<?php
include "./server.php";

$kon = OtvoriKonekciju("localhost", "root", "", "chat_app");

$sql = "INSERT INTO `Messages`(`SenderID`, `Content`) VALUES (1,'" . $_POST['poruka'] . "');";

$kon->query($sql);


header("location:../index.php");

ZatvoriKonekciju($kon);

?>