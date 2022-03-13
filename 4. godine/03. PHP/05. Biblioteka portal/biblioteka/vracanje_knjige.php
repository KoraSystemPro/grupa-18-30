<?php
    include "./server.php";

    $konekcija = OtvoriKonekciju();
    
    if(isset($_GET['produzavanje'], $_GET['clanID'], $_GET['knjigaID'], $_GET['izdavanjeID']) && $_GET['produzavanje'] == true){
    // Produzavanje knjige
        // 1. Azuriramo datum ocekivanog vracanja
        // 2. Postavaljamo novi status izdavanja
        $next_month = date('Y-m-d', strtotime('+1 month'));
        $sql = "UPDATE `EvidencijaIzdavanja` SET `DatumOcVracanja`='". $next_month ."', `StatusIzdavanja`='2'
                WHERE `ID`='" . $_GET['izdavanjeID'] . "' AND `ClanID`='" . $_GET['clanID'] ."' AND `KnjigaID`='". $_GET['knjigaID'] ."';";
        if(!$konekcija->query($sql)){
            echo "<script>alert('Greška pri izvršavanju!')</script>";
        }

        ZatvoriKonekciju($konekcija);
        header("Location:./index.php?clanID=" . $_GET['clanID']);
        
    } else if(isset($_GET['vracanje'], $_GET['clanID'], $_GET['knjigaID'], $_GET['izdavanjeID']) && $_GET['vracanje'] == true){
    // Vracanje knjige
        // 1. Postavljamo status izdavanja na vraceno
        // 2. Vratimo knjigu na stanje, uvecamo brojNaStanju za 1
        // 3. Postavimo datum vracanja
        $current_date = date("Y-m-d");
        $sql = "UPDATE `EvidencijaIzdavanja` SET `DatumVracanja`='". $current_date ."', `StatusIzdavanja`='1'
            WHERE `ID`='" . $_GET['izdavanjeID'] . "' AND `ClanID`='" . $_GET['clanID'] ."' AND `KnjigaID`='". $_GET['knjigaID'] ."';";
        if(!$konekcija->query($sql)){
            echo "<script>alert('Greška pri izvršavanju!')</script>";
        }
        $sql = "UPDATE `Knjige` SET `BrojNaStanju`=`BrojNaStanju`+1 WHERE ID=" . $_GET['knjigaID'] . ";";
        if(!$konekcija->query($sql)){
            echo "<script>alert('Greška pri izvršavanju!')</script>";
        }
        
        ZatvoriKonekciju($konekcija);
        header("Location:./index.php?clanID=" . $_GET['clanID']);
    
    } else {
        
        ZatvoriKonekciju($konekcija);
        header("Location:./index.php");
    }
    
?>