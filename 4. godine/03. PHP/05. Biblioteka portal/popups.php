<?php


function popup_vracanje_knjige(){

}
function popup_izdavanje_knjige(){

}
function popup_dodavanje_u_bazu(){

}
function popup_brisanje_iz_baze(){

}
function popup_dodavanje_clana(){
    echo '
    <div class="popup-dodavanje-clana">
        <div class="zamuti"></div>
        <form class="popup-form" action="index.php" method="get">
            <h4 class="podnaslov">Dodavanje Člana</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Ime</span>
                <input name="imeClana" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Prezime</span>
                <input name="prezimeClana" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <select class="form-select">
                <?php 
                $kon = OtvoriKonekciju();
                $rez = $kon->query("SELECT * FROM Clanarine");
                if($rez->num_rows > 0){
                    while($row = $rez->fetch_assoc()){
                        echo \'<option value="\' . $row["ID"] . \'">\' . $row["Cena"] . " RSD - " . $row["Opis"] . \'</option>\';
                    }
                } else {
                    echo \'<option>Neuspešno dohvaćene članarine</option>\';
                }
                ZatvoriKonekciju($kon);
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Pretraži</button>
            <button name="opcija" value="" type="submit" class="btn btn-danger">Otkaži</button>

        </form>
    </div>
    ';
}
function popup_provera_clana(){
    echo '
        <div class="popup-pretraga-clana">
        <div class="zamuti"></div>
        <form class="popup-form" action="index.php" method="get">
            <h4 class="podnaslov">Pretaga Člana</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">ID Člana</span>
                <input name="clanID" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <button type="submit" class="btn btn-primary">Pretraži</button>
            <button name="opcija" value="" type="submit" class="btn btn-danger">Otkaži</button>
        </form>
        </div>
        ';
}

?>