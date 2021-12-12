<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";

    // Pravimo konekciju
    $konekcija = new mysqli($hostname, $username, $password, "login");
    // Provera konekcije
    if($konekcija->connect_errno){
        echo("Greska!");
        exit();
    }

    // Dohvatamo podatke iz forme
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    // Pravimo i pokrecemo query
    $sql = "
    INSERT INTO Users (Email, Password) 
    VALUES ('$email', '$password');
    ";
    $rez = $konekcija->query($sql);
    // Provera da li se uspesno izvrsio query
    if($rez == true){
        echo("Uspesno je dodat novi korisnik!");
    } else {
        echo("Greska!" . $sql . "<br>" . $konekcija->error);
    }

    // Zatvaranje konekcije
    $konekcija->close();
?>