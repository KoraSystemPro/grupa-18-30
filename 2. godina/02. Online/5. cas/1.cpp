/*
Napisati funkciju int min(int x, int y, int z) koja
izracunava minimum tri broja. Napisati program koji ucitava tri cela broja i
ispisuje njihov minimum.
*/

#include <iostream>

using namespace std;

int minimum(int x, int y, int z){
	int min;
	
	if (x < y && x < z){
		min = x;
	} else if (y < x && y < z){
		min = y;
	} else {	// jednako i c min
		min = z;
	}
	
	cout << "Argumenti funkcije: " << x << " " << y << " " << z << endl;
	cout << "Izracunati minimum u funkciji: " << min << endl;	
	
	return min;
}


int main(){
	int a, b, c;
	cin >> a >> b >> c;
	
	int min;
	min = minimum(a, b, c); // Hej evo ti ga minimum!
	cout << "Minimum je: " << min;

	//cout << "Minimum je: " << minimum(a, b, c);

	return 0;
}
