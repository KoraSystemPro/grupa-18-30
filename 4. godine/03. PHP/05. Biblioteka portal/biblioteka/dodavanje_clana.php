<?php
    if(isset($_GET['opcija']) && $_GET['opcija']=='vracanje'){
        header("location:./index.php");
        exit();
    }
    
    include "./server.php";

    $konekcija = OtvoriKonekciju();
    $datum = date('Y-m-d');
    $sql = "INSERT INTO Clanovi(Ime, Prezime, TipClanarine, DatumPrijave, Status) 
            VALUES ('" . $_GET['imeClana'] . "', '" . $_GET['prezimeClana'] . "', '" . $_GET['tipClanarine'] . "', '" . $datum . "', '" . 2 . "');";
    if($konekcija->query($sql))
        echo "<script>alert('Uspešno je dodat novi član!')</script>";
    else 
        echo "<script>alert('Greška pri dodavanju člana!')</script>";

    ZatvoriKonekciju($konekcija);

    header("Location:index.php");
?>