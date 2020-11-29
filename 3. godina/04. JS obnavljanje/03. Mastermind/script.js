let kombinacija = [0, 0, 0, 0];
let pokusaj = [6, 4, 4, 2];
let crni = 0;   // Dobar broj, dobro mesto      crveni
let beli = 0;   // Dobar broj                   zuti
let niz_crnih = [0, 0, 0, 0];
let prebrojavanje = [0, 0, 0, 0, 0, 0];
                //   1  2  3  4  5  6


function oceni(kombinacija, pokusaj){
    crni = 0;
    beli = 0;

    //  Kombinacija 1 4 4 6
    //  Pokusaj     6 4 4 2

    // Pronalazenje crnih i potencijalnih belih pogodaka
    for(i = 0; i < 4; i++){
        if(pokusaj[i] == kombinacija[i]){
            crni++;
            niz_crnih[i] = 1;
        } else {
            prebrojavanje[kombinacija[i] - 1]++;
        }
    }
    // Pronalazenje belih pogodaka
    for(i = 0; i < 4; i++){
        if(niz_crnih[i] == 0 && prebrojavanje[pokusaj[i] - 1] > 0){
            beli++;
            prebrojavanje[pokusaj[i] - 1]--;
        }
    }

    ispisi();
}

function novaKombinacija(){
    // console.log(Math.round(Math.random()*10000) % 6);
    for(i = 0; i < 4; i++){
        kombinacija[i] = Math.round(Math.random() * 10000) % 6 + 1;
    }
        
    console.log(kombinacija);

    oceni(kombinacija, pokusaj);
}

function ispisi(){
    // Kombinacija
    document.getElementById("kombinacija").innerHTML = "Kombinacija: ";
    for(i = 0; i < 4; i++){
        document.getElementById("kombinacija").innerHTML += kombinacija[i];
    }
    // Crni
    document.getElementById("crni").innerHTML = "Crni: " + crni;
    // Beli
    document.getElementById("beli").innerHTML = "Beli: " + beli;
}

// Pozivam funkciju za generisanje kombinacije
document.getElementById("nova-kombinacija").addEventListener("click", novaKombinacija);