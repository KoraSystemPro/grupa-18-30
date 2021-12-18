<?php
    session_start();


    $hostname = "localhost";
    $username = "root";
    $password = "";
    $konekcija = new mysqli($hostname, $username, $password);
    
    // Provera konekcije
    if($konekcija->connect_errno){
        echo("Connection ERROR! $konekcija->connect_errno : $konekcija->connect_error");
        exit();
    }

    // Dohvatamo podatke
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    $sql = "SELECT * FROM login.Users 
            WHERE Email='$email' AND Password='$password';
            ";
    // Pokrecem query
    $rezultat = $konekcija->query($sql);
    // Ako je selektovan jedan clan, onda ga uloguj
    if($rezultat->num_rows == 1){
        header("location:dobrodoslica.php");
        $_SESSION['valid'] = true;
        $_SESSION['vreme_log_in'] = time();
        $_SESSION['timout_time'] = 4;  // s trajanja sesije
        $_SESSION['stay_signed_in'] = $_POST['staySignedIn'];
        $_SESSION['user'] = $email;
    } else {
        header("location:connect.php");
    }
    



    // Zatvaramo konekciju
    $konekcija->close();
?>