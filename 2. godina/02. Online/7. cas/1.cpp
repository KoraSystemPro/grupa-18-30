#include <iostream>

using namespace std;

/*
Napisati program koji ucitava pozitivne cele brojeve m i n i iscrtava jedan 
do drugog n kvadrata cija je svaka stranica sastavljena od m zvezdica razdvojenih prazninom.
Unesite brojeve n i m: 3 5
i\j 1 2 3 4 5 6 7 8 9 10|11|12|13
1	* * * * * * * * * * * * * 
2	*       *       *       *
3	*       *       *       *
4	*       *       *       *
5	* * * * * * * * * * * * *
*/


int main(){
	unsigned int n, m;
	
	cout << "Unesite brojeve n i m: ";
	cin >> n >> m;
	// Brojac i odredjuje koji red slike se ispisuje, ukupno ima m redova
	for(int i = 1; i <= m; i++){
		// Brojac j oznacava koja kolona se trenutno ispisuje. Za svaki kvadrat se racuna duzina bez poslednje ivice
		for(int j = 0; j <= n*2*(m-1); j++){
			if(i == 1 || i == m){
				// Naizmenican ispis zvedica i razmaka
				if(j % 2 == 0)
					cout << "*";
				else
					cout << " ";				
			}else{
				// Ivice kvadrata (tj iscrtava ivice, pise praznine gde nisu ivice)
				if(j % (2*(m-1)) == 0)
					cout << "*";
				else
					cout << " ";
			}
				
		}
		cout << endl;
	}
		
	return 0;
}
