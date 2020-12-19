// 2. Za zadati string, uvecati svako prvo slovo na pocetku reci, pod pretpostavkom da su reci odvojene
//		jednim razmakom
#include <iostream>
#include <string>

using namespace std;

int main(){
	string poruka = "ovo je string koji se treba ispisati u nazad!";
	cout << "Pocetna: " << poruka << endl;
	
	for(int i = 0; i < poruka.size(); i++){
		// toupper(c)	-	a -> A
		// tolower(c)	-	A -> a
		if(poruka[i-1] == ' '){
			poruka[i] = toupper(poruka[i]);
		} else if (i == 0){
			poruka[i] = toupper(poruka[i]);
		}
	}
	
	cout << "Pretvorena: " << poruka;
	
	
	return 0;
}
