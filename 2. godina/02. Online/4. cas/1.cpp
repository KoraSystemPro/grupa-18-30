#include <iostream>

using namespace std;

/*
Napisati program koji ucitava pozitivan ceo broj n, a potom
iscrtava odgovarajucu sliku. Napomena: Pretpostaviti da je unos ispravan.
	(a) Slika predstavlja pravougli trougao sastavljen od zvezdica. Kateta trougla
		je dužine n, a prav ugao se nalazi u gornjem levom uglu slike.
		n = 3
		* * *
		* *
		*
	
	(b) Slika predstavlja pravougli trougao sastavljen od zvezdica. Kateta trougla
		je dužine n, a prav ugao se nalazi u donjem desnom uglu slike.
		n = 3
		    *
		  * *
		* * *

	(c) Slika predstavlja trougao sastavljen od zvezdica. Trougao se dobija spajanjem dva pravougla 
		trougla kateta dužine n, pri cemu je prav ugao prvog
		trougla u njegovom donjem levom uglu, dok je prav ugao drugog trougla u
		njegovom gornjem levom uglu, a spajanje se vrši po horizontalnoj kateti.
		n = 3
		*
		* *
		* * *
		* *
		*
		
	(d) Slika predstavlja rub jednakokrakog pravouglog trougla cije su katete dužine n.
		n = 4
		*
		* *
		*   *
		* * * *
	(e) Slika predstavlja naopacke ispisanu piramidu, napravljenu od * visine n.
		n = 5
	0	* * * * * * * * *
  	1	  * * * * * * *
    2		* * * * *
    3  		  * * *
    4    		*

	(f) Napraviti Paskalov trougao
		n = 6
			   1
             1   1
    	   1   2   1
     	1   3   3    1
   	  1  4    6   4   1
 	1  5   10   10  5   1 

*/

int main(){
	int op = -1;
	cout << "Molimo unesite opciju: ";
	cin >> op;
	
	int n;
	cout << "Unesite n: ";
	cin >> n;
	
	if(op == 1){
		int br_zv = n;
		for(int i = 0; i < n; i++){
			for(int j = 0; j < br_zv; j++){
				cout << " * ";
			}
			br_zv--;
			cout << endl;
		}

	} else if(op == 2){
		int br_nev;
		for(int i = 0; i < n; i++){
			br_nev = n-1-i;
			for(int j = 0; j < n; j++){
				if(j < br_nev){
					cout << "   ";
				} else {
					cout << " * ";
				}
			}
			
			cout << endl;	
		}
	
	
	} else if(op == 3){
		int br_zv = 1;
		for(int i = 0; i < 2*n-1; i++){
			for(int j = 0; j < br_zv; j++){
				cout << " * ";
			}
		
			if(i < n-1){
				br_zv++;
			} else {
				br_zv--;
			}
			cout << endl;
		}
		
	} else if(op == 4){
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				if(j == 0 || i == n-1 || i == j){
					cout << " * ";
				} else {
					cout << "   ";
				}

			}
			cout << endl;
		}
	} else if(op == 5){
		for(int i = n; i >= 1; i--){
			for(int j = 0; j < n-i; j++){
				cout << "   ";
			}
			for(int j = 0; j < 2*i-1; j++){
				cout << " * ";
			}
			for(int j = 0; j < i-1; j++){
				cout << "   ";
			}
			
			cout << endl;
		}
	} else if (op == 6){
		int koef = 1;
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n - i; j++){
				cout << "  ";
			}
			for(int j = 0; j <= i; j++){
				if(j == 0 || i == 0){
					koef = 1;
				} else {
					koef = koef*(i-j+1)/j;
				}
				cout <<  koef << "   ";
			}
			
			
			cout << endl;
		}
	}
	
	
	
	return 0;
}
