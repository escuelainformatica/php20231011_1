<?php

namespace Database\Seeders;

use App\Models\Bodega;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Bodega::factory()->create([
            "productID"=>1,"cantidad"=>100
        ]);
        Bodega::factory()->create([
            "productID"=>2,"cantidad"=>200
        ]);
        Bodega::factory()->create([
            "productID"=>3,"cantidad"=>300
        ]);
        echo "hola";
    }
}
