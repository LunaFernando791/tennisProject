<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Calzado;
use App\Models\Marca;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        Marca::factory(10)->create();
        User::factory(10)->create();
        Calzado::factory(10)->create();
    }
}
