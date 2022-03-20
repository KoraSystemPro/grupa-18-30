<?php
    include "./chatPro/lib/server.php";

    session_start();

    $konekcija = OtvoriKonekciju($hostname, $username, $password, "chat_app");

    // Dohvatamo podatke
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    $sql = "SELECT * FROM Users 
            WHERE Email='$email' AND Password='$password';
            ";
    // Pokrecem query
    $rezultat = $konekcija->query($sql);

    // Zatvaramo konekciju
    ZatvoriKonekciju($konekcija);

    // Ako je selektovan jedan clan, onda ga uloguj
    if($rezultat->num_rows == 1){
        header("location:../index.php");
        $_SESSION['vreme_log_in'] = time();
        $_SESSION['timout_time'] = 300;  // s trajanja sesije
        $_SESSION['stay_signed_in'] = $_POST['staySignedIn'];
        $_SESSION['user'] = $email;
    } else {
        header("location:../login.php");
    }

?>