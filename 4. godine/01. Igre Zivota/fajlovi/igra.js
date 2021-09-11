var sirina = 600;
var visina = 600;
var redovi = 10;
var kolone = 10;
var velicinaCelije = sirina / kolone;

function pripremiCanvas() {
    let canv = document.createElement("canvas");
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
function main() {
    let canv, kontekst = pripremiCanvas();
    let igra = napravi2DNiz(redovi, kolone);
    igra = napraviNasumicnuIgru(igra);
    console.log(igra);
    crtaj(kontekst, igra);



}

document.addEventListener("DOMContentLoaded", main);