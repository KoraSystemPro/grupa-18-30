#include <iostream>

using namespace std;

/*
Napisati program koji za uneti pozitivan ceo broj n zvezdicama iscrtava odgovarajucu sliku. 
Napomena: Pretpostaviti da je unos ispravan.
	(a) Slika predstavlja kvadrat stranice n sastavljen od zvezdica.
	(b) Slika predstavlja ivicu kvadrata dimenzije n.
	(c) Slika predstavlja rub kvadrata dimenzije n koji i na glavnoj dijagonali ima
		zvezdice.
	(d) Za uneti pozitivan ceo broj n zvezdicama iscrtava slovo X dimenzije n.
	(e) za uneti neparan pozitivan broj n korišcenjem znaka + iscrtava veliko plus dimenzije n.
	


*/

int main(){
	int op = -1;
	cout << "Opcija: ";
	cin >> op;
	
	int n;
	cout << "Unesite n: ";
	cin >> n;
	
	if (op == 1){
		// (a)
		// n * n
		
		for(int i=0; i < n; i++){
			for(int j=0; j < n; j++){
				cout << " * ";
			}
			cout << endl;
		}	
	} else if (op == 2){
		// (b)
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				if(i == 0 || i == n-1 || j == 0 || j == n-1){
					cout << " * ";
				}
				else {
					cout << "   ";
				}
			}
			cout << endl;
		}
	} else if (op == 3){
		// (c)
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				if(i == 0 || i == n-1 || j == 0 || j == n-1 || i == j){
					cout << " * ";
				}
				else {
					cout << "   ";
				}
			}
			cout << endl;
		}
		
	} else if (op == 4){
		// (d)
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				if(i == j || i+j == n-1){
					cout << " * ";
				} else {
					cout << "   ";
				}
			}
			cout << endl;
		}
		
	} else if (op == 5){
		// (e)
		while(n % 2 == 0){
			cout << "Molimo unesite neparan broj: ";
			cin >> n;
		}
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				if(i == n/2 || j == n/2){
					cout << " + ";
				} else {
					cout << "   ";
				}
			}
			cout << endl;
		}
	}
	
	
	
	return 0;
}
