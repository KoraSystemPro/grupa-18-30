<?php
session_start();

function ispisi_poruku($inicijali, $sadrzaj, $datum, $id_poruke){
    if($id_poruke == $_SESSION['id']){
        echo '
        <div id="poruka" class="my-msg">
            <div id="poruka-sadrzaj">
                <div class="poruka-sadrzaj-tekst" id="poruka-sadrzaj-tekst">' . $sadrzaj . '</div>
                <div class="poruka-sadrzaj-vreme" id="poruka-sadrzaj-vreme">' . $datum . '</div>
            </div>
            <div id="poruka-inicijali">
                <div id="poruka-inicijali-tekst">' . $inicijali . '</div>
            </div>
        </div>
        ';
    } else {
        echo '
        <div id="poruka">
            <div id="poruka-inicijali">
                <div id="poruka-inicijali-tekst">' . $inicijali . '</div>
            </div>
            <div id="poruka-sadrzaj">
                <div class="poruka-sadrzaj-tekst" id="poruka-sadrzaj-tekst">' . $sadrzaj . '</div>
                <div class="poruka-sadrzaj-vreme" id="poruka-sadrzaj-vreme">' . $datum . '</div>
            </div>
        </div>
        ';
    }
    
}

?>