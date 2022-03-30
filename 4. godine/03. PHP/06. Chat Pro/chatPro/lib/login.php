<?php
    include "./server.php";

    $hostname = "localhost";
    $username = "root";
    $password = "";

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
        session_start();
        $row = $rezultat->fetch_assoc();
        $_SESSION['logInTime'] = time();
        $_SESSION['id'] = $row['ID'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['name'] = $row['Name'];
        $_SESSION['lastSeen'] = $row['LastSeen'];
        echo '1';
    } else {
        echo '0';
    }

    

?>