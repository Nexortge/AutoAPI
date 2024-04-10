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
                    'brandstof_id' => 1
                ],
                [
                    'naam' => 'M5 E36',
                    'merk' => 'BMW',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'C-Klasse',
                    'merk' => 'Mercedes',
                    'brandstof_id' => 2

                ],
                [
                    'naam' => 'E-Klasse',
                    'merk' => 'Mercedes',
                    'brandstof_id' => 2

                ],
                [
                    'naam' => 'GLE',
                    'merk' => 'Mercedes',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'A3',
                    'merk' => 'Audi',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'A4',
                    'merk' => 'Audi',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Corrola',
                    'merk' => 'Toyota',
                    'brandstof_id' => 4

                ],
                [
                    'naam' => 'Camery',
                    'merk' => 'Toyota',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'AE86',
                    'merk' => 'Toyota',
                    'brandstof_id' => 2

                ],
                [
                    'naam' => 'Fiesta',
                    'merk' => 'Ford',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Focus',
                    'merk' => 'Ford',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Mustang',
                    'merk' => 'Ford',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Golf',
                    'merk' => 'Volkswagen',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Passat',
                    'merk' => 'Volkswagen',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Tiguan',
                    'merk' => 'Volkswagen',
                    'brandstof_id' => 2

                ],
                [
                    'naam' => 'Civic',
                    'merk' => 'Honda',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Accord',
                    'merk' => 'Honda',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'GLE',
                    'merk' => 'Mercedes',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'CR-V',
                    'merk' => 'Honda',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Altima',
                    'merk' => 'Nissan',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Sentra',
                    'merk' => 'Nissan',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Rogue',
                    'merk' => 'Nissan',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Malibu',
                    'merk' => 'Cevrolet',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Equinox',
                    'merk' => 'Cevrolet',
                    'brandstof_id' => 1

                ],
                [
                    'naam' => 'Silverado',
                    'merk' => 'Cevrolet',
                    'brandstof_id' => 2

                ],
            ]

        );

    }
}
