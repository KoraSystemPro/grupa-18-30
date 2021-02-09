using System;
namespace BankovniRacun
{
    //public class Vozilo
    //{
    //    string marka;
    //    string model;
    //    string boja;
    //    double prenosni_kapaitet;
    //    double potrosnja;
    //    double rezervoar;
    //    int br_ljudi;

    //}
    //public class ServisnaKnjizica
    //{
    //    string ime_izvodjaca;
    //    string datum_rada;
    //    double cena_rada;
    //}
    //public class TeretnoVozilo : Vozilo
    //{
    //    int br_tockova;
    //    string tip_tereta;

    //}

    //public class Avion : Vozilo
    //{
    //    double cena_odrzavanja;
    //    string vlasnik;
    //    ServisnaKnjizica servisna_knjzica;
    //}


    public class Osoba
    {
        /*
            Osoba ->
               string ime
               string prezime
               string adresa
               string telefon
               int visina
               double tezine
               int uk_osoba -> Koliko ima osoba ukupno      

               // Konstruktor
               ime, prezime, adresa, telefon
               ime, prezime, adresa, telefon, visina, tezina           

        */
        /*
            Radnik ->
               string ime
               string prezime
               string adresa
               string telefon
               int visina
               double tezine
               double satnica;
               int br_radnih_sati;
               string sektor;     // Drzavno/privatno
               string zanimanje;

               // Konstruktor
               ime, prezime, adresa, telefon
               ime, prezime, adresa, telefon, visina, tezina  
               ime, prezime, adresa, telefon, visina, tezina, satnica, br_radnih_sati, sektor, zanimanje    
         
        */
        public string ime;
        public string prezime;
        public string adresa;
        public string telefon;
        public int visina;
        public double tezina;
        public int uk_osoba = 0;

        public Osoba()
        {
            string ime = null;
            string prezime = null;
            string adresa = null;
            string telefon = null;
            int visina = 0;
            double tezina = 0;
        }
        public Osoba(string name, string surname, string addr, string phone)
        {
            this.ime = name;
            this.prezime = surname;
            this.adresa = addr;
            this.telefon = phone;

            this.uk_osoba++;
        }
        public Osoba(string name, string surname, string addr, string phone, int height, double weight)
        {
            this.ime = name;
            this.prezime = surname;
            this.adresa = addr;
            this.telefon = phone;
            this.visina = height;
            this.tezina = weight;

            this.uk_osoba++;
        }

        public void ispisi_podatke()
        {
            Console.WriteLine("Ime: " + this.ime + "\nPrezime: " + this.prezime + "\nAdresa: " 
            + this.adresa + "\nTelefon" + this.telefon + "\nVisina: " + this.visina +
                "Tezina: " + this.tezina);
        }
    }

    public class Radnik : Osoba // Klasa Radnik, nasledjuje klasu Osoba
    {
        double satnica;
        int br_radnih_sati;
        string sektor;     // Drzavno/privatno
        string zanimanje;

        public Radnik(string name, string surname, string addr, string phone, int height, 
           double weight,double hour_rate, int hours_worked, string emp_type, string job_title)
        {
            this.ime = name;
            this.prezime = surname;
            this.adresa = addr;
            this.telefon = phone;

            this.satnica = hour_rate;
            this.br_radnih_sati = hours_worked;
            this.sektor = emp_type;
            this.zanimanje = job_title;
        }

        public double izracunaj_platu()
        {
            return this.satnica * this.br_radnih_sati;
        }

    }
}
