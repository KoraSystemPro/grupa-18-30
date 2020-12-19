#include <iostream>

using namespace std;

/*
	Napisati program koji za unetu pozitivnu celobrojnu vrednost n ispisuje odgovarajuce brojeve. 
	Napomena: Pretpostaviti da je unos ispravan.
		(a) Ispisati tablicu množenja brojeva od 1 do n
		3 x 3   n = 3
		1	2	3
		2	4	6
		3	6	9
				
		(b) Ispisati sve brojeve od 1 do n^2, po n brojeva u jednoj vrsti.
		n = 3   -> 9
		1	2	3
		4	5	6
		7	8	9
		
		n = 4   -> 16
		1	2	3	4
		5	6	7	8
		9	10	11	12
		13	14	15	16
		
		(c) Ispisati tablicu brojeva tako da su u prvoj vrsti svi brojevi od 1 do n, a u
			svakoj narednoj vrsti, brojevi dobijeni rotiranjem prethodne vrste za jedno mesto u levo.
		n = 3
		1	2	3
		2	3	1
		3	1	2
		
		n = 4
		1	2	3	4
		2	3	4	1
		3	4	1	2
		4	1	2	3
		
		
*/


int main(){
	int opcija;
	cout << "Unesite opciju za zadatak: ";
	cin >> opcija;
	
	int n;
	cout << "Unesite n: ";
	cin >> n;
	
	if(opcija == 1){
		// (a)
		for (int i = 1; i <= n; i++){
			for (int j = 1; j <= n; j++){
				cout << i*j << "\t";
			}
			cout << endl;
		}
	} else if (opcija == 2) {
		// (b)
		// 1 2 ... n
		// n*n
		int br = 1;
		for(int i = 0; i < n; i++){
			for(int j = 0; j < n; j++){
				cout << br << "\t";
				br++;
			}
			cout << endl;
		}
	} else if (opcija == 3) {
		// (c)
		for(int i = 1; i <= n; i++){
			for(int j = i; j < n+i; j++){
				if (j <= n){
					cout << j << "\t";
				} else {
					cout << j-n << "\t";
				}
			}
			cout << endl;
		}
	}
	
	
	
	
	return 0;
}
