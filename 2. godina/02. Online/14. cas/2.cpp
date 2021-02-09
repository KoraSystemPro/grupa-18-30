#include <iostream>

using namespace std;

int main(){
	//int a[4]	// a:	_	_	_	_
				// 		0	1	2	3		a[1] = a[3] + 5
				
	int a[3][4];// a:		
				// i\j	0	1	2	3
				//	 |	--------------
				//	0|	0	0	0	0
				//	1|	0	6	7	0
				//	2|	0	0	0	0

	// Unos u matricu
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			cin >> a[i][j];
		}
	}
	cout << endl;
	// Nalazi maksimum
	int max = a[0][0];
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			if(a[i][j] > max){
				max = a[i][j];
			}
		}
	}
	
	// Mnozimo obode matrice sa maksimalnom vrednoscu
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			if(i == 0 || i == 3-1 || j == 0 || j == 4-1){
				a[i][j] = a[i][j] * max;
			}
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
	
	
	
	return 0;
}
