// Movement animation
const card = document.querySelector(".card");
const container = document.querySelector(".container");

// Items
const title = document.querySelector(".title");
const pickaxe = document.querySelector(".pickaxe img");
const purchase = document.querySelector(".purchase button");
const description = document.querySelector(".info h3");
const prices = document.querySelector(".prices");

// Pokazati i za karticu sa card.
// // Moving animation event   1.
// container.addEventListener("mousemove", (e) => {
//     // console.log(e.pageX, e.pageY);
//     let xAxis = window.innerWidth / 2 - e.pageX;
//     let yAxis = window.innerHeight / 2 - e.pageY;
//     console.log(xAxis, yAxis);
//     card.style.transform = `rotateY(${yAxis}deg) rotateX(${xAxis}deg)`;
// });


container.addEventListener("mousemove", (e) => {
    // console.log(e.pageX, e.pageY);
    let xAxis = (window.innerWidth / 2 - e.pageX) / 25;
    let yAxis = (window.innerHeight / 2 - e.pageY) / 25;
    // console.log(xAxis, yAxis);
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
});

// Animate In
container.addEventListener("mouseenter", (e) => {
    card.style.transition = "none";

    // Popout
    title.style.transform = `translateZ(150px)`;
    pickaxe.style.transform = `translateZ(150px) rotate(45deg)`;
    purchase.style.transform = `translateZ(200px)`;
    description.style.transform = `translateZ(100px)`;
    prices.style.transform = `translateZ(150px)`;
});

// Animate Out
container.addEventListener("mouseleave", (e) => {
    card.style.transition = "all 0.5s ease";
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;

    // Popin
    title.style.transform = `translateZ(0px)`;
    pickaxe.style.transform = `translateZ(0px) rotate(0deg)`;
    purchase.style.transform = `translateZ(0px)`;
    description.style.transform = `translateZ(0px)`;
    prices.style.transform = `translateZ(0px)`;

});