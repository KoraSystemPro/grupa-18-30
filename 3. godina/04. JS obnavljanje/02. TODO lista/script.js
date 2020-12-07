//  Dohvatamo listu i stavljamo EventListener na sve clanove ul-a
var list = document.getElementById('todoLista');
list.addEventListener('click', function(evt) {
  // Funkcija vraca target element i menja ime klase pritisnutog elementa liste
  // Greska je bila u narednoj liniji, tagName vraca velika slova zato moram da poredim sa 'LI' ne sa 'li' 
  if (evt.target.tagName === 'LI') {
    evt.target.classList.toggle('checked');
  }
});

function sakrijiElement(){
    let element = this.parentElement;
    element.style.display = "none";
}

function napraviNoviElement(){
    let li = document.createElement("li");
    let ulaznaVrednost = document.getElementById("inputSadrzaj").value;
    let ulazCvor = document.createTextNode(ulaznaVrednost);
    li.appendChild(ulazCvor);
    if(ulaznaVrednost == ""){
        alert("Morate da napišete nešto!");
    } else {
        list.appendChild(li);
    }
    // Brisemo sadrzaj input-a kada ga dodamo na listu
    document.getElementById("inputSadrzaj").value = "";

    let span = document.createElement("span");
    span.className = "close";
    span.appendChild(document.createTextNode("\u274C"));
    li.appendChild(span);

    // Za svaki clan liste pravimo X koje ce ga ugasiti
    for(i = 0; i < close.length; i++){
        close[i].addEventListener("click", sakrijiElement);
    }
    
}

document.getElementById("dgmDodaj").addEventListener("click", napraviNoviElement);