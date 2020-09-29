#include <iostream>

using namespace std;

int main(){
	//int a[4]	// a:	_	_	_	_
				// 		0	1	2	3		a[1] = a[3] + 5
				
	int a[3][4];// a:		
				// i\j	0	1	2	3
				//	0	_	_	_	_
				//	1	_	_	_	_
				//	2	_	_	_	_

	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			cin >> a[i][j];
		}
	}
	
	for(int i = 0; i < 3; i++){
		for(int j = 0; j < 4; j++){
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
	
	
	
	return 0;
}
