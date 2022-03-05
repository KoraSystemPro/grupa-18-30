<?php
    include "./server.php";

    $konekcija = OtvoriKonekciju();
    $curent_date = date('Y-m-d');
    $next_month = date('Y-m-d', strtotime('+1 month'));
    $sql = "INSERT INTO EvidencijaIzdavanja(ClanID, KnjigaID, DatumIzdavanja, DatumOcVracanja, StatusIzdavanja) 
            VALUES ('" . $_GET['clanID'] . "','" . $_GET['knjigaID'] . "', '" . $curent_date . "', '" . $next_month . "', '" . 2 . "')";
    
    if($konekcija->query($sql))
        echo "<script>alert('Uspešno je izdata knjiga!')</script>";
    else 
        echo "<script>alert('Greška pri izdavanju knjige!')</script>";

    ZatvoriKonekciju($konekcija);

    header("Location:index.php");

?>