<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parameter::insert([
            [
                'analysis' => '(Cd) Cadmium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Ca) Calcium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Cr) Chromium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Co) Cobalt',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Cu) Copper',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Fe) Iron',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Pb) Lead',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Ni) Nickel',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Ne) Sodium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(K) Potassium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Sb) Antimony',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Au) Gold',
                'method' => 'none',
                'price' => '1320.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Hg) Mercury',
                'method' => 'none',
                'price' => '1320.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Mg) Magnesium',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Mn) Manganese',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Se) Selenium',
                'method' => 'none',
                'price' => '1650.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Ag) Silver',
                'method' => 'none',
                'price' => '1100.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Sr) Strontium',
                'method' => 'none',
                'price' => '1100.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Sn) Tin',
                'method' => 'none',
                'price' => '1100.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(Zn) Zinc',
                'method' => 'none',
                'price' => '740.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => '(As) Arsenic',
                'method' => 'none',
                'price' => '1650.00',
                'station' => '1',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Escherichia Coli',
                'method' => 'Membrane Filtration for drinking water samples',
                'price' => '540.00',
                'station' => '3',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Fecial Coliforms',
                'method' => 'Membrane Filtration for drinking water samples',
                'price' => '510.00',
                'station' => '3',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Total Coliforms',
                'method' => 'Membrane Filtration for drinking water samples',
                'price' => '810.00',
                'station' => '3',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Heterotrophic Plate Count',
                'method' => 'Pour Plate Method',
                'price' => '845.00',
                'station' => '3',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Fecal Coliforms, Total Coliforms',
                'method' => 'Multiple Tube Fermentation Technique for waste water and surface water samples',
                'price' => '1430.00',
                'station' => '3',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Acidity',
                'method' => 'none',
                'price' => '300.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Bicarbonate Alkalinity',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Carbonate Alkalinity',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Hydroxide Alkalinity',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Phenolphtalein Alkalinity',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Total Alkalinity / Methyl Orange Alkalinity',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Free Carbon Dioxide',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Total Carbon Dioxide',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Chloride',
                'method' => 'none',
                'price' => '550.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Chlorine Disenfectant, residual',
                'method' => 'none',
                'price' => '420.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Chromium (VI)',
                'method' => 'none',
                'price' => '715.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
            [
                'analysis' => 'Calcium Hardness',
                'method' => 'none',
                'price' => '330.00',
                'station' => '2',
                'managedBy' => 'Test Admin',
                'managedDate' => new DateTime,
            ],
        ]); 
    }
}
