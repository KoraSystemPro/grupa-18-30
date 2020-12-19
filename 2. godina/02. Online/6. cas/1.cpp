/*
Broj je prost ako je deljiv samo sa 1 i samim sobom.
(a) Napisati funkciju bool prost(int x) koja ispituje da li je dati ceo broj prost.
	Funkcija treba da vrati true ako je broj prost ili false u suprotnom.
(b) Napisati funkciju void prvih_n_prostih(int n) koja ispisuje prvih n prostih brojeva.
(c) Napisati funkciju void prosti_brojevi_manji_od_n(int n) koja ispisuje
sve proste brojeve manje od broja n.

Napisati program koji ucitava pozitivan ceo broj n i ispisuje prvih n prostih
brojeva, kao i sve proste brojeve manje od n.
*/

#include <iostream>
#include <cmath>

using namespace std;

bool prost(int x){
	// Proveravamo da li je 2 ili 3
	if (x == 2 || x == 3){
		return true;
	}
	// Parni brojevi nisu prosti
	if (x % 2 == 0){
		return false;
	}
	
	/*
	Ako se naidje na broj koji deli broj x, onda broj x nije prost.
	Provera se vrsi za sve neparne brojeve izmedju 3 i sqrt(x),
	jer kada bi imao parnog delioca, onda bi i broj 2 delio x,
	a taj uslov smo vec proverili iznad
	*/	
	for(int i = 3; i <= sqrt(x); i += 2){
		if (x % i == 0){
			return false;
		}	
	}
	
	// Ako nijedan od prethodnih slucajeva nije bio ispunjen, 
	// onda to znaci da nijedan broj ne deli x, pa je onda on prost.
	return true;
	
}

// Kljucna rec void oznacava da funkcija nema povratnu vrednost
void prvih_n_prostih(int n){
	int k = 2;
	int br_prostih = 0;
	while(br_prostih < n){
		// Ako se naidje na broj koji je prost, ispisuje ga i uvecava se brojilac
		if(prost(k) == true){
			cout << k << " ";
			br_prostih++;
		}
		
		// Prelazimo na sledeci broj
		k++;
	}
	cout << endl;
	
}

void prosti_brojevi_manji_od_n(int n){
	// Ako je n manje ili jednako 2, onda nema prostih brojeva
	// manjih od njega.
	if(n <= 2){
		cout << "Ne postoje manji brojevi!";
		return;	// Vraca se u main
	}
	
	// Za svaki broj k izmedju 2 i n-1 vrsi se provera da li je prost,
	// ako je prost ispisuje se njegova vrednost
	for(int k = 2; k < n; k++){
		if(prost(k) == true){
			cout << k << " ";
		}
	}
	cout << endl;	
}

int main(){
	unsigned int n;
	cout << "Unesite pozitivan ceo broj: ";
	cin >> n;
	
	cout << "Prvih n prostih brojeva: ";
	prvih_n_prostih(n);
	cout << "Prosti brojevi manji od n: ";
	prosti_brojevi_manji_od_n(n);
	
	
	return 0;
}


