<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
       <?php
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
            
            // Querry
            $rezultat = $konekcija->query("SELECT * FROM login.Users");
            echo("Broj redova: " . $rezultat->num_rows . "<br>");

            while($red = mysqli_fetch_row($rezultat)){
                echo("$red[0] : $red[1] : $red[2]<br>");
            }
            


            // Zatvara konekciju
            $konekcija->close();
       ?>
    </body>
</html>