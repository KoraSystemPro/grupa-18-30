let kombinacija = [0, 0, 0, 0];
let pokusaj = [0, 0, 0, 0];
let crni = 0;   // Dobar broj, dobro mesto      crveni
let beli = 0;   // Dobar broj                   zuti
let niz_crnih = [0, 0, 0, 0];
let prebrojavanje = [0, 0, 0, 0, 0, 0];
                //   1  2  3  4  5  6
let br_pokusaja = 0;
let max_br_pokusaja = 6;
// Ispisuje sva polja koja cemo koristiti za pamcenje pokusaja
nacrtajPolja();
ispisi();
let div_pokusaj_pamcenje_boja, div_resenje_pamcenje_boja;



function izbrisiTabelu(){
    for(let red = 0; red < max_br_pokusaja; red++){
        for(let kolona = 0; kolona < 4; kolona++){
            // Dohvatamo pokusaj i resenje za svaki pokusaj i svaku kolonu
            let polje_pokusaj = document.getElementById("pokusaj-pamcenje-" + red + "-" + kolona);
            let polje_resenje = document.getElementById("resenje-pamcenje-" + red + "-" + kolona);
            // Vracamo im prvobitnu boju
            polje_pokusaj.style.backgroundColor = "white";
            polje_resenje.style.backgroundColor = "#777777";
        }
    }
}

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
    br_pokusaja++;
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

    // Dobitan pogodak, ispisujemo resenje
    if(crni == 4){
        document.getElementById("sakriven_red").style.display = "flex";
        document.getElementById("nova-kombinacija").style.display = "block";
        document.getElementById("oceni").style.display = "none";

    }

    // Iskorisceni su svi pokusaji
    if((max_br_pokusaja - br_pokusaja) <= 0){
        document.getElementById("oceni").style.display = "none";
        document.getElementById("nova-kombinacija").style.display = "block";
    }
    console.log("Kombinacija:\t" + kombinacija + "\nPokusaj:\t\t" + pokusaj + "\nBr pokusaja:\t" + br_pokusaja + "\nPreostali broj pokusaja:\t" + (max_br_pokusaja-br_pokusaja));
    ispisi();
    upisiUTabelu(pokusaj, crni, beli, br_pokusaja-1);
}

function novaKombinacija(){
    // Resetujemo broj pokusaja
    br_pokusaja = 0;
    document.getElementById("nova-kombinacija").style.display = "none";
    document.getElementById("oceni").style.display = "block";
    // Sakrivamo kombinaciju pre neg sto napravimo novu 
    document.getElementById("sakriven_red").style.display = "none";
    // Resetujemo pokusaj na 0 i postavljamo sve na sivo
    for(i = 0; i < 4; i++){
        pokusaj[i] = 0;
        document.getElementById("dgm_p" + (i + 1)).style.backgroundColor = "#777777"; 
    }
    // Resetujemo tabelu na pocetnu fazu
    izbrisiTabelu();


    // Generisanje nove kombinacije
    // console.log(Math.round(Math.random()*10000) % 6);
    for(i = 0; i < 4; i++){
        kombinacija[i] = Math.round(Math.random() * 10000) % 6 + 1;
        promena("k", i+1);
    }
        
    console.log("Nova kombinacija: " + kombinacija + "\n-------------------");
    ispisi();
}

function ispisi(){
    // Kombinacija
    document.getElementById("kombinacija").innerHTML = "Kombinacija: ";
    for(i = 0; i < 4; i++){
        document.getElementById("kombinacija").innerHTML += kombinacija[i];
    }
    // Preostali broj pokusaja
    document.getElementById("prostali_pokusaji").innerHTML = "Preostali broj pokusaja: " + (max_br_pokusaja - br_pokusaja);
    // Crni
    document.getElementById("crni").innerHTML = "Crni: " + crni;
    // Beli
    document.getElementById("beli").innerHTML = "Beli: " + beli;
}

function upisiUTabelu(pokusaj, crni, beli, red){
    // Popunjava pokusaje
    for(let kolona = 0; kolona < 4; kolona++){
        // Selektujemo odgovarajuce polje u koloni i tako redom, red po red
        let polje = document.getElementById("pokusaj-polje-" + red + "-" + kolona);
        // Menjamo boju polje po polje
        switch(pokusaj[kolona]){
            case 1: polje.style.backgroundColor = "#ff7777"; break;
            case 2: polje.style.backgroundColor = "#ffff77"; break;
            case 3: polje.style.backgroundColor = "#7777ff"; break;
            case 4: polje.style.backgroundColor = "#ff77ff"; break;
            case 5: polje.style.backgroundColor = "#77ff77"; break;
            case 6: polje.style.backgroundColor = "#ffaa55"; break;
            default: break;
        }
    }
    // Popunjava resenja, prvo crne pa bele pogotke
    // Promanljiva i nam sluzi samo za pracenje indeksa celija u vrsti
    let i = 0;
    for(let br_crnih = 0; br_crnih < crni; i++, br_crnih++){
        let polje = document.getElementById("resenje-polje-" + red + "-" + i);
        polje.style.backgroundColor = "red";
    }
    for(let br_belih = 0; br_belih < beli; i++, br_belih++){
        let polje = document.getElementById("resenje-polje-" + red + "-" + i);
        polje.style.backgroundColor = "yellow";
    }
    
}

function nacrtajPolja(){
    let div_tabela = document.getElementById("memorija");

    for(let i = 0; i < max_br_pokusaja; i++){
        let div_red = document.createElement("div");
        div_red.classList.add("red", "flex-red");

        let div_pokusaj = document.createElement("div");
        div_pokusaj.classList.add("pokusaj", "flex-red");

        let div_resenje = document.createElement("div");
        div_resenje.classList.add("resenje", "flex-red");

        for(let j = 0; j < 4; j++){
            // Kreira polja od pokusaja i dodaje ih na div_pokusaj
            let div_pokusaj_polje = document.createElement("div");
            div_pokusaj_polje.classList.add("pokusaj-polje");
            div_pokusaj_polje.id = "pokusaj-polje-" + i + "-" + j;
            div_pokusaj.appendChild(div_pokusaj_polje);

            // Kreira polja od resenja i dodaje ih na div_resenje
            let div_resenje_polje = document.createElement("div");
            div_resenje_polje.classList.add("resenje-polje");
            div_resenje_polje.id = "resenje-polje-" + i + "-" + j;
            div_resenje.appendChild(div_resenje_polje);

        }
        div_red.appendChild(div_pokusaj);
        div_red.appendChild(div_resenje);

        div_tabela.appendChild(div_red);
    }
}


// Pozivam funkciju za generisanje kombinacije
document.getElementById("nova-kombinacija").addEventListener("click", novaKombinacija);
// Pozivamo funkciju za proveru
document.getElementById("oceni").addEventListener("click", function(){ oceni(kombinacija, pokusaj) });