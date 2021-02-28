using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MineSweeper
{
    class Program
    {
        
        static void ispis(char[,] mat)
        {
            for (int i = 0; i < mat.GetLength(0); i++)
            {
                for (int j = 0; j < mat.GetLength(1); j++)
                    Console.Write(mat[i, j] + " ");
                Console.WriteLine();
            }
        }
        static void Main(string[] args)
        {
            // 8x10
            // 10 mina
            // pravimo matricu i postavljamo sve na false
            bool[,] mineMat = new bool[8, 10];
            for (int i = 0; i < mineMat.GetLength(0); i++) 
                for (int j = 0; j < mineMat.GetLength(1); j++)
                    mineMat[i, j] = false;

            Random rnd = new Random();

            int uk_br_mina = 10;
            for (int i = 0; i < uk_br_mina; )
            {
                int i_temp = rnd.Next(0, 8);
                int j_temp = rnd.Next(0, 10);
                // Ako se na generisanom polju ne nalazi mina, postavljamo je
                if (mineMat[i_temp, j_temp] == false)
                {
                    mineMat[i_temp, j_temp] = true;
                    i++;
                }
            }

            

            // -   - neotvoreno polje
            // 0-8 - susedne mine
            // +   - mina
            // ' ' - prazno polje
            // ?   - zastava (TODO)
            char[,] pogociMat = new char[8, 10];
            for (int i = 0; i < pogociMat.GetLength(0); i++)
                for (int j = 0; j < pogociMat.GetLength(1); j++)
                    pogociMat[i, j] = '-';

            bool igra = true;
            while (igra)
            {
                ispis(pogociMat);

                Console.WriteLine("Unesite koordinate odvojene razmakom: ");
                string[] linija = Console.ReadLine().Split();
                int i_p = int.Parse(linija[0]);
                int j_p = int.Parse(linija[1]);
                i_p--;
                j_p--;

   
                if (mineMat[i_p, j_p] == true)
                {
                    Console.WriteLine("Pogodili ste minu, igra je završena!");
                    pogociMat[i_p, j_p] = '+';
                    ispis(pogociMat);
                    igra = false;
                    break;
                }

                
                





            }



            Console.ReadKey();
        }
    }
}
