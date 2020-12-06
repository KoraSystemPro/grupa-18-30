var ul = document.getElementById("todoLista");
var close = document.getElementsByClassName("close");

ul.addEventListener("click", function(evt){
    if(evt.target.tagName === "li"){
        evt.target.classList.toggle = "gotovo";
    }
}, false);

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
        ul.appendChild(li);
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