<?php

namespace Database\Seeders;

use App\Models\Calzado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalzadoSeeder extends Seeder
{
    public function run(): void
    {
        Calzado::factory(10)->make();
    }
}
