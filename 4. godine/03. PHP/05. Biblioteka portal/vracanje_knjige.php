<?php
    $konekcija = OtvoriKonekciju();
    
    if(isset($_GET['produzavanje']) && $_GET['produzavanje'] == true){
    // Produzavanje knjige
        
    } else {
    // Vracanje knjige

    }


    ZatvoriKonekciju($konekcija);
?>