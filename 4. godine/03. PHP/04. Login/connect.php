<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h2> Signup </h2>
        <form method="POST" action="register.php">
            <input type="email" name="email" placeholder="E-mail"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <input type="submit" value="Register"><br>
        </form>
        <br>
        <br>

        <h2> Login </h2>
        <form method="POST" action="login.php">
            <input type="email" name="email" placeholder="E-mail"><br>
            <input type="password" name="pwd" placeholder="Password"><br>
            <input type="checkbox" name="staySignedIn">
            <input type="submit" value="Login"><br>
        </form>
        <br>
        <br>


       <?php
            session_start();
            if($_SESSION['valid'] == true){
                header("location:dobrodoslica.php");
            }

            // Zapocinjemo sesiju
            $hostname = "localhost";
            $username = "root";
            $password = "";
            
            
            $konekcija = new mysqli($hostname, $username, $password);
            // Konekcija je bool -> true - uspesna || false - neuspela
            if($konekcija->connect_errno){
                echo("Connection ERROR! $konekcija->connect_errno : $konekcija->connect_error");
                exit();
            }
            echo("Uspesna konekcija!<br>");
            
            // Query
            $query = "SELECT * FROM login.Users";
            $rezultat = $konekcija->query($query);
            echo("Broj redova: " . $rezultat->num_rows . "<br>");

            // Asocijativni pristup
            // Pristup putem imena kolone
            while($red = $rezultat->fetch_assoc()){
                echo($red['ID'] . " : " . $red['Email'] . " : " . $red['Password'] .  "<br>");
            }
            // Indeksni pristup
            while($red = $rezultat->fetch_row()){
                echo("$red[0] : $red[1] : $red[2]<br>");
            }
            


            // Zatvara konekciju
            $konekcija->close();
       ?>
    </body>
</html>