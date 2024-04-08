<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('autos')->insert(
            $autos = [
                [
                    'naam' => 'M3 E36',
                    'merk' => 'BMW',
                ],
                [
                    'naam' => 'M5 E36',
                    'merk' => 'BMW',
                ],
                [
                    'naam' => 'C-Klasse',
                    'merk' => 'Mercedes',
                ],
                [
                    'naam' => 'E-Klasse',
                    'merk' => 'Mercedes',
                ],
                [
                    'naam' => 'GLE',
                    'merk' => 'Mercedes',
                ],
                [
                    'naam' => 'A3',
                    'merk' => 'Audi',
                ],
                [
                    'naam' => 'A4',
                    'merk' => 'Audi',
                ],
                [
                    'naam' => 'Corrola',
                    'merk' => 'Toyota',
                ],
                [
                    'naam' => 'Camery',
                    'merk' => 'Toyota',
                ],
                [
                    'naam' => 'AE86',
                    'merk' => 'Toyota',
                ],
                [
                    'naam' => 'Fiesta',
                    'merk' => 'Ford',
                ],
                [
                    'naam' => 'Focus',
                    'merk' => 'Ford',
                ],
                [
                    'naam' => 'Mustang',
                    'merk' => 'Ford',
                ],
                [
                    'naam' => 'Golf',
                    'merk' => 'Volkswagen',
                ],
                [
                    'naam' => 'Passat',
                    'merk' => 'Volkswagen',
                ],
                [
                    'naam' => 'Tiguan',
                    'merk' => 'Volkswagen',
                ],
                [
                    'naam' => 'Civic',
                    'merk' => 'Honda',
                ],
                [
                    'naam' => 'Accord',
                    'merk' => 'Honda',
                ],
                [
                    'naam' => 'GLE',
                    'merk' => 'Mercedes',
                ],
                [
                    'naam' => 'CR-V',
                    'merk' => 'Honda',
                ],
                [
                    'naam' => 'Altima',
                    'merk' => 'Nissan',
                ],
                [
                    'naam' => 'Sentra',
                    'merk' => 'Nissan',
                ],
                [
                    'naam' => 'Rogue',
                    'merk' => 'Nissan',
                ],
                [
                    'naam' => 'Malibu',
                    'merk' => 'Cevrolet',
                ],
                [
                    'naam' => 'Equinox',
                    'merk' => 'Cevrolet',
                ],
                [
                    'naam' => 'Silverado',
                    'merk' => 'Cevrolet',
                ],
            ]

        );

    }
}
