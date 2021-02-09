// 3. Za zadati string napisati konvertovan string, gde je svako slovo pretvoreno u sledbenika u abecedi
//		a -> b, b -> c, z -> a

#include <iostream>
#include <string>

using namespace std;

int main(){
	string poruka = "Ovo je string, koji se treba sifrovati, kao Cezarovu sifru.";
	cout << "Pocetna: " << poruka << endl;
	
	int char_code;
	for(int i = 0; i < poruka.length(); i++){
		char_code = int(poruka[i]);
		
		if(char_code == 122){
			poruka[i] = char(97); // z -> 'a'
		} else if(char_code == 90){
			poruka[i] = char(65); // Z -> 'A'
		} else if((char_code >= 65 && char_code < 90) || (char_code >= 97 && char_code < 122)){
			poruka[i] = char(char_code + 1);
		}
		
	}
	cout << "Sifrovana: " << poruka << endl;
	
	return 0;	
}
