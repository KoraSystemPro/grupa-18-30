#include <iostream>

using namespace std;

float povrsina_baze(float a, float b);
float zapremina_kvadra(float visina, float a, float b);

float povrsina_baze(float a, float b){
	return a*b;
}
float zapremina_kvadra(float a, float b, float visina){
	return visina*povrsina_baze(a, b);
}

void ispisi_niz(int a[]){
	cout << "niz: ";
	for(int i = 0; i < a.length(); i++){
		cout << a[i] << " ";
	}
	cout << endl;
}

int main(){
	float a, b, c;
	cout << "Unesite duzinu, sirinu i visinu kvadra: ";
	cin >> a >> b >> c;
	
	cout << "Zapremina: " << zapremina_kvadra(a, b, c);
	
}
