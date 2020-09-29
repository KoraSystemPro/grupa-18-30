#include <iostream>
#include "olcNoiseMaker.h"

using namespace std;


double MakeNoise(double dTime){
	return 0.3 * sin(440.0 * 2 * 3.14159 * dTime);
}


/* run this program using the console pauser or add your own getch, system("pause") or input loop */
int main(int argc, char** argv) {
	wcout << "Synth v0.1" << endl;
	
	// Pretrazuje sve audio uredjaje
	vector<wcout> devices = olcNoiseMaker<short>::Enumerate();
	
	// Prikazuje pretrazene
	for(auto d : devices){
		wcout << "Pronadjeni audio uredjaji:" << d << endl;
	}
	
	// Pravimo masinu koja generise zvuk
	olcNoiseMaker<short> sound(devices[0], 44100, 1, 8, 512);
	
	// Povezujemo zvuk sa masinom
	sound.SetUserFunction(MakeNoise);
	
	
	return 0;
}
