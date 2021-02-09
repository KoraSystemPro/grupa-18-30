#include <iostream>

using namespace std;

/*
Napisati program koji ucitava ceo broj n (n >= 2) i koji
iscrtava sliku kuce sa krovom: kuca je kvadrat stranice n, a krov jednakostranicni
trougao stranice n
n = 4
   *
  * *
 *   *
* * * *
*     *
*     *
* * * *
*/


int main(){
	unsigned n;
	cout << "Unesite n: ";
	cin >> n;
	
	// I deo je crtanje trougla(krova)
	for(int i = 0; i < n - 1; i++){
		// Ispis belina pre
		for(int j = 0; j < n - 1 - i; j++){
			cout << " ";
		}	
		// Ispis zvezdice + belina + zvezdice
		for(int j = 0; j < 2*i+1; j++){
			if(j == 0 || j == 2*i){
				cout << "*";
			} else {
				cout << " ";
			}
		}
		
		cout << endl;
	}
	
	// II deo je crtanje kvadrata
	for(int i = 0; i < n; i++){
		for(int j = 0; j < n; j++){
			if(i == 0 || i == n-1 || j == 0 || j == n-1){
				cout << "* ";
			} else {
				cout << "  ";
			}	
		}
		
		cout << endl;
	}
	
	
	return 0;
}
