<?php

function popup_vracanje_knjige(){

}
function popup_izdavanje_knjige(){
    $konekcija = OtvoriKonekciju();
    $sql = "SELECT Knjige.ID, Knjige.Ime, Autori.Ime, Knjige.BrojNaStanju
            FROM Knjige INNER JOIN Autori ON AutorID=Autori.ID ORDER BY Knjige.Ime ASC";
    $rez = $konekcija->query($sql);
    $options = "";
    if($rez->num_rows > 0){
        while($row = $rez->fetch_array()){
            $options = $options . '<option ' . (($row[3]==0) ? 'disabled' : '') . ' value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' na stanju</option>';
        }
    }
    echo '
    <div class="popup-izdavanje-knjige">
        <div class="zamuti"></div>
        <form class="popup-form" action="izdavanje_knjige.php" method="get">
            <h4 class="podnaslov">Izdavanje Knjige</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">ID Člana</span>
                <input name="clanID" type="number" class="form-control">
            </div>
            <select class="form-select" name="knjigaID">
                <?php
                    ' . $options .  '  

                    // if($row[3] == 0){
                    //     nadovezi diabled
                    // } else {
                    //     nemoj nadovezati disabled
                    // }
                    
                    // ?: Jednolinijska provera
                    // (uslov) ? tacna : netacna
                    // ($row[3] == 0) ? nadovezi disabled : nemoj nadovezati                       
                ?>

            </select>
            <button type="submit" class="btn btn-primary">Iznajmi</button>
            <button name="opcija" value="" type="submit" class="btn btn-danger">Otkaži</button>
        </form>
    </div>
    ';
}

function popup_dodavanje_u_bazu(){

}
function popup_brisanje_iz_baze(){

}
function popup_dodavanje_clana(){
    $kon = OtvoriKonekciju();
    $rez = $kon->query("SELECT * FROM Clanarine");
    $options = "";
    if($rez->num_rows > 0){
        while($row = $rez->fetch_assoc()){
            $options = $options . '<option value="' . $row["ID"] . '">' . $row["Cena"] . '" RSD - "' . $row["Opis"] . '</option>';
        }
    } else {
        $options = "<option>Neuspešno dohvaćene članarine</option>";
    }
    ZatvoriKonekciju($kon);
    
    echo '
    <div class="popup-dodavanje-clana">
        <div class="zamuti"></div>
        <form class="popup-form" action="dodavanje_clana.php" method="get">
            <h4 class="podnaslov">Dodavanje Člana</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Ime</span>
                <input name="imeClana" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Prezime</span>
                <input name="prezimeClana" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <select name="tipClanarine" class="form-select">
                ' . $options . ' 
            </select>
            <button type="submit" class="btn btn-primary">Dodaj</button>
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
            <h4 class="podnaslov">Pretraga Člana</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">ID Člana</span>
                <input name="clanID" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <button type="submit" class="btn btn-primary">Pretraži</button>
            <button name="opcija" value="status_clana" type="submit" class="btn btn-danger">Otkaži</button>
        </form>
        </div>
        ';
}
function popup_status_clana(){
    echo '
        <div class="popup-status-clana">
            <div class="zamuti"></div>
            <form class="popup-form" action="index.php" method="get">
                <h4 class="podnaslov">Status Člana</h4>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">ID Člana</span>
                    <input name="clanID" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <button type="submit" class="btn btn-primary">Pretraži</button>
                <button name="opcija" value="status_clana" type="submit" class="btn btn-danger">Otkaži</button>
            </form>
        </div>
        ';
}


?>