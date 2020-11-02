const card = document.querySelector(".card");
const container = document.querySelector(".container");

container.addEventListener("mousemove", (e) => {
    let xAxis = (window.innerWidth / 2 - e.pageX) / 25;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 25;
    
    console.log(xAxis, yAxis);
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});