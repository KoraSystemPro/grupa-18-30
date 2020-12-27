const div_timer = document.getElementById("timer");
const nova_godina = new Date(2021, 0, 1, 0, 0, 0).getTime();

function obnoviVreme(){
    // Dohvatam trenutno vreme 
    let trenutno_vreme = new Date().getTime();
    // Vreme u milisekundama
    let do_nove_godine = nova_godina - trenutno_vreme;

    let dani = Math.floor(do_nove_godine / (1000 * 60 * 60 * 24));
    let sati = Math.floor((do_nove_godine % (1000*60*60*24)) / (1000 * 60 * 60));
    let minuti = Math.floor((do_nove_godine % (1000 * 60 * 60)) / (1000 * 60));
    let sekunde = Math.floor((do_nove_godine % (1000 * 60)) / 1000);
    
    // Ispisujemo vreme do kraja
    div_timer.innerHTML = dani + "d " + sati + "h " + minuti + "m " + sekunde + "s";
    
    // Ako smo stigli do nove godine, pisemo poruku i zaustavljamo tajmer
    if(do_nove_godine <= 0){
        div_timer.innerHTML = "SREĆNA NOVA 2021. GODINA!";
        // Skidamo interval sa promenljive refresh_timer
        clearInterval(refresh_timer);
    }
    console.log(do_nove_godine);

}

// Stavljamo metodu za pozivanje funkcije na promenljivu refresh_timer
var refresh_timer = setInterval(obnoviVreme, 1000);
