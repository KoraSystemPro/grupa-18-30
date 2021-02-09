/* Ovo su funkcije koje menjaju paragraf */
function promena(){
	document.getElementById("primer").innerHTML = 4 + 3;
	
}
function reset(){
	document.getElementById("primer").innerHTML = "Ovako izgleda paragraf u HTML-u.";
}


/* JavaScript output */
// var a = 5 + 12;
// document.getElementsById("promena-innerhtml").innerHTML = a;
// document.write(6 + 8);
// window.alert(5*8);
// console.log(7 - 2);

var x, y, z;
/*
5 + 7 = int
5.59 + 3 = float 
*/
/*
x = 5.64;
y = 12;
z = x + y;
console.log(z);

var ime, prezime;
ime = "Luka";
prezime = "Korica";
console.log(ime + " " + prezime);
console.log(3 + 2 + "6");
console.log("3" + 2 + 6);
*/
x = 5;
y = 2;
// x--; x++;
z = x ** y;	// ** stepenovanje
console.log(z);
/* Operatori dodele
x+=y    x = x + y
x-=y    x = x - y
x*=y    x = x * y
x/=y    x = x / y
x%=y	x = x % y
x**=y	x = x ** y

Operatori provere
x == y
x === y
x != y
x !== y
x < y
x > y
x >= y
x <= y

Logicki operatori
&&	AND
||	OR
!	NOT(negacija)
*/
/*
var b = 10;					// Number
var s = "Ovo je string";	// String
var name = {firstName:"Luka", lastName:"Korica"};	//Objekat

console.log('Milos Crnjanjski "Seobe"');	"Can't"

var aut = ["Audi", "BMW", "Lada", "VAZ", "Volvo"];
//		  aut[0]   aut[1]  aut[2]	.... 

var osoba = {ime:"Luka", prezime:"Korica", bojaOciju:"braon", godine:21};	//Objekat

console.log(typeof osoba);
console.log(typeof "Ovo je strning");
console.log(typeof 3);

var prom = null;		// null = nema nista


/*
function ime(parametar1, parametar2, parametar3,...){
	// Kod koji se izvrsava u okviru funkcije
}
*/









