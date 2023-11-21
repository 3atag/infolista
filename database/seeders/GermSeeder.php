<?php

namespace Database\Seeders;

use App\Models\Germ;
use App\Models\TypeGerm;
use App\Models\TypeIsolation;
use Illuminate\Database\Seeder;

class GermSeeder extends Seeder
{

    public function run(): void
    {
        Germ::create([
            'name' => 'KPC',
            'type_isolation_id' => TypeIsolation::CONTACTO,
        ]);

        Germ::create([
            'name' => 'Virus respiratorio',
            'type_isolation_id' => TypeIsolation::RESPCORTO,
        ]);

        Germ::create([
            'name' => 'TBC',
            'type_isolation_id' => TypeIsolation::RESPLARGO,
        ]);
    }
}
