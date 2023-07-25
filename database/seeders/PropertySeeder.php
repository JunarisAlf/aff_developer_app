<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder{
    public function run(): void{
        Property::create([
            'name'      => 'Abinaya Residence Type 153/120 2 Lantai',
            'price'     => 1_350_000_000,
            'description'   => 'Rumah mewah dan elegan dengan lokasi strategis ditengah kota',
            'address'       => 'Jl. Bundo Kandung',
            'details'       => [
                'type' => '153/120',
                'harga' => '1.150.000.000 - 1.350.000.000',
                'lantai'    => '2'
            ]
        ]);
    }
}
