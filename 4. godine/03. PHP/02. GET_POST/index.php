<!DOCTYPE html>
<html lang="en">
    <head>  
        <title>Test</title>
    </head>
    
    <body>
        
        <!-- 
            <a href="dobrodoslica.php?ime=Luka&prezime=Korica&pol=m">Login</a> 
        -->

                                    <!-- method="get" prenosi podatke preko URL-a. Koristi se za podake koje jedinstveno
                                                odredjuju neku stranicu. -->
        <form action="dobrodoslica.php" method="post">
            <input type="text" name="ime" placeholder="Ime"><br>
            <input type="email" name="email" placeholder="E-mail"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit"><br>
        </form>
    </body>
</html>