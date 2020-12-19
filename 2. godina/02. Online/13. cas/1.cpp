// 1. Napisati program koji za uneti proizvoljan niz celih brojeva dužine 10, pravi i ispisuje novi niz u kome su izbaceni svi duplikati.

// 1   8   3   7   4  4  3 	3  8  1
// ispis: 
// 1   8   3   7   4
//
#include <iostream>

using namespace std;

int main(){
	int a[10] = {1, 8, 3, 7, 4, 4, 3, 3, 8, 1};
	cout << "Niz: ";
	for(int i = 0; i < 10; i++){
		cout << a[i] << " ";
	}
	cout << endl;
	
	int originali[10];
	int dim = 1;
	originali[0] = a[0];
	for(int i = 1; i < 10; i++){
		int trenutna = a[i];
		bool postoji = false;
		for(int j = 0; j < dim; j++){
			if(trenutna == originali[j]){
				postoji = true;
			}
		}
		
		if(postoji == false){
			originali[dim] = trenutna;
			dim++;
		}
	}
	
	cout << "Originali: ";
	for(int i = 0; i < dim; i++){
		cout << originali[i] << " ";
	}
	
	return 0;
}
