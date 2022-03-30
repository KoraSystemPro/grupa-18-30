<?php
    if(isset($_SESSION['id'])){
        header("./index.php");
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
        <div class="login">
            <input id="email" type="email" placeholder="E-mail" name="email" required>
            <input id="password" type="password" placeholder="Password" name="password" required>
            <button onclick="login()">Login</button>
            <p id="message"></p>
        </div>
    </div>

    
    <script>
        function login(){
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let request = new XMLHttpRequest();
            request.onreadystatechange = function(){
                if(request.readyState == request.DONE && request.status == 200){
                    if(request.responseText == "1"){
                        window.location.replace("./index.php");
                    } else {
                        document.getElementById("message").innerHTML = "Bad login information! Try again!"
                    }
                }
            }
            request.open("POST", "./lib/login.php", true);
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            let header = "email=" + email + "&pwd=" + password;
            request.send(header);
        }
    </script>
</body>
</html>