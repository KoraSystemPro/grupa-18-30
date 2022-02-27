<?php
include "server.php";
include "funkcije.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link href="./stil.css" rel="stylesheet" type="text/css">
    <title>BibliotekaPro</title>
</head>
<body>
    <?php
        provera_opcije();
        $konekcija = OtvoriKonekciju();
        $curent_date = date('Y-m-d');
        $next_month = date('Y-m-d', strtotime('+1 month'));

        $sql = "INSERT INTO EvidencijaIzdavanja(ClanID, KnjigaID, DatumIzdavanja, DatumOcVracanja, StatusIzdavanja) 
                VALUES ('" . $_GET['clanID'] . "','" . $_GET['knjigaID'] . "', '" . $curent_date . "', '" . $next_month . "', '" . 2 . "')";
        $konekcija->query($sql);
        ZatvoriKonekciju($konekcija);

    ?>

    <div class="popup-izdavanje-knjige">
        <div class="zamuti"></div>
        <form class="popup-form" action="index.php" method="get">
            <h4 class="podnaslov">Izdavanje Knjige</h4>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">ID Člana</span>
                <input name="clanID" type="number" class="form-control">
            </div>
            <select class="form-select" name="knjigaID">
                <!-- <option value=""></option> -->
                <?php
                    $konekcija = OtvoriKonekciju();
                    $sql = "SELECT Knjige.ID, Knjige.Ime, Autori.Ime, Knjige.BrojNaStanju
                            FROM Knjige INNER JOIN Autori ON AutorID=Autori.ID ORDER BY Knjige.Ime ASC";
                    $rez = $konekcija->query($sql);
                    if($rez->num_rows > 0){
                        while($row = $rez->fetch_array()){
                            echo '<option ' . (($row[3]==0) ? 'disabled' : '') . ' value="' . $row[0] . '">' . $row[1] . ' - ' . $row[2] . ' - ' . $row[3] . ' na stanju</option>';
                        }
                    }

                    ZatvoriKonekciju($konekcija);
                
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
    

    <form action="index.php" method="get">
        <div class="zaglavlje">
            <div class="pretraga">
                <h4 class="podnaslov">Pretraga</h4>
                <div class="input-group input-group-sm mb-3" name="knjiga">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Knjiga</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3" name="autor">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Autor</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3" name="zanr">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Zanr</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <button type="submit" class="btn btn-primary">Pretraži</button>
            </div>
            <div class="opcije">
                <div class="izdavanje-knjiga">
                    <h4 class="podnaslov">Izdavanje</h4>
                    <button name="opcija" value="vracanje_knjige" type="submit" class="btn btn-outline-primary">Vraćanje knjige</button>
                    <button name="opcija" value="izdavanje_knjige" type="submit" class="btn btn-outline-primary">Izdavanje knjige</button>
                </div>
                <div class="rad-sa-bazom">
                    <h4 class="podnaslov">Rad sa bazom</h4>
                    <button name="opcija" value="dodavanje_baza" type="submit" class="btn btn-outline-primary">Dodavanje u bazu</button>
                    <button name="opcija" value="brisanje_baza" type="submit" class="btn btn-outline-primary">Brisanje iz baze</button>
                </div>
                <div class="rad-sa-clanovima">
                    <h4 class="podnaslov">Članovi</h4>
                    <button name="opcija" value="provera_clana" type="submit" class="btn btn-outline-primary">Provera člana</button>
                    <button name="opcija" value="dodavanje_clana" type="submit" class="btn btn-outline-primary">Dodavanje člana</button>
                    
                </div>
            </div>
        </div>
    </form>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Knjiga</th>
            <th scope="col">Autor</th>
            <th scope="col">Zanr</th>
            <th scope="col">Broj na stanju</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $konekcija = OtvoriKonekciju();
        $pretraga_WHERE = DohvatiPretragu($_GET['knjiga'], $_GET['autor'], $_GET['zanr']);
        $query = "
                SELECT Knjige.ID, Knjige.Ime, Autori.Ime, Zanrovi.ImeZanra, Knjige.BrojNaStanju
                FROM Knjige 
                INNER JOIN Autori ON Knjige.AutorID=Autori.ID
                INNER JOIN Knjige_Zanrovi ON Knjige_Zanrovi.KnjigaID=Knjige.ID
                INNER JOIN Zanrovi ON Zanrovi.ZanrID=Knjige_Zanrovi.ZanrID
                " . $pretraga_WHERE . ";";
        if($rezultat = $konekcija->query($query)){
            while($row = $rezultat->fetch_array()){
                echo("<tr scope='row'>");
                    echo("<td>". $row[0] ."</td>");
                    echo("<td>". $row[1] ."</td>");
                    echo("<td>". $row[2] ."</td>");
                    echo("<td>". $row[3] ."</td>");
                    echo("<td>". $row[4] ."</td>");
                echo("</tr>");
            }
        } else {
            echo("Puko query!");
        }
        
        ZatvoriKonekciju($konekcija);
        ?>
    </tbody>



    <?php
        // Ime knjige, Ime autora, Zanr, broj na stanju
        $sql = "SELECT Knjige.Ime, GROUP_CONCAT(Zanrovi.ImeZanra)
            FROM Knjige_Zanrovi
            INNER JOIN Knjige ON Knjige.ID=Knjige_Zanrovi.KnjigaID
            INNER JOIN Zanrovi ON Zanrovi.ZanrID=Knjige_Zanrovi.ZanrID
            GROUP BY Knjige.Ime;";

        $rezultat = $konekcija->query($sql);
        if($rezultat == false){
            $echo("Greska pri kveriju!\n");
        }

        $konekcija->close();
    ?>
</body>
</html>