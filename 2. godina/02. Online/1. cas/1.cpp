#include <iostream>

using namespace std;

int main(){
    // cin >>    Console.ReadLine()
    // cout <<   Console.WriteLine()
    // std::cin>>
    // std::cout<<

    /* 
    --- Tipovi promenljivih ---
    int (32bit), long (long int)    -98, +6795,....
    float (32bit), double           -9.81, +3.1415, +987.65
    unsigned                        98,             
    char                    "a", "-", "98" -> "78" + "3" = "783"
    string                  "a", "Ovo je string", "+*""                
    
    */

// ZADACI

// 1  Svi brojevi od 5 do n, ukljucujuci i n
//    int n;
//    cin >> n;
//
//    for(int i = 5; i <= n; i = i + 5){
//        cout << i;
//    }

// 2   Svi neparni brojevi cetvrte stotine
//     for (int i = 301; i < 401; i++){
//         if (i % 2 != 0){
//             cout << i;
//         }
//     }

// 3  Ispisati sve korake a/del=rez
//     int a, del;
//     cin >> a >> del;
//     while(a != 0){
//         cout << a << " / " << del;
//         a = a / del;
//         cout << " = " << a;
//     }

// 4  Odrediti da li je uneti broj palindrom (332233 - JESTE,  12345 - NIJE)
//     unsigned n, br, cifra, rez = 0;
//     cin >> br;  // 653356
//     n = br // Pravim kopiju radi cuvanja i krajnje provere
    
//     do{
//         cifra = br % 10;
//         rez = (rez * 10) + cifra;
//         br = br / 10;
//     }while(br != 0)

//     if (rez == n){
//         cout << "Jeste";
//     } else {
//         cout << "Nije";
//     }

// 5  Tempomat 
// bool tempomat = true;
// int brzina = 0;
// int zadata_brzina;
// int zadata_granica_levo, zadata_granica_desno;
// cin >> zadata_brzina;
// cin >> zadata_granica_levo >> zadata_granica_desno;
// while (tempomat == true){
//     // Da li je iskljucen tempomat 
//     if (brzina < zadata_granica_levo){
//         cout << "Ubrzaj";
//     } else if (brzina > zadata_granica_desno){
//         cout << "Uspori";
//     } else {
//         cout << "OK";
//     }

//     brzina += 1;
//     cout << brzina;
// }

} 