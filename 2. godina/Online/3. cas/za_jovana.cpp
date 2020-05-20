#include <bits/stdc++.h> 
using namespace std; 
  
int nadjiNajcesci(int arr[], int n) 
{ 
    // Sortira niz
    sort(arr, arr + n); 
  
    // Trazi najcesce ponavljanje lineranim prolazom
    int max_ponavaljnje = 1, rez = arr[0], tren_ponavaljnje = 1; 
    for (int i = 1; i < n; i++) { 
        if (arr[i] == arr[i - 1]) 
            tren_ponavaljnje++; 
        else { 
            if (tren_ponavaljnje > max_ponavaljnje) { 
                max_ponavaljnje = tren_ponavaljnje; 
                rez = arr[i - 1]; 
            } 
            tren_ponavaljnje = 1; 
        } 
    } 
  
    // Ako je poslednji element najcesci
    if (tren_ponavaljnje > max_ponavaljnje) 
    { 
        max_ponavaljnje = tren_ponavaljnje; 
        rez = arr[n - 1]; 
    } 
  
    return rez; 
} 
  
int main() 
{ 
    int arr[] = { 1, 5, 2, 1, 3, 2, 1 }; 
    int n = sizeof(arr) / sizeof(arr[0]); 
    cout << nadjiNajcesci(arr, n); 
    return 0; 
} 
