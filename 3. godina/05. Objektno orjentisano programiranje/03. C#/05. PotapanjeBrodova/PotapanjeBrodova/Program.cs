using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PotapanjeBrodova
{
    // 10x10 dimenzije
    // 1 brod veličine 4 kvadrata   - ratni 
    // 2 broda veličine 3 kvadrata  - obican
    // 3 broda veličine 2 kvadrata  - uništitelj
    // 4 broda veličine 1 kvadrata  - podmornica

    class Program
    {
        // Globalne konstante
        public const int DIMENZIJA_TABLE = 10;
        public const int VEL_RATNI = 4;
        public const int VEL_OBICAN = 3;
        public const int VEL_UNISTITELJ = 2;
        public const int VEL_PODMORNICA = 1;



        public class Brod
        {
            // Polja
            char orijentacija;
            int duzina;
            int[] brodRed = new int[10];
            int[] brodKolona = new int[10];
            int brPogodaka;
            string ime;
            
            // Konstruktor - TODO

            // Metode - TODO

            


        }

        private static void postaviPolja(int[,] polja)
        {
            for(int red = 0; red < DIMENZIJA_TABLE; red++)
            {
                for(int kolona = 0; kolona < DIMENZIJA_TABLE; kolona++)
                {
                    polja[red, kolona] = 0;
                }
            }
        }


        static void Main(string[] args)
        {
            int[,] polja = new int[DIMENZIJA_TABLE, DIMENZIJA_TABLE];

            Brod[] brodovi = new Brod[10];
            postaviPolja(polja);
            postaviBrod(polja, VEL_RATNI, 0, brodovi);
        }

        private static void postaviBrod(int[,] polja, int duzina, int indeks, Brod[] brodovi)
        {
            int kolona = 0;
            int red = 0;
            char orj = 'v'; // v - vertikalno, h - horizontalno
            bool mogucePostaviti = true;

            Random rnd = new Random();
            orj = napraviSmer(rnd.Next(1000)%10);
            while (mogucePostaviti)
            {
                if(orj == 'h')
                {
                    // Resavamo pitanje preklapanja brodova
                    bool preklapanje = proveriPreklapanje(polja, red, kolona, duzina);
                    if (preklapanje == true)
                    {
                        orj = napraviSmer(rnd.Next(1000) % 10);
                        kolona = nadjiRediKolonu(red, kolona, duzina, orj);
                        preklapanje = false;
                        continue;
                    }
                }
                else if (orj == 'v')
                {

                }
                else
                {
                    Console.WriteLine("Nemoguca orijentacija!");
                }
            }
        }

        private static int nadjiRediKolonu(int red, int kolona, int duzina, char orj)
        {
            Random rnd = new Random();
            switch (duzina)
            {
                case VEL_RATNI:
                    if(orj == 'h')
                    {
                        kolona = rnd.Next(1000) % 6;
                        red = rnd.Next(1000) % 10;
                    } else
                    {
                        kolona = rnd.Next(1000) % 10;
                        red = rnd.Next(1000) % 6;
                    }
                    break;
                case VEL_OBICAN:
                    if (orj == 'h')
                    {
                        kolona = rnd.Next(1000) % 7;
                        red = rnd.Next(1000) % 10;
                    }
                    else
                    {
                        kolona = rnd.Next(1000) % 10;
                        red = rnd.Next(1000) % 7;
                    }
                    break;
                case VEL_UNISTITELJ:
                    if (orj == 'h')
                    {
                        kolona = rnd.Next(1000) % 8;
                        red = rnd.Next(1000) % 10;
                    }
                    else
                    {
                        kolona = rnd.Next(1000) % 10;
                        red = rnd.Next(1000) % 8;
                    }
                    break;
                case VEL_PODMORNICA:
                    if (orj == 'h')
                    {
                        kolona = rnd.Next(1000) % 9;
                        red = rnd.Next(1000) % 10;
                    }
                    else
                    {
                        kolona = rnd.Next(1000) % 10;
                        red = rnd.Next(1000) % 9;
                    }
                    break;
                default:
                    break;
            }
            return kolona;
        }

        private static char napraviSmer(int v)
        {
            if(v > 4)
            {
                return 'h';
            }
            else
            {
                return 'v';
            }
        }
    }
}
