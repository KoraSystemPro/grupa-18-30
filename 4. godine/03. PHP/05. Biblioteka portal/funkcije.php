<?php

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
                case "vracanje_knjige":
                    popup_vracanje_knjige();
                    break;
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
                    popup_status_clana();
                    break;
                default:
                    unset($_GET['opcija']);
                    break;
            }
        }
    }
    

?>