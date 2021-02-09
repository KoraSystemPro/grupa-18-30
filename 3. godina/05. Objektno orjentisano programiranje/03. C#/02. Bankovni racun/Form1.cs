using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Racun
{
    public partial class Form1 : Form
    {
        class BankovniRacun
        {
            // Svojstva / Polja
            public string ime;
            private double iznos;

            // Konstruktori
            public BankovniRacun()
            {
                ime = "/";
                iznos = 0;
            }
            public BankovniRacun(string imeOsobe, double ukupanIznos)
            {
                ime = imeOsobe;
                iznos = ukupanIznos;
            }

            public void upit_stanja()
            {
                MessageBox.Show("Ime:\t" + ime + "\nIznos:\t" + iznos + "din");
            }

            public void uplata(double x)
            {
                iznos = iznos + x;
                MessageBox.Show("Na racun osobe " + ime + " , uplaceno je: " + x + "din");
            }

            public void isplata(double x)
            {
                if (iznos - x < 0)
                    MessageBox.Show("Na racunu osobe " + ime + " nema dovoljno novca za isplatu " + x + "din");
                else {
                    MessageBox.Show("Sa racuna osobe " + ime + " , isplaceno je: " + x + "din");
                    iznos = iznos - x;
                }
            }

        }
        public Form1()
        {
            InitializeComponent();
        }

        BankovniRacun o1 = new BankovniRacun("Milica", 0);
        private void button1_Click(object sender, EventArgs e)
        {
            string ime = textBox1.Text;
            double iznos = Convert.ToDouble(textBox2.Text);
            if (radioButton1.Checked)       // Uplata
                o1.uplata(iznos);
            else if (radioButton2.Checked)  // Isplata
                o1.isplata(iznos);
            else if (radioButton3.Checked)  // Prebacaj


            o1.upit_stanja();

        }

        private void radioButton3_CheckedChanged(object sender, EventArgs e)
        {
            if (radioButton3.Checked) // Prebaci
            {
                textBox3.Visible = true;
                label3.Visible = true;
            } 
            else
            {
                textBox3.Visible = false;
                label3.Visible = false;
            }
        }
    }
}
