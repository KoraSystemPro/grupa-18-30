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
            <input id="name" type="text" placeholder="Name" name="name" required>
            <input id="email" type="email" placeholder="E-mail" name="email" required>
            <input id="password" type="password" placeholder="Password" name="password" required>
            <button onclick="register()">Register</button>
            <p id="message"></p>
        </div>
    </div>

    
    <script>
        function register(){
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let request = new XMLHttpRequest();
            request.onreadystatechange = function(){
                if(request.readyState == request.DONE && request.status == 200){
                    if(request.responseText == "1"){
                        window.location.replace("./login.php");
                    } else if (request.responseText == "-1") {
                        document.getElementById("message").innerHTML = "Error when entering a new user!"
                    } else {
                        document.getElementById("message").innerHTML = "E-mail is already registered!"
                    }
                }
            }
            request.open("POST", "./lib/register.php", true);
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            let header = "name=" + name + "&email=" + email + "&pwd=" + password;
            request.send(header);
        }
    </script>
</body>
</html>