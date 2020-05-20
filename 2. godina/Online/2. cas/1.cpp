#include <iostream>

using namespace std;

// Naci maksimum niza dimenzije 5

int main(){
	/*
	int a[5]
	7	_	_	4	_
	0	1	2	3	4
	a[0] = 7
	a[3] = 4
	*/
	int a[5] = {60, 8,  73, 4,  92};
	//_ _ _ _ _	0	1	2	3	4
	
	int max = a[0];
	for(int i = 0; i < 5; i++){
		if(a[i] > max){
			max = a[i];
		}
	}
	cout << "Maksimum  niza je: " << max;
	
	
	
	return 0;
}
