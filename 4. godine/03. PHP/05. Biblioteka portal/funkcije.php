<?php
    function DohvatiPretragu($ime, $autor, $zanr){
        // Ako su svi prazni, nema WHERE
        if(empty($ime) && empty($autor) && empty($zanr)){
            return "";
        }
        
        $where_SQL = "WHERE ";
        if(!empty($ime)){
            // ImeKnjige LIKE '%ep%'
            $where_SQL += "Knjige.ime LIKE '%" . $ime . "%'";
        }
        if(!empty($autor)){
            if(!empty($ime)){
                $where_SQL += " AND ";
            }
            $where_SQL += "Autori.Ime LIKE '%" . $autor . "%'";
        }
        if(!empty($zanr)){
            if(!empty($ime) || !empty($autor)){
                $where_SQL += " AND ";
            }
            $where_SQL += "Zanrovi.ImeZanra LIKE '%" . $zanr . "%'";
        }

        return $where_SQL;
    }

?>