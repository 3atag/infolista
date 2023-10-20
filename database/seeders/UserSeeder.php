<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Pintos Juan',
            'email' => 'jpintos@clinicahispano.com.ar',
            'role_id' => Role::ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Santiago Leonor',
            'email' => 'lsantiago@clinicahispano.com.ar',
            'role_id' => Role::PROFESIONAL,
        ]);

        User::factory()->create([
            'name' => 'Rodriguez Forgues Fernando',
            'email' => 'frforgues@clinicahispano.com.ar',
            'role_id' => Role::PROFESIONAL,
        ]);

        User::factory()->create([
            'name' => 'Hid Silvia',
            'email' => 'shid@clinicahispano.com.ar',
            'role_id' => Role::PROFESIONAL,
        ]);

        User::factory()->create([
            'name' => 'Calvete Viviana',
            'email' => 'vcalvete@clinicahispano.com.ar',
            'role_id' => Role::ADMINISTRATIVO,
        ]);
    }
}
