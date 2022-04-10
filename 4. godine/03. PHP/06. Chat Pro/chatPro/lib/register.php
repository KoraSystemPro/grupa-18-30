<?php
    include "./server.php";
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $konekcija = OtvoriKonekciju($hostname, $username, $password, "chat_app");

    // Dohvatamo podatke iz forme
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    // Proveravamo da li postoji taj user
    $sql = "SELECT * FROM Users 
            WHERE Email='$email';
            ";
    $rez = $konekcija->query($sql);
    // Ako vec postoji takav user
    if($rezultat->num_rows == 1){
        echo ('0');
        ZatvoriKonekciju($konekcija);
        exit();
    }

    // Ako ne postoji, napravi ga
    $sql = "
        INSERT INTO Users (Name, Email, Password) 
        VALUES ('$name', '$email', '$password');
        ";
    $rez = $konekcija->query($sql);
    // Provera da li se uspesno izvrsio query
    if($rez == true){
        echo("1");
    } else {
        echo("-1");
    }

    // Zatvaranje konekcije
    ZatvoriKonekciju($konekcija);
?>