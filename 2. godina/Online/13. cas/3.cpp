/*
5. Napisati program koji za uneti ceo broj n, ispisuje string u kome su sva slova pomerena za n polja po abecedi. (Cezarova šifra)
Primer:
n = 2
Originalan string: ABCDEFGHIJKLMNOPQRSTUVWXYZ
Šifrovan string: CDEFGHIJKLMNOPQRSTUVWXYZAB

CEZAROVA SIFRA
*/

#include <iostream>

using namespace std;

int main(){
	unsigned n;
	cout << "Unesite pomeraj: ";
	cin >> n;
	string originalna;
	cout << "Unesite poruku: " << endl;
	cin >> originalna;
	//getline(cin, originalna);
	string sifrovana = originalna;
	
	for(int i = 0; i < originalna.length(); i++){
		char ch = originalna[i];
		
		// Sifrovanje malih slova
		if(ch >= 'a' && ch <= 'z'){
			ch = int(ch) + n;
			if(ch > 'z'){
				int(ch) = int(ch) - 'z' + 'a' - 1; 
			}
			sifrovana[i] = ch;
		}
		
		// Sifrovanje velikih slova
		if(ch >= 'A' && ch <= 'Z'){
			ch = int(ch) + n;
			if(ch > 'Z'){
				int(ch) = int(ch) - 'Z' + 'A' - 1; 
			}
			sifrovana[i] = ch;
		}
	}
	
	cout << "Sifrovana: " << endl;
	cout << sifrovana;
	
	
	return 0;
}
