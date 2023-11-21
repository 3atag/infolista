<?php

namespace Database\Seeders;

use App\Models\TypeIsolation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeIsolationSeeder extends Seeder
{

    public function run(): void
    {
        TypeIsolation::create([
            'name' => 'Contacto',
        ]);

        TypeIsolation::create([
            'name' => 'Respiratorio corto',
        ]);

        TypeIsolation::create([
            'name' => 'Respiratorio largo',
        ]);

        TypeIsolation::create([
            'name' => 'COVID',
        ]);
    }
}
