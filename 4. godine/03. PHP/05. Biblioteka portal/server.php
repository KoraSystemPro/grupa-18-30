<?php
    function OtvoriKonekciju(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "biblioteka";
        $konekcija = new mysqli($dbhost, $dbuser, $dbpass, $db);
        if($konekcija->errno){
            die("Greska pri konekciji na bazu!\n" . 
            $konekcija->errno . " : " . 
            $konekcija->error);
            
        }
        return $konekcija;
    }

    function ZatvoriKonekciju($kon){
        $kon->close();
    }

?>