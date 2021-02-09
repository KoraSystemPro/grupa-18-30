/*
Napisati funkciju int zbir_delilaca(int n) koja izracunava zbir delilaca broja n. 
Napisati program koji ucitava ceo pozitivan broj k i ispisuje zbir delilaca svakog broja 
od 1 do k. U slucaju neispravnog unosa, ispisati odgovarajucu poruku o grešci.
*/

#include <iostream>

using namespace std;

int zbir_delilaca(int n){
	int zbir = 0;
	for(int i = 1; i*i <= n; i++){
		if(n % i == 0){
			zbir += i;
			if(i != n/i){
				zbir += n/i;
			}
		}
	}
	
	// Povratna vrednost je zbir
	return zbir;
	
	// n = 6, i = 2    ->  dodaje se 2 i 6/2 = 3
	// n = 4, i = 2    ->  dodajete 2
	
}

int main(){
	int k;
	cout << "Unesite broj k: ";
	cin >> k;
	
	if(k <= 0){
		cout << "Greska, neispravan unos!" << endl;
		return -1;
	}
	
	for(int i = 1; i <= k; i++){
		cout << "Zbir delilaca za k = " << i << " je: " << zbir_delilaca(i) << endl;
	}
	
	
	return 0;
}
