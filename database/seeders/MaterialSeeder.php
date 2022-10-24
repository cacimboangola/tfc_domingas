<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::factory(100)
            ->create();
    }
}
