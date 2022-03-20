<?php
    session_start();
    unset($_SESSION['email']);
    $_SESSION['valid'] = false;
    
    header("location:connect.php");
?>