<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Pintos Juan',
            'email' => 'jpintos@clinicahispano.com.ar',
        ]);

        $admin->roles()->attach(Role::ADMIN);


        $lizzi = User::factory()->create([
            'name' => 'Dra. Lizzi',
            'email' => 'infectologia@clinicahispano.com.ar',
        ]);

        $lizzi->roles()->attach(Role::INFECTOLOGO);

        $carla = User::factory()->create([
            'name' => 'Borda Carla',
            'email' => 'enfermeria@clinicahispano.com.ar',
        ]);

        $carla->roles()->attach(Role::SUPERVISOR);


        $adrian = User::factory()->create([
            'name' => 'Laborde Adrian',
            'email' => 'uti@clinicahispano.com.ar',
        ]);

        $adrian->roles()->attach(Role::PROFESIONAL);

        $analia = User::factory()->create([
            'name' => 'Tridenti Analia',
            'email' => 'internacion@clinicahispano.com.ar',
        ]);

        $analia->roles()->attach(Role::ADMINISTRATIVO);
    }
}
