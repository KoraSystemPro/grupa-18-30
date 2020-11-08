let addButton = document.getElementById("addButton");
let clearButton = document.getElementById("clearButton");
let addInput = document.getElementById("itemInput")
let todoList = document.getElementById("todoList");
let listArray = [];


function listItemObj(content, status){
    this.content = "";
    this.status = "Incomplete";
}

let createItemDom = function(data, status){
    let listItem = document.createElement("li");
    let itemLabel = document.createElement("label");
    let itemCompBtn = document.createElement("button");
    let itemRemoveBtn = document.createElement("button");
    
    if(status == "incomplete"){
        listItem.className = "completed";
    } else {
        listItem.className = "uncompleted";
    }
    
    // listItem.className = (status == "incomplete") ? "completed" : "uncompleted";
    itemLabel.innerText = data;
    
    itemCompBtn.className = "btn btn-success";
    // Proveravamo ako je item nezavrsen dugme treba da ga zavrsi i obrnuto
    if(status == "incomplete"){
        itemCompBtn.innerText = "Complete";
       // itemCompBtn.addEventListener("click", changeToComp);
    } else {
        itemCompBtn.innerText = "Incomplete";
        //itemCompBtn.addEventListener("click", changeToIncomp);
    }
    
    itemRemoveBtn.className = "btn btn-danger";
    itemRemoveBtn.innerText = "Incomplete";
    //itemRemoveBtn.addEventListener("click", removeItem);
    
    return;
    
}

let addToList = function(){
    let newItem = new listItemObj();
    newItem.content = addInput.value;
    listArray.push(newItem);

    let item = createItemDom(addInput.value, "Incomplete");
}

addEventListener("click", addToList);