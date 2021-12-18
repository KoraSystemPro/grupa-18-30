<!DOCTYPE html>
<html>
    <head>
        <title>Dobodošli!</title>
    </head>
    
    <body>
        <button onclick="window.location.href='logout.php'">Logout</button>
        <br>
        
        <?php 
            // if($_POST['ulogovan'] == false){
            //     header("location:connect.php");
            // }
            session_start();
            // Provera da li je sesija aktivna
            if($_SESSION['valid'] == false){
                header("location:connect.php");
            }

            // Provera
            if($_SESSION['stay_signed_in'] == false){
                // Provera da li je isteklo vreme sesije
                if(time() - $_SESSION['vreme_log_in'] > $_SESSION['timout_time']){
                    header("location:logout.php");
                }
            }
            
            
            echo("Dobrodosao nam opet! <br> " . $_SESSION['user']);
        ?>
    </body>
</html>