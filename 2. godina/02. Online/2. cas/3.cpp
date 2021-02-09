#include <iostream>

using namespace std;

int main(){
	/*
	int a = 8761273; //32bit -> 4byte
	cout << sizeof(a);
	_ _ _ _ _
	4 4 4 4 4
	20
	sizeof(niz) -> 20 
	dimenzija -> sizeof(niz)/sizeof(niz[0]) -> 5
	*/
	
	// 1d niz
	//a	_ _ _ _ _
	//	0 1 2 3 4
	// 2d niz
	
	for(int i = 0; i < 7; i++){
		for(int j = 0; j < 7; j++){
			if(i == j || j + i == 6){
				cout << " * ";
			} else {
				cout << "   ";
			}
		}
		cout << endl;
	}
	
	return 0;
}








