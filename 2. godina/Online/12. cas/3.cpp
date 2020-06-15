#include <iostream>

using namespace std;

// Deklaracija funkcija pre definicije
int zapremina_kocke(int a);
int povrsina_kvadrata(int a);


int zapremina_kocke(int c){
	return c*povrsina_kvadrata(c);
}

int povrsina_kvadrata(int a){
	return a*a;
}

int main(){
	int x;
	cout << "Unesite stranicu: ";
	cin >> x;
	cout << "Povrsina kvadrata: " << povrsina_kvadrata(x) << endl;
	cout << "Zapremina kocke: " << zapremina_kocke(x);

	return 0;
}
