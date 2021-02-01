#include <iostream>
#include <string>

using namespace std;

int main(){
    char k1, k2, k3;
    int v1, v2, v3;
    string b1, b2, b3;
    bool p1, p2, p3;


    char pom;
    // Za prvi kvadratic
    cout << "Unesite kolonu za prvi kvadratic: ";
    cin >> k1;
    cout << "Unesite vrstu za prvi kvadratic: ";
    cin >> v1;
    cout << "Unesite boju za prvi kvadratic: ";
    cin >> b1;
    cout << "Pritisnite D ako je prvi kvadratic pogodjen, ili N ako nije pogodjen: ";
    cin >> pom;
    if(pom == 'D')
        p1 = true;
    else
        p1 = false;

    // Za drugi kvadratic
    cout << "Unesite kolonu za drugi kvadratic: ";
    cin >> k2;
    cout << "Unesite vrstu za drugi kvadratic: ";
    cin >> v2;
    cout << "Unesite boju za drugi kvadratic: ";
    cin >> b2;
    cout << "Pritisnite D ako je drugi kvadratic pogodjen, ili N ako nije pogodjen: ";
    cin >> pom;
    if(pom == 'D')
        p2 = true;
    else
        p2 = false;

    // Za treci kvadratic
    cout << "Unesite kolonu za treci kvadratic: ";
    cin >> k3;
    cout << "Unesite vrstu za treci kvadratic: ";
    cin >> v3;
    cout << "Unesite boju za treci kvadratic: ";
    cin >> b3;
    cout << "Pritisnite D ako je treci kvadratic pogodjen, ili N ako nije pogodjen: ";
    cin >> pom;
    if(pom == 'D')
        p3 = true;
    else
        p3 = false;

    // .... Ostatak kvadratica
    return 0;
}