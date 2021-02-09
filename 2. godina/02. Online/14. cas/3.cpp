#include <iostream>

using namespace std;

int main(){
	int a[3][4], b[3][4], c[3][4];
	cout << "Molimo unesite vrednosti u prvu matricu: " << endl;
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			cin >> a[i][j];
		}
	}
	cout << endl;
	cout << "Molimo unesite vrednosti u drugu matricu: " << endl;
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			cin >> b[i][j];
		}
	}
	cout << endl;
	cout << "Zbir unete dve matrice: " << endl;
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			c[i][j] = a[i][j] + b[i][j];
			cout << c[i][j] << " ";
		}
		cout << endl;
	}
	
	
	
	return 0;
}
