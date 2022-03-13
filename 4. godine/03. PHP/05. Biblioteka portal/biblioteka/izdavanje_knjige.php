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
    
    // $sql = "SELECT `BrojNaStanju` FROM `Knjige` WHERE Knjige.ID=" . $_GET['knjigaID'] . ";";
    // $brojNaStanju = $konekcija->query($sql)->fetch_assoc()['BrojNaStanju'];
    // $brojNaStanju = $brojNaStanju - 1;
    // if($brojNaStanju < 0)
    //     $brojNaStanju = 0;
    // $sql = "UPDATE `Knjige` SET `BrojNaStanju`='" . $brojNaStanju . "' WHERE ID=" . $_GET['knjigaID'] . ";";
    // $konekcija->query($sql);
    $sql = "UPDATE `Knjige` SET `BrojNaStanju`=`BrojNaStanju`-1 WHERE ID=" . $_GET['knjigaID'] . ";";
    $konekcija->query($sql);

    ZatvoriKonekciju($konekcija);

    header("Location:index.php");

?>