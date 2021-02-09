#include <iostream>
#include <string>

using namespace std;

class Kvadratic{
    public: 
        // Svojstva
        char kolona;
        int vrsta;
        string boja;
        bool pogodjen;
        
        // Konstruktor
        Kvadratic(){
            kolona = 'A';
            vrsta = 1;
            boja = "crvena";
            pogodjen = false;
        }
        Kvadratic(char x){
            kolona = x;
            vrsta = 1;
            boja = "crvena";
            pogodjen = false;
        }
        Kvadratic(char column, int row, string color, bool hit){
            kolona = column;
            vrsta = row;
            boja = color;
            pogodjen = hit;

        }
        // Napravite konstruktore:
        // 1. kolonu, vrstu
        // 2. kolonu, vrstu, boju

};

// Ucenik: ime, prezime, razred, prosek
//      kontruktor: ime, prezime, razred, prosek

class Ucenik{
    public:
        string ime;
        string prezime;
        int razred;
        float prosek;

        Ucenik(string name, string surname, int grade, float avg){
            ime = name;
            prezime = surname;
            razred = grade;
            prosek = avg;
        }

};

int main(){
    Kvadratic k1, k2;
    k1.kolona = 'B';
    k1.vrsta = 3;
    k1.boja = "crvena";
    k1.pogodjen = true;
    cout << k1.kolona << " " << k1.vrsta << " : " << k1.boja << ", " << k1.pogodjen << endl;
    
    // cout << "Unesi kolonu, vrstu, boju i (0/1) za pogodjen";
    // cin >> k2.kolona >> k2.vrsta >> k2.boja >> k2.pogodjen;

    Kvadratic k3('D');
    cout << k3.kolona << endl;

    Kvadratic k4('G', 4, "plava", false);
    cout << k4.kolona << ", " << k4.vrsta << " : " << k4.boja << " " << k4.pogodjen << endl;

    return 0;
}