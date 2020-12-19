/*
Napisati funkciju float razlomljeni_deo(float x) koja
izracunava razlomljeni deo broja x. Napisati program koji ucitava jedan realan
broj i ispisuje njegov razlomljeni deo.

 96.6487
-96
----------
  0.6487

*/

#include <iostream>
#include <iomanip>
#include <cmath>

using namespace std;


float razlomljeni_deo(float x){
	int ceo_deo = (int)x;
	
	float r_deo = x - ceo_deo;
	
	return r_deo;
}

int main(){
	cout << setprecision(5);
	float br; //double	
	cin >> br;


	cout << "Razlomljeni deo broja " << br << " je: " << abs(razlomljeni_deo(br));
	return 0;
}









