// Napisati program koji za prizvoljan string menja sva karaktere na parnim pozicijama sa +,
// ako je indeks deljiv sa 10, sa * i ako je deljiv sa 3 menja karakter na toj poziciji sa $,
// prioritet ima 3 pa 10 pa deljivi sa 2
#include <iostream>
#include <string>

using namespace std;

int main(){
	string poruka = "Ovo je poruka koja treba da se modifikuje po pravilu iz zadatka.";
	cout << "Neizmenjeni string: " << poruka << endl; 
	for(int i = 0; i < poruka.size(); i++){
		if(i % 3 == 0){
			poruka[i] = '$';
		} else if(i % 10 == 0){
			poruka[i] = '*';
		} else if(i % 2 == 0){
			poruka[i] = '+';
		}
	}
	cout << "Modifikovan string: " << poruka << endl;
	
	
	return 0;
}
