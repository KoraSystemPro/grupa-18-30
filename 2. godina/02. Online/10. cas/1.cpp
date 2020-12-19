// 1. Ispisati zadati string u nazad
#include <iostream>
#include <string>

using namespace std;

int main(){
	string poruka = "Ovo je string koji se treba ispisati u nazad!";
	cout << "Pocetna: " << poruka << endl;
	
	string tmp = poruka;
	int x = 0;
	for(int i = poruka.size()-1; i >= 0; i--){
		poruka[x] = tmp[i];
		x++;
	}
	cout << "Niz procitan sa desna: " << poruka << endl;
	
	
	return 0;
}
