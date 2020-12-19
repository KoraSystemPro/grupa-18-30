#include <iostream>

using namespace std;

int stepenuj(int baza, int stepen){
	int rezultat = 1;
	for(int i = 0; i < stepen; i++){
		rezultat = rezultat * baza;
	}
	
	return rezultat;
}

int main(){
	int x, y;
	cout << "Unesite bazu: ";
	cin >> x;
	cout << "Unesite stepen: ";
	cin >> y;


	cout << "Rezultat: " << stepenuj(x, y);
	
	
	return 0;
}
