<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        Role::create([
            'id' => Role::ADMIN,
            'name' => 'Admin',
        ]);

        Role::create([
            'id' => Role::INFECTOLOGO,
            'name' => 'Infectologo',
        ]);

        Role::create([
            'id' => Role::SUPERVISOR,
            'name' => 'Supervisor',
        ]);

        Role::create([
            'id' => Role::PROFESIONAL,
            'name' => 'Profesional',
        ]);

        Role::create([
            'id' => Role::ADMINISTRATIVO,
            'name' => 'Administrativo',
        ]);
    }
}
