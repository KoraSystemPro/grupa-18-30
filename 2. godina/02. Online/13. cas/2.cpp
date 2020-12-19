/*
2. Za uneti ceo broj n ispisati ivice trugla visine n "*" dimenzija n, 
vrh trougla se nalazi u gornjem uglu.
ispis:
n = 5
        *
      *   *
    *       *
  *           *
* * * * * * * * *
*/

#include <iostream>

using namespace std;

int main(){
	unsigned n;
	cout << "Unesite n: ";
	cin >> n;
	
	for(int i = 0; i < n; i++){
		// Ispis belina pre
		for(int j = 0; j < n - 1 - i; j++){
			cout << " ";
		}
		// Ispis zvezdice + belina + zvezdice
		for(int j = 0; j < 2*i+1; j++){
			if(j == 0 || j == 2*i || i == n-1){
				cout << "*";
			} else {
				cout << " ";
			}
		}
		
		cout << endl;
	}
	
	
	
	return 0;
}
