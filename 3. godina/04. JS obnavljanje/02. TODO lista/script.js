function napraviNoviElement(){
    let li = document.createElement("li");
    let ulaznaVrednost = document.getElementById("input").value;
    let t = document.createTextNode(ulaznaVrednost);
    li.appendChild(t);
    document.getElementById("myList").appendChild(li);
    
}

document.getElementById("input").addEventListener("click", napraviNoviElement);