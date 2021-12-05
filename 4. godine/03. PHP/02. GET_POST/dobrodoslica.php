<!DOCTYPE html>
<html>
    <head>
        <title>Dobodošli!</title>
    </head>
    
    <body>
        <?php 
            // $_GET
            // ----------------
            // $ime = $_GET['ime'];
            // $pol = $_GET['pol'];
            // if(strcmp($pol, 'm') == 0)
            //     echo("Dobrodošao nam opet, $ime! <br>");
            // else
            //     echo("Dobrodošla nam opet, $ime! <br>");


            // $_POST
            // ----------------
            $ime = $_POST['ime'];
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            
            $iemail = "da@gmail.com";
            $isifra = "asd";
            if((strcmp($email, $iemail) == 0) && (strcmp($pwd, $isifra) == 0)){
                echo("Dobrodošao nam opet, $ime! <br> Ulogovali ste se sa podacima: <br>E-mail: $email <br> Password: $pwd<br>");
            } else {
                header("location:index.php");       // Redirect na pocetnu ako login nije tacan
            }
            

            
        
        ?>
    </body>
</html>