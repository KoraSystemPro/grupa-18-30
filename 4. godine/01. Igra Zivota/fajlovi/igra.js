var sirina_prozora = window.innerWidth;
var visina_prozora = window.innerHeight;
var sirina, visina;
var rezolucija;
if(sirina_prozora < visina_prozora)
    rezolucija = sirina_prozora;
else
    rezolucija = visina_prozora;

sirina = rezolucija;
visina = rezolucija;
var redovi = 20;
var kolone = 20;
var velicinaCelije = sirina / kolone;
const SPEED = 100;


function pripremiCanvas() {
    let canv = document.createElement("canvas");
    canv.id = "slika";
    canv.width = sirina;
    canv.height = visina;
    document.body.appendChild(canv);
    let kontekst = canv.getContext("2d");
    return canv, kontekst;
}

function crtaj(ctx, matrica) {
    // Bojenje pozadine
    ctx.fillStyle = "#000000";
    ctx.fillRect(0, 0, sirina, visina);

    ctx.fillStyle = "#FFFFFF";
    for (let i = 0; i < redovi; i++) {
        for (let j = 0; j < kolone; j++) {
            if (matrica[i][j] == 1) {
                let x = j * velicinaCelije;
                let y = i * velicinaCelije;
                ctx.fillRect(x + 1, y + 1, velicinaCelije - 2, velicinaCelije - 2);
            }

        }
    }
}

function napraviNasumicnuIgru(matrica) {
    for (let i = 0; i < redovi; i++) {
        for (let j = 0; j < kolone; j++) {
            // Generisemo
            // 0 - mrtva
            // 1 - ziva
            matrica[i][j] = Math.floor(Math.random() * 1000) % 2;
        }
    }
    return matrica;
}
function napravi2DNiz(brRedova, brKolona) {
    let matrica = new Array(brRedova);
    for (let i = 0; i < brRedova; i++) {
        matrica[i] = new Array(brKolona);
    }
    return matrica;
}

function prebrojKomsije(matrica, x, y) {
    let suma = 0;
    // Bez obmotavanja
    // for (let i = -1; i < 2 && x + i > -1 && x + i < redovi; i++) {
    //     for (let j = -1; j < 2 && y + j > -1 && y + j < kolone; j++) {
    //         suma += matrica[x + i][y + i];
    //     }
    // }
    // Obmotavanje
    for (let i = -1; i < 2; i++) {
        for (let j = -1; j < 2; j++) {
            let row = (x + i + redovi) % redovi;
            let col = (y + j + kolone) % kolone;
            suma += matrica[row][col];
        }
    }
    suma -= matrica[x][y];
    return suma;
}

function novaGeneracija(matrica) {
    let sledecaGen = napravi2DNiz(redovi, kolone);

    for (let i = 0; i < redovi; i++) {
        for (let j = 0; j < kolone; j++) {

            let brKomsija = prebrojKomsije(matrica, i, j);
            let trenutnaCelija = matrica[i][j];
            // trenutna = 0, brKomsija = 3
            // 0 -> 1 ozivi
            if (trenutnaCelija == 0 && brKomsija == 3) {
                sledecaGen[i][j] = 1;
            }
            // trenutna = 1, brKomsija != {2,3}
            // 1 -> 0 umire, prepoulacija, nedostatak populacije 
            else if (trenutnaCelija == 1 && (brKomsija < 2 || brKomsija > 3)) {
                sledecaGen[i][j] = 0;
            }
            // Preostali slucaj, nista se ne menja
            else {
                sledecaGen[i][j] = trenutnaCelija;
            }
        }
    }
    return sledecaGen;
}

function pokreniIgru() {
    crtaj(kontekst, igra);
    igra = novaGeneracija(igra);

    azurirajMaterijalPrstena(document.getElementById("slika"));
}

var kontekst, canv, igra;
function main() {
    nacrtajScenu();
    canv, kontekst = pripremiCanvas();
    igra = napravi2DNiz(redovi, kolone);
    igra = napraviNasumicnuIgru(igra);
    generisiSkyBox(500, 2000, 2000);
    
    setInterval(pokreniIgru, SPEED);
}

document.addEventListener("DOMContentLoaded", main);