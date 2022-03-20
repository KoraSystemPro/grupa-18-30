<?php
    function DohvatiIzdateKnjige(){
        $konekcija = OtvoriKonekciju();
        $out = "";
        $sql = "
            SELECT Knjige.ID KnjigaID, Knjige.Ime Knjiga, Autori.Ime Autor, EvidencijaIzdavanja.DatumIzdavanja, EvidencijaIzdavanja.DatumOcVracanja, 
                EvidencijaIzdavanja.ID AS IzdavanjeID, StatusiIzdavanja.Opis
            FROM EvidencijaIzdavanja 
                INNER JOIN Knjige ON EvidencijaIzdavanja.KnjigaID=Knjige.ID
                INNER JOIN Autori ON Knjige.AutorID=Autori.ID
                INNER JOIN StatusiIzdavanja ON StatusiIzdavanja.ID=EvidencijaIzdavanja.StatusIzdavanja
            WHERE EvidencijaIzdavanja.ClanID=" . $_GET['clanID'] . " AND EvidencijaIzdavanja.StatusIzdavanja NOT IN (1) 
            ORDER BY EvidencijaIzdavanja.StatusIzdavanja DESC;";
        $rez = $konekcija->query($sql);
        while($row = $rez->fetch_assoc()){
            $out .= '<tr>';
                $out .= '<td>'. $row['Knjiga'] .'</td>';
                $out .= '<td>'. $row['Autor'] .'</td>';
                $out .= '<td>'. $row['DatumIzdavanja'] .'</td>';
                $out .= '<td>'. $row['DatumOcVracanja'] .'</td>';
                $out .= '<td>'. $row['Opis'] .'</td>';
                $out .= '  <td>
                            <form action="./vracanje_knjige.php" method="GET">
                                <input type="hidden" name="clanID" value="' . $_GET['clanID'] . '"/>
                                <input type="hidden" name="knjigaID" value="'. $row['KnjigaID'] . '"/>
                                <input type="hidden" name="izdavanjeID" value="'. $row['IzdavanjeID'] . '"/>
                                <button name="produzavanje" value="true" type="submit" class="btn btn-outline-primary">Produžavanje</button>
                                <button name="vracanje" value="true" type="submit" class="btn btn-outline-success">Vrati knjigu</button>
                            </form>
                        </td>';
            $out .= '</tr>';
        }
        ZatvoriKonekciju($konekcija);
        return $out;
    }

    function DohvatiPretragu($ime, $autor, $zanr){
        // Ako su svi prazni, nema WHERE
        if(!isset($ime, $autor, $zanr) || (empty($ime) && empty($autor) && empty($zanr))){
            return "";
        }
        
        $where_SQL = "WHERE ";
        if(!empty($ime)){
            // ImeKnjige LIKE '%ep%'
            $where_SQL .= "Knjige.Ime LIKE '%" . $ime . "%'";
        }
        if(!empty($autor)){
            if(!empty($ime)){
                $where_SQL .= " AND ";
            }
            $where_SQL .= "Autori.Ime LIKE '%" . $autor . "%'";
        }
        if(!empty($zanr)){
            if(!empty($ime) || !empty($autor)){
                $where_SQL .= " AND ";
            }
            $where_SQL .= "Zanrovi.ImeZanra LIKE '%" . $zanr . "%'";
        }
        return $where_SQL;
    }

    function provera_opcije(){
        if(isset($_GET['opcija'])){
            switch($_GET['opcija']){
                case "izdavanje_knjige":
                    popup_izdavanje_knjige();
                    break;
                case "dodavanje_baza":
                    popup_dodavanje_u_bazu();
                    break;
                case "brisanje_baza":
                    popup_brisanje_iz_baze();
                    break;
                case "provera_clana":
                    popup_provera_clana();
                    break;
                case "dodavanje_clana":
                    popup_dodavanje_clana();
                    break;
                case "status_clana":
                    popup_status_clana($_GET['clanID']);
                    break;
                case "vracanje":
                    unset($_GET['opcija']);
                    header("location:./index.php");
                    break;
                default:
                    unset($_GET['opcija']);
                    break;
            }
        }
    }
    

?>