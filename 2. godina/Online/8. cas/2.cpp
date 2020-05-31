#include <iostream>
#include <string>

using namespace std;

int main(){
	string str1 = "Pozdrav";
	string str2 = "svete";
	string str3;
	int duzina;
	
	// Kopiranje stringa str1 u str3
	str3 = str1;
	cout << "str3: " << str3;
	cout << endl;
	
	// Nadovezivanje stringova str2 na str3
	str3 = str3 + " " + str2 + "!";
	cout << "str3 + str2: " << str3;
	cout << endl;
	
	// Duzina stringa posle nadovezivanja
	duzina = str3.size();
	cout << "str3.size(): " << duzina;
	
	// Ubacuje prosledjen string na poziciju sa indeskom 3
	str1.insert(3, "!!!");
	cout << endl << str1;
	
	return 0;
}
