<?php
    include "./lib/server.php";
    include "./lib/poruka.php";
    
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:./login.php");
        exit();
    }
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
    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Dobrodošli!</p>
            <div class="user">
                <p class="uname"><?php echo $_SESSION['name'] ?></p>
                <p class="logout">
                    <a id="exit" href="./lib/logout.php">Logout</a>
                </p>
            </div>
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

                // Dohvatamo datum najnovije poruke
                $sql = "SELECT `TimeOfSending` FROM `Messages` ORDER BY `TimeOfSending` DESC LIMIT 1;";
                $rez = $kon->query($sql);
                $date = $rez->fetch_assoc()['TimeOfSending'];
                setcookie("poslednja_poruka", $date);

                ZatvoriKonekciju($kon);
            ?>
        </div>

        <form name="message" action="" method="POST">
            <input placeholder="Poruka..." type="text" name="poruka" id="text-message">
            <input type="button" onclick="posalji_poruku()" name="submitmsg" id="submit-message" value="Pošalji">
        </form>

        
    </div>

    <script>
        setInterval(get_messages, 1000);

        function get_messages(){
            let request = new XMLHttpRequest();
            request.open("GET", "./lib/update.php", true);

            request.onload = function(){
                if(request.readyState == 4 && request.status == 200){
                    if(request.responseText == '1'){
                        // Imamo najnoviju poruku
                        
                    } else {
                        let chat = document.getElementById("chat");
                        chat.innerHTML = request.response;
                        // chat.scrollTop = chat.scrollHeight
                    }
                } else {
                    console.log("Not loaded")
                }
            }              
            request.send();
        }
        function posalji_poruku(){
            $request = new XMLHttpRequest();
            
            $poruka = document.getElementById("text-message").value;
            document.getElementById("text-message").value = "";
            $data = new FormData();
            $data.append("poruka", $poruka);
            
            $request.open("POST", "./lib/send.php", true);
            $request.send($data);
        }

    </script>
</body>
</html>