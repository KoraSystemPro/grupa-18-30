<?php
    include "./lib/server.php";
    include "./lib/poruka.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatPro</title>
    
    <link rel="stylesheet" type="text/css" href="stil.css">

</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['id'])){
            header("./login.php");
            exit();
        }
    ?>

    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Dobrodošli!</p>
            <p class="logout">
                <a id="exit" href="./lib/logout.php">Logout</a>
            </p>
        </div>
        
        <div id="chat">
            <?php
                $kon = OtvoriKonekciju("localhost", "root", "", "chat_app");
                $sql = "SELECT Users.Name, Content, TimeOfSending FROM Messages INNER JOIN Users ON Users.ID=Messages.SenderID ORDER BY TimeOfSending ASC;";
                $rez = $kon->query($sql);
                while($row = $rez->fetch_assoc()){
                    $inicijali = substr($row['Name'], 0, 2);
                    ispisi_poruku($inicijali, $row['Content'], $row['TimeOfSending']);
                }
                ZatvoriKonekciju($kon);
            ?>
        </div>

        <form name="message" action="./lib/send.php" method="POST">
            <input placeholder="Poruka..." type="text" name="poruka" id="text-message">
            <input type="submit" name="submitmsg" id="submit-message" value="Pošalji">
        </form>

        
    </div>

</body>
</html>