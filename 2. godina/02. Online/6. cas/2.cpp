#include <iostream>
#include <iomanip>
#include <cmath>

using namespace std;

/*
Napisati funkciju float aritmeticka_sredina(int n)
koja racuna aritmeticku sredinu cifara datog broja. Napisati i program koji ucitava ceo broj i 
ispisuje aritmeticku sredinu njegovih cifara zaokruženu na tridecimale.
*/


// Trazi prosek(aritmeticku sredinu) cifara
float aritmeticka_sredina(int n){
	// 123456 % 10
	// zb = 21
	// bc = 6
	int zbir_cifara = 0;
	int broj_cifara = 0;
	// Pretvaramo n da bude pozitivan
	n = abs(n);
	
	while(n > 0){
		zbir_cifara += n % 10;
		broj_cifara++;
		n /= 10;
	}
	
	return (float)zbir_cifara / broj_cifara; // Kastovanje(konvertovanje) tipa promenljive
											 // deljenik se pretvara u float tip, da bi prisilio automatsku
											 // konverziju delioca u float i time dobijamo dobar kolicnik
											 
}

int main(){
	cout << setprecision(3);
	int x;
	cout << "Unesite ceo broj: ";
	cin >> x;

	cout << "Aritmeticka sredina cifara unetog broja je: " << aritmeticka_sredina(x);
	
	return 0;
}
