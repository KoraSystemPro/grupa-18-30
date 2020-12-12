var originalBoard;
const humanPlayer = 'O';
const cpuPlayer = 'X';
const winCombinations = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [6, 4, 2]
]
const cells = document.querySelectorAll(".cell");

// Pozivamo funkciju za igru cim se ucita stranica
startGame();
// Restart dugme poziva funkciju za pocetak igre
document.getElementById("resetGame").addEventListener("click", startGame);

function startGame(){
    document.querySelector(".endgame").style.display = "none";
    originalBoard = Array.from(Array(9).keys());
    for(let i = 0; i < cells.length; i++){
        cells[i].innerText = "";
        // cells[i].addEventListener("click", nextTurnClick);
    }
}
console.log()