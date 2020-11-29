let kombinacija = [0, 0, 0, 0];
let pokusaj = [0, 0, 0, 0];
let crni = 0;   // Dobar broj, dobro mesto      crveni
let beli = 0;   // Dobar broj                   zuti
let niz_crnih = [0, 0, 0, 0];
let prebrojavanje = [0, 0, 0, 0, 0, 0];
                //   1  2  3  4  5  6

let dugme_1 = document.getElementById("dgm_p1");
let dugme_2 = document.getElementById("dgm_p2");
let dugme_3 = document.getElementById("dgm_p3");
let dugme_4 = document.getElementById("dgm_p4");
dugme_1.addEventListener("click", promena1);
dugme_2.addEventListener("click", promena2);
dugme_3.addEventListener("click", promena3);
dugme_4.addEventListener("click", promena4);
function promena1() { promena("p", 1); }
function promena2() { promena("p", 2); }
function promena3() { promena("p", 3); }
function promena4() { promena("p", 4); }

function promena(tip, k){
    let dgm = document.getElementById("dgm_" + tip + k);

    // Menjamo dugme pokusaj samo kada pritiskamo na dugmice za pokusaj
    if(tip == "p"){
        pokusaj[k-1]++;
        if(pokusaj[k-1] > 6){
            pokusaj[k-1] = 1;
        }
        switch(pokusaj[k-1]){
            case 1: dgm.style.backgroundColor = "#ff7777"; break;
            case 2: dgm.style.backgroundColor = "#ffff77"; break;
            case 3: dgm.style.backgroundColor = "#7777ff"; break;
            case 4: dgm.style.backgroundColor = "#ff77ff"; break;
            case 5: dgm.style.backgroundColor = "#77ff77"; break;
            case 6: dgm.style.backgroundColor = "#ffaa55"; break;
            default: break;
        }
    } else {
        switch(kombinacija[k-1]){
            case 1: dgm.style.backgroundColor = "#ff7777"; break;
            case 2: dgm.style.backgroundColor = "#ffff77"; break;
            case 3: dgm.style.backgroundColor = "#7777ff"; break;
            case 4: dgm.style.backgroundColor = "#ff77ff"; break;
            case 5: dgm.style.backgroundColor = "#77ff77"; break;
            case 6: dgm.style.backgroundColor = "#ffaa55"; break;
            default: break;
        }
    }
    
    
}


function oceni(kombinacija, pokusaj){
    crni = 0;
    beli = 0;
    prebrojavanje = [0, 0, 0, 0, 0, 0];
    niz_crnih = [0, 0, 0, 0];
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

    console.log(kombinacija, pokusaj);
    ispisi();
}

function novaKombinacija(){
    // console.log(Math.round(Math.random()*10000) % 6);
    for(i = 0; i < 4; i++){
        kombinacija[i] = Math.round(Math.random() * 10000) % 6 + 1;
        promena("k", i+1);
    }
        
    console.log(kombinacija, pokusaj);

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
// Pozivamo funkciju za proveru
document.getElementById("oceni").addEventListener("click", function(){ oceni(kombinacija, pokusaj) });