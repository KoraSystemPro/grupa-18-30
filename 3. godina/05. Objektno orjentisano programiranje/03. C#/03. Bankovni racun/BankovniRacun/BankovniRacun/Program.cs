using System;

namespace BankovniRacun
{
    class MainClass
    {
        class BankovniRacun
        {
            public string ime;
            private double iznos;

            public BankovniRacun(string name, double amount)
            {
                ime = name;
                iznos = amount;
            }

            public void upit_stanja() 
            {
                Console.WriteLine("Ime: " + ime + "\nStanje: " + iznos);
            }

            public void uplata(double amount)
            {
                iznos += amount;
            }

            public void isplata(double amount)
            {
                if(amount > iznos) 
                {
                    Console.WriteLine("Na racunu osobe '" + ime + "' nema dovoljno sredstava!");
                }
                else
                {
                    iznos -= amount;
                }

            }

            public void prenos(BankovniRacun target, double amount)
            {
                if(iznos < amount)
                {
                    Console.WriteLine("Na racunu osobe '" + ime + "' nema dovoljno sredstava za prenos " + amount + " sredstava!");

                }
                else
                {
                    target.iznos += amount;
                    this.iznos -= amount;
                    Console.WriteLine("Uspesno je prebaceno " + amount + " sredstava!");
                }

            }

        }
        public static void Main(string[] args)
        {
            // BankovniRacun racun1 = new BankovniRacun();
            // BankovniRacun racun1 = new BankovniRacun("Mihajlo", 500);
            // racun1.ime = "Nemanja";
            // racun1.iznos = -1000;
            Console.WriteLine("Ime: ");
            string name = Console.ReadLine();
            Console.WriteLine("Iznos: ");
            double amount = Convert.ToDouble(Console.ReadLine());
            BankovniRacun racun1 = new BankovniRacun(name, amount);
            
            racun1.upit_stanja();
            Console.WriteLine("Nakon sto smo skinuli 500: ");
            racun1.isplata(500);
            racun1.upit_stanja();
            Console.WriteLine("Nakon sto smo uplatili 2000: ");
            racun1.uplata(2000);
            racun1.upit_stanja();

            BankovniRacun racun2 = new BankovniRacun("Ilija", 1000);
            racun1.prenos(racun2, 400);
            racun1.upit_stanja();
            racun2.upit_stanja();
            /*
            Pas ->
                svojstva:
                    ime (string)
                    rasa (string)
                    godine (int)
                    boja (string)
                    starost (string) ---
                konstruktor (ime)
                konstruktor (ime, godiste, rasa, boja)
                metode:
                    laje() -> "Av avv"
                    jede() -> "omnom nom"
                    ispisi_podatke() -> ispisuje sve
                    proceni_starost() -> upisuje u starost 
                    ("stene" (0->1) "mlad" (1->5) "zreo" (6->10) "star" (11->)
             */
            

        }
    }
}
