using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp1
{
    class Program
    {
        class Ucenik
        {
            public String ime;
            public String prezime;
            public int razred;
            public double prosek;
            
            public void ispisiUcenika()
            {
                Console.WriteLine("Ime: " + ime + "\nPrezime: " + prezime + "\nRazred: " + razred + "\nProsek: " + prosek + "\n");

            }

            // Konstruktor
            public Ucenik()
            {

            }

            public Ucenik(string firstName, string lastName, int grade, double avg)
            {
                ime = firstName;
                prezime = lastName;
                razred = grade;
                prosek = avg;
            }

        }

        class Pravougaonik
        {
            public double a;
            public double b;

            // Konstruktor
            public Pravougaonik(double x, double y)
            {
                a = x;
                b = y;
            }

            // Metode
            public void ispisi_dimenizije()
            {
                Console.WriteLine("Dimenzije pravougaonika:\na: " + a + "\tb: " + b);
            }
            public double povrsina(bool ispis)
            { 
                double p = a * b;
                if(ispis == true)
                    Console.WriteLine("Povrsina pravougaonika je: " + p);
                return p;

            }
            public double obim()
            {
                return 2 * a + 2 * b;
            }
            public void uvecaj_za_n(double n)
            {
                a = a + n;
                b = b + n;
            }

        }

        static void Main(string[] args)
        {
            // cin --> Console.ReadLine()
            // cout --> Console.WriteLine()
            // Ucenik u1;          // Rezervise memoriju za u1, ali ne pravi sam objekat
            // u1 = new Ucenik();  // Kreiramo instancu klase
            Ucenik u1 = new Ucenik();

            u1.ime = "Stefan";
            u1.prezime = "Petrovic";
            u1.razred = 6;
            u1.prosek = 4.72;

            //Console.WriteLine(u1.ime + " " + u1.prezime + " " + u1.razred + " " + u1.prosek);

            Ucenik u2 = new Ucenik("Marko", "Markovic", 7, 4.78);
            u1.ispisiUcenika();
            u2.ispisiUcenika();


            Pravougaonik p1 = new Pravougaonik(5.0, 4.0);
            p1.ispisi_dimenizije();
            double povrsina = p1.povrsina(true);
            // Console.WriteLine("Povrsina pravougaonika je: " + povrsina);
            Console.WriteLine("Obim pravougaonika je: " + p1.obim());
            p1.uvecaj_za_n(6);
            p1.ispisi_dimenizije();


            Console.ReadKey();
        }
    }
}
