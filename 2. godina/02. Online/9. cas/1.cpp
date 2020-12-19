#include <string>
#include <iostream>

using namespace std;

int main(){
	// str1 = "Ovo je prvi string"
	string str1("Ovo je prvi string");
	// str2 = str1
	string str2(str1); 		
	// Iniciajlizuje string na 5 ponavljanja zadatog karaktera
	string str3(5, '!'); 	
	// Inicijalizuje str4 na "je pr", drugi argument predstavlja br. indeksa odakle krece citanje navedenog stringa,
	//	a treci argument prestavlja br narednih karaktera koji se ucitavaju
	string str4(str1, 4, 5); 
	
	cout << "str1: " << str1 << endl;
	cout << "str2: " << str2 << endl;
	cout << "str3: " << str3 << endl;
	cout << "str4: " << str4 << endl;
	
	// Isti kao i inicijalizacija gore navedenog str2
	string str5 = str4;
	cout << "str5 pre clear(): " << str5 << endl;
	// .clear() je metoda klase string koja radi isto sto i strcpy(str5, ""), postavi string na praznu vrednost
	str5.clear();
	cout << "str5 posle clear(): " << str5 << endl;

	// .size() ili .length() rade isto, vracaju broj karaktera u stringu, kao strlen(str1)
	int duzina_str1 = str1.length();
	cout << "Duzina stringa str1: " << duzina_str1 << endl;
	/*
	a	5 6 8 7 9 2 6
		0 1 2 3 4 5 6	
	a[2] // 8
	a[5] // 2
	
	Kao i u nizovima brojeva, u niskama se karakterima moze pristupiti uz pomoc indeksa
	pr. 
	str1[2] // o
	str1.at(2) // o
	*/
	cout << "str1[2]: "<< str1[2] << endl;
	cout << "str1.at(2): "<< str1.at(2) << endl;
	
	/*
	char prvi = str1.front();	 	// str1[0];
	char poslednji = str1.back();	// str1[str1.length()-1];
	cout << "prvi: " << prvi << "\t" << "poslednji: " << poslednji << endl;
	*/
	
	
	string str6 = str1;
	// str6 = str6 + "...";
	str6.append(", vise ne!");
	cout << "str6.append(\", vise ne!\"): " << str6 << endl;	// \" oznacava da se " koriste kao deo veceg stringa
	
	str6 = str1;
	str6.append("nasumicna recenica.", 5, 4);
	cout << "str6.append(\"nasumicna recenica.\", 5, 4): " << str6 << endl;

	
	// .find() metoda vraca indeks prvog ponavljanja traznog stringa, u suprotnom ako ga ne nadje,
	// vraca -1
	string rec = "ring";
	if(str1.find(rec) != -1){
		cout << "\"" << rec << "\" " << "je pronadjena u stringu str1 na indeksu: " << str1.find(rec) << endl;
	} else {
		cout << "Trazena \"rec\" nije pronadjena u stringu str1." << endl;
	}
	
	// .substr(a, b) vraca string duzine b krecuci se od indeska a
	cout << "str1.substr(8, 7): " << str1.substr(8, 7) << endl;
	string str7 = str1.substr(8, 7);
	cout << "str7 = str1.substr(8, 7): " << str7 << endl;
	
	return 0;
}
