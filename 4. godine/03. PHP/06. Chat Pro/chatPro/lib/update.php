<?php
    include "./server.php";
    include "./poruka.php";

    $kon = OtvoriKonekciju("localhost", "root", "", "chat_app");
    
    if(isset($_COOKIE['poslednja_poruka'])){
        $sql = "SELECT `TimeOfSending` FROM `Messages` ORDER BY `TimeOfSending` DESC LIMIT 1;";
        $najnovija_poruka = $kon->query($sql)->fetch_assoc()['TimeOfSending'];
        
        if($_COOKIE['poslednja_poruka'] != $najnovija_poruka){            
            // Ako nemamo najnoviju poruku, dohvatamo ih
            $sql = "SELECT Users.ID, Users.Name, Content, TimeOfSending FROM Messages INNER JOIN Users ON Users.ID=Messages.SenderID WHERE TimeOfSending > '" . $_COOKIE['poslednja_poruka'] . "' ORDER BY TimeOfSending ASC;";
            setcookie('poslednja_poruka', $najnovija_poruka);
            $rez = $kon->query($sql);
            while($row = $rez->fetch_assoc()){
                $inicijali = substr($row['Name'], 0, 2);
                ispisi_poruku($inicijali, $row['Content'], $row['TimeOfSending'], $row['ID']);
            }
            
        } else {
            // Imamo najnoviju
        }
    } else {
        $sql = "SELECT `TimeOfSending` FROM `Messages` ORDER BY `TimeOfSending` DESC LIMIT 1;";
        $najnovija_poruka = $kon->query($sql)->fetch_assoc()['TimeOfSending'];
        setcookie('poslednja_poruka', $najnovija_poruka);

    }
    
    ZatvoriKonekciju($kon);
?>