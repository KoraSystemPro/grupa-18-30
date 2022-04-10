<?php
    include "./server.php";
    include "./poruka.php";
    
    $kon = OtvoriKonekciju("localhost", "root", "", "chat_app");
    $sql = "SELECT Users.Name, Content, TimeOfSending FROM Messages INNER JOIN Users ON Users.ID=Messages.SenderID ORDER BY TimeOfSending ASC;";
    $rez = $kon->query($sql);
    while($row = $rez->fetch_assoc()){
        $inicijali = substr($row['Name'], 0, 2);
        ispisi_poruku($inicijali, $row['Content'], $row['TimeOfSending']);
    }
    ZatvoriKonekciju($kon);
?>