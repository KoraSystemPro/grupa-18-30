#include <iostream>

using namespace std;

int main(){
	int a[] = {60, 123, 8,  73, 4, 92, 136, 876, 332, 12};
	//_ _ _ _ _	0	1	2	3	4
	
	int max1, max2, max3 = -1;
	cout << "Uneti niz je: ";
	
	for(int i = 0; i < 10; i++){
		cout << a[i] << " ";
		if(a[i] > max1){
			max3 = max2;
			max2 = max1;
			max1 = a[i];
		} else if (a[i] > max2){
			max3 = max2;
			max2 = a[i];
		} else if (a[i] > max3){
			max3 =  a[i];
		}
	}
	cout << endl << "Maksimumi niza su: " << max1 << " " << max2 << " " << max3;
	
	
	
	return 0;
}
