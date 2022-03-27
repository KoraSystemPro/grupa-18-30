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

    function loginForm(){
        echo '
        <div id="login-form">
            <p>Unesite vaše login podatke</p>
            <form action="../index.php" method="POST">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="Login">
            </form>
        </div>  
        ';
    }

?>