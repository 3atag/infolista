<?php

namespace Database\Seeders;

use App\Models\TypeIsolation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TypeIsolationSeeder::class,
            GermSeeder::class,
        ]);
    }
}
