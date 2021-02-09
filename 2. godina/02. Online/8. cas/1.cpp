#include <iostream>
#include <cstring>
  
using namespace std;
  
int main() { 
	// ovo je jedan karakter
	// char a = 't';
	// Niska = niz karaktera = string
	// char pozdrav[6] = {'H', 'e', 'l', 'l', 'o', '\0'}; // \0 - terminirajuca nula - NULL
	// char pozdrav[] = "Hello";
	
	// indeksi		0		1		2		3		4		5
	// promenljiva	H		e		l		l		o		\0
	// adresa	0x00001	0x00002  0x00003 0x00004 0x00005 0x00006	// 1B razlike u adresi
	// sizeof(char); // 1B
	
	// Funkcije iz biblioteke "cstring"
	// strcpy(s1, s2) 	// Kopira sadrzaj stringa s2 u string s1		s1 = s2
	// strcat(s1, s2) 	// Nadovezuje string s2 na kraj stringa s1    	s1 = s1 + s2
	// strlen(s1)		// Vraca duzinu stringa s1
	// strcmp(s1, s2)	// Ako su s1 i s2 isti onda vraca 0 kao vrednost, ako je s1<s2 onda vraca vrednost manju od 0,
						// Ako je s1>s2 onda vraca vrednost vecu od 0
	// strchr(s1, ch)	// Trazi ch u stringu s1, i vraca pokazivac na prvo ponavljanje
	// strstr(s1, s2)	// Trazi prvo ponavljanje stringa s2 u stringu s1 i vraca pokazivac na to mesto
	
	char niska1[10] = "Pozdrav";
	char niska2[10] = "svete";
	char niska3[20];
	
	// Kopiranje stringova
	strcpy(niska3, niska1);
	cout << "strcpy(niska3, niska1): " << niska3 << endl;	// niska3 = "Pozdrav"
	// strcpy(niska3, ""); Ovo je nacin da izbrisete clanove stringa
	
	// Nadovezivanje stringova
	strcat(niska3, " ");
	strcat(niska3, niska2);
	strcat(niska3, "!");
	cout << "strcat(niska3, niska2): " << niska3 << endl;	// niska3 = "Pozdrav" + " " + "svete" + "!"
	
	// Duzina stringa posle nadovezivanja
	int duzina;
	duzina = strlen(niska3);
	cout << "strlen(niska3): " << duzina;
	
	
	return 0;
}
