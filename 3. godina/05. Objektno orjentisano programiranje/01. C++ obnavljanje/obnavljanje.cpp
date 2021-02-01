#include <iostream>
#include <vector>

using namespace std;

// Funkcije primaju neke vrednosti(argumente), vrse izracunavanja i vracaju vrednost
// <tip povratne promenljive> <ime funkcije>(<argumenti>)
int kvadrat(int x, int y){
    int rez = x*x + y*y;
    return rez;
}

void ispisi_niz(int a[], int n){
    for(int i = 0; i < n; i++){
        cout << a[i] << " ";
    }
    cout << endl;
}

void ispisi_vec(vector<int> a, int n){
    for(int i = 0; i < n; i++){
        cout << a[i] << " ";
    }
    cout << endl;
}

int main(){
    // int a, b;
    // cin >> a >> b;

    // cout << kvadrat(a, b) << endl;
    // cout << sizeof(int);
    // int n;
    // cin >> n;
    // // int niz[n]; // ovo se ne koristi
    // vector<int> v(n);
    // for(int i = 0; i < n; i++){
    //     cin >> v[i];
    // }
    // ispisi_niz(v, n);
    // int64_t a[5];
    // for(int i = 0; i < 10000; i++)
    //     cin >> a[i];
    // int64_t* p = a;
    // for(int i = 0; i < 5; i++){
    //     cout << p << ": " << *p << endl;
    //     p++;
    // }

    vector<int> c;
    for(int i = 0; i < ; i++)
        c.push_back(i);

    int a;
    cin >> a;

    
    return 0;
}